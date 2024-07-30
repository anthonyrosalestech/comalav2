<template>
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
          :name="value.name"
          :autocomplete="value.name"
          type="text"
          class="form-control"
          @change="previewFiles"
          :placeholder="'Ingrese su ' + value.title.toLowerCase()"
          :disabled="
            value.name === 'id' || value.name === 'clave_catastral'
              ? value.disabled
              : toggle.padron.value
          "
          v-model="padron[value.name]"
        />
      </div>
    </div>

    <div class="col-md-12 mt-3">
      <button
        v-if="!toggle.padron.value"
        class="btn btn-outline-secondary fl-rg"
        type="button"
        @click="testLog"
      >
        Button
      </button>
    </div>
  </div>
</template>

<script>
import { formularios } from "@/Helpers";

export default {
  props: ["padron"],
  components: {},
  data() {
    return {
      inputPadronCatastral: formularios.inputPadronCatastral,
      toggle: formularios.toggle,
    };
  },
  methods: {
    testLog() {
      console.log(formularios.toggle.padron.value);
    },
  },
};
</script>
