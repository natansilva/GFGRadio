import Vue from 'vue'
import Vuex from 'vuex'
import { baseUrl } from '../router/router'

Vue.use(Vuex)

const state = {
    actualMusic: '',
    actualMusicId: '',
    actualPathFile: '',
    actualExtension: '',
    url: '',
    actualAlbum: '',
    albums: [],
    musics: [],
    history: []
};

const mutations = {
    UPDATE_ACTUAL_MUSIC (state, pathFile, id, musicName, extension) {
        state.actualPathFile = pathFile;
        state.actualMusic = musicName;
        state.actualExtension = extension;
        state.url = baseUrl + `${pathFile}/${musicName}`;
        state.actualMusicId = id;
    },

    SET_ALBUM (state, newAlbums) {
        state.albums = newAlbums;
    },

    SET_ACTUAL_ALBUM (state, newAlbum) {
        if (state.actualAlbum === newAlbum) {
            state.actualAlbum = '';
        } else {
            state.actualAlbum = newAlbum;
        }
    },

    SET_MUSICS (state, musics) {
        state.musics = musics;
    },
    SET_HISTORY (state, music) {
        state.history.push(music);
    }
};

export default new Vuex.Store({ state, mutations });
