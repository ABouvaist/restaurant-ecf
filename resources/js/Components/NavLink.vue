<template>
    <Link :href="href" :class="{ 'font-bold underline': active }" class="text-3xl text-moonstone hover:underline"><slot></slot></Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    href: {
        type: String,
        required: true
    },
    active: {
        type: Boolean,
        required: true
    }
});
</script>

<style scoped>

</style>
