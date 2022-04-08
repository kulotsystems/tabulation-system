<template>
    <v-dialog v-model="isOpen" max-width="400" :retain-focus="false" persistent>
        <v-card>
            <!-- CONFIRM TITLE -->
            <v-card-title>
                <span v-html="dialog.title"></span>
                <v-spacer></v-spacer>
                <v-btn v-if="(dialog.no.callback.async || dialog.yes.callback.async) && !dialog.persistent" @click="$store.commit('dialog/confirm/hide')" :disabled="dialog.no.btn.loading || dialog.yes.btn.loading" icon>
                    <v-icon>mdi-close</v-icon>
                </v-btn>
            </v-card-title>

            <!-- CONFIRM BODY -->
            <v-card-text>
                <p class="text-subtitle-1" v-html="dialog.prompt"></p>
                <div v-if="dialog.errors" class="error--text">
                    <v-divider></v-divider>
                    <div class="mt-3">
                        <h3>
                            ERROR {{ dialog.errors.response.status }}
                        </h3>
                        <p class="mb-0">
                            {{ dialog.errors.response.data.message }}
                        </p>
                    </div>
                </div>
            </v-card-text>

            <!-- CONFIRM ACTIONS -->
            <v-card-actions>
                <v-row dense>
                    <v-col cols="6">
                        <button-action
                            :icon="dialog.no.btn.icon"
                            :label="dialog.no.btn.label"
                            :color="dialog.no.btn.className"
                            :loading="dialog.no.btn.loading"
                            block
                            large
                            @click="$store.commit('dialog/confirm/callback', 'no')"
                        />
                    </v-col>
                    <v-col cols="6">
                        <button-action
                            :icon="dialog.yes.btn.icon"
                            :label="dialog.yes.btn.label"
                            :color="dialog.yes.btn.className"
                            :loading="dialog.yes.btn.loading"
                            block
                            large
                            @click="$store.commit('dialog/confirm/callback', 'yes')"
                        />
                    </v-col>
                </v-row>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
    import { defineAsyncComponent } from 'vue';

    export default {
        name: 'DialogConfirm',
        components: {
            'button-action': defineAsyncComponent(() => import('../buttons/ButtonAction.vue'))
        },
        data() {
            return {}
        },
        computed: {
            dialog() {
                return this.$store.getters['dialog/confirm/state'];
            },
            isOpen: {
                get() {
                    return this.$store.getters['dialog/confirm/state'].opened;
                },
                set() {
                    this.$store.commit('dialog/confirm/hide');
                }
            }
        },
        methods: {}
    }
</script>

<style scoped>

</style>
