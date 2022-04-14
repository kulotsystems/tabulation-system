<template>
    <div>
        <h2>Portions</h2>
        <br>
        <v-card v-for="(portion, index) in config.portions" class="mb-3">
            <v-card-title>
                {{ index + 1 }}. {{ portion.title }}
            </v-card-title>
            <v-card-text>
                {{ portion.description }}
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="error" @click="deletePortion(index)">Delete</v-btn>
            </v-card-actions>
        </v-card>
        <v-btn color="primary" size="large" rounded exact router :to="{ name: 'admin-portions-add', params: { event: this.$route.params.event } }">ADD PORTION</v-btn>
    </div>
</template>

<script>
    import apiPortion from '../../../api/api-portion.js';
    import apiCandidate from '../../../api/api-candidate.js';

    export default {
        name: 'PortionList',
        components: {},
        data() {
            return {
                config: {
                    portions: []
                },
                request: {

                },
                response: {

                }
            }
        },
        computed: {},
        methods : {
            // METHOD :: GET PORTIONS
            getPortions() {
                apiPortion.index(this.$route.params.event).then(response => {
                    if(!response) return;

                    if(response.data.portions) {
                        this.config.portions = response.data.portions;
                    }
                }).catch(errors => {
                    console.log('ERRORS: ', errors);
                });
            },

            // METHOD :: DELETE PORTION
            deletePortion(index) {
                let portion = this.config.portions[index];
                this.$store.commit('dialog/confirm/show', {
                    title : 'Delete Portion',
                    prompt: `Do you really want to delete portion [${index + 1}] ?`,
                    yesCallback: {
                        async: true,
                        action: () => {
                            apiPortion.destroy(portion.id).then(response => {
                                if(!response) return;

                                this.$store.commit('dialog/confirm/hide');
                                if(response.data.deleted) {
                                    if(response.data.deleted.id === portion.id) {
                                        this.config.portions.splice(index, 1);
                                    }
                                }
                            }).catch(errors => {
                                console.log('ERRORS: ', errors);
                                this.$store.commit('dialog/confirm/errors', errors);
                            });
                        }
                    }
                });
            }
        },
        created() {
            this.getPortions();
        }
    }
</script>

<style scoped>

</style>
