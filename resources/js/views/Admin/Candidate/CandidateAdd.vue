<template>
    <div>
        <h2>Add Candidate</h2>
        <br>
        <v-form @submit.prevent="addCandidate">
            <v-text-field
                label="Full Name"
                v-model="request.full_name"
            />
            <v-text-field
                label="Origin"
                v-model="request.origin"
            />
            <v-btn color="primary" type="submit" size="large" rounded>ADD</v-btn>
        </v-form>
    </div>
</template>

<script>
    import apiCandidate from '../../../api/api-candidate.js';

    export default {
        name: 'CandidateAdd',
        components: {},
        data() {
            return {
                config: {

                },
                request: {
                    full_name: '',
                    origin   : '',
                    photo    : 'temporary.jpg',
                },
                response: {

                }
            }
        },
        computed: {},
        methods : {
            // METHOD :: ADD CANDIDATE
            addCandidate() {
                apiCandidate.store({
                    ...this.request,
                    event_id: this.$route.params.event
                }).then(response => {
                    if(!response) return;

                    if(response.data.candidate) {
                        const candidate = response.data.candidate;
                        this.$router.replace({ name: 'admin-candidates-list', params: { event: this.$route.params.event } });
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
