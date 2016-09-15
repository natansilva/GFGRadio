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
}

.app-musics-title {
    margin: 0;
    padding: 20px;
    font-size: 24px;
    line-height: 24px;
    box-shadow: 0 1px 10px 0 #000;
    background: #111;
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
    border-bottom: 1px solid rgba(0, 0, 0, .4);
    color: #fff;
}
</style>
