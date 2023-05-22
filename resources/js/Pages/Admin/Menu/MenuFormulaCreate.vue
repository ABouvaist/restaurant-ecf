<script setup>

import InputSelect from "@/Components/Inputs/InputSelect.vue";
import InputText from "@/Components/Inputs/InputText.vue";
import InputNumber from "@/Components/Inputs/InputNumber.vue";
import {useForm} from "@inertiajs/vue3";
import SubmitButton from "@/Components/Admin/SubmitButton.vue";

const props = defineProps({
    menus: {
        type: Array,
        required: true
    }
})

const form = useForm({
    name: '',
    description: '',
    price: '',
    restaurant_menu_id: route().params.menu,
})

const submit = () => {
    form.post(route('formulas.store'))
}
</script>

<template>
    <div class="m-6 mt-12 bg-white rounded p-10 lg:w-1/3 lg:mx-auto">
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
            <SubmitButton :disabled="form.processing" @click="submit" >Ajouter</SubmitButton>
        </div>
    </div>
</template>

<style scoped>

</style>
