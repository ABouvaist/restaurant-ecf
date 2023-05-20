<template>
    <button @click="confirmDelete"
            class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500"
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

const emit = defineEmits(['delete'])

const confirmDelete = () => {
    if (confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')) {
        emit('delete');
    }
}
</script>
