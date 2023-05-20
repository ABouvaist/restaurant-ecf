<script setup>
import InputText from "@/Components/Inputs/InputText.vue";
import SubmitButton from "@/Components/Admin/SubmitButton.vue";
import InputNumber from "@/Components/Inputs/InputNumber.vue";
import {useForm} from "@inertiajs/vue3";
import InputSelect from "@/Components/Inputs/InputSelect.vue";

const props = defineProps({
    formula: {
        type: Object,
        required: true
    },
    menus: {
        type: Array,
        required: true
    }
})

const form = useForm({
    name: props.formula.name,
    description: props.formula.description,
    price: props.formula.price,
    restaurant_menu_id: props.formula.restaurant_menu_id,
})
</script>

<template>
    <div class="m-6 rounded-lg shadow-md">
        <div class="my-6">
            <InputText v-model="form.name" name="Titre" :error="form.errors.name"/>
        </div>

        <div class="my-6">
            <InputText v-model="form.description" name="Description" :error="form.errors.description"/>
        </div>

        <div class="my-6">
            <InputNumber v-model="form.price" name="Prix" :error="form.errors.price"/>
        </div>

        <div class="my-6">
            <InputSelect v-model="form.restaurant_menu_id" :values="menus" name="Menu" />
        </div>

        <div class="flex flex-col space-y-4">
            <SubmitButton :disabled="form.processing" @click="submit">Enregistrer</SubmitButton>
            <button class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500" @click="">Supprimer</button>
        </div>
    </div>
</template>

<style scoped>

</style>
