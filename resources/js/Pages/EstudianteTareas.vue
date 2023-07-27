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
                Tareas
            </h2>
        </template>

        <div>
            <HeaderCard title="tareas" />
            <div
                class="bg-white min-h-full overflow-hidden shadow-xl sm:rounded-lg p-10 flex flex-col border gap-14 pb-16"
            >
                <div class="flex flex-col gap-6">
                    <div class="flex justify-between">
                        <div class="font-bold text-xl text-[#6E7491]">
                            <h3>
                                Tareas
                                <span class="text-[#605DEC]">Pendientes</span>
                            </h3>
                        </div>
                        <div>
                            <a
                                href="#"
                                class="flex items-center gap-2 text-[#A1B0CC]"
                                >Todos <i class="pi pi-arrow-right"></i
                            ></a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-6">
                        <div
                            class="flex justify-between items-center border border-[#E2E8F0] p-6 rounded-md text-[#6E7491] transition delay-75 hover:scale-[1.01] cursor-pointer"
                        >
                            <div class="flex flex-col gap-2">
                                <h2 class="font-medium">
                                    <span
                                        >Monografia de Ingenieria de Software, </span
                                    ><span class="text-[#605DEC]"
                                        >Proyectos de Software II</span
                                    >
                                </h2>
                                <div class="text-[#7C8DB0]">
                                    07/06/2023 7:00 pm
                                </div>
                            </div>
                            <div>
                                <a href="#">Subir</a>
                            </div>
                        </div>
                        <div
                            class="flex justify-between items-center border border-[#E2E8F0] p-6 rounded-md text-[#6E7491] transition delay-75 hover:scale-[1.01] cursor-pointer"
                        >
                            <div class="flex flex-col gap-2">
                                <h2 class="font-medium">
                                    <span
                                        >Monografia de Ingenieria de Software, </span
                                    ><span class="text-[#605DEC]"
                                        >Proyectos de Software II</span
                                    >
                                </h2>
                                <div class="text-[#7C8DB0]">
                                    07/06/2023 7:00 pm
                                </div>
                            </div>
                            <div>
                                <a href="#">Subir</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-6">
                    <div class="flex justify-between">
                        <div class="font-bold text-xl text-[#6E7491]">
                            <h3>
                                Tareas
                                <span class="text-[#605DEC]">Por Corregir</span>
                            </h3>
                        </div>
                        <div>
                            <a
                                href="#"
                                class="flex items-center gap-2 text-[#A1B0CC]"
                                >Todos <i class="pi pi-arrow-right"></i
                            ></a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-6">
                        <div
                            class="flex justify-between items-center border border-[#E2E8F0] p-6 rounded-md text-[#6E7491] transition delay-75 hover:scale-[1.01] cursor-pointer"
                        >
                            <div class="flex flex-col gap-2">
                                <h2 class="font-medium">
                                    <span>Informe sobre DevOps, </span
                                    ><span class="text-[#605DEC]"
                                        >Proyecto de Software II</span
                                    >
                                </h2>
                                <div class="text-[#7C8DB0]">
                                    07/06/2023 7:00 pm
                                </div>
                            </div>
                            <div>
                                <a href="#">Subir</a>
                            </div>
                        </div>
                        <div
                            class="flex justify-between items-center border border-[#E2E8F0] p-6 rounded-md text-[#6E7491] transition delay-75 hover:scale-[1.01] cursor-pointer"
                        >
                            <div class="flex flex-col gap-2">
                                <h2 class="font-medium">
                                    <span>Monografia Marketing, </span
                                    ><span class="text-[#605DEC]"
                                        >Electivo II</span
                                    >
                                </h2>
                                <div class="text-[#7C8DB0]">
                                    07/06/2023 7:00 pm
                                </div>
                            </div>
                            <div>
                                <a href="#">Subir</a>
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
// import "primeflex/primeflex.css";
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
