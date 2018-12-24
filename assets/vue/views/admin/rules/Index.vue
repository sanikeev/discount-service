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
                    <th>Скидка</th>
                    <th>Действие</th>
                </tr>
                <tr v-for="s in rules">
                    <td>{{s.id}}</td>
                    <td>{{ s.title }}</td>
                    <td>{{ s.discountValue }}%</td>
                    <td>
                        <router-link class="btn btn-success" tag="div" :to="{name:'RulesEdit', params: {id: s.id}}">
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
  import rule from "../../../services/rules";

  export default {
    name: "Index",
    data: function () {
      return {
        rules: []
      }
    },
    beforeMount() {
      rule.list().then(data => {
        this.rules = data
      })
    },
    methods: {
      del(s) {
        if (!confirm("Вы точно хотите удалить скидку?")) return;
        rule.del(s.id).then(data => {
          this.rules.splice(s, 1);
        });
      }
    }
  }
</script>

<style scoped>

</style>