<template>
  <div class="col-12">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <button
          class="btn btn-outline-secondary dropdown-toggle"
          type="button"
          data-toggle="dropdown"
          aria-expanded="false"
        >
          {{ dropdown }}
        </button>
        <div class="dropdown-menu">
          <a
            class="dropdown-item"
            v-for="(value, key) in renderDropdown"
            :key="key"
            v-on:click="changeDropdown(value)"
            >{{ value }}</a
          >
        </div>
      </div>

      <input
        v-if="dropdown === 'Nombre'"
        type="text"
        class="form-control"
        v-model="clave"
      />

      <input
        v-if="dropdown === 'Clave catastral'"
        type="text"
        class="form-control"
        pattern="[0-9]{0,15}"
        onkeypress="return event.charCode >= 48 && event.charCode <= 57"
        v-model="clave"
      />

      <div class="input-group-append">
        <button
          class="btn btn-outline-secondary"
          type="button"
          @click="buscarPadron"
        >
          Buscar
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { formularios } from "@/Helpers";
import { getPadronCatastral } from "@/Api";

export default {
  props: {
    padron: {
      default: [],
      type: Array,
    },
  },
  components: {},
  data() {
    return {
      renderDropdown: formularios.renderDropdown,
      dropdown: "Clave catastral",
      clave: "",
      padronObject: null,
    };
  },
  methods: {
    changeDropdown(value) {
      this.dropdown = value;
      this.clave = "";
    },
    async buscarPadron() {
      let clave = this.clave.replace(/-+/g,'');
      let padron = await getPadronCatastral(clave, this.dropdown);
      this.padronObject = padron;
      this.$emit('buscar', this.padronObject);
    },
    test() {
      console.log(this.padron);
    },
    async buscarHijo() {
      this.$emit('buscar', 'Hola desde el hijo');
    }
  },
};
</script>
