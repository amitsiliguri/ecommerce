<template>
    <form @submit.prevent="$emit('submitted')">
        <div class="shadow overflow-hidden rounded-md">
            <div class="p-4 bg-white">
                <slot name="form"></slot>
            </div>
            <div class="flex items-center justify-end p-4 bg-gray-50 text-right" v-if="hasActions">
                <slot name="actions"></slot>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        computed: {
            hasActions() {
                return !! this.$slots.actions
            }
        }
    }
</script>
