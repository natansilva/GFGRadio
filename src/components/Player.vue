<template>
<div id="playerbar">
    <mdl-progress :progress="current" id="progress-bar" @click="changeTime"></mdl-progress>
    <div>
        <audio v-el:audio v-on:ended="playNext(actualMusicId)" @timeupdate="changeDuration" id="player" v-bind:src="url"></audio>

        <mdl-button v-mdl-ripple-effect class="player-icon" icon="skip_previous" @click.prevent="playPrevious(actualMusicId)"></mdl-button>
        <mdl-button v-mdl-ripple-effect class="player-icon" icon="play_arrow" @click.prevent="play()"></mdl-button>
        <mdl-button v-mdl-ripple-effect class="player-icon" icon="pause" @click.prevent="pause()"></mdl-button>
        <mdl-button v-mdl-ripple-effect class="player-icon" icon="skip_next" @click.prevent="playNext(actualMusicId)"></mdl-button>

        {{ actualMusic }}

        <a download v-bind:href="url">
            <mdl-button v-mdl-ripple-effect class="player-icon more-buttons" icon="file_download"></mdl-button>
        </a>
        <mdl-button v-mdl-ripple-effect class="player-icon more-buttons" icon="share" @click.prevent="copyUrl()"></mdl-button>

    </div>

</div>
</template>

<script>
import * as getters from '../vuex/getters';
import * as actions from '../vuex/actions';

export default {
    data(){
        return {
            current: 0
        };
    },
  methods: {
    pause: function () {
      this.$els.audio.pause();
    },
    play: function () {
      this.$els.audio.play();
    },
    changeDuration: function (a) {
        this.current = this.$els.audio.currentTime * 100 / this.$els.audio.duration;
    },
    changeTime: function (e) {
        var time =  (e.offsetX / e.currentTarget.clientWidth) * this.$els.audio.duration;
        this.$els.audio.currentTime = time;
    },
    copyUrl: function () {
        console.log(location.href);
    }
  },
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
    actualMusicId: function(value) {
      if (!value) {
        return;
      }

      this.$els.audio.play();
    },
  },
  route: {
    data: function() {
      if (this.$route.params.id) {
        this.playMusic(this.$route.params.id);
      }
    }
  },
}
</script>

<style>

#progress-bar {
    width: 100%;
    height: 10px;
}

.player-icon {
    margin-top: 5px;
    width: 50px;
    height: 50px;
}

.more-buttons {
    float:right
}

</style>
