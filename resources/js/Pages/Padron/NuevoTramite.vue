<template>
  <app-layout>
    <!-- <div class="row justify-content-center my-5">
      <div class="col-md-12">
        <div class="card shadow bg-light">
          <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
            Aqui
          </div>
        </div>
      </div>
    </div> -->

    <button class="btn btn-outline-secondary" type="button" @click="testLog">
      Button
    </button>

    <!-- Tipo de uso de suelo -->
    <div class="row mt-3">
      <div class="col-sm-12 col-md-12">
        <div class="card h100">
          <div class="card-body bg-white py-3 border-bottom rounded-to">
            <div class="head-show">Tipo de uso de suelo</div>

            <SelecionarUsoSuelo
              :usoSuelo="usoSuelo"
              v-on:filterUsoSuelo="getOneUsoSuelo"
              :idProceso="idProceso"
              :tramiteProceso="tramiteProceso"
            ></SelecionarUsoSuelo>
            <UsoSuelo :oneUsoSuelo="oneUsoSuelo"></UsoSuelo>
          </div>
        </div>
      </div>
    </div>

    <!-- Padron Catastral -->
    <div class="row mt-3">
      <div class="col-sm-12 col-md-12">
        <div class="card h100">
          <div class="card-body bg-white py-3 border-bottom rounded-to">
            <div class="head-show">Padron Catastral</div>
            <ToggleButton
              v-on:handleToggle="setToggle"
              name="padron"
            ></ToggleButton>
            <FormPadron :padron="padron"></FormPadron>
          </div>
        </div>
      </div>
    </div>

    <!-- Datos del tramitador -->
    <div class="row mt-3">
      <div class="col-sm-12 col-md-12">
        <div class="card h100">
          <div
            class="card-body card-body bg-white py-3 border-bottom rounded-to"
          >
            <div class="head-show">Datos del tramitador</div>

            <ToggleButton
              v-on:handleToggle="setToggle"
              name="tramitador"
            ></ToggleButton>

            <FormTramitador
              :idProceso="idProceso"
              v-on:validateTramitador="setValidateTramitador"
              :tramitadorData="tramitador"
            ></FormTramitador>
          </div>
        </div>
      </div>
    </div>

    <!-- Documentacion -->
    <div class="row mt-3">
      <div class="col-sm-12 col-md-12">
        <div class="card h100">
          <div
            class="card-body card-body bg-white py-3 border-bottom rounded-to"
          >
            <div class="head-show">Documentacion</div>
            <div>
              <div class="mb-3" v-for="(value, key) in inputFile" :key="key">
                <label :for="value.name" class="form-label">
                  {{ value.title }}
                </label>
                <input
                  :id="value.name"
                  accept="application/pdf"
                  :name="value.name"
                  :autocomplete="value.name"
                  type="file"
                  class="form-control file"
                  @change="onFileChange"
                />

                <have-file
                  v-if="existsDocuments(value.name)"
                  :title="value.title"
                  :documentos="documentos"
                  :name="value.name"
                  :filename="padron.clave_catastral"
                ></have-file>
              </div>
              <div class="">
                <!-- v-if="!toggle.tramitador.value" -->
                <button
                  class="btn btn-outline-secondary fl-rg"
                  type="button"
                  @click="setDocuments"
                >
                  Guardar documentos
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import { formularios, swalMessage } from "@/Helpers";
import SelecionarUsoSuelo from "./Partials/SelecionarUsoSuelo";
import ToggleButton from "./Partials/ToggleButton";
import HaveFile from "./Partials/HaveFile";
import FormPadron from "./Partials/FormPadron";
import FormTramitador from "./Partials/FormTramitador";
import { uploadDocuments } from "@/Api";
import UsoSuelo from "./Partials/UsoSuelo";

export default {
  components: {
    AppLayout,
    SelecionarUsoSuelo,
    ToggleButton,
    HaveFile,
    FormPadron,
    FormTramitador,
    UsoSuelo,
  },
  props: [
    "roles",
    "status",
    "padron",
    "general",
    "usoSuelo",
    "documentos",
    "idProceso",
    "tramiteProceso",
    "tramitador",
  ],
  data() {
    return {
      formDocumets: formularios.formDocumets,
      inputFile: formularios.inputFile,
      inputTramitador: formularios.inputTramitador,
      inputPadronCatastral: formularios.inputPadronCatastral,
      dataPadronCatastral: formularios.dataPadronCatastral,
      togglePadron: false,
      toggle: formularios.toggle,
      oneUsoSuelo: formularios.formUsoSuelo,
      validateTramitador: formularios.formTramitador,
    };
  },
  methods: {
    onFileChange(event) {
      this.formDocumets[event.target.name].file = event.target.files[0];
      this.formDocumets[event.target.name].value = event.target.value;
      this.formDocumets[event.target.name].name = event.target.files[0].name;
    },
    testLog() {
      // this.tramiteProceso.id_uso_suelo = null;
      // console.log(this.tramiteProceso?.id_uso_suelo ?? true);
      this.validate();
    },
    setToggle(data, name) {
      console.log("Data ", data);
      console.log("Name ", name);
      this.toggle = data;
      formularios.toggle = data;
    },
    async setDocuments() {
      await uploadDocuments(this.padron.clave_catastral, this.idProceso, this.formDocumets);
      // location.reload();
    },
    existsDocuments(name) {
      return this.documentos.find((data) => data.nombre === name);
    },
    getOneUsoSuelo(data) {
      this.oneUsoSuelo = data[0];
    },
    setValidateTramitador(data) {
      this.validateTramitador = data;
      // console.log("Tramitador: ",this.validateTramitador)
    },
    validate() {
      let tramitadorTemp = this.inputTramitador.filter((value) => value.name !== "id_tramite_proceso");
      tramitadorTemp = tramitadorTemp.map((value) => this.validateTramitador[value.name]);
      tramitadorTemp = tramitadorTemp.includes('') || tramitadorTemp.includes(null);
      let documentosTemp = this.documentos.length >= 7;
      let usoSueloTemp = this.tramiteProceso?.id_uso_suelo ? true : false;

      if(!tramitadorTemp || !documentosTemp || !usoSueloTemp) {
        swalMessage("error", "Favor de completar la informacion");
      }else{
        // let msg =
        swalMessage("success", "El tramite se actualizo");
      }
    }
  },
};
</script>
