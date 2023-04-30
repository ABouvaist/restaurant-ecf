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
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Allergies</label>
            <input type="email" id="allergies" v-model="form.allergies" class="border rounded p-2 w-full">
            <div v-if="form.errors.allergies" v-text="form.errors.allergies" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing">Login</button>
        </div>
    </form>
</template>

<script setup>

import {useForm, usePage} from "@inertiajs/vue3";
import {computed} from "vue";



const submit = () => {
    form.post(route('booking.store'));
}


let page = usePage();
const user = computed(() => {
    return page.props.auth.user;
});

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    allergies: '',
    guests: 1,
    day: '',
    time: '',
});

</script>

<style scoped>

</style>
