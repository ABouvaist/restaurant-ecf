<template>
    <div class="overflow-scroll rounded-lg border bg-powder-blue border-gray-200 shadow-md m-5">
        <h2 class="w-full text-center my-3">Gallerie d'images</h2>

        <table class="w-full border-collapse bg-platinum text-left text-sm text-charcoal">
            <thead class="font-bold">
                <tr>
                    <th scope="col" class="px-6 py-4 text-gray-900">Titre</th>
                    <th scope="col" class="px-6 py-4 text-gray-900">Visible</th>
                    <th scope="col" class="px-6 py-4 text-gray-900">Actions</th>
                    <th scope="col" class="px-6 py-4 text-gray-900">Création</th>
                    <th scope="col" class="px-6 py-4 text-gray-900">Mise a jour</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                <tr class="hover:bg-gray-50" v-for="image in images" :key="image.id">
                    <td class="px-6 py-4 text-sm font-medium text-gray-700">{{image.title}}</td>
                    <td class="px-6 py-4">
                        <Switch :value="image.shown" rounded @toggle="(shown) => update(image, shown)"/>
                    </td>
                    <td class="px-6 py-4">
                        <Link :href="route('images.edit', image.id)">modifier</Link>
                    </td>
                    <td class="px-6 py-4">{{ format(image.created_at) }}</td>
                    <td class="px-6 py-4">{{ format(image.updated_at) }}</td>
                </tr>

            </tbody>
        </table>
    </div>

    <AddButton :href="route('images.create')">Ajouter une image</AddButton>
</template>

<script setup>
import { Link, router } from "@inertiajs/vue3";
import Switch from "@/Components/Switch.vue";
import AddButton from "@/Components/Admin/AddButton.vue";

defineProps({
    images: {
        type: Array,
        required: true,
    },
})

function update(image, shown) {
    router.put(route('images.update', image.id),{
        shown: shown
    });
}

function format(date) {
    return new Date(date).toLocaleDateString("fr-FR", {
        year: "2-digit",
        month: "2-digit",
        day: "2-digit",
    });
}
</script>

<style scoped>

</style>
