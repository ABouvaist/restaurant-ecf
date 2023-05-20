<template>
    <form @submit.prevent="submit" class="m-6 bg-white p-3 rounded" >
        <div class="mb-6">
            <InputText v-model="form.first_name" name="Prénom" :error="form.errors.first_name" required :disabled="isLogged"/>
        </div>
        <div class="mb-6">
            <InputText v-model="form.last_name" name="Nom" :error="form.errors.last_name" required :disabled="isLogged"/>
        </div>
        <div class="mb-6">
            <InputText v-model="form.email" name="Email" :error="form.errors.email" required :disabled="isLogged"/>
        </div>
        <div class="mb-6">
            <InputText v-model="allergiesList" name="Allergies" :error="form.errors.allergies"/>
        </div>
        <div class="mb-6">
            <InputNumber v-model="form.number_of_guests" name="Nombre d'invités" :error="form.errors.number_of_guests" required/>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="date">
                Date
            </label>

            <input
                type="date"
                lang="fr"
                id="date"
                v-model="form.day"
                class="border rounded p-2 w-full"
                :required="true"
            >

            <div v-if="form.errors.day" v-text="form.errors.day" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="time">
                Heure
            </label>

            <input
                type="time"
                lang="fr"
                id="time"
                v-model="form.time"
                pattern="\d{2}-\d{2}-\d{4}"
                class="border rounded p-2 w-full"
                :required="true"
            >

            <div v-if="form.errors.time" v-text="form.errors.time" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing">Réserver</button>
            <div v-if="$page.props.errors.noRoom" v-text="$page.props.errors.noRoom" class="text-red-500 text-xs mt-1"></div>
        </div>
    </form>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import InputText from "@/Components/Inputs/InputText.vue";
import InputNumber from "@/Components/Inputs/InputNumber.vue";
import {computed} from "vue";

const props = defineProps({
    user: {
        type: Object,
        required: true,
        default: null
    },
})

const formatDate = (date) => {
    //Format date to YYYY-MM-DD
    return date.toISOString().split('T')[0];
}

const form = useForm({
    first_name: props.user?.first_name ?? '',
    last_name: props.user?.last_name ?? '',
    email: props.user?.email ?? '',
    allergies: props.user?.settings?.allergies ?? [],
    number_of_guests: props.user?.settings?.number_of_guests ?? 1,
    day: formatDate(new Date()),
    time: '',
});

const submit = () => {
    form.clearErrors();
    form.post(route('booking.store'));
}

const allergiesList = computed({
    get() {
        return form.allergies.join(', ');
    },
    set(value) {
        form.allergies = value.replaceAll(" ", "").split(',');
    }
})

const isLogged = computed(() => {
    return props.user !== null;
})



</script>

<style scoped>

</style>
