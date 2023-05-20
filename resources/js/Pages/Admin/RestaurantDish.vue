<template>
    <div class="m-6 rounded-lg shadow-md">
        <div class="flex flex-col items-center">
            <div class="my-6">
                <InputText v-model="form.name" name="Nom" :error="form.errors.name"/>
            </div>


            <div class="flex flex-col space-y-4">
                <ActionButtons :disabled="form.processing" @submit="submit" @delete="deleteCarte"/>
            </div>
        </div>
    </div>

    <div class="overflow-scroll rounded-lg border border-gray-200 shadow-md m-5">
        <h2 class="w-full text-center my-3">Plats</h2>
        <table v-if="carte.dishes.length > 0" class="w-full border-collapse bg-platinum text-left text-sm text-charcoal">
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
        <div v-else>
            Il n'y a pas de plats dans cette carte
        </div>
    </div>

    <AddButton :href="route('cartes.dishes.create', carte.id)">Ajouter un plat</AddButton>
</template>

<script setup>
import {Link, useForm} from "@inertiajs/vue3";
import InputText from "@/Components/Inputs/InputText.vue";
import AddButton from "@/Components/Admin/AddButton.vue";
import ActionButtons from "@/Components/Admin/ActionButtons.vue";

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

const deleteCarte = () => {
    if (props.carte.shown) {
        alert('Vous ne pouvez pas supprimer la carte active, activez une autre carte avant de supprimer celle-ci')
        return
    }

    form.delete(route('cartes.destroy', props.carte.id))
}
</script>

<style scoped>

</style>
