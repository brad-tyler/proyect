<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import AutoComplete from "primevue/autocomplete";
import Calendar from "primevue/calendar";
import Password from "primevue/password";
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Cursos
            </h2>
        </template>

        <div class="h-full">
            <HeaderCard title="Cursos" />
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10 flex flex-col border gap-14 pb-16 h-full">
                <div class="flex flex-col gap-6">
                    <div class="flex justify-between">
                        <div class="font-bold text-xl text-[#6E7491]">
                            <h3>
                                Tienes
                                <span class="text-[#605DEC]">4 Cursos</span>
                                Matriculados
                            </h3>
                        </div>
                        <div>
                            <a href="#" class="flex items-center gap-2 text-[#A1B0CC]">Todos <i
                                    class="pi pi-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="flex flex-row gap-10 flex-wrap">
                        <div
                            class="flex justify-between items-center gap-8 border border-[#E2E8F0] p-6 rounded-xl text-[#6E7491] transition delay-100 hover:scale-[1.02] cursor-pointer">
                            <div class="flex flex-col gap-2">
                                <h2 class="font-medium">
                                    <span>Proyecto de Software II, </span><span class="text-[#605DEC]">X</span>
                                </h2>
                                <div class="text-[#7C8DB0]">
                                    Willian David Calsin
                                </div>
                            </div>
                            <div class="h-full">
                                <a href="#">Ver</a>
                            </div>
                        </div>
                        <div
                            class="flex justify-between items-center gap-8 border border-[#E2E8F0] p-6 rounded-xl text-[#6E7491] transition delay-100 hover:scale-[1.01] cursor-pointer">
                            <div class="flex flex-col gap-2">
                                <h2 class="font-medium">
                                    <span>Seminario de Tesis, </span><span class="text-[#605DEC]">X</span>
                                </h2>
                                <div class="text-[#7C8DB0]">
                                    Willian David Calsin
                                </div>
                            </div>
                            <div class="h-full">
                                <a href="#">Ver</a>
                            </div>
                        </div>
                        <div
                            class="flex justify-between items-center gap-8 border border-[#E2E8F0] p-6 rounded-xl text-[#6E7491] transition delay-100 hover:scale-[1.01] cursor-pointer">
                            <div class="flex flex-col gap-2">
                                <h2 class="font-medium">
                                    <span>Electivo III, </span><span class="text-[#605DEC]">X</span>
                                </h2>
                                <div class="text-[#7C8DB0]">
                                    Willian David Calsin
                                </div>
                            </div>
                            <div class="h-full">
                                <a href="#">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <CustomForm /> -->
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { ref } from "vue";
import HeaderCard from "../SubComponents/HeaderCard.vue";
import CustomForm from "../SubComponents/CustomForm.vue";

let today = new Date();
let month = today.getMonth();
let year = today.getFullYear();
let prevMonth = month === 0 ? 11 : month - 1;
let prevYear = prevMonth === 11 ? year - 1 : year;
let nextMonth = month === 11 ? 0 : month + 1;
let nextYear = nextMonth === 0 ? year + 1 : year;

const date2 = ref();

const minDate = ref(new Date());
const maxDate = ref(new Date());

minDate.value.setMonth(prevMonth);
minDate.value.setFullYear(prevYear);
maxDate.value.setMonth(nextMonth);
maxDate.value.setFullYear(nextYear);

const countries = ["Peru", "Colombia", "Ecuador", "Argentina"];

const items = ref(
    Array.from({ length: countries.length }, (_, i) => ({
        label: countries[i],
        value: i,
    }))
);
const selectedItem = ref();
const filteredItems = ref();
const searchItems = (event) => {
    let query = event.query;
    let _filteredItems = [];

    for (let i = 0; i < items.value.length; i++) {
        let item = items.value[i];

        if (item.label.toLowerCase().indexOf(query.toLowerCase()) === 0) {
            _filteredItems.push(item);
        }
    }

    filteredItems.value = _filteredItems;
};
</script>
