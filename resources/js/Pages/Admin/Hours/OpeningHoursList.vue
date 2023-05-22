<script setup>
import {useForm} from "@inertiajs/vue3";
import SubmitButton from "@/Components/Admin/SubmitButton.vue";
import OpeningHours from "@/Components/OpeningHours.vue";

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
    <OpeningHours></OpeningHours>

    <div class="m-6 mt-12 bg-white rounded p-10 lg:w-2/3 lg:mx-auto flex flex-col items-center gap-4">
        <h2 class="w-full text-center my-3">Modifier les horaires d'ouverture</h2>

        <div class="grid grid-cols-5 gap-4 rounded p-6 even:bg-platinum justify-items-center items-center odd:bg-powder-blue" v-for="(time, day) in form.data()" :key="`edit_${day}`" >
              <label class="col-start-1 col-span-1">{{daysInFrench[day]}}</label>


                <template v-for="(interval, index) in time">
                    <input type="time" class="col-start-2 col-span-1 w-full" :value="start(interval)" @input="setStart(day, index, $event.target.value)">
                    -
                    <input type="time" class="col-span-1 w-full" :value="end(interval)" @input="setEnd(day, index, $event.target.value)">
                    <div class="col-span-1 cursor-pointer text-moonstone" @click="removeInterval(day, index)">
                        Supprimer
                    </div>
                </template>

                <div class="col-start-2 col-span-2 cursor-pointer text-moonstone" @click="addInterval(day)">
                    Ajouter un intervalle
                </div>
        </div>


        <SubmitButton class="mt-6 w-2/3 m-auto" @click="submit">Sauvegarder les modifications</SubmitButton>
    </div>

</template>

<style scoped>

</style>
