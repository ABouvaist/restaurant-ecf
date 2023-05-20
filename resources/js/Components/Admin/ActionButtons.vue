<template>
    <SubmitButton :disabled="disabled" @click="$emit('submit')">Enregistrer</SubmitButton>
    <DeleteButton :disabled="disabled" @delete="$emit('delete')">Supprimer</DeleteButton>
</template>
<script setup>
import SubmitButton from "@/Components/Admin/SubmitButton.vue";
import DeleteButton from "@/Components/Admin/DeleteButton.vue";

defineProps({
    disabled: {
        type: Boolean,
        default: false
    }
})

defineEmits(['submit', 'delete']);
</script>
