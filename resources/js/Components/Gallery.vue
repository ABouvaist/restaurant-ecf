<template>
    <div class="relative overflow-hidden w-screen">
        <GalleryImage v-for="image in images" :key="image.id"  :image="image" />
    </div>
</template>

<script setup>
import GalleryImage from "@/Components/GalleryImage.vue";

const props = defineProps(['images'])
</script>

<style scoped>

</style>
