<template>
    <!-- Small success message displayed when props.flash.success exists -->
    <div v-if="$page.props.flash.success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Réservation confirmée !</strong>
        <span class="block sm:inline">{{ $page.props.flash.success }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 20 20">
                <title>Close</title>
                <path
                    d="M14.348 5.652a.5.5 0 010 .707L10.707 10l3.641 3.641a.5.5 0 11-.707.707L10 10.707l-3.641 3.641a.5.5 0 01-.707-.707L9.293
                    10 5.652 6.359a.5.5 0 01.707-.707L10 9.293l3.641-3.641a.5.5 0 01.707
                    0z"/>
            </svg>
        </span>
    </div>

    <div class="fixed bottom-0 left-1/2 mb-14 z-10">
            <Link class="absolute h-20 w-60 p-5 bg-white rounded-2xl transform -translate-x-1/2 bottom-0 m-auto border border-gray-400 uppercase text-x drop-shadow" as="button" :href="route('booking.create')" >Réserver</Link>
    </div>



    <Gallery v-if="true" :images="images"></Gallery>
</template>

<script setup>
import Gallery from "@/Components/Gallery.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps(['images'])
</script>

