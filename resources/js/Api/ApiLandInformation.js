import Axios from "axios";
// import swal from "sweetalert2";
const URL_LAND_INFORMATION = "/api/informacion-predio/create";

const createLandInformation = async (clave_catastral, dataLandInformation) => {
  try {
    const resonse = await Axios.post(URL_LAND_INFORMATION, {
      clave_catastral: clave_catastral,
      ...dataLandInformation
    });

    console.log(clave_catastral, dataLandInformation);
  } catch (error) {
    console.error(error);
  }
}

export { createLandInformation };
