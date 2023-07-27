<script setup>
import PanelMenu from "primevue/panelmenu";
import PanelMenuItem from "primevue/panelmenu";
import { Link } from "@inertiajs/vue3";
import NavOptions from "../SubComponents/NavOptions.vue";
</script>

<template>
    <div
        class="w-72 bg-[#4B4D5A] h-screen fixed top-0 left-0 hidden md:block border-r-[1px] border-gray-700 text-white overflow-auto z-50"
    >
        <div
            class="w-full h-full py-4 overflow-y-auto bg-[#0F172A] px-3 flex flex-col gap-10"
        >
            <div class="flex justify-between items-center mt-3 px-3">
                <img class="w-8" src="/logo_unap.png" alt="" />
                <div
                    class="relative cursor-pointer hover:bg-white/10 p-2 rounded-full"
                >
                    <svg
                        aria-hidden="true"
                        class="w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"
                    >
                        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M224 0c-17.7 0-32 14.3-32 32V49.9C119.5 61.4 64 124.2 64 200v33.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V200c0-75.8-55.5-138.6-128-150.1V32c0-17.7-14.3-32-32-32zm0 96h8c57.4 0 104 46.6 104 104v33.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V200c0-57.4 46.6-104 104-104h8zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z"
                        />
                    </svg>

                    <span
                        class="bg-green-500 w-5 p-1 text-white text-center font-bold text-[0.5rem] absolute top-1 right-0 rounded-full"
                    >
                        2
                    </span>
                </div>
            </div>
            <NavOptions isMobile="false" />
        </div>
    </div>
</template>

<script>
import { ref } from "vue";

const expandedKeys = ref({});
const items = ref([
    {
        key: "3",
        label: "Inicio",
        icon: "pi pi-fw pi-home",
        slug: "/",
    },
    {
        key: "0",
        label: "File",
        icon: "pi pi-fw pi-file",
        items: [
            {
                key: "0_0",
                label: "New",
                icon: "pi pi-fw pi-plus",
                items: [
                    {
                        key: "0_0_0",
                        label: "Bookmark",
                        icon: "pi pi-fw pi-bookmark",
                    },
                    {
                        key: "0_0_1",
                        label: "Video",
                        icon: "pi pi-fw pi-video",
                    },
                ],
            },
            {
                key: "0_1",
                label: "Delete",
                icon: "pi pi-fw pi-trash",
            },
            {
                key: "0_2",
                label: "Export",
                icon: "pi pi-fw pi-external-link",
            },
        ],
    },
    {
        key: "1",
        label: "Edit",
        icon: "pi pi-fw pi-pencil",
        items: [
            {
                key: "1_0",
                label: "Left",
                icon: "pi pi-fw pi-align-left",
            },
            {
                key: "1_1",
                label: "Right",
                icon: "pi pi-fw pi-align-right",
            },
            {
                key: "1_2",
                label: "Center",
                icon: "pi pi-fw pi-align-center",
            },
            {
                key: "1_3",
                label: "Justify",
                icon: "pi pi-fw pi-align-justify",
            },
        ],
    },
    {
        key: "2",
        label: "Users",
        icon: "pi pi-fw pi-user",
        items: [
            {
                key: "2_0",
                label: "New",
                icon: "pi pi-fw pi-user-plus",
            },
            {
                key: "2_1",
                label: "Delete",
                icon: "pi pi-fw pi-user-minus",
            },
            {
                key: "2_2",
                label: "Search",
                icon: "pi pi-fw pi-users",
                items: [
                    {
                        key: "2_2_0",
                        label: "Filter",
                        icon: "pi pi-fw pi-filter",
                        items: [
                            {
                                key: "2_2_0_0",
                                label: "Print",
                                icon: "pi pi-fw pi-print",
                            },
                        ],
                    },
                    {
                        key: "2_2_1",
                        icon: "pi pi-fw pi-bars",
                        label: "List",
                    },
                ],
            },
        ],
    },
    {
        key: "3",
        label: "Events",
        icon: "pi pi-fw pi-calendar",
    },
]);

const expandAll = () => {
    for (let node of items.value) {
        expandNode(node);
    }

    expandedKeys.value = { ...expandedKeys.value };
};

const collapseAll = () => {
    expandedKeys.value = {};
};

const expandNode = (node) => {
    if (node.items && node.items.length) {
        expandedKeys.value[node.key] = true;

        for (let child of node.items) {
            expandNode(child);
        }
    }
};

export default {
    components: {
        PanelMenu,
        PanelMenuItem,
    },
};
</script>
