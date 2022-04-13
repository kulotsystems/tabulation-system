<template>
    <div>
        <h2>Add Portion</h2>
        <br>
        <v-form @submit.prevent="addPortion">
            <v-text-field
                label="Title"
                v-model="request.title"
            />
            <v-text-field
                label="Description"
                v-model="request.description"
            />
            <v-btn color="primary" type="submit" size="large" rounded>ADD</v-btn>
        </v-form>
    </div>
</template>

<script>
    import apiPortion from '../../../api/api-portion.js';

    export default {
        name: 'PortionAdd',
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
            // METHOD :: ADD PORTION
            addPortion() {
                apiPortion.store({
                    ...this.request,
                    event_id: this.$route.params.event
                }).then(response => {
                    if(!response) return;

                    if(response.data.portion) {
                        const portion = response.data.portion;
                        this.$router.replace({ name: 'admin-portions-list', params: { event: this.$route.params.event } });
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
