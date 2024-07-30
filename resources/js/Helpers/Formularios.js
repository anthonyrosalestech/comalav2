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
  formTramitador: {
    id_tramite_proceso: "",
    nombre: "",
    calle: "",
    localidad: "",
    poblacion: "",
    numero: "",
    codigo_postal: "",
    telefono: "",
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
      className: "col-sm-12 col-md-12",
      disabled: false,
      title: "Id del proceso",
      name: "id_tramite_proceso",
    },
    {
      className: "col-sm-12 col-md-9 mt-3",
      disabled: false,
      title: "Nombre",
      name: "nombre",
    },
    {
      className: "col-sm-12 col-md-3 mt-3",
      disabled: false,
      title: "Telefono",
      name: "telefono",
    },
    {
      className: "col-sm-12 col-md-9 mt-3",
      disabled: false,
      title: "Calle",
      name: "calle",
    },
    {
      className: "col-sm-12 col-md-3 mt-3",
      disabled: false,
      title: "Numero #",
      name: "numero",
    },
    {
      className: "col-sm-12 col-md-3 mt-3",
      disabled: false,
      title: "Localidad",
      name: "localidad",
    },
    {
      className: "col-sm-12 col-md-3 mt-3",
      disabled: false,
      title: "Poblacion",
      name: "poblacion",
    },
    {
      className: "col-sm-12 col-md-3 mt-3",
      disabled: false,
      title: "C.P",
      name: "codigo_postal",
    },
  ],
  inputPadronCatastral: [
    {
      className: "col-sm-12 col-md-3 mt-3",
      disabled: true,
      title: "Id",
      name: "id",
    },
    {
      className: "col-sm-12 col-md-9 mt-3",
      disabled: true,
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
  dataPadronCatastral: {
    id: "",
    clave_catastral: "",
    nombre: "",
    apellido_paterno: "",
    apellido_materno: "",
    cum: "",
    denominación: "",
    medida_frente: "",
    medida_profundidad: "",
    superficie_terreno: "",
  },
  dataTramitador: {
    id: 1,
    id_tramite_proceso: "",
    calle: "",
    localidad: "",
    poblacion: "",
    numero: "",
    codigo_postal: "",
    telefono: "",
  },
  renderDropdown: ["Clave catastral", "Nombre"],
  toggle: {
    padron: {
      name: "padron",
      value: false,
    },
    tramitador: {
      name: "tramitador",
      value: false,
    },
    documentos: {
      name: "documentos",
      value: false,
    },
  },
};
