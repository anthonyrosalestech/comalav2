import Axios from "axios";
import swal from "sweetalert";

const upload = async (clave_catastral, idProceso, dataDocuments) => {
  try {
    const files = new FormData();

    files.append("clave_catastral", clave_catastral);
    // files.append("id_tramite_proceso", idProceso);

    const keyNames = Object.keys(dataDocuments);

    keyNames.map((res) => {
      if (dataDocuments[res].name !== "") {
        files.append(res, dataDocuments[res].file, dataDocuments[res].name);
      }
    });

    const res = await Axios.post("/api/upload", files);

    swal("", "Documentacion actualizada correctamente", "success").then(e => e ? location.reload() : false);


    await addOrUpdateDocuments(res.data, idProceso);
  } catch (error) {
    console.log(error);
    swal("Error", "Error al actualizar la documentacion", "error");
  }
};

const addOrUpdateDocuments = async (data, idProceso) => {
  try {
    const response = await Axios.post(
      "/api/documents/store",
      {
        id_tramite_proceso: idProceso,
        data: data,
      },
      {
        headers: {
          "Content-Type": "application/json;",
          "Access-Control-Allow-Origin": "*",
        },
      }
    );

    // setDataDocuments(response.data);
  } catch (error) {
    console.log(error);
  }
};

const getDocuments = async (clave_catastral, setData) => {
  const res = await Axios.get("/api/documents/" + clave_catastral);

  // setData(res.data);
  return res.data;
};

export { upload, addOrUpdateDocuments, getDocuments };
