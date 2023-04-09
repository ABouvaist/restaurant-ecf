<template>
    <nav>
        <ul>
            <li>
                <Link :href="route('home')">Home</Link>
            </li>
            <li>
                <Link :href="route('menus')">Menus</Link>
            </li>
            <li>
                <Link :href="route('dishes')">Dishes</Link>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>

</style>
