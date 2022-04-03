<template>
    <v-app>
        <nav-sample></nav-sample>

        <!-- Sizes your content based upon application components -->
        <v-main>

            <!-- Provides the application the proper gutter -->
            <v-container fluid>

                <!-- If using vue-router -->
                <router-view></router-view>
            </v-container>
        </v-main>

        <v-footer app>

        </v-footer>
    </v-app>
</template>

<script>
    import { defineAsyncComponent } from 'vue';

    export default {
        name: 'App',
        components: {
            'nav-sample': defineAsyncComponent(() => import('./components/navs/NavSample.vue'))
        },
        data() {
            return {

            }
        },
        computed: {},
        methods : {

        }
    }
</script>

<style>

</style>
