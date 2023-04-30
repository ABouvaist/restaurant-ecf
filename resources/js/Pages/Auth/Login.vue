<template>
    <form @submit.prevent="submit" class="m-6 bg-white p-3 rounded" >
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
            <input type="email" id="email" v-model="form.email" class="border rounded p-2 w-full" required>
            <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
            <input type="password" id="password" v-model="form.password"  class="border rounded p-2 w-full">
            <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing">Login</button>
        </div>
    </form>
    <Link :href="route('register')" class="m-6 text-moonstone underline">Pas de compte ?</Link>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import {Link} from "@inertiajs/vue3";

let form = useForm({
    email: '',
    password: '',
});

let submit = () => {
    form.post(route('login'));
}
</script>
