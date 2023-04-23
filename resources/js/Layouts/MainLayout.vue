<template>
    <main class="container min-h-screen bg-platinum">
        <Nav/>

        <slot />
    </main>
</template>

<script setup>
import Nav from "@/Components/Nav.vue";
</script>

<style scoped>

</style>
