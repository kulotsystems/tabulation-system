<template>
    <v-btn :color="color" :type="type" :loading="loading" :disabled="disabled" depressed @click="click" :small="small" :large="large" :block="block" :rounded="rounded" :text="text" :outlined="outlined" :class="className">
        <v-icon left v-if="icon !== ''">{{ icon }}</v-icon>
        {{ label }}
        <template v-slot:loader>
            <v-progress-circular :size="18" width="2" class="v-icon--left" indeterminate/>
            {{ label }}
        </template>
    </v-btn>
</template>

<script>
    export default {
        name: 'ButtonAction',
        props: {
            type: {
                type   : String,
                default: 'button'
            },
            icon : {
                type   : String,
                default: ''
            },
            label: {
                type   : String,
                default: 'BUTTON'
            },
            color: {
                type   : String,
                default: 'primary'
            },
            loading: {
                type   : Boolean,
                default: false
            },
            disabled: {
                type   : Boolean,
                default: false
            },
            small: {
                type   : Boolean,
                default: false
            },
            large: {
                type   : Boolean,
                default: false
            },
            block: {
                type   : Boolean,
                default: false
            },
            rounded: {
                type   : Boolean,
                default: false
            },
            text: {
                type   : Boolean,
                default: false
            },
            outlined: {
                type   : Boolean,
                default: false
            },
            className: {
                type   : String,
                default: ''
            }
        },
        components: {},
        data() {
            return {}
        },
        computed: {},
        methods : {
            click() {
                this.$emit('click');
            }
        }
    }
</script>

<style scoped>

</style>
