<template>
<div class="app-history">
    <h2 class="app-sidebar-item-title" @click.prevent="toogleShowSideBarItem(sidebarName)">Historico</h2>
    <ul class="demo-list-icon mdl-list app-sidebar-item-list" v-show="sidebarName === activeSideBar">
        <li class="app-sidebar-item-list-item" v-for="item in history" @click.prevent="play(item.id)">{{ item.musicName }}</li>
    </ul>
</div>
</template>

<script>
import { play, toogleShowSideBarItem } from '../vuex/actions';
import { getActiveSideBarItem, getHistory } from '../vuex/getters';

export default {
    data(){
        return {
            sidebarName: 'history',
        };
    },
    vuex: {
        getters: {
            history: getHistory,
            activeSideBar: getActiveSideBarItem
        },
        actions: {
            play: play,
            toogleShowSideBarItem: toogleShowSideBarItem
        }
    }
}
</script>

<style>
</style>
