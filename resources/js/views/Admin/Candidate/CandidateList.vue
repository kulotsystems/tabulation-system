<template>
    <div>
        <h2>Candidates</h2>
        <br>
        <v-card v-for="(candidate, index) in config.candidates" class="mb-3">
            <v-card-title>
                {{ index + 1 }}. {{ candidate.full_name }}
            </v-card-title>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="error" @click="deleteCandidate(index)">Delete</v-btn>
            </v-card-actions>
        </v-card>
        <v-btn color="primary" size="large" rounded exact router :to="{ name: 'admin-candidates-add', params: { event: this.$route.params.event } }">ADD CANDIDATE</v-btn>
    </div>
</template>

<script>
    import apiCandidate from '../../../api/api-candidate.js';
    import apiJudge from '../../../api/api-judge.js';

    export default {
        name: 'CandidateList',
        components: {},
        data() {
            return {
                config: {
                    candidates: []
                },
                request: {

                },
                response: {

                }
            }
        },
        computed: {},
        methods : {
            // METHOD :: GET CANDIDATES
            getCandidates() {
                apiCandidate.index(this.$route.params.event).then(response => {
                    if(!response) return;

                    if(response.data.candidates) {
                        this.config.candidates = response.data.candidates;
                    }
                }).catch(errors => {
                    console.log('ERRORS: ', errors);
                });
            },

            // METHOD :: DELETE CANDIDATE
            deleteCandidate(index) {
                let candidate = this.config.candidates[index];
                this.$store.commit('dialog/confirm/show', {
                    title : 'Delete Candidate',
                    prompt: `Do you really want to delete candidate [${index + 1}] ?`,
                    yesCallback: {
                        async: true,
                        action: () => {
                            apiCandidate.destroy(candidate.id).then(response => {
                                if(!response) return;

                                this.$store.commit('dialog/confirm/hide');
                                if(response.data.deleted) {
                                    if(response.data.deleted.id === candidate.id) {
                                        this.config.candidates.splice(index, 1);
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
            this.getCandidates();
        }
    }
</script>

<style scoped>

</style>
