<template>
    <v-app>
        <v-main>
            <v-row justify="center">
                <v-col v-if="this.$store.getters['auth/loaded']" cols="12" sm="8" md="6" class="pa-5">
                    <h1>SIGN IN</h1>
                    <!-- SIGN IN FORM -->
                    <v-form v-if="this.$store.getters['auth/user'] == null" ref="signInForm" @submit.prevent="this.$emit('signIn', this.request)" class="mt-5">
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
                        <pre>{{ this.$store.getters['auth/user'] }}</pre>
                        <br>
                        <v-btn
                            type="submit"
                            color="error"
                            rounded
                            size="large"
                            @click="this.$emit('signOut')"
                        >
                            SIGN OUT
                        </v-btn>
                        <br>
                        <br>
                        <h3>INSERT ENTITIES</h3>
                        <ol>
                            <li><router-link :to="{ name: 'admin-events-add' }">Add one event (ID: 1).</router-link></li>
                            <li><router-link :to="{ name: 'admin-judges-add', params: { event: 1 } }">Add Judge to Event 1.</router-link></li>
                            <li><router-link :to="{ name: 'admin-candidates-add', params: { event: 1 } }">Add Candidate to Event 1.</router-link></li>
                            <li><router-link :to="{ name: 'admin-portions-add', params: { event: 1 } }">Add Portion to Event 1.</router-link></li>
                        </ol>
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

                },
                request: {
                    username: '',
                    password: ''
                },
                response: {

                }
            }
        },
        computed: {

        },
        methods : {

        }
    }
</script>

<style scoped>

</style>
