<template>
    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="disabled">
        <slot></slot>
    </button>
</template>
<script setup>
defineProps({
    disabled: {
        type: Boolean,
        default: false
    }
})
</script>
