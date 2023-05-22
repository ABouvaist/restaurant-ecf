<template>
    <nav class="pt-4 bg-platinum shadow-xl pb-4">
        <ul class="flex justify-around">
            <li v-for="tab in tabs" :key="tab.id">
                <Link :href="route(tab.route)">{{ tab.name }}</Link>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

const tabs = [
    {
        id: 'dashboard',
        name: 'Dashboard',
        route: 'admin.dashboard',
    },
    {
        id: 'cartes_index',
        name: 'Cartes',
        route: 'cartes.index',
    },
    {
        id: 'menus_index',
        name: 'Menus',
        route: 'menus.index'
    },
    {
        id: 'gallery_index',
        name: 'Gallerie',
        route: 'images.index'
    },
    {
        id: 'hours_index',
        name: 'Horaires',
        route: 'hours.index'
    }
]

</script>

<style scoped>

</style>
