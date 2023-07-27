<script setup>
import { Head, Link, router } from "@inertiajs/vue3";

import Banner from "@/Components/Banner.vue";

import NabvarDashboard from "../ComponentsDashboard/NabvarDashboard.vue";
import SidebarDashboard from "../ComponentsDashboard/SidebarDashboard.vue";
</script>

<template>
    <div>
        <Head :title="title" />

        <!-- <Banner /> -->

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 rounded-0">
            <NabvarDashboard userName="{{ userName }}" />
            <SidebarDashboard />
            <main class="pl-0 md:pl-72 pt-20 bg-white min-h-screen flex">
                <div class="p-3 flex-1">
                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>

<script type="text/javascript">
export default {
    props: {
        userName: String,
    },
};
</script>
