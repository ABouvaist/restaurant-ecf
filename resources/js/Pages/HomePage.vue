<template>
    <div class="container">
        <h1>Home</h1>
    </div>

    <file-upload></file-upload>

    <div v-for="image in images" :key="image.id">
        <img :src="image.url" alt="">
    </div>

</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import FileUpload from "@/Components/FileUpload.vue";

const props = defineProps(['images'])
</script>

