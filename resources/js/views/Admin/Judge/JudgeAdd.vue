<template>
    <div>
        <h2>Add Judge</h2>
        <br>
        <v-form @submit.prevent="addJudge">
            <v-text-field
                label="Full Name"
                v-model="request.full_name"
            />
            <v-checkbox
                label="Chairman"
                v-model="request.is_chairman"
            />
            <v-text-field
                label="Username"
                v-model="request.username"
            />
            <v-text-field
                label="Password"
                type="password"
                v-model="request.password"
            />
            <v-btn color="primary" type="submit" size="large" rounded>ADD</v-btn>
        </v-form>
    </div>
</template>

<script>
    import apiJudge from '../../../api/api-judge.js';

    export default {
        name: 'JudgeAdd',
        components: {},
        data() {
            return {
                config: {

                },
                request: {
                    full_name  : '',
                    is_chairman: false,
                    photo      : 'temporary.jpg',
                    username   : '',
                    password   : ''
                },
                response: {

                }
            }
        },
        computed: {},
        methods : {
            // METHOD :: ADD JUDGE
            addJudge() {
                apiJudge.store({
                    ...this.request,
                    event_id: this.$route.params.event
                }).then(response => {
                    if(!response) return;

                    if(response.data.judge) {
                        const judge = response.data.judge;
                        alert(`Judge [${judge.id}] Added!`);
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
