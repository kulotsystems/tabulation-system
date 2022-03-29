<template>
    <div align="center">
        <img :src="cover" alt="#100DaysOfCode">
    </div>
</template>

<script>
    import cover from '../assets/img/100-days-of-code.png';


    export default {
        name: 'App',
        components: {},
        data() {
            return {
                cover: cover
            }
        },
        computed: {},
        methods : {}
    }
</script>

<style>
    body {
        background: #111;
    }

    img {
        width: 100%;
    }
</style>
