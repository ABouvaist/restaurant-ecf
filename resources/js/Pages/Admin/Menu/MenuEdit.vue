<script setup>
import {Link, useForm} from "@inertiajs/vue3";
import InputText from "@/Components/Inputs/InputText.vue";
import ActionButtons from "@/Components/Admin/ActionButtons.vue";
import AddButton from "@/Components/Admin/AddButton.vue";

const props = defineProps({
    menu: {
        type: Object,
        required: true
    }
})

const form = useForm({
    title: props.menu.title,
})

const submit = () => {
    form.put(route('menus.update', props.menu.id))
}

const deleteMenu = () => {
    form.delete(route('menus.destroy', props.menu.id))
}
</script>

<template>
    <div class="m-6 rounded-lg shadow-md">
        <div class="my-6">
            <InputText v-model="form.title" name="Titre" :error="form.errors.title"/>
        </div>

        <div class="flex flex-col space-y-4">
            <ActionButtons :disabled="form.processing" @submit="submit" @delete="deleteMenu"/>
        </div>
    </div>

    <div class="overflow-scroll rounded-lg border border-gray-200 shadow-md m-5">
        <table class="w-full border-collapse bg-platinum text-left text-sm text-charcoal">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nom</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Description</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Prix</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-50" v-for="formula in menu.menu_formulas" :key="formula.id">
                <td class="px-6 py-4 text-sm font-medium text-gray-700">{{formula.name}}</td>
                <td class="px-6 py-4 text-sm font-medium text-gray-700">{{formula.description}}</td>
                <td class="px-6 py-4 text-sm font-medium text-gray-700">{{formula.price}}</td>
                <td class="px-6 py-4">
                    <Link :href="route('formulas.edit', formula.id)">modifier</Link>
                </td>
            </tr>

            </tbody>
        </table>
    </div>

    <AddButton :href="route('formulas.create', {menu: props.menu.id})">Ajouter une formule</AddButton>

</template>

