<script setup>
import InputText from "@/Components/Inputs/InputText.vue";
import InputNumber from "@/Components/Inputs/InputNumber.vue";
import {useForm} from "@inertiajs/vue3";
import InputSelect from "@/Components/Inputs/InputSelect.vue";
import ActionButtons from "@/Components/Admin/ActionButtons.vue";

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

const submit = () => {
    form.put(route('formulas.update', props.formula.id))
}

const deleteFormula = () => {
    form.delete(route('formulas.destroy', props.formula.id))
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
            <ActionButtons :disabled="form.processing" @submit="submit" @delete="deleteFormula"/>
        </div>
    </div>
</template>

<style scoped>

</style>
