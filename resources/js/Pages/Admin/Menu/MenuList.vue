<script setup>
import {Link} from "@inertiajs/vue3";
import AddButton from "@/Components/Admin/AddButton.vue";
const props = defineProps({
    menus: {
        type: Array,
        required: true
    }
});

</script>

<template>
    <div class="overflow-scroll rounded-lg border bg-powder-blue border-gray-200 shadow-md m-5">
        <h2 class="w-full text-center my-3">Menus</h2>
        <table class="w-full border-collapse bg-platinum text-left text-sm text-charcoal">
            <thead class="font-bold">
            <tr>
                <th scope="col" class="px-6 py-4 text-gray-900">Nom</th>
                <th scope="col" class="px-6 py-4 text-gray-900">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-50" v-for="menu in menus" :key="menu.id">
                <td class="px-6 py-4 text-sm font-medium text-gray-700">{{menu.title}}</td>
                <td class="px-6 py-4">
                    <Link :href="route('menus.edit', menu.id)">modifier</Link>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
    <AddButton :href="route('menus.create')">Ajouter un menu</AddButton>

</template>

<style scoped>

</style>
