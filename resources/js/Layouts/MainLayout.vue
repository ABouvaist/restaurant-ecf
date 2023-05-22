<template>
    <main class="w-screen min-h-screen bg-platinum">
        <Nav/>

        <slot />
    </main>
</template>

<script setup>
import Nav from "@/Components/Nav.vue";
</script>

<style scoped>
main {
    font-family: 'Nunito', sans-serif;
    height: 100%;
    padding-bottom: 10px;
}
</style>
