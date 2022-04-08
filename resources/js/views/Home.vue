<template>
    <div>
        <dialogs/>
        <h1>HOME</h1>
        <p>This is the home page.</p>

        <br>
        <hr>
        <h2>DIALOGS</h2>
        <p>Layout to be fixed in later commits</p>
        <br>
        <v-btn class="success" @click="message">MESSAGE</v-btn>
        <v-btn class="success" @click="confirm">CONFIRM</v-btn>
    </div>
</template>

<script>
    import { defineAsyncComponent } from 'vue';

    export default {
        name: 'Home',
        components: {
            'dialogs': defineAsyncComponent(() => import('../components/dialogs/Dialogs.vue'))
        },
        data() {
            return {}
        },
        computed: {},
        methods : {
            message() {
                this.$store.commit('dialog/message/show', {
                    title : 'Sample Message',
                    prompt: 'This is a sample message dialog.'
                });
            },
            confirm() {
                this.$store.commit('dialog/confirm/show', {
                    title : 'Sample Confirm',
                    prompt: 'This is a sample confirm dialog.'
                });
            }
        }
    }
</script>

<style scoped>

</style>
