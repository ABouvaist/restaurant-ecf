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
                <InputSelect v-model="form.restaurant_carte_id" :values="cartes" name="Carte" />
            </div>


            <div class="my-6">
                <InputSelect v-model="form.dish_category_id" :values="categories" name="Catégorie" />
            </div>




            <div class="flex flex-col space-y-4">
                <ActionButtons :disabled="form.processing" @click="submit" @delete="deleteDish"/>
            </div>
        </div>
    </div>
</template>

<script setup>

import {useForm} from "@inertiajs/vue3";
import InputText from "@/Components/Inputs/InputText.vue";
import InputNumber from "@/Components/Inputs/InputNumber.vue";
import InputSelect from "@/Components/Inputs/InputSelect.vue";
import ActionButtons from "@/Components/Admin/ActionButtons.vue";

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
    restaurant_carte_id: props.dish.restaurant_carte_id,
    dish_category_id: props.dish.dish_category_id,
})

const submit = () => {
    form.put(route('dishes.update', props.dish.id));
}

const deleteDish = () => {
    form.delete(route('dishes.destroy', props.dish.id));
}

</script>

