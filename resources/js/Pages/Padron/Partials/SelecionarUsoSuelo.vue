<template>
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
          <option v-for="(value, key) in usoSuelo" :key="key" :value="value.id">
            {{ value.zona + " - " + value.nomenclatura }}
          </option>
        </select>
      </div>
    </div>
    <!-- <button class="btn btn-outline-secondary" type="button" @click="test">
      Button
    </button> -->
  </div>
</template>

<script>
export default {
  props: ["usoSuelo", "idProceso", "tramiteProceso"],
  created: function () {
    if (this.tramiteProceso?.id_uso_suelo) {
      console.log("Esta creado ", this.tramiteProceso);
      this.selectedUsoSuelo = this.tramiteProceso?.id_uso_suelo;

      let filter = this.filter();
      this.$emit("filterUsoSuelo", filter);
    }
  },
  // {
  // usoSuelo: {
  //   default: [],
  //   type: Array,
  // },
  // idProceso: {
  //   typr: String,
  // },
  // tramiteProceso: {}
  // },
  components: {},
  data() {
    return {
      selectedUsoSuelo: 0,
    };
  },
  methods: {
    test() {
      console.log(this.idProceso);
      console.log(route());
    },
    filter(){
      let filterData = this.usoSuelo.filter(
        (value) => value.id === this.selectedUsoSuelo
      );

      return filterData;
    },
    async isSelected() {
      let filter = this.filter();
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
