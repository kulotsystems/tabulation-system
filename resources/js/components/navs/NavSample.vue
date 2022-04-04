<template>
    <v-navigation-drawer v-model="drawer.opened" app >
        <v-toolbar class="primary lighten-2">
            <v-app-bar-nav-icon v-on:click="drawer.opened = false" v-show="drawer.opened">
                <v-icon>mdi_home</v-icon>
            </v-app-bar-nav-icon>
            <v-app-bar-title class="white--text">
                #100DaysOfCode
            </v-app-bar-title>
        </v-toolbar>
        <v-list>
            <v-list-item
                v-for="(item, i) in items"
                :key="item.text"
                :value="item"
                active-color="primary"
                @click="$router.push(item.route)"
            >
                <v-list-item-avatar left="">
                    <v-icon :icon="item.icon"></v-icon>
                </v-list-item-avatar>
                <v-list-item-title v-text="item.text" class="text-h6"></v-list-item-title>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>

    <v-app-bar>
        <v-app-bar-nav-icon v-on:click="drawer.opened = true" v-show="!drawer.opened"/>
        <v-app-bar-title v-show="!drawer.opened">
            #100DaysOfCode
        </v-app-bar-title>
    </v-app-bar>
</template>

<script>
    export default {
        name: 'NavSample',
        components: {},
        data() {
            return {
                items: [
                    { text: 'Home' , icon: 'mdi-home'   , route: { name: 'home'  } },
                    { text: 'About', icon: 'mdi-help'   , route: { name: 'about' } },
                    { text: 'Admin', icon: 'mdi-account', route: { name: 'admin-sign-in' } },
                ],
                drawer: {
                    opened: false
                }
            }
        },
        computed: {},
        methods : {}
    }
</script>

<style scoped>

</style>
