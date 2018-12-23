<template>
    <div class="container">
        <router-link class="btn btn-success" tag="div" to="/admin/rules/create">
            Create Rule
        </router-link>
        <ul class="list">
            <li v-for="s in rules">{{s.title}}</li>
        </ul>
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
    }
  }
</script>

<style scoped>

</style>