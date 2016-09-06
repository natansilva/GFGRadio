<template>
    <div id="playlist">
        <div class="page-header"><h3>Musicas</h3></div>
        <div v-for="album in albums">
            <a href="" v-on:click.prevent="setActualAlbum(album.albumName)" class="album">
                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                {{ album.albumName }}
            </a>
            <div v-for="music in album.musics">
                <a href="" v-show="actualAlbum === album.albumName" v-on:click.prevent="play(album.path, music.id, music.musicName, music.extension)" class="music">
                    &emsp;
                    <span class="glyphicon glyphicon-music music" aria-hidden="true"></span>
                    {{ music.musicName }}
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import { playMusic, setActualAlbum, initializeAlbums } from '../vuex/actions'
import { getActualAlbum, getAlbums } from '../vuex/getters'

export default {
    vuex: {
        getters: {
            albums: getAlbums,
            actualAlbum: getActualAlbum,
        },
        actions: {
            play: playMusic,
            setActualAlbum,
            initializeAlbums
        },
    },
    ready() {
        this.initializeAlbums()
    }
}
</script>

<style scoped>
.album {
  font-size: 1.2em;
}

.music {
  color: black
}
</style>
