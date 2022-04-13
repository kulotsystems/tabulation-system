<template>
    <div>
        <h2>Events</h2>
        <br>
        <v-card v-for="(event, index) in config.events" class="mb-3">
            <v-card-title>
                {{ index + 1 }}. {{ event.title }}
            </v-card-title>
            <v-card-text>
                <p v-if="event.description != null">{{ event.description }}</p>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" exact router :to="{ name: 'admin-events-show', params: { event: event.id } }">PROCEED</v-btn>
            </v-card-actions>
        </v-card>
        <v-btn color="primary" size="large" rounded exact router :to="{ name: 'admin-events-add' }">ADD EVENT</v-btn>
    </div>
</template>

<script>
    import apiEvent from '../../../api/api-event.js';

    export default {
        name: 'EventList',
        components: {},
        data() {
            return {
                config: {
                    events: []
                },
                request: {

                },
                response: {

                }
            }
        },
        computed: {},
        methods : {
            // METHOD :: GET EVENTS
            getEvents() {
                apiEvent.index().then(response => {
                    if(!response) return;

                    if(response.data.events) {
                        this.config.events = response.data.events;
                    }
                }).catch(errors => {
                    console.log('ERRORS: ', errors);
                });
            }
        },
        created() {
            this.getEvents();
        }
    }
</script>

<style scoped>

</style>
