<template>
    <div v-for="restaurantMenu in restaurantMenus" class="flex flex-col items-center text-center space-y-2">
        <h1 class="text-2xl">{{restaurantMenu.title}}</h1>
        <div v-for="menuFormula in restaurantMenu.menu_formulas">
            <h2 class="text-lg">{{menuFormula.name}}</h2>
            <p class="italic text-sm">{{menuFormula.description}}</p>
            <p class="font-semibold">{{menuFormula.price}}€</p>
        </div>
    </div>
</template>

<script setup>

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
