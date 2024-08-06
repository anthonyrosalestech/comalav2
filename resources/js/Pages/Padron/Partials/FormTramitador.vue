<template>
  <div class="row">
    <div
      v-for="(value, key) in inputTramitador"
      :key="key"
      :class="value.className"
    >
      <div>
        <label
          v-if="value.name !== 'id_tramite_proceso'"
          :for="value.name"
          class="form-label"
        >
          {{ value.title }}
        </label>

        <input
          :id="value.name"
          :name="value.name"
          :autocomplete="value.name"
          :type="value.name == 'id_tramite_proceso' ? 'hidden' : 'text'"
          class="form-control"
          :placeholder="'Ingrese su ' + value.title.toLowerCase()"
          :disabled="
            value.name === 'id' || value.name === 'clave_catastral'
              ? value.disabled
              : toggle.tramitador.value
          "
          v-model="tramitador[value.name]"
        />
      </div>
    </div>

    <div class="col-md-12 mt-5">
      <button
        v-if="!toggle.tramitador.value"
        class="btn btn-outline-secondary fl-rg"
        type="button"
        @click="saveTramitante"
      >
        Guardar informacion del solicitante
      </button>
    </div>
  </div>
</template>

<script>
import { formularios } from "@/Helpers";

export default {
  props: ["padron", "idProceso", "tramitadorData"],
  created: function () {
    console.log(this.tramitadorData);
    if (this.tramitadorData) {
      // this.tramitador.id_tramite_proceso = this.tramitadorData.id_tramite_proceso;
      // this.tramitador.nombre = this.tramitadorData.nombre;
      // this.tramitador.calle = this.tramitadorData.calle;
      // this.tramitador.localidad = this.tramitadorData.localidad;
      // this.tramitador.poblacion = this.tramitadorData.poblacion;
      // this.tramitador.numero = this.tramitadorData.numero;
      // this.tramitador.codigo_postal = this.tramitadorData.codigo_postal;
      // this.tramitador.telefono = this.tramitadorData.telefono;
      this.tramitador = this.tramitadorData;

    } else {
      this.tramitador.id_tramite_proceso = this.idProceso;
    }
    console.log(this.tramitador);
  },
  components: {},
  data() {
    return {
      inputTramitador: formularios.inputTramitador,
      tramitador: formularios.formTramitador,
      toggle: formularios.toggle,
    };
  },
  methods: {
    testLog() {
      console.log(this.tramitador);
    },
    async saveTramitante() {
      try {
        const response = await axios.post(
          "/api/tramitante/store",
          {
            ...this.tramitador,
          },
          {
            headers: {
              "Content-Type": "application/json;",
              "Access-Control-Allow-Origin": "*",
            },
          }
        );

        console.log("[TEST]", response);
        this.$emit("validateTramitador", this.tramitador);
        location.reload();
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
