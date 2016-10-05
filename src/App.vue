<template>
<div class="app">
  <router-view keep-alive class="app-player"></router-view>
  <div class="app-content">
    <div class="app-sidebar">
      <div class="app-sidebar-item">
        <history></history>
      </div>
    </div>
    <div class="app-lists">
      <album></album>
      <musics></musics>
    </div>
  </div>
</div>
</template>

<script>
import Player from './components/Player';
import Album from './components/Album';
import Musics from './components/Music';
import Search from './components/Search';
import History from './components/History';
import Store from './vuex/store';

export default {
  components: {
    Album,
    Search,
    Musics,
    History,
  },
  store: Store
}
</script>

<style>
* {
  box-sizing: border-box;
}

html,
body {
  width: 100%;
  height: 100%;
  background-color: #945baf;
}

body {
  margin: 0;
  font-family: sans-serif;
}

.app {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
}

.app-player {
  width: 100vw;
}

.app-content {
  flex: 1;
  display: flex;
  flex-direction: row;
  width: 100vw;
}

.app-sidebar {
  flex: 1;
  display: flex;
  flex-direction: column;
  width: 20vw;
}

.app-sidebar-item {
  flex-direction: column;
  min-height: 4vh;
  border-style: solid;
  border-width: 2px;
  border-color: #000000;
  border-radius: 2px;
}

.app-sidebar-item-title {
  margin: 0;
  font-size: 24px;
  text-align: center;
  box-shadow: 0px 5px 9px 2px rgba(0,0,0,0.75);
}

.app-sidebar-item-list {
  display: flex;
  flex-direction: column;
  margin: 0;
  white-space: nowrap;
  overflow-x: auto;
}

.app-sidebar-item-list-item {
  margin-left: 10px;
}

.app-lists {
  width: 80vw;
  display: flex;
}

</style>
