<template>
    <div class="app-albums">
        <h2 class="app-albums-title">Albums</h2>
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
.app-albums-title {
    margin: 0;
    padding: 20px;
    font-size: 24px;
    line-height: 24px;
    box-shadow: 0 1px 10px 0 #000;
    background: #111;
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
    border-bottom: 1px solid rgba(0, 0, 0, .4);
    color: #fff;
}

.app-albums {
  flex: 1;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  margin: 0;
  list-style: none;
}
</style>
