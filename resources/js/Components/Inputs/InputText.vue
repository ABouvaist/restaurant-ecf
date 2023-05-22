<template>
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
           :for="slug"
    >
        {{ name }}
    </label>

    <input
        :disabled="disabled"
        :type="type"
        :id="slug"
        v-model="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        class="border border-charcoal rounded p-2 w-full"
        :required="required"
    >

    <div v-if="error" v-text="error" class="text-red-500 text-xs mt-1"></div>
</template>
<script setup>

import {computed} from "vue";

const props = defineProps({
    name: {
        type: String,
        required: true
    },
    modelValue: {
        type: String,
        required: true
    },
    error: {
        type: String,
        required: false,
        default: null
    },
    required: {
        type: Boolean,
        required: false,
        default: false
    },
    disabled: {
        type: Boolean,
        required: false,
        default: false
    },
    type: {
        type: String,
        required: false,
        default: 'text'
    }
})

defineEmits(['update:modelValue']);

const slug = computed(() => {
    return props.name.toLowerCase().replace(/ /g, '-')
})

</script>
