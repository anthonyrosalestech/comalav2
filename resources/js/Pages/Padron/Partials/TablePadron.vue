<template>
  <div class="col-md-12">
    <table className="table table-striped text-center">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Clave catastral</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellidos</th>
          <!-- <th scope="col">Denominacion</th> -->
          <th scope="col">Medidas del frente</th>
          <th scope="col">Medidas de profundidad</th>
          <th scope="col">Superficie del terreno</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody className="table-group-divider">
        <tr v-for="(value, key) in padron" :key="key">
          <th className="pt-3 pb-2">{{ value.id }}</th>
          <th className="pt-3 pb-2">{{ value.clave_catastral }}</th>
          <td className="pt-3 pb-2">{{ value.nombre }}</td>
          <td className="pt-3 pb-2">
            {{ value.apellido_paterno + " " + value.apellido_materno }}
          </td>
          <!-- <td className="pt-3 pb-2">{{ value.denominacion }}</td> -->
          <td className="pt-3 pb-2">{{ value.medida_frente }}</td>
          <td className="pt-3 pb-2">
            {{ value.medida_profundidad }}
          </td>
          <td className="pt-3 pb-2">
            {{ value.superficie_terreno }}
          </td>
          <td className="pt-3">
            <!-- <a
              :href="'/test/nuevo-tramite/' + value.id"
              class="btn btn-success"
            >
              Crear Tramite
            </a> -->

            <form method="get" :action="'/test/nuevo-tramite/' + value.id">
              <input type="hidden" name="id" :value="id" />
              <input type="submit" value="Crear Tramite" class="btn btn-primary" />
            </form>
          </td>
        </tr>
      </tbody>
    </table>
    <button class="btn btn-outline-secondary" type="button" @click="test">
      Log test
    </button>
  </div>
</template>

<script>
export default {
  props: {
    padron: {
      default: [],
      type: Array,
    },
    id: String,
  },
  components: {},
  data() {
    return {
      // padron: "Hola",
    };
  },
  methods: {
    test() {
      console.log(this.padron);
    },
  },
};
</script>
