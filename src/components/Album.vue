<template>
    <div class="app-albums">
        <h2 class="app-albums-title">Albuns</h2>
        <ul class="demo-list-icon mdl-list app-albums-list">
            <li v-for="album in albums" class="mdl-list__item app-album" v-on:click.prevent="setMusics(album.musics)">{{ album.albumName }}</li>
        </ul>
    </div>
</template>

<script>
import { setMusics, initializeAlbums } from '../vuex/actions'
import { getAlbums } from '../vuex/getters'

export default {
    vuex: {
        getters: {
            albums: getAlbums,
        },
        actions: {
            setMusics: setMusics,
            initializeAlbums: initializeAlbums
        },
    },
    ready() {
        this.initializeAlbums();
    }
}
</script>

<style>
    .app-albums {
      flex: 1;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      margin: 0;
      list-style: none;
      color: #000000;
      border-style: solid;
      border-width: 2px;
      border-color: #000000;
      border-radius: 2px;
    }

    .app-albums-title {
        margin: 0;
        padding: 20px;
        font-size: 24px;
        line-height: 24px;
        box-shadow: 0px 5px 9px 2px rgba(0,0,0,0.75);
    }

    .app-albums-list {
        flex: 1;
        margin: 0;
        overflow-y: overlay;
    }

    .app-album {
        margin: 0;
        width: 100%;
        height: 48px;
    }
</style>
