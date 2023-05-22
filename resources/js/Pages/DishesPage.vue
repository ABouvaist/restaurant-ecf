<template>
    <div class="sticky left-0 top-24 flex items-center justify-around px-4 space-x-4 h-12 w-screen bg-white z-10
                lg:w-32 lg:fixed lg:top-40 lg:left-5 lg:h-96 lg:space-x-0 lg:overflow-x-hidden lg:px-2 lg:bg-powder-blue lg:rounded-lg lg:flex-col lg:justify-around">
        <a v-for="category in carte.uniqueCategories" :key="`${category.id}a`"
           :href="'#'+category.id"
            class="lg:pt-1.5 lg:pr-2 lg:pb-1.5 lg:pl-4 lg:block"
        >{{category.name}}</a>
    </div>
    <div class="space-y-6 pb-6">
        <section v-for="category in carte.uniqueCategories" :key="category.id"
                 class="px-4 lg:pl-40 my-6"
        >
            <div :id="category.id" class="flex items-center my-4 pt-36 -mt-36">
                <h1>{{category.name}}</h1><div class="h-0 ml-3 border-t border-t-black grow"></div>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-6 gap-4">
                <div v-for="dish in carte.dishes.filter(d => d.category.id === category.id)" :key="dish.id" class="col-span-1 bg-white rounded-3xl relative aspect-square p-4 shadow">
                    <h2 class="mb-3 text-lg">{{dish.title}}</h2>
                    <p class="text-sm italic">{{dish.description}}</p>
                    <p class="absolute bottom-0 right-0 p-5 font-semibold">{{dish.price}}€</p>
                </div>
            </div>

        </section>
    </div>
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
 * @property {number} restaurant_carte_id
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
