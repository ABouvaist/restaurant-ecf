<template>
    <div class="m-6 mt-12 bg-white rounded p-10 lg:w-1/3 lg:mx-auto">
        <div class="my-6">
            <InputText v-model="form.name" name="Nom de la catégorie :" :error="form.errors.name" />
        </div>

        <div class="space-y-4">
            <ActionButtons :disabled="form.processing" @submit="submit" @delete="deleteCategory" />
        </div>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import InputText from "@/Components/Inputs/InputText.vue";
import ActionButtons from "@/Components/Admin/ActionButtons.vue";

const props = defineProps({
    category: {
        type: Object,
        required: true,
    }
})

const form = useForm({
    name: props.category.name,
})

const submit = () => {
    form.put(route('categories.update', props.category.id));
}

const deleteCategory = () => {
    form.delete(route('categories.destroy', props.category.id));
}
</script>

<style scoped>

</style>
