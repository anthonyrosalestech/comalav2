<template>
  <app-layout>
    <header class="d-flex py-3 bg-white shadow-sm border-bottom">
      <div class="container">
        <h1>Editar esta seccion</h1>
        <slot name="header"></slot>
      </div>
    </header>
    <div class="row justify-content-center my-5">
      <div class="col-md-12">
        <div class="card shadow bg-light">
          <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
            <!-- <h1>Tramites</h1> -->

            <div class="row mt-3">
              <div class="col-md-12">
                <input v-model="message">
              </div>
              <div class="col-md-12">
                <div class="card h100">
                  <div class="card-body">
                    <div class="head-show">Cargar Informacion</div>
                    <div class="row">
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
                              @click="holaMundo"
                            >
                              Button
                            </button>
                          </div>
                        </div>
                      </div>

                      <Table :padron="padronObject"></Table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-12">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <div class="card h100">
                      <div class="card-body">
                        <div class="head-show">Padron Catastral</div>
                        <div class="row">
                          <div
                            v-for="(value, key) in inputPadronCatastral"
                            :key="key"
                            :class="value.className"
                          >
                            <div class="">
                              <label :for="value.name" class="form-label">
                                {{ value.title }}
                              </label>

                              <input
                                :id="value.name"
                                accept="application/pdf"
                                :name="value.name"
                                :autocomplete="value.name"
                                type="text"
                                class="form-control"
                                @change="previewFiles"
                                :placeholder="
                                  'Ingrese su ' + value.title.toLowerCase()
                                "
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12"></div>
                </div>
              </div>

              <div class="col-sm-12 col-md-6">
                <div class="card h100">
                  <div class="card-body">
                    <div class="head-show">Datos del tramitador</div>
                    <div>
                      <!-- Aqui inicia el render de los imputs -->
                      <div
                        class="mb-3"
                        v-for="(value, key) in inputTramitador"
                        :key="key"
                      >
                        <label :for="value.name" class="form-label">
                          {{ value.title }}
                        </label>
                        <input
                          :id="value.name"
                          accept="application/pdf"
                          :name="value.name"
                          :autocomplete="value.name"
                          type="text"
                          class="form-control"
                          @change="previewFiles"
                          :placeholder="
                            'Ingrese su ' + value.title.toLowerCase()
                          "
                        />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card h100">
                  <div class="card-body">
                    <div class="head-show">Datos del tramitador</div>
                    <div>
                      <!-- Aqui inicia el render de los imputs -->
                      <div
                        class="mb-3"
                        v-for="(value, key) in inputTramitador"
                        :key="key"
                      >
                        <label :for="value.name" class="form-label">
                          {{ value.title }}
                        </label>
                        <input
                          :id="value.name"
                          accept="application/pdf"
                          :name="value.name"
                          :autocomplete="value.name"
                          type="text"
                          class="form-control file"
                          @change="previewFiles"
                          :placeholder="
                            'Ingrese su ' + value.title.toLowerCase()
                          "
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-6">
                <div class="card h100">
                  <div class="card-body">
                    <div class="head-show">Documentacion</div>
                    <div>
                      <div
                        class="mb-3"
                        v-for="(value, key) in inputFile"
                        :key="key"
                      >
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
                          @change="previewFiles"
                        />
                      </div>
                    </div>
                  </div>
                </div>
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
import Welcome from "@/Jetstream/Welcome";
import formularios from "./Formularios";
import { separateString } from "@/Helpers";
import Table from "./Partials/Table";
import { getPadronCatastral } from "@/Api";

import { ref, provide } from 'vue'

// const message = ref('hello')
// provide('message', message)


export default {
  components: {
    AppLayout,
    Welcome,
    Table,
  },
  data() {
    return {
      formDocumets: {
        titulo_propiedad: { file: "", value: "", name: "" },
        ine: { file: "", value: "", name: "" },
        impuesto_predial: { file: "", value: "", name: "" },
        croquis: { file: "", value: "", name: "" },
        fomato_solicitud_direccion: { file: "", value: "", name: "" },
        formato_cna: { file: "", value: "", name: "" },
        formato_recibo_pago: { file: "", value: "", name: "" },
      },
      inputFile: formularios.inputFile,
      inputTramitador: formularios.inputTramitador,
      inputPadronCatastral: formularios.inputPadronCatastral,
      renderDropdown: formularios.renderDropdown,
      dropdown: "Clave catastral",
      clave: "",
      padronObject: null,
    };
  },
  watch: {
    clave(value, oldValue) {},
  },
  methods: {
    previewFiles(event) {
      this.onFileChange(event);
    },
    onFileChange(event) {
      this.formDocumets[event.target.name].file = event.target.files;
      this.formDocumets[event.target.name].value = event.target.value;
      this.formDocumets[event.target.name].name = event.target.name;
      // console.log("Documents:", this.formDocumets);
    },
    changeDropdown(value) {
      this.dropdown = value;
      this.clave = "";
    },
    async holaMundo() {
      let padron1 = await getPadronCatastral(this.clave, this.dropdown);
      console.log(padron1);
      this.padronObject = padron1;
    },
  },
};
</script>
