import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const state = {
    actualMusic: '',
    actualMusicId: '',
    actualPathFile: '',
    actualExtension: '',
    url: '',
    actualAlbum: '',
    albums: []
};

const mutations = {
    UPDATE_ACTUAL_MUSIC (state, pathFile, id, musicName, extension) {
        state.actualPathFile = pathFile;
        state.actualMusic = musicName;
        state.actualExtension = extension;
        state.url = `http://localhost:9001${pathFile}/${musicName}`;
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
    }
};

export default new Vuex.Store({ state, mutations });
