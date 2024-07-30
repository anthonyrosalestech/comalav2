<template>
  <div class="form-check position-relative-move">
    <input
      :name="name"
      class="form-check-input"
      type="checkbox"
      v-model="toggle[name].value"
      :id="name"
      @change="check($event)"
    />
    <label class="form-check-label" :for="name">
      {{ toggle[name].value ? "Bloqueado" : "Bloquear" }}
    </label>
  </div>
</template>

<script>
import { formularios } from "@/Helpers";

export default {
  props: {
    name: {
      default: [],
      type: String,
    },
  },
  components: {},
  data() {
    return {
      editando: {
        padron: {
          name: "padron",
          value: false,
        },
        tramitador: {
          name: "tramitador",
          value: false,
        },
        documentos: {
          name: "documentos",
          value: false,
        },
      },
      toggle: formularios.toggle,
    };
  },
  methods: {
    test() {
      console.log(this.usoSuelo);
    },
    check(event) {
      console.log("name: ", event.target.name);
      this.$emit("handleToggle", this.toggle, event.target.name);
    },
  },
};
</script>
