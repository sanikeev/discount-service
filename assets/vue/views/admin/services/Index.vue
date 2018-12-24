<template>
    <div class="container">
        <div class="row">
            <p>
                <router-link class="btn btn-success" tag="div" to="/admin/services/create">
                    Create Service
                </router-link>
            </p>
        </div>
        <div class="row">
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Действие</th>
                </tr>
                <tr v-for="s in services">
                    <td>{{s.id}}</td>
                    <td>{{ s.title }}</td>
                    <td>
                        <router-link class="btn btn-success" tag="div" :to="{name:'ServicesEdit', params: {id: s.id}}">
                            Edit
                        </router-link>
                        <button class="btn btn-danger" @click.prevent="del(s)">
                            Delete
                        </button>
                    </td>
                </tr>
            </table>
        </div>
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
    },
    methods: {
      del(s) {
        if (!confirm("Вы точно хотите удалить услугу?")) return;
        service.del(s.id).then(data => {
          this.services.splice(s, 1);
        });
      }
    }
  }
</script>

<style scoped>

</style>