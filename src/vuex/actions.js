import * as AlbumApi from '../api/AlbumApi'
import Router from '../router/router'

export const getAlbums = function ({ dispatch, state }) {
    const newAlbum = AlbumApi.getAlbums();
    dispatch('SET_ALBUM', newAlbum);
}

export const playMusic = function ({ dispatch, state }, id) {
    AlbumApi.getMusicById(id).then(function(music) {
        dispatch( 'UPDATE_ACTUAL_MUSIC',
            music['pathFile'],
            music['id'],
            music['musicName'],
            music['extension']
        )
    }).catch(function(ex) {
        console.log(ex);
    });
}

export const play = function ({ dispatch, state }, id) {
    Router.go({
        name: 'homeMusic',
        params: {
            'id': id
        }
    });
}

export const playNext = function ({ dispatch, state }, id) {
    const nextId = id + 1;
    Router.go({
        name: 'homeMusic',
        params: {
            'id': nextId
        }
    });
}

export const playPrevious = function ({ dispatch, state }, id) {
    const previousId = id;

    if (id === 1) {
        this.previousId = id;
    } else {
        this.previousId = id - 1;
    }

    Router.go({
        name: 'homeMusic',
        params: {
            'id': this.previousId
        }
    });
}

export const setActualAlbum = function ({ dispatch, state }, newAlbum) {
    dispatch('SET_ACTUAL_ALBUM', newAlbum);
}

export const initializeAlbums = function ({ dispatch, state }) {
    AlbumApi.getAlbums().then(function(albums) {
        dispatch('SET_ALBUM', albums)
    });
}

export const getMusicsByName = function ({ dispatch, state }, name) {
    AlbumApi.getMusicsByName(name).then(function (musics) {
        dispatch('SET_FOUND_MUSICS', musics);
    });
}
