import Vue from 'vue'
import Actions from '../vuex/actions'
import Fetch from 'whatwg-fetch'
import { baseUrl } from '../router/router'

export function getMusicById (id)
{
    const url = `${baseUrl}/restAlbum/AlbumApi.php?action=getMusic&id=${id}`;

    return fetch(url)
        .then(function (response) {
            return response.json()
        }).then(function(json) {
            return json
        }).catch(function(e) {
            return ex
        });
}

export function getAlbums()
{
    const url = `${baseUrl}/restAlbum/AlbumApi.php?action=loadAlbum&page=1`;

    return fetch(url)
        .then(function (response) {
            return response.json()
        }).then(function(json) {
            return json
        }).catch(function(ex) {
            return ex
        });
}

export function getMusicsByName(name)
{
    const url = `${baseUrl}/restAlbum/AlbumApi.php?action=findMusic&musicName=${name}`;

    return fetch(url)
    .then(function (response) {
        return response.json();
    }).then(function(json) {
        return json
    }).catch(function(ex) {
        return ex
    });
}
