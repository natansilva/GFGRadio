<template>
<div class="app">
  <div class="app-sidebar">
  </div>
  <div class="app-content">
    <search class="app-search"></search>
    <div class="app-lists">
      <album></album>
      <musics></musics>
    </div>
    <router-view keep-alive class="app-player"></router-view>
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
    History
  },
  store: Store
}
</script>

<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: sans-serif;
  color: #a5a5a5;
}

.app {
  background-color: #222;
  display: flex;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
}

.app-sidebar {
  background: rgba(0, 0, 0, .4);
  width: 20vw;
  box-shadow: 0 4px 14px 2px #000;
  z-index: 10;
}

.app-sidebar-item {
  height: 64px;
  /*   border-bottom: 1px solid rgba(255, 255, 255, .1); */
  border-bottom: 1px solid rgba(0, 0, 0, .6);
  padding: 20px;
  vertical-align: middle;
  font-size: 20px;
  line-height: 20px;
}

.app-content {
  width: 80vw;
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

.app-lists {
  flex: 1;
  display: flex;
  flex-direction: row;
  overflow: hidden;
}

.app-player {
  background: rgba(0, 0, 0, .4);
  z-index: ;
  height: 64px;
  display: flex;
  z-index: 5;
  flex-direction: column;
  overflow: hidden;
}

.app-search {
  background: rgba(0, 0, 0, .4);
  height: 64px;
  width: 100%;
  color: #fff;
}

</style>
