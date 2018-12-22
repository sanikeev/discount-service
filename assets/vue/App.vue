<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <router-link class="navbar-brand" to="/">Gemotest</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <router-link class="nav-item" tag="li" to="/" active-class="active">
                        <a class="nav-link">Discount</a>
                    </router-link>
                    <router-link class="nav-item" tag="li" to="/admin" active-class="active">
                        <a class="nav-link">Admin</a>
                    </router-link>
                </ul>
            </div>
        </nav>

        <router-view></router-view>
    </div>
</template>

<script>
  export default {
    name: 'app',
  }
</script>