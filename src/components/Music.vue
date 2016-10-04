<template>
    <div class="app-musics">
        <h2 class="app-musics-title">Musicas</h2>
        <ul class="demo-list-icon mdl-list app-musics-list">
            <li v-for="music in musics" class="mdl-list__item app-music" v-on:click.prevent="play(music.id)">{{ music.musicName }}</li>
        </ul>
    </div>
</template>

<script>
import { play } from '../vuex/actions'
import { getMusics } from '../vuex/getters'

export default {
    vuex: {
        getters: {
            musics: getMusics,
        },
        actions: {
            play: play
        }
    },
}
</script>

<style>
.app-musics {
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

.app-musics-title {
    margin: 0;
    padding: 20px;
    font-size: 24px;
    line-height: 24px;
    box-shadow: 0px 5px 9px 2px rgba(0,0,0,0.75);
}

.app-musics-list {
    flex: 1;
    margin: 0;
    overflow-y: scroll;
}

.app-music {
    margin: 0;
    width: 100%;
    height: 48px;
}
</style>
