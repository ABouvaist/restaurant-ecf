<template>
    <div class="text-2xl mb-6">La carte</div>

    <div class="sticky left-0 top-0 flex items-center pl-4 space-x-4 h-12 w-screen bg-white z-10">
        <a v-for="category in carte.uniqueCategories" :key="`${category.id}a`"
           :href="'#'+category.id">{{category.name}}</a>
    </div>

    <section v-for="category in carte.uniqueCategories" :key="category.id"
    class="px-4"
    >
        <div :id="category.id" class="flex items-center my-3">
            <h1>{{category.name}}</h1><div class="h-0 ml-3 border-t border-t-black grow"></div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div v-for="dish in carte.dishes.filter(d => d.category.id === category.id)" :key="dish.id" class="col-span-1 rounded-3xl relative aspect-square p-4 shadow">
                <h2 class="mb-3 text-lg">{{dish.title}}</h2>
                <p class="text-sm italic">{{dish.description}}</p>
                <p class="absolute bottom-0 right-0 p-5 font-semibold">{{dish.price}}€</p>
            </div>
        </div>

    </section>
</template>

<script setup>
const props = defineProps(['restaurantDishes'])

/** @type {Carte} */
let carte = props.restaurantDishes.data;

/**
 * @typedef {Object} Carte
 * @property {number} id
 * @property {boolean} shown
 * @property {Dish[]} dishes
 * @property {Category[]} uniqueCategories
 */

/**
 * @typedef {Object} Dish
 * @property {number} id
 * @property {number} restaurant_dishes_id
 * @property {number} dish_category_id
 * @property {string} title
 * @property {string} description
 * @property {number} price
 * @property {Category} category
 */

/**
 * @typedef {Object} Category
 * @property {number} id
 * @property {string} name
 */
</script>

<style scoped>

</style>
