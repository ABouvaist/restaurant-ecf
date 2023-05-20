<script setup>
import {useForm} from "@inertiajs/vue3";
import InputText from "@/Components/Inputs/InputText.vue";
import SubmitButton from "@/Components/Admin/SubmitButton.vue";


const form = useForm({
    title: '',
})

const submit = () => {
    form.post(route('menus.store'))
}

</script>

<template>
    <div class="m-6 rounded-lg shadow-md">
        <div class="my-6">
            <InputText v-model="form.title" name="Titre" :error="form.errors.title"/>
        </div>

        <div class="flex flex-col space-y-4">
            <SubmitButton :disabled="form.processing" @click="submit" >Ajouter</SubmitButton>
        </div>
    </div>

</template>

