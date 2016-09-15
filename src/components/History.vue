<template>
    <ul class="demo-list-icon mdl-list">
        <li v-for="item-history in history" >{{ item-history.musicName }}</li>
    </ul>
</template>

<script>
import { play } from '../vuex/actions';
import { getHistory } from '../vuex/getters';

export default {
    vuex: {
        getters: {
            history: getHistory,
        },
        actions: {
            play: play
        }
    }
}
</script>

<style>
</style>
