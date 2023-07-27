<script setup>
import { router } from "@inertiajs/vue3";
import { Link, Head } from "@inertiajs/vue3";
import Menubar from "primevue/menubar";
import Button from "primevue/button";
import Sidebar from "primevue/sidebar";
import PanelMenu from "primevue/panelmenu";
import Menu from "primevue/menu";
import Avatar from "primevue/avatar";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavOptions from "../SubComponents/NavOptions.vue";

const logout = () => {
    router.post(route("logout"));
};
</script>

<template>
    <div class="bg-[#0F172A] h-16 pl md:pl-72 fixed top-0 right-0 w-full z-40">
        <div
            class="h-full w-full flex justify-between md:justify-end items-center px-4"
        >
            <div class="card block md:hidden">
                <Sidebar class="bg-white" v-model:visible="visible">
                    <div
                        class="w-full h-full py-4 overflow-y-auto bg-white px-3 flex flex-col gap-10"
                    >
                        <NavOptions isMobile="true" />
                    </div>
                </Sidebar>
                <Button icon="pi pi-align-left" @click="visible = true" />
            </div>

            <Avatar
                label="P"
                class="mr-2 cursor-pointer hover:scale-105"
                size="large"
                shape="circle"
                @click="toggleMenu"
            />

            <div
                class="card flex justify-content-center absolute -bottom-48 right-2"
                v-if="showMenu"
            >
                <Menu :model="items">
                    <template #start>
                        <button
                            @click="profileClick"
                            class="w-full p-link flex gap-3 items-center text-color hover:surface-200 border-noround"
                        >
                            <Avatar
                                image="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
                                class="ml-2"
                                shape="circle"
                            />
                            <div class="flex flex-col">
                                <!-- <span class="font-bold uppercase">{{
                                    user.name
                                }}</span> -->
                                <span class="font-bold uppercase">{{
                                    $page.props.auth.user.name
                                }}</span>

                                <span class="text-sm">Agent</span>
                            </div>
                        </button>
                    </template>
                    <template #end>
                        <form @submit.prevent="logout">
                            <button
                                class="w-full flex items-center p-2 pl-7 text-color hover:surface-200 border-noround"
                            >
                                <i class="pi pi-sign-out" />
                                <span class="ml-2">Cerrar Session</span>
                            </button>
                        </form>
                    </template>
                </Menu>
            </div>
            <!-- <Avatar
                :image="avatar"
                class="ml-auto cursor-pointer"
                @click="toggleMenu"
            >
                <template #menu>
                    <ul
                        class="p-2 bg-white shadow-lg rounded"
                        v-show="showMenu"
                        @click="toggleMenu"
                    >
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Sign out</a></li>
                    </ul>
                </template>
            </Avatar> -->
        </div>
    </div>
</template>

<script>
import { ref } from "vue";

const visible = ref(false);

const items = ref([
    { separator: true },
    { label: "Profile", icon: "pi pi-fw pi-user" },
    { label: "Settings", icon: "pi pi-fw pi-cog" },
    { separator: true },
]);

export default {
    props: {
        userName: String,
    },
    components: {
        Menubar,
        Menu,
        Button,
        Sidebar,
        PanelMenu,
        Avatar,
        NavOptions,
        NavOptions,
    },
    data() {
        return {
            showMenu: false,
        };
    },

    methods: {
        // const avatar = ref(
        //     "https://www.primefaces.org/wp-content/uploads/2020/05/placeholder.png"
        // );

        // const showMenu = ref(false);

        toggleMenu() {
            this.showMenu = !this.showMenu;
            console.log("OK");
        },
    },
};
</script>
