<template>
    <div class="absolute flex items-center justify-center bottom-20 left-1/2 h-0 w-0">
        <div class="h-10 bg-white p-6">
            <button>Réserver</button>
        </div>
    </div>

    <div class="fixed bottom-0 left-1/2 mb-14 z-10">
        <button class="absolute h-20 w-60 p-5 bg-white rounded-2xl transform -translate-x-1/2 bottom-0 m-auto border border-gray-400 uppercase text-x drop-shadow">Réserver</button>
    </div>



    <Gallery v-if="true" :images="images"></Gallery>
</template>

<script setup>
import Gallery from "@/Components/Gallery.vue";

const props = defineProps(['images'])
</script>

