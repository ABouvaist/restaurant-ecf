<template>
    <div class="relative overflow-hidden w-screen lg:grid lg:grid-cols-3 lg:gap-4 lg:p-4">
        <GalleryImage v-for="image in images" :key="image.id"  :image="image" />
    </div>
</template>

<script setup>
import GalleryImage from "@/Components/GalleryImage.vue";

const props = defineProps(['images'])
</script>

<style scoped>

</style>
