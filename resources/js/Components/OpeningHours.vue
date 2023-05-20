<template>
    <div class="overflow-y-visible rounded-lg border border-gray-200 shadow-md m-5">
        <h2 class="w-full text-center my-3">Horaires d'ouverture</h2>
        <table class="w-full border-collapse bg-platinum text-left text-sm text-charcoal">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Jour</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Horaires</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-50" v-for="(time, day) in openingHours" :key="day">
                <td class="px-6 py-4 text-sm font-medium text-gray-700">{{day}}</td>
                <td class="px-6 py-4" v-if="time.length > 0">
                    <div v-for="interval in time">
                        {{ interval }}
                    </div>
                </td>
                <td class="px-6 py-4" v-else>
                    Fermé
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</template>

<script setup>
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";

let page = usePage();

const openingHours = computed(() => {
    return page.props.opening_hours.data.days;
});

</script>

<style scoped>

</style>
