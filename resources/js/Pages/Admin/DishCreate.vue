<template>
    <div class="m-6 mt-12 bg-white rounded p-10 lg:w-1/3 lg:mx-auto">
        <div class="my-6">
            <InputText v-model="form.title" name="Nom du plat :" :error="form.errors.title" />
        </div>
        <div class="my-6">
            <InputText v-model="form.description" name="Description :" :error="form.errors.description" />
        </div>
        <div class="my-6">
            <InputNumber v-model="form.price" name="Prix :" :error="form.errors.price" />
        </div>
        <div class="my-6">
            <InputSelect :values="categories" v-model="form.category_id" allow-other name="Catégorie"/>
        </div>
        <SubmitButton :disabled="form.processing" @click="submit">Ajouter</SubmitButton>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import InputText from "@/Components/Inputs/InputText.vue";
import InputNumber from "@/Components/Inputs/InputNumber.vue";
import InputSelect from "@/Components/Inputs/InputSelect.vue";
import SubmitButton from "@/Components/Admin/SubmitButton.vue";

const props = defineProps({
    categories: {
        type: Array,
        required: true
    },
    carte: {
        type: Object,
        required: false
    },
})

const form = useForm({
    title: '',
    description: '',
    price: 0,
    category_id: 0,
})

const submit = () => {
    form.post(route('cartes.dishes.store', props.carte.id));
}
</script>

<style scoped>

</style>
