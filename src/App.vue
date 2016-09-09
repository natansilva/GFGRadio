<template>
<div>
    <search class="col-md-12"></search>
    <playlist class="col-md-9 text-left"></playlist>
    <router-view keep-alive class="col-md-3 text-center"></router-view>
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

    #search {
        z-index: 9999;
        position:fixed;
        background-color: #337ab7;
        left: 10px;
        top: 10px;
    }

    #playerAudio {
        background-color: #ffffff;
        top: 100px;
        right: 10px;
        height: 204px;
        position:fixed;
    }

    #playlist {
        top: 110px;
    }
</style>
