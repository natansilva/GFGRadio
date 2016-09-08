<template>
    <div id="playerAudio">
        <div class="page-header"><h1>{{ actualMusic }}</h1></div>
        <audio v-el:audio autoplay id="player" controls="" v-bind:src="url"></audio>

        </br>
        </br>

        <button id="previousMusic" class="btn btn-sm btn-primary" v-on:click.prevent="playPrevious(actualMusicId)">Anterior</button>
        <button id="nextMusic" class="btn btn-sm btn-primary" @click.prevent="playNext(actualMusicId)">Proxima</button>
        <a id="download" class="btn btn-sm btn-primary" download v-bind:href="url">Download</a>
    </div>
</template>

<script>
import * as getters from '../vuex/getters'
import * as actions from '../vuex/actions'

export default {
    vuex: {
        getters: {
            actualMusicId: getters.getActualMusicId,
            actualMusic: getters.getActualMusic,
            url: getters.getUrl
        },
        actions: {
            playPrevious: actions.playPrevious,
            playNext: actions.playNext,
            playMusic: actions.playMusic
        }
    },
    watch: {
        actualMusicId: function (value) {
            if (! value) {
                return;
            }

            this.$els.audio.play();
        }
    },

    route: {
        data: function() {
            this.playMusic(this.$route.params.id);
        }
    }
}
</script>

<style>
</style>
