<template>
  <a
    target="_blank"
    :href="route('files', {filename, name})"
    class="w-auto mt-2 inline-flex items-center justify-center p-2 text-base font-medium"
  >
    <span class="w-full">Ver {{ title }} </span>
    <svg
      class="icon-arrow"
      aria-hidden="true"
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 14 10"
    >
      <path
        stroke="currentColor"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth="2"
        d="M1 5h12m0 0L9 1m4 4L9 9"
      />
    </svg>
  </a>
</template>

<script>
export default {
  props: {
    title: {
      default: [],
      type: String,
    },
    name: String,
    filename: String, //clave_catastral
  },
  components: {},
  data() {
    return {
      editando: false
    };
  },
  methods: {
    test() {
      console.log(this.usoSuelo);
    },
    check(event) {
      console.log("name: ", event.target.name);
      this.$emit('handleToggle', this.editando, event.target.name);
    },
  },
};
</script>
