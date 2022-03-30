<template>
    <div align="center">
        <img :src="cover" alt="#100DaysOfCode">
        <nav-sample/>
        <router-view/>

        <button @click="$store.commit('decrementCounter')">-</button>
        <span class="counter">
            {{ $store.getters.getCounter }}
        </span>
        <button @click="$store.commit('incrementCounter')">+</button>

    </div>
</template>

<script>
    import { defineAsyncComponent } from 'vue';

    import cover from '../assets/img/100-days-of-code.png';

    export default {
        name: 'App',
        components: {
            'nav-sample': defineAsyncComponent(() => import('./components/navs/NavSample.vue'))
        },
        data() {
            return {
                cover: cover
            }
        },
        computed: {},
        methods : {
            increment() {
                $
            }
        }
    }
</script>

<style>
    body {
        background: #111;
        color: #eee;
        font-family: sans-serif;
    }

    img {
        width: 100%;
        margin-bottom: 5px;
    }

    .counter {
        font-size: 30px;
        padding-left: 5px;
        padding-right: 5px;
    }
</style>
