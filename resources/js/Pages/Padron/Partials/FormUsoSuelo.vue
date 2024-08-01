<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="uso_suelo">Tipo de uso de suelo</label>
          <select
            class="form-control"
            id="uso_suelo"
            v-model="selectedUsoSuelo"
            @change="isSelected"
          >
            <option value="0" selected>Seleciona un uso de suelo</option>
            <option
              v-for="(value, key) in usoSuelo"
              :key="key"
              :value="value.id"
            >
              {{ value.zona + " - " + value.nomenclatura }}
            </option>
          </select>
        </div>
      </div>
    </div>

    <div class="row" v-if="oneUsoSuelo?.id !== ''">
      <div
        v-for="(value, key) in inputUsoSuelo"
        :key="key"
        :class="value.className"
      >
        <div>
          <label :for="value.name" class="form-label">
            {{ value.title }}
          </label>

          <input
            :id="value.name + '_key'"
            :name="value.name"
            type="text"
            class="form-control"
            :disabled="value.disabled"
            v-model="oneUsoSuelo[value.name]"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import { formularios } from "@/Helpers";

export default {
  props: {
    usoSuelo: {
      default: [],
      type: Array,
    },
    idProceso: {
      typr: String,
    },
  },
  components: {},
  data() {
    return {
      selectedUsoSuelo: 0,
      inputUsoSuelo: formularios.inputUsoSuelo,
      usosuelo: formularios.formUsoSuelo,
    };
  },
  methods: {
    test() {
      console.log(this.idProceso);
      console.log(route());
    },
    async isSelected() {
      let filter = this.usoSuelo.filter(
        (value) => value.id === this.selectedUsoSuelo
      );
      this.$emit("filterUsoSuelo", filter);

      axios
        .post(route("tramites-proceso.update"), {
          id: this.idProceso,
          id_uso_suelo: filter[0].id,
        })
        .then((response) => {
          console.log("Respuesta: ", response);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
