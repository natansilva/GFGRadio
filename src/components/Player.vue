<template>
<div id="playerbar">
  <mdl-progress :progress="current" class="progress-bar" @click="changeTime"></mdl-progress>
  <div class="playerControl">
    <audio v-el:audio v-on:ended="playNext(actualMusicId)" @timeupdate="changeDuration" id="player" v-bind:src="url"></audio>

    <div class="playerControlLeft">
      <mdl-button v-mdl-ripple-effect class="player-icon" icon="skip_previous" @click.prevent="playPrevious(actualMusicId)"></mdl-button>
      <mdl-button v-mdl-ripple-effect class="player-icon" icon="play_arrow" @click.prevent="play()"></mdl-button>
      <mdl-button v-mdl-ripple-effect class="player-icon" icon="pause" @click.prevent="pause()"></mdl-button>
      <mdl-button v-mdl-ripple-effect class="player-icon" icon="skip_next" @click.prevent="playNext(actualMusicId)"></mdl-button>
    </div>

    <div class="playerControlMiddle">
      {{ actualMusic }}
    </div>

    <div class="playerControlRight">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" id="searchButton"for="searchBar">
                <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="search" id="searchBar" @keyUp="findMusic(searchMusic) | debounce 500" v-model="searchMusic" debounce="500"/>
                <label class="mdl-textfield__label" for="searchBar">Pesquisar</label>
            </div>
        </div>
        <mdl-button v-mdl-ripple-effect class="player-icon more-buttons" icon="loop"></mdl-button>
        <mdl-button v-mdl-ripple-effect class="player-icon more-buttons" icon="share" @click.prevent="copyUrl()"></mdl-button>
        <a download v-bind:href="url"><mdl-button v-mdl-ripple-effect class="player-icon more-buttons" icon="file_download"></mdl-button></a>
    </div>
  </div>
</div>
</template>

<script>
import * as getters from '../vuex/getters';
import * as actions from '../vuex/actions';

export default {
    data(){
        return {
            current: 0,
            searchMusic: '',
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
      url: getters.getUrl,
      musics: getters.getMusics,
    },
    actions: {
      playPrevious: actions.playPrevious,
      playNext: actions.playNext,
      playMusic: actions.playMusic,
      findMusic: actions.getMusicsByName,
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

.playerControl {
  flex: 1;
  display: flex;
  flex-direction: row;
  height: 48px;
  align-items: center;
}

.playerControlLeft {
  width: 20vw;
  display: flex;
  justify-content: center;
}

.playerControlMiddle {
  flex: 1;
  display: flex;
  margin-left: 1vw;
  justify-content: left;
}

.playerControlRight {
    text-align: right;
    min-width: 50vw;
}

.progress-bar {
  width: 100%;
  height: 5px;
}

#searchButton {
    margin-top: 2.8px;
}
</style>
