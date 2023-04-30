<template>
    <table>
        <tr v-for="(hours, day) in openingHours">
            <td>{{ day }}</td>
            <td v-for="hour in hours">{{ hour }}</td>
        </tr>
    </table>
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
