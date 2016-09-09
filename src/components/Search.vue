<template>
    <div id="search">
        <br/>
        <div class="navbar">
            <div class="form-group">
                <input type="text" @keyUp="findMusic(searchMusic) | debounce 500" v-model="searchMusic" debounce="500" placeholder="Pesquisar" class="form-control"/>
                <div v-for="music in musics">
                    <a v-link="{name: 'homeMusic', params: {id: music.id}}" class="foundMusics">{{ music.albumName }} - {{ music.musicName }}</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { getMusicsByName } from '../vuex/actions'
    import { getMusics } from '../vuex/getters'

    export default {
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
    .foundMusics {
        color: #000000;
    }
</style>
