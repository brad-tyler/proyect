<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '../Components/Dropdown.vue';
import DropdownLink from '../Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>
<template>
    <div class="flex mt-12" :class="{ toggle: showSidebar }" id="wrapper">
        <div class="sidebar shadow-md border-r bg-gray-100 border-gray-300 flex-none">
            <ul class="menu scrollbar m-0">
                <!-- simple menu -->

                <li v-for="item in menu">
                    <span class="name">
                        {{ item.title }}
                    </span>
                    <ul>
                        <li v-for="sitem in item.menu">
                            <Link :href="route(sitem.url)" class="">
                            <i :class="sitem.ico" aria-hidden="true"></i>
                            {{ sitem.name }}
                            </Link>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="content flex-1">
            <nav class="border-b border-gray-300 fixed top-0 left-0 right-0 shadow-md bg-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="px-4">
                    <div class="flex justify-between h-12">
                        <!-- Logo -->
                        <div class="flex items-center">
                            <button @click="showSidebar = !showSidebar"
                                class="mr-2 px-3 py-1 rounded-md hover:bg-gray-300"><i
                                    class="fa-solid fa-bars"></i></button>
                            <Link :href="route('dashboard')" class="flex items-center">
                            <img src="../../../assets/logo.png" /> <strong
                                class="h-auto inline-block align-middle ml-1">SisLab</strong>
                            </Link>
                        </div>

                        <div class="flex items-center">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Perfil </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Salir
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>


                    </div>
                </div>


            </nav>
            <div class="main">
                <!-- Page Heading -->
                <header class="bg-sky-100 shadow" v-if="$slots.header">
                    <div class="py-2 px-3">
                        <slot name="header" />
                    </div>
                </header>
                <slot></slot>
            </div>
        </div>
    </div>
</template>
<style>
@import '../../css/sidebar.menu.css';
</style>
<script>
export default {
    data() {
        return {
            showSidebar: false,
            menu: [
                {
                    'title': 'REGISTRO',
                    'menu': [
                        { 'url': 'registro', 'base': 'registro', 'name': 'Solicitudes', 'ico': 'fa-solid fa-inbox', 'menu': [] },
                        { 'url': 'muestra', 'base': 'muestra', 'name': 'Muestras', 'ico': 'fa-solid fa-list-check', 'menu': [] },
                        { 'url': 'laboratorio', 'base': 'laboratorio', 'name': 'Estudios', 'ico': 'fa-solid fa-microscope', 'menu': [] },
                    ]
                },
                /* {
                     'title': 'REPORTES',
                     'menu': [
                         { 'url': 'cursos', 'base': 'curso', 'name': 'Patología quirúrgica', 'ico': 'fa-regular fa-file-excel', 'menu': [] },
                         { 'url': 'cursos', 'base': 'curso', 'name': 'Citopatología', 'ico': 'fa-regular fa-file-excel', 'menu': [] },
                     ]
                 },*/
                {
                    'title': 'ADMINISTRACIÓN',
                    'menu': [
                        { 'url': 'User.index', 'base': 'usuario', 'name': 'Usuarios Internos', 'ico': 'fa-solid fa-users', 'menu': [] },
                        /*  { 'url': 'externo', 'base': 'externo', 'name': 'Usuarios Externos', 'ico': 'fa-solid fa-users-between-lines', 'menu': [] },
                          { 'url': 'tarifa', 'base': 'tarifa', 'name': 'Tarifas', 'ico': 'fa-regular fa-money-bill-1', 'menu': [] },
                          { 'url': 'especimen', 'base': 'especimen', 'name': 'Especimen', 'ico': 'fa-solid fa-vial', 'menu': [] },
                          { 'url': 'estudio', 'base': 'estudio', 'name': 'Estudios', 'ico': 'fa-solid fa-table-cells', 'menu': [] },
                          { 'url': 'procedimiento', 'base': 'procedimiento', 'name': 'Procedimiento', 'ico': 'fa-solid fa-list-check', 'menu': [] },
                          { 'url': 'plantilla', 'base': 'plantilla', 'name': 'Plantillas', 'ico': 'fa-solid fa-list-check', 'menu': [] },*/
                    ]
                },
            ]
        }
    }
}
</script>