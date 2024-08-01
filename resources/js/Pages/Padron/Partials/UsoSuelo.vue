<template>
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

  <!-- <button class="btn btn-outline-secondary" type="button" @click="testLog">
    Button
  </button> -->
</template>

<script>
import { formularios } from "@/Helpers";

export default {
  props: ["oneUsoSuelo"],
  components: {},
  data() {
    return {
      inputUsoSuelo: formularios.inputUsoSuelo,
      usosuelo: formularios.formUsoSuelo,
    };
  },
  methods: {
    testLog() {
      console.log(this.oneUsoSuelo);
    },
  },
};
</script>
