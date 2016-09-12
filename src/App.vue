<template>
    <div>
        <search class="col-md-11"></search>
        <playlist class="col-md-8 text-left"></playlist>
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
        align-self: center;
        left: 45px;
    }

    #playerAudio {
        top: 90px;
        right: 72px;
        height: 204px;
        position:fixed;
    }

    #playlist {
        top: 100px;
        left: 46px;
    }
</style>
