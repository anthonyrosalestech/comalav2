<template>
  <app-layout>
    <div class="row justify-content-center my-5">
      <div class="col-md-12">
        <div class="card shadow bg-light">
          <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
            <div class="row">
              <div class="head-show mb-5">Tramites en proceso</div>
              <Table :tramitesProceso="tramitesProceso"></Table>
            </div>
          </div>
        </div>
      </div>

      <!-- Buscador de clave catastral -->
      <div class="col-md-12">
        <div class="card shadow bg-light">
          <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
            <div class="row">
              <div class="head-show mb-5">Buscador</div>
              <buscar-padron v-on:buscar="setPadronObject"></buscar-padron>
              <table-padron :padron="padronObject" :id="id_tipo_tramites"></table-padron>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <button class="btn btn-outline-secondary" type="button" @click="test">
      Log test
    </button> -->
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Table from "@/Components/Tables/Table";
import TablePadron from './Partials/TablePadron';
import BuscarPadron from "./Partials/BuscarPadron";

export default {
  props: {
    padron: {
      default: [],
      type: Array,
    },
    id_tipo_tramites: String,
    tramitesProceso: Object,
  },
  components: {
    AppLayout,
    Table,
    TablePadron,
    BuscarPadron
  },
  data() {
    return {
      padronObject: null,
    };
  },
  methods: {
    setPadronObject(data) {
      this.padronObject = data;
    },
    test() {
      console.log(this.tramitesProceso);
    },
  },
};
</script>
