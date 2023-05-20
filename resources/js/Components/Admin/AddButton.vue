<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    href: {
        type: String,
        required: true
    }
})
</script>

<template>
    <Link
        class="m-5 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
        as="button"
        :href="href"
    >
        <slot/>
    </Link>

</template>

<style scoped>

</style>
