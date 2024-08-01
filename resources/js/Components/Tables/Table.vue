<template>
  <div class="col-md-12">
    <table className="table table-striped text-center">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Clave catastral</th>
          <th scope="col">Tipo de tramite</th>
          <th scope="col">Estatus</th>
          <th scope="col">Uso de suelo</th>
          <th scope="col">No° Oficial</th>
          <th scope="col">Elaborado por</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody className="table-group-divider">
        <tr v-for="(value, key) in tramitesProceso" :key="key">
          <th className="pt-3 pb-2">{{ value.id }}</th>
          <th className="pt-3 pb-2">{{ value.clave_catastral }}</th>
          <th className="pt-3 pb-2">{{ value.tipo_tramite }}</th>
          <th className="pt-3 pb-2">En {{ value.estatus }}</th>
          <th className="pt-3 pb-2">{{ value.uso_suelo }}</th>
          <th className="pt-3 pb-2"></th>
          <th className="pt-3 pb-2"></th>
          <th className="pt-3 pb-2"></th>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: ["tramitesProceso"],
};
</script>
