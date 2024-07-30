<template>
    <div class="form-group">
      <label for="uso_suelo">Tipo de uso de suelo</label>
      <select class="form-control" id="uso_suelo" v-model="selectedUsoSuelo">
        <option v-for="(value, key) in usoSuelo" :key="key" :value="value.id">{{ value.zona + " - " + value.nomenclatura }}</option>
      </select>
    </div>
    <button class="btn btn-outline-secondary" type="button" @click="test">
      Button
    </button>
</template>

<script>
export default {
  props: {
    padron: {
      default: [],
      type: Array,
    },
    usoSuelo: {
      default: [],
      type: Array
    }
  },
  components: {},
  data() {
    return {
      selectedUsoSuelo: this.usoSuelo[0]?.id,
    };
  },
  methods: {
    test() {
      console.log(this.usoSuelo);
    },
  },
};
</script>
