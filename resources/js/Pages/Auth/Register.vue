<template>
    <form @submit.prevent="submit" class="m-6 bg-white p-3 rounded" >
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="first_name">Prénom</label>
            <input type="text" id="first_name" v-model="form.first_name" class="border rounded p-2 w-full" required>
            <div v-if="form.errors.first_name" v-text="form.errors.first_name" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="last_name">Nom</label>
            <input type="text" id="last_name" v-model="form.last_name" class="border rounded p-2 w-full" required>
            <div v-if="form.errors.last_name" v-text="form.errors.last_name" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
            <input type="email" id="email" v-model="form.email" class="border rounded p-2 w-full" required>
            <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Mot de passe</label>
            <input type="password" id="password" v-model="form.password"  class="border rounded p-2 w-full">
            <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password_confirmation">Confirmez le mot de passe</label>
            <input type="password" id="password_confirmation" v-model="form.password_confirmation"  class="border rounded p-2 w-full">
            <div v-if="form.errors.password_confirmation" v-text="form.errors.password_confirmation" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing">Créer le compte</button>
        </div>
    </form>
    <Link :href="route('login')" class="m-6 text-moonstone underline">Déjà un compte ?</Link>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import {Link} from "@inertiajs/vue3";

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
