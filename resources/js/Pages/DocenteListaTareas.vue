<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Button from "primevue/button";
import Dialog from "primevue/dialog";
import HeaderCard from "../SubComponents/HeaderCard.vue";

import Calendar from "primevue/calendar";
import InputText from "primevue/inputtext";
import FileUpload from "primevue/fileupload";
import { ref } from "vue";

const value1 = ref(null);
</script>

<template>
    <AppLayout title="Dashboard">
        <div>
            <HeaderCard title="Docente" subtitle="Bienvenido, aqui puedes ver, listar y crear nuevas tareas" />
            <div class="bg-white min-h-full overflow-hidden shadow-xl sm:rounded-lg p-4 flex flex-col border gap-8">
                <h2 class="py-2 text-3xl text-center font-bold text-gray-800">
                    Lista de Tareas Creadas
                </h2>

                <div class="flex justify-between flex-row-reverse gap-4">
                    <div class="card flex flex-wrap justify-content-center gap-4">
                        <span class="p-input-icon-left">
                            <i class="pi pi-search" />
                            <InputText v-model="value1" type="text" placeholder="Buscar Tarea" autofocus />
                        </span>
                    </div>
                    <div>
                        <Button label="Nueva Tarea" icon="pi pi-plus" @click="formulario = true" outline />

                        <Dialog v-model:visible="formulario" header="Crear Nueva Tarea" :style="{
                            width: '60vw',
                            background: 'white',
                        }">
                            <form class="flex gap-5">
                                <div class="flex flex-col w-1/2 gap-4">
                                    <div class="flex-1">
                                        <label class="font-bold block mb-2 text-sm">
                                            Nombre de Tarea:
                                        </label>
                                        <span class="p-input-icon-right w-full">
                                            <i class="pi pi-spin pi-pencil" />
                                            <InputText v-model="value2" class="w-full" />
                                        </span>
                                    </div>
                                    <div class="flex gap-2 w-full">
                                        <div class="w-1/2">
                                            <label class="font-bold block mb-2 text-sm">
                                                Calificación Maxima:
                                            </label>
                                            <span class="p-input-icon-right w-full">
                                                <i class="pi pi-user-edit" />
                                                <InputText v-model="value2" class="w-full" />
                                            </span>
                                        </div>
                                        <div class="w-1/2">
                                            <label class="font-bold block mb-2 text-sm">
                                                Numero de Intentos:
                                            </label>
                                            <span class="p-input-icon-right w-full">
                                                <i class="pi pi-sort-numeric-up-alt" />
                                                <InputText v-model="value2" class="w-full" />
                                            </span>
                                        </div>
                                    </div>

                                    <div class="flex gap-2 w-full">
                                        <div class="flex-1/2">
                                            <label class="font-bold block mb-2 text-sm">
                                                Fecha de Inicio:
                                            </label>
                                            <Calendar id="calendar-12h" v-model="datetime12h" showIcon showTime hourFormat="12" />
                                        </div>
                                        <div class="flex-1/2">
                                            <label class="font-bold block mb-2 text-sm">
                                                Fecha de Vencimiento:
                                            </label>
                                            <Calendar id="calendar-12h" v-model="datetime12h" showIcon showTime hourFormat="12" />
                                        </div>
                                    </div>

                                    <div class="flex-1">
                                        <label class="font-bold block mb-2 text-sm">
                                            Descripcion:
                                        </label>
                                        <Textarea v-model="value" rows="5" cols="30"
                                            class="w-full rounded-md border border-black/20" />
                                    </div>
                                </div>

                                <div class="w-1/2 flex flex-col gap-4">
                                    <div>
                                        <label class="font-bold block mb-2 text-sm">
                                            Seleccionar Archivo:
                                        </label>
                                        <FileUpload name="" url="./upload.php" @upload="onAdvancedUpload($event)"
                                            :multiple="true" accept="application/pdf" :maxFileSize="10000000"
                                            chooseLabel="Subir" class="bg-red-500" :style="{
                                                background: '#0079FF',
                                            }">
                                            <template #empty>
                                                <p>
                                                    Carga un Documento PDF,
                                                    Word, excel o JPG; menor a
                                                    20MB
                                                </p>
                                            </template>
                                        </FileUpload>
                                    </div>
                                    <div class="flex justify-end gap-4">
                                        <Button size="small" severity="help" outlined label="Cancelar" />
                                        <Button size="small" label="Guardar" />
                                    </div>
                                </div>
                            </form>
                        </Dialog>

                    </div>
                    <!-- <div>
                        <Button icon="pi pi-file-pdf" severity="danger" outlined @click="visible = true" />
                        <Button icon="pi pi-file-excel" severity="success" outlined />
                        <Button icon="pi pi-code" outlined />

                        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50vw' }">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum
                                dolore eu fugiat nulla pariatur. Excepteur sint
                                occaecat cupidatat non proident, sunt in culpa
                                qui officia deserunt mollit anim id est laborum.
                            </p>
                        </Dialog>
                    </div> -->
                </div>
                <div class="card">
                    <DataTable :value="customers" paginator :rows="7" :rowsPerPageOptions="[5, 10, 20, 50]"
                        tableStyle="min-width: 50rem">
                        <Column field="name_task" header="Nombre Tareas" style="width: 20%" sortable></Column>
                        <Column field="description" header="Descripcion" style="width: 20%" sortable></Column>
                        <Column field="date_v" header="Fecha de Vencimiento" style="width: 25%" sortable></Column>
                        <Column field="state" header="Estado" style="width: 15%" sortable></Column>
                        <Column field="buttons" header="Acciones" style="width: 25%" sortable>
                            <template #body="slotProps">
                                <div class="flex gap-3">

                                    <Button icon="pi pi-eye" outlined rounded value="primary"
                                        @click="confirmDeleteProduct(slotProps.data)" />
                                    <Button icon="pi pi-trash" outlined rounded severity="danger"
                                        @click="confirmDeleteProduct(slotProps.data)" />
                                    <Button icon="pi pi-download" outlined rounded severity="info"
                                        @click="confirmDeleteProduct(slotProps.data)" />
                                </div>
                            </template>
                        </Column>
                    </DataTable>
                </div>

                <!-- <Button label="Check" icon="pi pi-check" /> -->
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { ref } from "vue";
import Calendars from './Calendars.vue';

const visible = ref(false);
const formulario = ref(false);

export default {
    components: {
        Button,
    },
    data() {
        return {
            count: 0,
            customers: [
                {
                    name_task: "Control de lectura SCRUM",
                    description: "Leer la guia de SCRUM",
                    date_v: "06/07/2023",
                    state: "Activo",

                },
                {
                    name_task: "Revision de Avance",
                    description: "Revision de repositorios-unap...",
                    date_v: "04/07/2023",
                    state: "Vencido",
                },
                {
                    name_task: "Desarrollo de pruebas Unitarias",
                    description: "Utilizar TDD en sus proyectos",
                    date_v: "18/05/2023",
                    state: "Vencido",
                },
            ],
        };
    },
    components: {
        DataTable,
        HeaderCard,
        Calendars,
    },
};
</script>
