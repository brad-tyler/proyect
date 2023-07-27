<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Button from "primevue/button";
import Dialog from "primevue/dialog";
import HeaderCard from "../SubComponents/HeaderCard.vue";
</script>

<template>
    <AppLayout title="Dashboard">
        <div>
            <HeaderCard title="Ver Estudiantes" />
            <div
                class="bg-white min-h-full overflow-hidden shadow-xl sm:rounded-lg p-4 flex flex-col border gap-8"
            >
                <h2 class="py-2 text-3xl text-center font-bold text-gray-800">
                    Lista de Estudiantes
                </h2>

                <div class="flex justify-end gap-3">
                    <Button
                        icon="pi pi-file-pdf"
                        severity="danger"
                        outlined
                        @click="visible = true"
                    />
                    <Button
                        icon="pi pi-file-excel"
                        severity="success"
                        outlined
                    />
                    <Button icon="pi pi-code" outlined />

                    <Dialog
                        v-model:visible="visible"
                        modal
                        header="Header"
                        :style="{ width: '50vw' }"
                    >
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate velit esse cillum dolore
                            eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia
                            deserunt mollit anim id est laborum.
                        </p>
                    </Dialog>
                </div>
                <div class="card">
                    <DataTable
                        :value="customers"
                        paginator
                        :rows="7"
                        :rowsPerPageOptions="[5, 10, 20, 50]"
                        tableStyle="min-width: 50rem"
                    >
                        <Column
                            field="nombre"
                            header="Nombre"
                            style="width: 25%"
                            sortable
                        ></Column>
                        <Column
                            field="escuelapro"
                            header="Escuela Profesional"
                            style="width: 25%"
                            sortable
                        ></Column>
                        <Column
                            field="codigo"
                            header="Codigo"
                            style="width: 25%"
                            sortable
                        ></Column>
                        <Column
                            field="semestre"
                            header="Semestre"
                            style="width: 25%"
                            sortable
                        ></Column>
                    </DataTable>
                </div>

                <!-- <Button label="Check" icon="pi pi-check" /> -->
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { ref } from "vue";
import HeaderCard from "../SubComponents/HeaderCard.vue";

const visible = ref(false);

export default {
    components: {
        Button,
    },
    data() {
        return {
            count: 0,
            customers: [
                {
                    nombre: "John Doe",
                    escuelapro: "Ingenieria de Sistemas",
                    codigo: "152453",
                    semestre: "Decimo",
                },
                {
                    nombre: "Alice Brown",
                    escuelapro: "Ingenieria de Sistemas",
                    codigo: "153463",
                    semestre: "Quinto",
                },
                {
                    nombre: "John Doe",

                    escuelapro: "Ingenieria de Sistemas",

                    codigo: "152554",

                    semestre: "Noveno",
                },

                {
                    nombre: "Alice Brown",

                    escuelapro: "Ingenieria de Sistemas",

                    codigo: "153564",

                    semestre: "Decimo",
                },

                {
                    nombre: "Mary Smith",

                    escuelapro: "Administracion",

                    codigo: "165453",

                    semestre: "Decimo",
                },

                {
                    nombre: "David Lee",

                    escuelapro: "Administracion",

                    codigo: "175423",

                    semestre: "Octavo",
                },

                {
                    nombre: "Juan Perez",

                    escuelapro: "Administracion",

                    codigo: "172853",

                    semestre: "Tercero",
                },

                {
                    nombre: "Mohammed Ali",

                    escuelapro: "Administracion",

                    codigo: "186453",

                    semestre: "Primero",
                },

                {
                    nombre: "Hans Schmidt",

                    escuelapro: "Ingenieria Civil",

                    codigo: "182453",

                    semestre: "Segundo",
                },

                {
                    nombre: "Yuki Nakamura",

                    escuelapro:  "Ingenieria Civil" ,

                    codigo: "186453",

                    semestre: "Quinto" ,
                },

                {
                    nombre: "Maria Rodriguez",

                    escuelapro: "Ingenieria Civil",

                    codigo: "182863",

                    semestre: "Tercero",
                },

                {
                    nombre: "Lena Svensson",

                    escuelapro:  "Ingenieria Civil",

                    codigo: "188453",

                    semestre: "Primero",
                },
            ],
        };
    },
    components: {
        DataTable,
        HeaderCard,
    },
};
</script>