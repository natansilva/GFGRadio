<template>
<div id="app">
    <player class="col-md-12 text-center"></player>
    <playlist class="col-md-4 text-left"></playlist>
</div>
</template>

<script>
import Player from './components/Player'
import Playlist from './components/Playlist'
import store from './vuex/store'

export default {
    components: {
        Player,
        Playlist
    },
    store: store
}
</script>

<style>
    @import "./assets/bootstrap-3.3.7-dist/css/bootstrap.css";
</style>
