<template>
    <div id="search">
      <input type="text" class="searchBar" @keyUp="findMusic(searchMusic) | debounce 500" v-model="searchMusic" debounce="500" placeholder="Pesquisar" class="form-control"/>
    </div>
</template>

<script>
    import { getMusicsByName } from '../vuex/actions'
    import { getMusics } from '../vuex/getters'

    export default {
        data(){
            return {
              searchMusic: ''
            };
        },
        vuex: {
            getters: {
              musics: getMusics,
            },
            actions: {
              findMusic: getMusicsByName
            }
        },
    }
</script>

<style>
.searchBar {
  margin-top: 10px;
  margin-bottom: 10px;
  margin-left: 10%;
  width: 80%;
  height: 30px;
}
</style>
