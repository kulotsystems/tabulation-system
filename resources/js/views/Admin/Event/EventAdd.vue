<template>
    <div>
        <h2>Add Event</h2>
        <br>
        <v-form @submit.prevent="addEvent">
            <v-text-field
                label="Title"
                v-model="request.title"
            />
            <v-textarea
                label="Description"
                v-model="request.description"
            />
            <v-btn color="primary" type="submit" size="large" rounded>ADD</v-btn>
        </v-form>
    </div>
</template>

<script>
    import apiEvent from '../../../api/api-event.js';

    export default {
        name: 'EventAdd',
        components: {},
        data() {
            return {
                config: {

                },
                request: {
                    title      : '',
                    description: ''
                },
                response: {

                }
            }
        },
        computed: {},
        methods : {
            // METHOD :: ADD EVENT
            addEvent() {
                apiEvent.store(this.request).then(response => {
                    if(!response) return;

                    if(response.data.event) {
                        const event = response.data.event;
                        alert(`Event [${event.id}] Added!`);
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
