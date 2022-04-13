<template>
    <div v-if="config.event != null">
        <h1>{{ config.event.title }}</h1>
        <p>{{ config.event.description }}</p>
        <br>
        <v-btn color="primary" size="large" rounded exact router :to="{ name: 'admin-judges-list'    , params: { event: this.$route.params.event } }">Judges</v-btn>
        <v-btn color="primary" size="large" rounded exact router :to="{ name: 'admin-candidates-list', params: { event: this.$route.params.event } }">Candidates</v-btn>
        <v-btn color="primary" size="large" rounded exact router :to="{ name: 'admin-portions-list'  , params: { event: this.$route.params.event } }">Portions</v-btn>
    </div>
</template>

<script>
    import apiEvent from '../../../api/api-event.js';

    export default {
        name: 'EventShow',
        components: {},
        data() {
            return {
                config: {
                    event: null
                },
                request: {

                },
                response: {

                }
            }
        },
        computed: {},
        methods : {
            // METHOD :: GET EVENT DETAILS
            getEventDetails() {
                apiEvent.show(this.$route.params.event).then(response => {
                    if(!response) return;

                    if(response.data.event) {
                        this.config.event = response.data.event;
                    }
                }).catch(errors => {
                    console.log('ERRORS: ', errors);
                });
            }
        },
        created() {
            this.getEventDetails();
        }
    }
</script>

<style scoped>

</style>
