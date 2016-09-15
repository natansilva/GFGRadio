<template>
    <div>
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
    margin-top: 14px;
    height: 60%;
    width: 80%;
    margin-left: 10%;
}
</style>
