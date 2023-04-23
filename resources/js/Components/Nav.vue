<template>
    <header class="sticky bg-melon top-0 z-20 shadow-xl">
        <div class="flex p-3 h-24 items-center justify-between">
            <AppLogo/>
            <span class="text-charcoal">{{user.first_name}}</span>
            <div class="h-8 aspect-square" @click="menu = !menu">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
            </div>
        </div>


        <nav v-show="menu" class="absolute right-0 h-screen bg-platinum flex flex-col items-center w-full z-50">
            <ul class="space-y-12 pt-12">
                <li>
                    <NavLink :active="$page.component === 'HomePage'" :href="route('home')">Accueil</NavLink>
                </li>
                <li>
                    <NavLink :active="$page.component === 'MenusPage'" :href="route('menus')">Menus</NavLink>
                </li>
                <li>
                    <NavLink :active="$page.component === 'DishesPage'" :href="route('dishes')">Carte</NavLink>
                </li>
                <li>
                    <NavLink :active="$page.component === 'Auth/Login'" :href="route('login')">Connexion</NavLink>
                </li>
            </ul>
        </nav>
    </header>

</template>

<script setup>
import AppLogo from '@/Components/AppLogo.vue';
import NavLink from "@/Components/NavLink.vue";
import {computed, watch} from "vue";
import {usePage} from "@inertiajs/vue3";
import {ref} from "vue";


let menu = ref(false);

const page = usePage();
const user = computed(() => page.props.auth.user)


watch(
    () => usePage().url,
    (url) => {
        menu.value = false;
    }
)


</script>

<style scoped>

</style>
