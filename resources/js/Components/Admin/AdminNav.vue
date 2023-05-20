<template>
    <nav class="pt-4">
        <ul class="flex justify-around">
            <li>
                <Link :href="route('images.index')">Gallerie</Link>
            </li>
            <li>
                <Link :href="route('cartes.index')">Carte</Link>
            </li>
            <li>
                <Link :href="route('menus.index')">Menus</Link>
            </li>
            <li>Horaires</li>
        </ul>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<style scoped>

</style>
