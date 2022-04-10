<template>
    <v-app>
        <nav-sample></nav-sample>

        <v-main>
            <!-- Provides the application the proper gutter -->
            <v-container>

                <router-view @signIn="signIn" @signOut="signOut" @getUser="getUser"></router-view>

            </v-container>
        </v-main>

        <v-footer app>

        </v-footer>
    </v-app>
</template>

<script>
    import { defineAsyncComponent } from 'vue';
    import api_auth from './api/api-auth.js';

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
        watch: {
            // watch $route changes for document title and transition
            $route: {
                immediate: true,
                handler(to, from) {
                    let title = '';
                    if (to.meta.title) {
                        title += to.meta.title;
                    }
                    document.title = title;
                    this.enforceRouteRules();
                }
            }
        },
        methods : {
            // METHOD :: SIGN IN
            signIn(request) {
                api_auth.signIn.post(request).then(response => {
                    if(!response) return;

                    this.getUser();
                }).catch(errors => {
                    console.log('ERRORS: ', errors);
                });
            },

            // METHOD :: GET USER
            getUser() {
                api_auth.signIn.get().then(response => {
                    this.$store.commit('auth/setUser', response.data.user);
                    this.$store.commit('auth/load');
                    this.enforceRouteRules();
                }).catch(errors => {
                    console.log('ERRORS: ', errors);
                    this.$store.commit('auth/load');
                    this.enforceRouteRules();
                });
            },

            // METHOD :: SIGN OUT
            signOut() {
                api_auth.signOut().then(response => {
                    if(!response) return;

                    if(response.data.signed_out)
                        window.location.reload();
                }).catch(errors => {
                    console.log('ERRORS: ', errors);
                });
            },

            // METHOD :: ENFORCE ROUTE RULES
            enforceRouteRules()
            {
                if(this.$route.meta.rules) {
                    let rules = this.$route.meta.rules;
                    if(this.$store.getters['auth/user'] != null) {
                        if(!rules.user.accept)
                            this.$router.replace(rules.user.redirect);
                    }
                    else {
                        if(!rules.guest.accept)
                            this.$router.replace(rules.guest.redirect);
                    }
                }
            },
        },
        created() {
            this.getUser();
        }
    }
</script>

<style>

</style>
