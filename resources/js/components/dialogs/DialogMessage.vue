<template>
    <v-dialog v-model="isOpen" max-width="400" :retain-focus="false" persistent>
        <v-card>
            <v-card-title>
                <span v-html="dialog.title"></span>
                <v-spacer></v-spacer>
                <v-btn v-if="dialog.callback.async && !dialog.persistent || !dialog.callback.async" @click="$store.commit('dialog/message/hide')" :disabled="dialog.btnOk.loading" icon>
                    <v-icon>mdi-close</v-icon>
                </v-btn>
            </v-card-title>

            <v-card-text>
                <p class="text-subtitle-1" v-html="dialog.prompt"></p>
                <div v-if="dialog.callback.errors" class="error--text">
                    <v-divider></v-divider>
                    <div class="mt-3">
                        <h3>
                            ERROR {{ dialog.callback.errors.response.status }}
                        </h3>
                        <p class="mb-0">
                            {{ dialog.callback.errors.response.data.message }}
                        </p>
                    </div>
                </div>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <button-action
                    :icon="dialog.btnOk.icon"
                    :label="dialog.btnOk.label"
                    :color="dialog.btnOk.className"
                    :loading="dialog.btnOk.loading"
                    block
                    large
                    @click="$store.commit('dialog/message/callback')"
                />

            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
    import { defineAsyncComponent } from 'vue';

    export default {
        name: 'DialogMessage',
        components: {
            'button-action': defineAsyncComponent(() => import('../buttons/ButtonAction.vue'))
        },
        data() {
            return {}
        },
        computed: {
            dialog() {
                return this.$store.getters['dialog/message/state'];
            },
            isOpen: {
                get() {
                    return this.$store.getters['dialog/message/state'].opened;
                },
                set() {
                    this.$store.commit('dialog/message/hide');
                }
            }
        },
        methods: {

        }
    }
</script>

<style scoped>

</style>
