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
                <v-btn color="error" @click="deleteEvent(index)">Delete</v-btn>
                <v-btn color="primary" exact router :to="{ name: 'admin-events-show', params: { event: event.id } }">PROCEED</v-btn>
            </v-card-actions>
        </v-card>
        <v-btn color="primary" size="large" rounded exact router :to="{ name: 'admin-events-add' }">ADD EVENT</v-btn>
    </div>
</template>

<script>
    import apiEvent from '../../../api/api-event.js';
    import apiPortion from '../../../api/api-portion.js';

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
            },

            // METHOD :: DELETE EVENT
            deleteEvent(index) {
                let event = this.config.events[index];
                this.$store.commit('dialog/confirm/show', {
                    title : 'Delete Event',
                    prompt: `Do you really want to delete event [${index + 1}] ?`,
                    yesCallback: {
                        async: true,
                        action: () => {
                            apiEvent.destroy(event.id).then(response => {
                                if(!response) return;

                                this.$store.commit('dialog/confirm/hide');
                                if(response.data.deleted) {
                                    if(response.data.deleted.id === event.id) {
                                        this.config.events.splice(index, 1);
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
            this.getEvents();
        }
    }
</script>

<style scoped>

</style>
