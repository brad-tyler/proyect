<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="w-full min-h-screen flex justify-center items-center gap-20  px-4 sm:px-0 overflow-x-hidden">
        
        <div class="w-full bg-cover relative max-w-md lg:max-w-2xl lg:w-4/12 hidden lg:block">
            <div class="flex flex-col items-center justify-center w-full h-full relative lg:pr-1">
                <Link :href="'/'">
                    <img class="w-64" src="/logo_unap.png" alt="" />
                </Link>
            </div>
        </div>

        <div class="flex flex-col gap-6 bg-white p-10 shadow-lg rounded-xl relative ">
            <slot />
        </div>
    </div>
</template>
