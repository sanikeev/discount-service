<template>
    <div class="container">
        <ul class="list">
            <router-link class="nav-item" tag="li" to="/admin/services" active-class="active">
                <a class="nav-link">Services</a>
            </router-link>
            <router-link class="nav-item" tag="li" to="/admin/rules" active-class="active">
                <a class="nav-link">Rules</a>
            </router-link>
        </ul>
    </div>
</template>

<script>
  export default {
    name: "Index"
  }
</script>

<style scoped>

</style>