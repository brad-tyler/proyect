<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import Dialog from "primevue/dialog";
import HeaderCard from "../SubComponents/HeaderCard.vue";
</script>

<template>
    <AppLayout title="Dashboard">
        
        <div>
            <HeaderCard title="Agregar Escuela" />
            <div
                class="bg-white min-h-full overflow-hidden shadow-xl sm:rounded-lg p-4 flex flex-col border gap-8 pt-10"
            >
                <!-- aqui -->
                <h:form>
                    <h2 class="pb-5 font-semibold text-xl">Agregar Escuela</h2>
                    <div class="flex flex-wrap gap-10">
                        <div class="w-full border shadow-lg">
                            <h2 class="uppercase pl-5 pt-5 border">Datos del Escuela Profesional</h2>
                            <div class="w-full px-3 pt-5 mb-6 md:mb-0">
                                <div class="flex-auto">
                                    <span class="p-float-label">
                                        <InputText class="w-full" id="username" v-model="value" />
                                        <label for="username">Facultad a la que pertenece</label>
                                    </span>
                                </div>
                            </div>
                            <div class="w-full px-3 py-5 mb-6 md:mb-0">
                                <div class="flex-auto">
                                    <span class="p-float-label">
                                        <InputText class="w-full" id="username" v-model="value" />
                
                                        <label for="username">Nombre de la escuela profesional</label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col items-center py-10">
                            <Button label="Agregar" severity="success" type="submit" />
                        </div>
                    </div>
                </h:form>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { ref } from "vue";
import HeaderCard from "../SubComponents/HeaderCard.vue";

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
                    facultad: "Ingenieria",
                    escuelapro: "Ingenieria de Sistemas",
                },
                {
                    facultad: "Ingenieria",
                    escuelapro: "Ingenieria Civil",
                },
                {
                    facultad: "Ingenieria",

                    escuelapro: "Estadistica",
                },

                {
                    facultad: "Ingenieria",

                    escuelapro: "Fisico Matematico",

                },

                {
                    facultad: "Ciencias de la salud",

                    escuelapro: "Medicina",

                },

                {
                    facultad: "Ciencias de la salud",

                    escuelapro: "Enfermeria",
                },

                {
                    facultad: "Ciencias de la salud",

                    escuelapro: "Odontologia",

                },

                {
                    facultad: "Sociales",

                    escuelapro: "Administracion",
                },

                {
                    facultad: "Sociales",

                    escuelapro: "Ciencias de la Comunicacion",

                },

                {
                    facultad: "Sociales",

                    escuelapro: "Psicologia",
                },

                {
                    facultad: "Sociales",

                    escuelapro: "Educacion",
                },

                {
                    facultad: "Sociales",

                    escuelapro: "Otro",
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