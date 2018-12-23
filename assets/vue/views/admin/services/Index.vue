<template>
    <div class="container">
        <router-link class="btn btn-success" tag="div" to="/admin/services/create">
            Create Service
        </router-link>
        <ul class="list">
            <li v-for="s in services">{{s.title}}</li>
        </ul>
    </div>
</template>

<script>
  import {service} from "../../../services/service";

  export default {
    name: "Index",
    data: function () {
      return {
        services: []
      }
    },
    beforeMount() {
      service.list().then(data => {
        this.services = data.data
      })
    }
  }
</script>

<style scoped>

</style>