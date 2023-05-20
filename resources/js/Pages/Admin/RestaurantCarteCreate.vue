<template>
    <div class="overflow-scroll rounded-lg border border-gray-200 shadow-md m-5">
        <div class="my-6">
            <InputText v-model="form.name" name="Nom de la carte :" :error="form.errors.name" />
        </div>

        <SubmitButton :disabled="form.processing" @click="submit">Créer</SubmitButton>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import InputText from "@/Components/Inputs/InputText.vue";
import SubmitButton from "@/Components/Admin/SubmitButton.vue";

const form = useForm({
    name: '',
})

const submit = () => {
    form.post(route('cartes.store'));
}
</script>

<style scoped>

</style>
