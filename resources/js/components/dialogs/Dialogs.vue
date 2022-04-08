<template>
    <div>
        <dialog-loader/>
        <dialog-message/>
        <dialog-confirm/>
        <dialog-error/>
    </div>
</template>

<script>
    import { defineAsyncComponent } from 'vue';

    export default {
        name: 'Dialogs',
        components: {
            'dialog-loader'  : defineAsyncComponent(() => import('./DialogLoader.vue')),
            'dialog-message' : defineAsyncComponent(() => import('./DialogMessage.vue')),
            'dialog-confirm' : defineAsyncComponent(() => import('./DialogConfirm.vue')),
            'dialog-error'   : defineAsyncComponent(() => import('./DialogError.vue'))
        },
        props: {
            comingSoon: {
                type   : Boolean,
                default: false
            }
        },
        data() {
            return {}
        },
        computed: {},
        methods: {}
    }
</script>

<style scoped>

</style>
