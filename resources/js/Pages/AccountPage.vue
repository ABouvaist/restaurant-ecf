<script setup>
import InputText from "@/Components/Inputs/InputText.vue";
import SubmitButton from "@/Components/Admin/SubmitButton.vue";
import {useForm} from "@inertiajs/vue3";
import InputNumber from "@/Components/Inputs/InputNumber.vue";
import {computed} from "vue";

const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
    settings: {
        type: Object,
        required: true,
    },
})

const form = useForm({
    first_name: props.user.first_name,
    last_name: props.user.last_name,
    email: props.user.email,
    number_of_guests: props.settings.number_of_guests,
    allergies: props.settings.allergies,
})

const submit = () => {
    form.put(route('account.update'));
}

const allergiesList = computed({
    get() {
        return form.allergies.join(', ');
    },
    set(value) {
        form.allergies = value.replaceAll(" ", "").split(',');
    }
})
</script>

<template>
    <div class="m-6 mt-12 bg-white rounded p-10 lg:w-1/3 lg:mx-auto">
        <div class="my-6">
            <InputText v-model="form.first_name" name="Prénom :" :error="form.errors.first_name" />
        </div>
        <div class="my-6">
            <InputText v-model="form.last_name" name="Nom :" :error="form.errors.last_name" />
        </div>
        <div class="my-6">
            <InputText v-model="form.email" name="Email :" :error="form.errors.email" />
        </div>
        <div class="my-6">
            <InputNumber v-model="form.number_of_guests" name="Nombre de convives :" :error="form.errors.number_of_guests" />
        </div>
        <div class="my-6">
            <InputText v-model="allergiesList" name="Allergies :" :error="form.errors.allergies" />
        </div>

        <SubmitButton :disabled="form.processing" @click="submit">Enregistrer</SubmitButton>
    </div>
</template>

<style scoped>

</style>
