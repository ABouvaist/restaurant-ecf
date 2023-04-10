<template>
    <header>
        <div class="flex p-3 h-24 items-center justify-between">
            <AppLogo/>

            <div class="h-8 aspect-square" @click="menu = !menu">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
            </div>
        </div>


        <nav v-show="menu" class="absolute right-0 h-full shadow-2xl bg-white rounded-3xl flex flex-col items-center w-1/2 z-20">
            <ul class="space-y-6 pt-6">
                <li>
                    <Link :href="route('home')">Accueil</Link>
                </li>
                <li>
                    <Link :href="route('menus')">Menus</Link>
                </li>
                <li>
                    <Link :href="route('dishes')">Carte</Link>
                </li>
            </ul>
        </nav>
    </header>

</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import AppLogo from '@/Components/AppLogo.vue';
import {ref} from "vue";
let menu = ref(false);
</script>

<style scoped>

</style>
