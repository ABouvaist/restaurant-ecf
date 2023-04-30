<template>
    <div class="m-6 rounded-lg shadow-md">
        <div class="flex flex-col items-center">
            <h1 class="text-xl mb-6">{{ image.title }}</h1>
            <img :src="image.url" alt="image.title">

            <div class="my-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">Titre</label>
                <input type="text" id="title" v-model="form.title"  class="border rounded p-2 w-full">
                <div v-if="form.errors.title" v-text="form.errors.title" class="text-red-500 text-xs mt-1"></div>
            </div>

            <div class="flex flex-col space-y-4">
                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing" @click="submit">Enregistrer</button>
                <button class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500" @click="deleteImage">Supprimer</button>
            </div>
        </div>
    </div>

</template>

<script setup>
import {useForm, router} from "@inertiajs/vue3";

const props = defineProps({
    image: {
        type: Object,
        required: true,
    },
})

const form = useForm({
    title: props.image.title,
})

function deleteImage() {
    router.delete(route('images.destroy', props.image.id));
}

const submit = () => {
    form.put(route('images.update', props.image.id));
}




</script>

<style scoped>

</style>
