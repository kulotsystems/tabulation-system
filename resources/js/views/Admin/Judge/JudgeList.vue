<template>
    <div>
        <h2>Judges</h2>
        <br>
        <v-card v-for="(judge, index) in config.judges" class="mb-3">
            <v-card-title>
                {{ index + 1 }}. {{ judge.full_name }}
            </v-card-title>
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
            }
        },
        created() {
            this.getJudges();
        }
    }
</script>

<style scoped>

</style>
