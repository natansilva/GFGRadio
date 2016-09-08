<template>
<div>
    <router-view keep-alive class="col-md-12 text-center"></router-view>
    <playlist class="col-md-6 text-left"></playlist>
</div>
</template>

<script>
import Player from './components/Player'
import Playlist from './components/Playlist'
import Store from './vuex/store'

export default {
    components: {
        Playlist
    },
    store: Store
}
</script>

<style>
    @import "./assets/bootstrap-3.3.7-dist/css/bootstrap.css";
</style>
