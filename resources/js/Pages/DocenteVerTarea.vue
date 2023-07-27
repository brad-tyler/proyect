<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Button from "primevue/button";
import Dialog from "primevue/dialog";
import Textarea from "primevue/textarea";
import HeaderCard from "../SubComponents/HeaderCard.vue";
import CustomTable from "../SubComponents/CustomTable.vue";
import DataComponent from "../Components/DataComponent.vue";
import { Head, Link } from '@inertiajs/vue3';
import InputText from "primevue/inputtext";



const props = defineProps({
    columns: Object,
    columnsAcciones: Object,
    sortField: String,
    sortOrder: Number,
    dataKey: String,
    globalFilterFields: Object,
});

// console.log(props)

</script>

<template>
    <AppLayout title="Dashboard">
        <div>
            <HeaderCard title="Tarea N°" subtitle="Proyectos de Software II" />
            <div class="bg-white min-h-full overflow-hidden shadow-xl sm:rounded-lg p-4 flex flex-col border gap-8">
                <h2 class="py-2 text-3xl text-center font-bold text-gray-800">
                    Control de Lectura SCRUM
                </h2>

                <div class="flex justify-between gap-4">
                    <!--Buscador-->
                    <div class="card flex flex-wrap justify-content-center gap-4">


                        <span class="p-input-icon-left">
                            <i class="pi pi-search" />
                            <InputText v-model="value1" type="text" placeholder="Nombre del Estudiante" autofocus />
                        </span>
                    </div>
                </div>
                <!--Tabla-->
                <div class="card">
                    <DataComponent :mprops="props" urlget="docente-ver-tarea/json">
                    </DataComponent>
                    <!-- <Dialog v-model:visible="visible" modal header="PDF" class="dialog-custom ">
                        <div class="flex gap-3 p-3 flex-col sm:flex-row w-full ">
                            <div class="w-full sm:w-1/2">
                                <iframe id="iframepdf" src="sample.pdf" class="min-h-[60vh] h-full w-full"
                                    zoom="200"></iframe>
                            </div>
                            <div class="w-full sm:w-1/2">
                                <form>
                                    <div class="flex flex-col gap-10">
                                        <div class="flex flex-col gap-5">
                                            <div class="flex flex-col gap-2">
                                                <h2 class="text-[#64748B]">Monografia de Software</h2>
                                                <h2 class="text-[#212B36] text-2xl font-bold">Juan Callata Mamani</h2>
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <h3 class="text-[#1C2434] font-semibold">Observaciones</h3>
                                                <Textarea v-model="value" rows="5" cols="30" />
                                            </div>

                                        </div>
                                        <div class="flex flex-col gap-2">
                                            <label for="notas" class="text-[#1C2434] font-semibold">Notas</label>
                                            <InputText id="notas" v-model="value" aria-describedby="notas" class=""
                                                placeholder="0 - 20" />
                                            <small id="notas">Ingrese la nota del estudiante.</small>
                                        </div>
                                        <div class="flex justify-center">
                                            <Button label="Calificar" icon="pi pi-check" class="w-full" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </Dialog> -->
                </div>

                <!-- <Button label="Check" icon="pi pi-check" /> -->
            </div>
        </div>
    </AppLayout>
</template>
<style>
.dialog-custom {
    width: 50vw;
}

@media (max-width: 1000px) {

    .dialog-custom {
        width: 90vw;
    }
}


@media screen and (max-width: 900px) {

    .dialog-custom {
        width: 96vw;
    }
}
</style>

<script>
import { ref } from "vue";
// import CustomTable from "../SubComponents/CustomTable.vue";

const visible = ref(false);

export default {
    components: {
        Button,
        // DataTable,
        HeaderCard,
    },
    // data() {
    //     return {
    //         count: 0,
    //         customers: [
    //             {
    //                 name_est: "John Doe",
    //                 attemps: 1,
    //                 results: "Aprovado",
    //                 note: 18,
    //             },
    //             {
    //                 name_est: "Alice Brown",
    //                 attemps: 2,
    //                 results: "Aprovado",
    //                 note: 15,
    //             },
    //             {
    //                 name_est: "John Doe",
    //                 attemps: 3,
    //                 results: "Desaprovado",
    //                 note: 10,
    //             },

    //             {
    //                 name_est: "Alice Brown",
    //                 attemps: 3,
    //                 results: "Desaprovado",
    //                 note: 6,
    //             },

    //             {
    //                 name_est: "Mary Smith",
    //                 attemps: 2,
    //                 results: "Aprovado",
    //                 note: 14,
    //             },

    //             {
    //                 name_est: "David Lee",
    //                 attemps: 1,
    //                 results: "Aprovado",
    //                 note: 18,
    //             },

    //             {
    //                 name_est: "Juan Perez",
    //                 attemps: 2,
    //                 results: "Aprovado",
    //                 note: 15,
    //             },

    //             {
    //                 name_est: "Yury Huaquilla",
    //                 attemps: 1,
    //                 results: "Aprovado",
    //                 note: 20,
    //             },

    //             {
    //                 name_est: "la liloju",
    //                 attemps: 10,
    //                 results: "Desaprovado",
    //                 note: 4,
    //             },

    //             {
    //                 name_est: "Yuki Nakamura",
    //                 attemps: 1,
    //                 results: "Aprovado",
    //                 note: 17,
    //             },

    //             {
    //                 name_est: "Maria Rodriguez",
    //                 attemps: 2,
    //                 results: "Desaprovado",
    //                 note: 14,
    //             },

    //             {
    //                 name_est: "Lena Svensson",
    //                 attemps: 2,
    //                 results: "Desaprovado",
    //                 note: 10,
    //             },
    //         ],
    //     };
    // },

};
</script>
