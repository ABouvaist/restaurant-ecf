<template>
    <div class="m-6 bg-white p-10 lg:w-1/3 lg:mx-auto rounded" >
        <div class="mb-6">
            <InputText v-model="form.first_name" name="Prénom :" :error="form.errors.first_name" required/>
        </div>
        <div class="mb-6">
            <InputText v-model="form.last_name" name="Nom :" :error="form.errors.last_name" required/>
        </div>
        <div class="mb-6">
            <InputText v-model="form.email" name="E-Mail :" :error="form.errors.email" required/>
        </div>
        <div class="mb-6">
            <InputText v-model="form.password" name="Mot de passe :" :error="form.errors.password" required/>
        </div>
        <div class="mb-6">
            <InputText v-model="form.password_confirmation" name="Confirmez le mot de passe :" :error="form.errors.password_confirmation" required/>
        </div>
        <div class="mb-6">
            <SubmitButton :disabled="form.processing" @click="submit">Créer le compte</SubmitButton>
        </div>

        <Link :href="route('login')" class="text-moonstone underline">Déjà un compte ?</Link>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import {Link} from "@inertiajs/vue3";
import InputText from "@/Components/Inputs/InputText.vue";
import SubmitButton from "@/Components/Admin/SubmitButton.vue";

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
}
</script>
