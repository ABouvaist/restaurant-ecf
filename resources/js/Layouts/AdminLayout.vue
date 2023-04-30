<template>
    <main class="container min-h-screen bg-platinum">
        <Nav/>
        <AdminNav/>

        <slot />
    </main>
</template>

<script setup>
import Nav from "@/Components/Nav.vue";
import AdminNav from "@/Components/Admin/AdminNav.vue"
</script>

<style scoped>

</style>
