<template>
    <div class="relative">
        <img :src="image.url" :alt="image.title" class="object-cover">
        <div class="absolute flex items-end justify-around bottom-0 w-full text-center capitalize h-1/3 text-white gradient">
            <span class="mb-6">{{image.title}}</span>
        </div>
    </div>
</template>

<script setup>
/** @typedef {Object} image
 * @property {string} title
 * @property {string} url
 */


defineProps({
    image: {
        type: Object,
        required: true
    }
})
</script>

<style scoped>
.gradient {
    background: rgb(0,0,0);
    background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0.7579364509475666) 55%, rgba(0,0,0,0) 100%);
}
</style>
