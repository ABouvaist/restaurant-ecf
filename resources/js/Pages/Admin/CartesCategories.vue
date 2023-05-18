<template>
    <div class="overflow-scroll rounded-lg border border-gray-200 shadow-md m-5">
        <h2 class="w-full text-center my-3">Cartes</h2>
        <table class="w-full border-collapse bg-platinum text-left text-sm text-charcoal">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nom</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Visible</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Création</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Mise a jour</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nb. de plats</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nb. de catégories</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-50" v-for="restaurantDish in cartes" :key="restaurantDish.id">
                <td class="px-6 py-4 text-sm font-medium text-gray-700">{{restaurantDish.name}}</td>
                <td class="px-6 py-4">
                    <Switch :value="restaurantDish.shown" rounded @toggle="(shown) => update(restaurantDish, shown)"/>
                </td>
                <td class="px-6 py-4">{{ format(restaurantDish.created_at) }}</td>
                <td class="px-6 py-4">{{ format(restaurantDish.updated_at) }}</td>
                <td class="px-6 py-4">{{ restaurantDish.dishes.length }}</td>
                <td class="px-6 py-4">{{ restaurantDish.unique_categories.length }}</td>
                <td class="px-6 py-4">
                    <Link :href="route('cartes.edit', restaurantDish.id)">modifier</Link>
                </td>
            </tr>

            </tbody>
        </table>
    </div>

    <Link :href="route('cartes.create')">Ajouter une carte</Link>

    <div class="overflow-scroll rounded-lg border border-gray-200 shadow-md m-5">
        <h2 class="w-full text-center my-3">Catégories</h2>

        <table class="w-full border-collapse bg-platinum text-left text-sm text-charcoal">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nom</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-50" v-for="category in categories" :key="category.id">
                <td class="px-6 py-4 text-sm font-medium text-gray-700">{{category.name}}</td>
                <td class="px-6 py-4">
                    <Link :href="route('categories.edit', category.id)">modifier</Link>
                </td>
            </tr>

            </tbody>
        </table>
    </div>

    <Link :href="route('categories.create')">Ajouter une catégorie</Link>
</template>

<script setup>
import Switch from "@/Components/Switch.vue";
import {Link, useForm} from "@inertiajs/vue3";

defineProps({
    cartes: {
        type: Array,
        required: true
    },
    categories: {
        type: Array,
        required: true
    }
})

function format(date) {
    return new Date(date).toLocaleDateString("fr-FR", {
        year: "2-digit",
        month: "2-digit",
        day: "2-digit",
    });
}

const update = (restaurantDish, shown) => {
    const form = useForm({
        shown: shown
    })

    form.put(route('cartes.update', restaurantDish.id));
}
</script>

<style scoped>

</style>
