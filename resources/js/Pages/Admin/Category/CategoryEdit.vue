<template>
    <div class="overflow-scroll rounded-lg border border-gray-200 shadow-md m-5">
        <div class="my-6">
            <InputText v-model="form.name" name="Nom de la catégorie :" :error="form.errors.name" />
        </div>

        <ActionButtons :disabled="form.processing" @submit="submit" @delete="deleteCategory" />
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
