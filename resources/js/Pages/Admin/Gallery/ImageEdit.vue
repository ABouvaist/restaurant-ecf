<template>
    <div class="m-6 mt-12 bg-white rounded p-10 lg:w-1/3 lg:mx-auto">
        <div class="flex flex-col items-center">
            <h1 class="text-xl mb-6">{{ image.title }}</h1>
            <img :src="`/${image.url}`" :alt="image.title">

            <div class="my-6">
                <InputText v-model="form.title" name="Titre" :error="form.errors.title"/>
            </div>

            <div class="space-y-4">
                <ActionButtons :disabled="form.processing" @submit="submit" @delete="deleteImage"/>
            </div>
        </div>
    </div>

</template>

<script setup>
import {useForm, router} from "@inertiajs/vue3";
import InputText from "@/Components/Inputs/InputText.vue";
import ActionButtons from "@/Components/Admin/ActionButtons.vue";

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
