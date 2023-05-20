<script setup>
import {useForm} from "@inertiajs/vue3";
import SubmitButton from "@/Components/Admin/SubmitButton.vue";

const props = defineProps({
    hours: {
        type: Object,
        required: true
    }
})

const form = useForm({
    monday: props.hours.monday,
    tuesday: props.hours.tuesday,
    wednesday: props.hours.wednesday,
    thursday: props.hours.thursday,
    friday: props.hours.friday,
    saturday: props.hours.saturday,
    sunday: props.hours.sunday,
})

const submit = () => {
    console.log("submit")
    form.put(route('hours.update', 1))
}

const daysInFrench = {
    monday: "Lundi",
    tuesday: "Mardi",
    wednesday: "Mercredi",
    thursday: "Jeudi",
    friday: "Vendredi",
    saturday: "Samedi",
    sunday: "Dimanche",
}

const start = (interval) => {
    return interval.replaceAll(" ", "").split("-")[0]
}

const end = (interval) => {
    return interval.replaceAll(" ", "").split("-")[1]
}

const setStart = (day, interval, start) => {
    console.log(day, interval, start)
    form[day][interval] = start + " - " + end(form[day][interval])
}

const setEnd = (day, interval, end) => {
    form[day][interval] = start(form[day][interval]) + " - " + end
}

const addInterval = (day) => {
    form[day].push("00:00 - 00:00")
}

const removeInterval = (day, index) => {
    form[day].splice(index, 1)
}

</script>

<template>
    <div class="overflow-scroll rounded-lg border border-gray-200 shadow-md m-5">
        <h2 class="w-full text-center my-3">Horaires d'ouverture</h2>
        <table class="w-full border-collapse bg-platinum text-left text-sm text-charcoal">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Jour</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Horaires</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-50" v-for="(time, day) in hours" :key="day">
                <td class="px-6 py-4 text-sm font-medium text-gray-700">{{day}}</td>
                <td class="px-6 py-4">
                    <div v-for="interval in time">
                        {{ interval }}
                    </div>
                </td>
            </tr>

            </tbody>
        </table>
    </div>

    <div class="overflow-scroll rounded-lg border border-gray-200 shadow-md m-5">
        <h2 class="w-full text-center my-3">Modifier les horaires d'ouverture</h2>

        <div class="grid grid-cols-4 gap-4">
            <template v-for="(time, day) in form.data()" :key="`edit_${day}`">
                <label class="col-start-1 col-span-1">{{daysInFrench[day]}}</label>


                <template v-for="(interval, index) in time">
                    <input type="time" class="col-start-2 col-span-1" :value="start(interval)" @input="setStart(day, index, $event.target.value)">
                    <input type="time" class="col-span-1" :value="end(interval)" @input="setEnd(day, index, $event.target.value)">
                    <div class="col-span-1" @click="removeInterval(day, index)">
                        Supprimer
                    </div>
                </template>

                <div class="col-start-2 col-span-2" @click="addInterval(day)">
                    Ajouter un intervalle
                </div>



            </template>
        </div>


        <SubmitButton @click="submit">Sauvegarder les modifications</SubmitButton>
    </div>

</template>

<style scoped>

</style>
