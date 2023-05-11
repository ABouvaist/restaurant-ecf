<template>
    <form name="upload" @submit.prevent="submit" class="flex flex-col space-y-4">
        <InputText v-model="form.title" name="Titre de l'image" :error="form.errors.title" />
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
import InputText from "@/Components/Inputs/InputText.vue";

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
