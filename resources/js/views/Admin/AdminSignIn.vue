<template>
    <v-app>
        <v-main>
            <v-row justify="center">
                <v-col v-if="config.loaded" cols="12" sm="8" md="6" class="pa-5">
                    <h1>ADMIN</h1>
                    <!-- SIGN IN FORM -->
                    <v-form v-if="response.user == null" ref="signInForm" @submit.prevent="signIn" class="mt-5">
                        <v-row>
                            <!-- USERNAME -->
                            <v-col cols="12">
                                <v-text-field
                                    label="Username"
                                    v-model="request.username"
                                />
                            </v-col>

                            <!-- PASSWORD -->
                            <v-col cols="12">
                                <v-text-field
                                    label="Password"
                                    v-model="request.password"
                                />
                            </v-col>
                        </v-row>

                        <v-row>
                            <!-- SIGN IN BUTTON -->
                            <v-col cols="12" class="mt-4">
                                <v-btn
                                    type="submit"
                                    color="primary"
                                    rounded
                                    size="large"
                                >
                                    SIGN IN
                                </v-btn>
                            </v-col>
                        </v-row>
                    </v-form>

                    <div v-else>
                        <br>
                        <hr>
                        <pre>{{ response.user }}</pre>
                        <br>
                        <v-btn
                            type="submit"
                            color="error"
                            rounded
                            size="large"
                            @click="signOut"
                        >
                            SIGN OUT
                        </v-btn>
                    </div>
                </v-col>
            </v-row>
        </v-main>
    </v-app>
</template>

<script>
    import api_auth from '../../api/api-auth.js';

    export default {
        name: 'AdminSignIn',
        components: {},
        data() {
            return {
                config: {
                    loaded: false
                },
                request: {
                    username: '',
                    password: ''
                },
                response: {
                    user: null
                }
            }
        },
        computed: {

        },
        methods : {
            // METHOD :: SIGN IN
            signIn() {
                api_auth.signIn.post(this.request).then(response => {
                    if(!response) return;

                    this.getUser();
                }).catch(errors => {
                    console.log('ERRORS: ', errors);
                });
            },

            // METHOD :: GET USER
            getUser() {
                api_auth.signIn.get().then(response => {
                    this.response.user = response.data.user;
                    this.config.loaded = true;
                }).catch(errors => {
                    console.log('ERRORS: ', errors);
                    this.config.loaded = true;
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
            }
        },
        created() {
            this.getUser();
        }
    }
</script>

<style scoped>

</style>
