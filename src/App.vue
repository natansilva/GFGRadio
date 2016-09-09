<template>
<div>
    <router-view keep-alive class="col-md-12 text-center"></router-view>
    <search class="col-md-12"></search>
    <playlist class="col-md-6 text-left"></playlist>
</div>
</template>

<script>
import Player from './components/Player'
import Playlist from './components/Playlist'
import Search from './components/Search'
import Store from './vuex/store'

export default {
    components: {
        Playlist,
        Search
    },
    store: Store
}
</script>

<style>
    @import "./assets/bootstrap-3.3.7-dist/css/bootstrap.css";

    #playerAudio {
        z-index: 9999;
        position:fixed;
        background-color: #ffffff;
        height: 204px;
    }

    #search {
        z-index: 9999;
        position:fixed;
        background-color: #ffffff;
        top:204px;
    }

    #playlist {
        top:304px;
    }
</style>
