<template>
    <button type="submit"
            class="w-full bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
            :class="{'opacity-50 cursor-not-allowed': disabled}"
            :disabled="disabled"
    >
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
