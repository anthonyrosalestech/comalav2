<template>
  <!-- <app-layout> -->
  <!-- Aqui el app layout es un container -->
  <div class="row justify-content-center my-5">
    <div class="col-md-12">
      <div class="card shadow bg-light">
        <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
          <!-- <h1>Tramites</h1> -->

          <div class="row mt-3">
            <div
              v-for="(value, key) in tipoTramites"
              :key="key"
              class="col-sm-4"
            >
              <div class="card h100">
                <div class="card-body">
                  <h5 class="card-title">
                    {{ value.nombre }}
                  </h5>
                  <p class="card-text">
                    {{
                      value.descripcion !== value.nombre
                        ? value.descripcion
                        : ""
                    }}
                  </p>
                  <form method="get" :action="value?.route ? route(value.route) : ''">
                    <input type="hidden" name="id" :value="value.id" />
                    <input type="submit" value="Ir" class="btn btn-primary">
                  </form>
                </div>
              </div>
            </div>

            <!-- <button
              class="btn btn-outline-secondary fl-rg"
              type="button"
              @click="log"
            >
              Guardar documentos
            </button> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- </app-layout> -->
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";

export default {
  components: {
    AppLayout,
    Welcome,
  },
  props: ["tipoTramites"],
  methods: {
    log() {
      console.log(this.tipoTramites);
    },
  },
};
</script>
