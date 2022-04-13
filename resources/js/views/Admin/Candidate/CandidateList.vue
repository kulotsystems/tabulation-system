<template>
    <div>
        <h2>Candidates</h2>
        <br>
        <v-card v-for="(candidate, index) in config.candidates" class="mb-3">
            <v-card-title>
                {{ index + 1 }}. {{ candidate.full_name }}
            </v-card-title>
        </v-card>
        <v-btn color="primary" size="large" rounded exact router :to="{ name: 'admin-candidates-add', params: { event: this.$route.params.event } }">ADD CANDIDATE</v-btn>
    </div>
</template>

<script>
    import apiCandidate from '../../../api/api-candidate.js';

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
            }
        },
        created() {
            this.getCandidates();
        }
    }
</script>

<style scoped>

</style>
