<script setup>
import PanelMenu from "primevue/panelmenu";
import PanelMenuItem from "primevue/panelmenu";
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <Link
        v-if="is(item.role) || can(item.permission)"
        v-bind:href="`${item.slug}`"
        class="flex items-center py-3 px-4 text-gray-900 rounded-md dark:text-white hover:bg-white/10 dark:hover:bg-gray-700 gap-4 group"
    >
        <svg
            aria-hidden="true"
            class="w-6 h-6 text-gray-900 md:text-gray-400 transition duration-75 group-hover:text-white"
            fill="currentColor"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 576 512"
        >
            <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <path v-bind:d="`${item.svgPath}`" />
        </svg>
        <div class="group">
            <span
                class="text-gray-900 md:text-gray-300 text-sm font-bold hover:text-white group-hover:text-white capitalize"
                >{{ item.name }}</span
            >
        </div>
    </Link>
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            require: true,
        },
    },
};
</script>
