<template>
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
           :for="slug">
        {{ name }}
    </label>

    <select
        v-model="modelValue"
        :name="slug"
        :id="slug"
        class="border border-charcoal rounded p-2 w-full"
        @input="$emit('update:modelValue', parseInt($event.target.value))"
    >
        <option
            v-for="option in options"
            :key="option.key"
            :value="option.key"
        >
            {{option.name}}
        </option>
    </select>
</template>
<script setup>
import {computed} from "vue";

const props = defineProps({
    name: {
        type: String,
        required: true
    },
    modelValue: {
        type: Number,
        required: false,
        default: 0
    },
    values : {
        type: Array,
        required: true
    },
})

const options = computed(() => {
    const defaultChoice = {id: 0, name: 'Choisir...'}
    return [defaultChoice, ...props.values].map(value => {
        return {
            key: value.id,
            name: value.name ?? value.title
        }
    })
})

const slug = computed(() => {
    return props.name.toLowerCase().replace(/ /g, '-')
})
</script>
