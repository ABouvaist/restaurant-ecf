<template>
    <div class="m-6 bg-white p-3 rounded" >
        <div class="mb-6">
            <InputNumber v-model="form.max_guests" name="Convives max. : " :error="form.errors.max_guests" required/>
        </div>
        <div class="mb-6">
            <SubmitButton :processing="form.processing" @click="submit">Enregistrer</SubmitButton>
        </div>
    </div>
</template>

<script setup>
import {useForm, usePage} from "@inertiajs/vue3";
import InputNumber from "@/Components/Inputs/InputNumber.vue";
import SubmitButton from "@/Components/Admin/SubmitButton.vue";


const page = usePage();

const form = useForm({
    max_guests: page.props.auth.user.max_guests,
})

const submit = () => {
    form.put(route('admin.updateMaxGuests'))
}

</script>


<style scoped>

</style>
