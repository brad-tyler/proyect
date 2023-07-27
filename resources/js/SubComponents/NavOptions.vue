<script setup>
import PanelMenu from "primevue/panelmenu";
import PanelMenuItem from "primevue/panelmenu";
import { Link } from "@inertiajs/vue3";

import ItemsNav from "./ItemsNav.vue";

import {
    listItemsNavAplications,
    listItemsAdmin,
    listItemsNavDashboard,
    listItemsDocente,
    listItemsEstudiante,
} from "../constants/list-items-nav";
</script>

<template>
    <div class="flex flex-col gap-8">
        <div class="flex flex-col gap-4">
            <div v-if="can('dashboard_title')" class="ml-4 leading-4">
                <h2 class="text-[#818CF8] font-bold">Dashboard</h2>
                <span class="text-[#878B95] text-xs"
                    >Customizacion de componentes
                </span>
            </div>

            <ul class="space-y-1.5 font-medium">
                <li v-for="item in listItemsNavDashboard">
                    <ItemsNav :item="item" />
                </li>
            </ul>
        </div>
        <div v-if="is('Administrador')" class="flex flex-col gap-4">
            <div v-if="can('administrador_title')" class="ml-4 leading-4">
                <h2 class="text-[#818CF8] font-bold">Administrador</h2>
                <span class="text-[#878B95] text-xs"
                    >Customizacion de componentes
                </span>
            </div>

            <ul class="space-y-1.5 font-medium">
                <li v-for="item in listItemsAdmin">
                    <ItemsNav :item="item" />
                </li>
            </ul>
        </div>
        <div v-if="is('Docente')" class="flex flex-col gap-4">
            <div v-if="can('docente_title')" class="ml-4 leading-4">
                <h2 class="text-[#818CF8] font-bold">Docente</h2>
                <span class="text-[#878B95] text-xs"
                    >Customizacion de componentes
                </span>
            </div>

            <ul class="space-y-1.5 font-medium">
                <li v-for="item in listItemsDocente">
                    <ItemsNav :item="item" />
                </li>
            </ul>
        </div>
        <div v-if="is('Estudiante')" class="flex flex-col gap-4">
            <div v-if="can('estudiante_title')" class="ml-4 leading-4">
                <h2 class="text-[#818CF8] font-bold">Estudiante</h2>
                <span class="text-[#878B95] text-xs"
                    >Customizacion de componentes
                </span>
            </div>

            <ul class="space-y-1.5 font-medium">
                <li v-for="item in listItemsEstudiante">
                    <ItemsNav :item="item" />
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        isMobile: Boolean,
    },
};
</script>
