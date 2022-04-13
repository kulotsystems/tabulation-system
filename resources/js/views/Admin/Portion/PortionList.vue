<template>
    <div>
        <h2>Portions</h2>
        <br>
        <v-card v-for="(portion, index) in config.portions" class="mb-3">
            <v-card-title>
                {{ index + 1 }}. {{ portion.title }}
            </v-card-title>
            <v-card-text>
                {{ portion.description }}
            </v-card-text>
        </v-card>
        <v-btn color="primary" size="large" rounded exact router :to="{ name: 'admin-portions-add', params: { event: this.$route.params.event } }">ADD PORTION</v-btn>
    </div>
</template>

<script>
    import apiPortion from '../../../api/api-portion.js';

    export default {
        name: 'PortionList',
        components: {},
        data() {
            return {
                config: {
                    portions: []
                },
                request: {

                },
                response: {

                }
            }
        },
        computed: {},
        methods : {
            // METHOD :: GET PORTIONS
            getPortions() {
                apiPortion.index(this.$route.params.event).then(response => {
                    if(!response) return;

                    if(response.data.portions) {
                        this.config.portions = response.data.portions;
                    }
                }).catch(errors => {
                    console.log('ERRORS: ', errors);
                });
            }
        },
        created() {
            this.getPortions();
        }
    }
</script>

<style scoped>

</style>
