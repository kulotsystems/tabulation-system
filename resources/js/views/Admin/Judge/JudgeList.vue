<template>
    <div>
        <h2>Judges</h2>
        <br>
        <v-card v-for="(judge, index) in config.judges" :key="judge.id" class="mb-3">
            <v-card-title>
                {{ index + 1 }}. {{ judge.full_name }}
            </v-card-title>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="error" @click="deleteJudge(index)">Delete</v-btn>
            </v-card-actions>
        </v-card>
        <v-btn color="primary" size="large" rounded exact router :to="{ name: 'admin-judges-add', params: { event: this.$route.params.event } }">ADD JUDGE</v-btn>
    </div>
</template>

<script>
    import apiJudge from '../../../api/api-judge.js';

    export default {
        name: 'JudgeList',
        components: {},
        data() {
            return {
                config: {
                    judges: []
                },
                request: {

                },
                response: {

                }
            }
        },
        computed: {},
        methods : {
            // METHOD :: GET JUDGES
            getJudges() {
                apiJudge.index(this.$route.params.event).then(response => {
                    if(!response) return;

                    if(response.data.judges) {
                        this.config.judges = response.data.judges;
                    }
                }).catch(errors => {
                    console.log('ERRORS: ', errors);
                });
            },

            // METHOD :: DELETE JUDGE
            deleteJudge(index) {
                let judge = this.config.judges[index];
                this.$store.commit('dialog/confirm/show', {
                    title : 'Delete Judge',
                    prompt: `Do you really want to delete judge [${index + 1}] ?`,
                    yesCallback: {
                        async: true,
                        action: () => {
                            apiJudge.destroy(judge.id).then(response => {
                                if(!response) return;

                                this.$store.commit('dialog/confirm/hide');
                                if(response.data.deleted) {
                                    if(response.data.deleted.id === judge.id) {
                                        this.config.judges.splice(index, 1);
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
            this.getJudges();
        }
    }
</script>

<style scoped>

</style>
