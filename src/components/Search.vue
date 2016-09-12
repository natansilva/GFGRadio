<template>
    <div id="search" class="searchNavBar">
        <br/>
        <div class="navbar" class="searchNavBar">
            <div class="form-group">
                <input type="text" @keyUp="findMusic(searchMusic) | debounce 500" v-model="searchMusic" debounce="500" placeholder="Pesquisar" class="form-control"/>
                <div class="resultMusics">
                    <div v-for="music in musics" class="text-center">
                        <a v-link="{name: 'homeMusic', params: {id: music.id}}" class="foundMusics">{{ music.albumName }} - {{ music.musicName }}</a>
                    </div>
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
        color: #337ab7;
    }
    .resultMusics {
        background-color: #000000;
        border-color: #000000;
    }
    #search {
        background-color:#ffffff; 
    }
</style>
