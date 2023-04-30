<template>
    <header class="sticky bg-melon top-0 z-50 shadow-xl">
        <div class="flex p-3 h-24 z-50 items-center justify-between">
            <AppLogo/>
            <span v-if="user" class="text-charcoal">{{user.first_name}}</span>
            <div class="h-8 aspect-square" @click="menu = !menu">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
            </div>
        </div>


        <div v-show="menu" class="absolute right-0 h-[calc(100vh-6rem)] bg-platinum flex flex-col justify-between items-center w-full">
            <nav>
                <ul class="space-y-12 pt-12">
                    <li>
                        <NavLink @click="menu = !menu" :active="$page.component === 'HomePage'" :href="route('home')">Accueil</NavLink>
                    </li>
                    <li>
                        <NavLink @click="menu = !menu" :active="$page.component === 'MenusPage'" :href="route('menus')">Menus</NavLink>
                    </li>
                    <li>
                        <NavLink @click="menu = !menu" :active="$page.component === 'DishesPage'" :href="route('dishes')">Carte</NavLink>
                    </li>
                    <li>
                        <NavLink @click="menu = !menu" :active="$page.component === 'BookingPage'" :href="route('booking')">Réserver</NavLink>
                    </li>
                    <li v-if="!user">
                        <NavLink @click="menu = !menu" :active="$page.component === 'Auth/Login'" :href="route('login')">Connexion</NavLink>
                    </li>
                    <li v-else>
                        <NavLink @click="menu = !menu" :active="false" :href="route('logout')" method="post" as="button">Déconnexion</NavLink>
                    </li>
                </ul>
            </nav>

            <OpeningHours></OpeningHours>

        </div>
    </header>

</template>

<script>
import AppLogo from '@/Components/AppLogo.vue';
import NavLink from "@/Components/NavLink.vue";
import OpeningHours from "@/Components/OpeningHours.vue";

export default {
    components: {
        OpeningHours,
        AppLogo,
        NavLink
    },

    data() {
        return {
            menu: false,
        }
    },

    computed: {
        user() {
            return this.$page.props.auth.user;
        },
    },
}
</script>

<style scoped>

</style>
