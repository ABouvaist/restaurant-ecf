<template>
    <div class="m-6 rounded-lg shadow-md">
        <div class="flex flex-col items-center">
            <div class="my-6">
                <InputText v-model="form.name" name="Nom" :error="form.errors.name"/>
            </div>


            <div class="flex flex-col space-y-4">
                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing" @click="submit">Enregistrer</button>
                <button class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500" @click="">Supprimer</button>
            </div>
        </div>
    </div>

    <div v-if="carte.dishes.length > 0" class="overflow-scroll rounded-lg border border-gray-200 shadow-md m-5">
        <table class="w-full border-collapse bg-platinum text-left text-sm text-charcoal">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Titre</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Description</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Prix</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-50" v-for="dish in carte.dishes" :key="dish.id">
                <td class="px-6 py-4 text-sm font-medium text-gray-700">{{dish.title}}</td>
                <td class="px-6 py-4">{{dish.description}}</td>
                <td class="px-6 py-4">{{dish.price}}</td>
                <td class="px-6 py-4">
                    <Link :href="route('dishes.edit', dish.id)">modifier</Link>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
    <div v-else>
        Il n'y a pas de plats dans cette carte
    </div>
    <Link :href="route('cartes.dishes.create', carte.id)">Ajouter un plat</Link>
</template>

<script setup>
import {Link, useForm} from "@inertiajs/vue3";
import InputText from "@/Components/Inputs/InputText.vue";

const props = defineProps({
    carte: {
        type: Object,
        required: true
    }
})

const form = useForm({
    name: props.carte.name,
})

const submit = () => {
    form.put(route('cartes.update', props.carte.id))
}
</script>

<style scoped>

</style>
