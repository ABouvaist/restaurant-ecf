<template>
    <form name="upload" @submit.prevent="submit" class="flex flex-col space-y-4">
        <label for="title">Titre de l'image :</label>
        <input id="title" type="text" v-model="form.title">
        <span v-if="form.errors.title" class="text-red-600">{{ form.errors.title }}</span>
        <label for="image">Image :</label>
        <input id="image" type="file" accept="image/*" @input="form.image = $event.target.files[0]">
        <span v-if="form.errors.image" class="text-red-600">{{ form.errors.image }}</span>
        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
            {{ form.progress.percentage }}%
        </progress>
        <button type="submit" class="px-6 py-2 font-bold text-white bg-green-500 rounded">Envoyer</button>
    </form>
</template>

<script setup>

import {useForm} from "@inertiajs/vue3";

const form = useForm({
    title: '',
    image: null,
})

const submit = () => {
    form.post(route('gallery.upload'), {
        onError: (error) => {
            console.log(error)
        },
    });
}

function foo(e) {
    console.log(e)
}
</script>

<style scoped>

</style>
