import * as AlbumApi from '../api/AlbumApi'

export const getAlbums = function ({ dispatch, state }) {
    const newAlbum = AlbumApi.getAlbums();
    dispatch('SET_ALBUM', newAlbum);
}

export const playMusic = function ({ dispatch, state }, pathFile, id, musicName, extension) {
    console.log(pathFile)
    dispatch('UPDATE_ACTUAL_MUSIC', pathFile, id, musicName, extension);
}

export const playNext = function ({ dispatch, state }, id) {
    AlbumApi.getMusicById(id + 1).then(function(nextMusic) {
        dispatch( 'UPDATE_ACTUAL_MUSIC',
            nextMusic['pathFile'],
            nextMusic['id'],
            nextMusic['musicName'],
            nextMusic['extension']
        )
    }).catch(function(ex) {
        console.log(ex);
    })
}

export const playPrevious = function ({ dispatch, state }, id) {
    AlbumApi.getMusicById(id - 1).then(function(previousMusic) {
        dispatch(
            'UPDATE_ACTUAL_MUSIC',
            previousMusic['pathFile'],
            previousMusic['id'],
            previousMusic['musicName'],
            previousMusic['extension']
        )
    }).catch(function(ex) {
        console.log(ex)
    })
}

export const setActualAlbum = function ({ dispatch, state }, newAlbum) {
    dispatch('SET_ACTUAL_ALBUM', newAlbum);
}

export const initializeAlbums = function ({ dispatch, state }) {
    AlbumApi.getAlbums().then(function(albums) {
        dispatch('SET_ALBUM', albums)

        dispatch(
            'UPDATE_ACTUAL_MUSIC',
            albums[0]['path'],
            albums[0]['musics'][0]['id'],
            albums[0]['musics'][0]['musicName'],
            albums[0]['musics'][0]['extension']
        )
    })
}
