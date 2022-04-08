<template>
    <v-dialog v-model="isOpen" max-width="400" :retain-focus="false" persistent>
        <v-card>
            <!-- ERROR TITLE -->
            <v-card-title>
                <span v-html="dialog.title" class="error--text"></span>
                <v-spacer></v-spacer>
                <v-btn @click="hide" icon>
                    <v-icon>mdi-close</v-icon>
                </v-btn>
            </v-card-title>

            <!-- ERROR BODY -->
            <v-card-text>
                <p class="text-subtitle-1" v-html="dialog.message"></p>
                <div v-if="dialog.errors" class="mt-3">
                    <div v-for="(error, field, index) in dialog.errors" :key="field">
                        <v-alert dense outlined type="error" v-if="error[0] !== dialog.message">
                            {{ error[0] }}
                        </v-alert>
                    </div>
                </div>
                <p class="text-subtitle-1" v-if="dialog.reload">Please reload this page.</p>
            </v-card-text>
        </v-card>
    </v-dialog>
</template>

<script>
    export default {
        name: 'DialogError',
        components: {},
        data() {
            return {}
        },
        computed: {
            dialog() {
                return this.$store.getters['dialog/error/state'];
            },
            isOpen: {
                get() {
                    return this.$store.getters['dialog/error/state'].opened;
                },
                set() {
                    this.$store.commit('dialog/error/hide');
                }
            }
        },
        methods: {
            hide() {
                if(this.dialog.message === 'Current session has expired.') {
                    setTimeout(() => {
                        window.open(this.$router.history.base + '?next=' + encodeURI(this.$route.path), '_self');
                    }, 350);
                }
                if(this.dialog.reload)
                    window.location.reload();
                this.$store.commit('dialog/error/hide');
            }
        }
    }
</script>

<style scoped>

</style>
