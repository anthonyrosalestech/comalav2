<template>
  <!-- <app-layout> -->
  <!-- Aqui el app layout es un container -->
  <div class="row justify-content-center my-5">
    <div class="col-md-12">
      <div class="card shadow bg-light">
        <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
          <!-- <h1>Tramites</h1> -->

          <div class="row mt-3">
            <div class="col-sm-4">
              <div class="card h100">
                <div class="card-body">
                  <h5 class="card-title">Tramite de alineación y numero oficial</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card h100">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- </app-layout> -->
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Welcome from '@/Jetstream/Welcome'

export default {
  components: {
    AppLayout,
    Welcome,
  },
}
</script>
