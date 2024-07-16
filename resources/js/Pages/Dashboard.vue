<template>
  <!-- <app-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">
        Dashboard1ss
      </h2>
    </template>

<welcome />
</app-layout> -->

  <app-layout>
    <h1>Hola11</h1>
    <secretario />
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Welcome from '@/Jetstream/Welcome'
import Secretario from './Secretario/Index'

export default {
  components: {
    AppLayout,
    Welcome,
    Secretario,
  },
}
</script>
