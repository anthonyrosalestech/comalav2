import { separateString } from "@/Helpers";
import Axios from "axios";
import { provide } from 'vue'

const HEADERS = {
  "Content-Type": "application/json;",
  "Access-Control-Allow-Origin": "*",
};

const URLS = {
  getPadron: "/api/findByClaveOrNameInOwners",
};

const getPadronCatastral = async (clave, dropdown) => {
  try {
    if (dropdown === "Clave catastral") {
      clave = separateString(clave);
    }
    const res = await Axios.post(
      URLS.getPadron,
      {
        value: clave,
      },
      {
        headers: HEADERS,
      }
    );

    // provide('padron', res);
    return res.data;
  } catch (error) {
    console.log(error);
  }
};

const createPadronCatastral = () => {};

const updatePadronCatastral = () => {};

const destroyPadronCatastral = () => {};

export {
  getPadronCatastral,
  createPadronCatastral,
  updatePadronCatastral,
  destroyPadronCatastral,
};
