<template>
    <div class="m-6 p-10 bg-white lg:w-1/3 lg:mx-auto rounded" >
        <div class="mb-6">
            <InputText type="email" v-model="form.email" name="E-Mail :" :error="form.errors.email" required/>
        </div>
        <div class="mb-6">
            <InputText type="password" v-model="form.password" name="Mot de passe :" :error="form.errors.password" required/>
        </div>
        <div class="mb-6">
            <SubmitButton :disabled="form.processing" @click="submit">Se Connecter</SubmitButton>
        </div>
        <Link :href="route('register')" class="m-6 ml-0 relative text-moonstone underline ">Pas de compte ?</Link>
    </div>

</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import {Link} from "@inertiajs/vue3";
import InputText from "@/Components/Inputs/InputText.vue";
import SubmitButton from "@/Components/Admin/SubmitButton.vue";

let form = useForm({
    email: '',
    password: '',
});

let submit = () => {
    form.post(route('login'));
}
</script>
