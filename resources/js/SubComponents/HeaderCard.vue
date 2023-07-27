<template>
    <div
        class="w-full mb-5 relative bg-[#EBF3FE] rounded-md border p-6 flex justify-between flex-row-reverse overflow-hidden">
        <img class="w-20 h-auto" src="/logo_unap.png" />
        <img class="absolute -bottom-10 right-36 w-28" src="/header_img.png" />
        <div class="rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
            <div class="text-[#2A3547] font-bold text-4xl leading-tight capitalize">
                {{ title }}
            </div>
            <div class="text-[#2A3547] text-base">
                {{ subtitle }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
    },
};
</script>
