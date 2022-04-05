<template>
    <v-app>
        <v-main>
            <v-row justify="center">
                <v-col cols="12" sm="8" md="6" class="pa-5">
                    <h1>ADMIN</h1>
                    <!-- SIGN IN FORM -->
                    <v-form ref="signInForm" @submit.prevent="signIn" class="mt-5">
                        <v-row>
                            <!-- USERNAME -->
                            <v-col cols="12">
                                <v-text-field
                                    label="Username"
                                />
                            </v-col>

                            <!-- PASSWORD -->
                            <v-col cols="12">
                                <v-text-field
                                    label="Password"
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
            return {}
        },
        computed: {},
        methods : {
            signIn() {
                api_auth.test().then(response => {
                    if(!response) return

                    if(response.data.test) {
                        alert(`RESPONSE: ${response.data.test}`);
                    }
                }).catch(errors => {
                    console.log('ERRORS: ', errors);
                });
            }
        }
    }
</script>

<style scoped>

</style>
