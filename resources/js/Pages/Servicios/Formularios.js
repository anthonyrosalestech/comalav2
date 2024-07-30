export default {
  formDocumets: {
    titulo_propiedad: { file: "", value: "", name: "" },
    ine: { file: "", value: "", name: "" },
    impuesto_predial: { file: "", value: "", name: "" },
    croquis: { file: "", value: "", name: "" },
    fomato_solicitud_direccion: { file: "", value: "", name: "" },
    formato_cna: { file: "", value: "", name: "" },
    formato_recibo_pago: { file: "", value: "", name: "" },
  },
  inputFile: [
    {
      title: "Copia de escritura o titulo de propiedad",
      name: "titulo_propiedad",
    },
    {
      title: "Copia del INE del dueño del predio",
      name: "ine",
    },
    {
      title: "Copia de pago de impuesto predial actualizado",
      name: "impuesto_predial",
    },
    {
      title: "Croquis de localizacion del predio",
      name: "croquis",
    },
    {
      title: "Llenar formato de solicitud que proporciona la direccion",
      name: "fomato_solicitud_direccion",
    },
    {
      title:
        "Si colinda el predio con algun arroyo o cuerpo de agua tramitar ante la CNA la delimitacion",
      name: "formato_cna",
    },
    {
      title: "Recibo de pago de tramite",
      name: "formato_recibo_pago",
    },
  ],
  inputTramitador: [
    {
      title: "Nombre",
      name: "name_processor",
    },
    {
      title: "Telefono",
      name: "telephone_processor",
    },
    {
      title: "Correo",
      name: "mail_processor",
    },
    {
      title: "Direccion",
      name: "dir_processor",
    },
  ],
  inputPadronCatastral: [
    {
      className: "col-sm-12 col-md-3 mt-3",
      title: "Id",
      name: "id",
    },
    {
      className: "col-sm-12 col-md-9 mt-3",
      title: "Clave catastral",
      name: "clave_catastral",
    },
    {
      className: "col-sm-12 col-md-4 mt-3",
      title: "Nombre",
      name: "nombre",
    },
    {
      className: "col-sm-12 col-md-4 mt-3",
      title: "Apellido paterno",
      name: "apellido_paterno",
    },
    {
      className: "col-sm-12 col-md-4 mt-3",
      title: "Apellido materno",
      name: "apellido_materno",
    },
    {
      className: "col-sm-12 col-md-3 mt-3",
      title: "Cum",
      name: "cum",
    },
    {
      className: "col-sm-12 col-md-3 mt-3",
      title: "Denominacion",
      name: "denominacion",
    },
    {
      className: "col-sm-12 col-md-4 mt-3",
      title: "Medidas del frente",
      name: "medida_frente",
    },
    {
      className: "col-sm-12 col-md-4 mt-3",
      title: "Medidas de profundidad",
      name: "medida_profundidad",
    },
    {
      className: "col-sm-12 col-md-4 mt-3",
      title: "Superficie de terreno",
      name: "superficie_terreno",
    },
  ],
  renderDropdown: ["Clave catastral", "Nombre"],
};
