<template>
    <div class="m-6 rounded-lg shadow-md">
        <div class="flex flex-col items-center">
            <div class="my-6">
                <InputText v-model="form.title" name="Titre" :error="form.errors.title"/>
            </div>

            <div class="my-6">
                <InputText v-model="form.description" name="Description" :error="form.errors.description"/>
            </div>

            <div class="my-6">
                <InputNumber v-model="form.price" name="Prix" :error="form.errors.price"/>
            </div>

            <div class="my-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="carte">Carte</label>
                <select v-model="form.restaurant_dish_id" name="carte" id="carte" class="border rounded p-2 w-full">
                    <option v-for="carte in cartes" :key="carte.id" :value="carte.id">{{carte.name}}</option>
                </select>
            </div>


            <div class="my-6">
                <InputSelect v-model="form.dish_category_id" :values="categories" name="Catégorie" />
            </div>




            <div class="flex flex-col space-y-4">
                <SubmitButton :disabled="form.processing" @click="submit">Enregistrer</SubmitButton>
                <button class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500" @click="">Supprimer</button>
            </div>
        </div>
    </div>
</template>

<script setup>

import {useForm} from "@inertiajs/vue3";
import InputText from "@/Components/Inputs/InputText.vue";
import InputNumber from "@/Components/Inputs/InputNumber.vue";
import SubmitButton from "@/Pages/Admin/SubmitButton.vue";
import InputSelect from "@/Components/Inputs/InputSelect.vue";

const props = defineProps({
    dish: {
        type: Object,
        required: true
    },
    categories: {
        type: Array,
        required: true
    },
    cartes: {
        type: Array,
        required: true
    }
})

const form = useForm({
    title: props.dish.title,
    description: props.dish.description,
    price: props.dish.price,
    restaurant_dish_id: props.dish.restaurant_dish_id,
    dish_category_id: props.dish.dish_category_id,
})

const submit = () => {
    form.put(route('dishes.update', props.dish.id));
}

</script>

