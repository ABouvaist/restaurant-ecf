<template>
    <Head><title>La Carte</title></Head>
    <div class="mt-6 mx-6 p-3 rounded">
        <div v-for="restaurantMenu in restaurantMenus" class="flex flex-col items-center text-center space-y-4">
            <h1 class="text-2xl mt-6 mb-2 font-semibold">{{restaurantMenu.title}}</h1>
            <div v-for="menuFormula in restaurantMenu.menu_formulas" class="w-full border border-dashed border-black rounded-2xl p-3">
                <h2 class="text-xl">{{menuFormula.name}}</h2>
                <p class="italic text-sm">{{menuFormula.description}}</p>
                <p class="font-semibold">{{menuFormula.price}}€</p>
            </div>
        </div>
    </div>

</template>

<script setup>
import { Head } from "@inertiajs/vue3"

const props = defineProps({
    restaurantMenus: {
        type: Array,
        required: true
    }
})

/** @typedef {Object} RestaurantMenu
 * @property {number} id
 * @property {string} title
 * @property {Array<MenuFormula>} menu_formulas
 */

/** @typedef {Object} MenuFormula
 * @property {number} id
 * @property {number} restaurant_menu_id
 * @property {string} name
 * @property {string} description
 * @property {number} price
 */

</script>

<style scoped>

</style>
