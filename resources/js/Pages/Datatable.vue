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
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Datatable
            </h2>
        </template>

        <div>
            <HeaderCard title="datatable" />
            <div
                class="bg-white min-h-full overflow-hidden shadow-xl sm:rounded-lg p-4 flex flex-col border gap-8"
            >
                <h2 class="py-2 text-3xl text-center font-bold text-gray-800">
                    DataTable Export
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
                            field="name"
                            header="Name"
                            style="width: 25%"
                            sortable
                        ></Column>
                        <Column
                            field="country.name"
                            header="Country"
                            style="width: 25%"
                            sortable
                        ></Column>
                        <Column
                            field="company"
                            header="Company"
                            style="width: 25%"
                            sortable
                        ></Column>
                        <Column
                            field="representative.name"
                            header="Representative"
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
                    name: "John Doe",
                    country: { name: "United States" },
                    company: "ABC Inc.",
                    representative: { name: "Jane Smith" },
                },
                {
                    name: "Alice Brown",
                    country: { name: "Canada" },
                    company: "XYZ Corp.",
                    representative: { name: "Bob Johnson" },
                },
                {
                    name: "John Doe",

                    country: { name: "United States" },

                    company: "ABC Inc.",

                    representative: { name: "Jane Smith" },
                },

                {
                    name: "Alice Brown",

                    country: { name: "Canada" },

                    company: "XYZ Corp.",

                    representative: { name: "Bob Johnson" },
                },

                {
                    name: "Mary Smith",

                    country: { name: "Australia" },

                    company: "DEF Corp.",

                    representative: { name: "John Adams" },
                },

                {
                    name: "David Lee",

                    country: { name: "South Korea" },

                    company: "GHI Inc.",

                    representative: { name: "Sarah Kim" },
                },

                {
                    name: "Juan Perez",

                    country: { name: "Mexico" },

                    company: "JKL Corp.",

                    representative: { name: "Maria Garcia" },
                },

                {
                    name: "Mohammed Ali",

                    country: { name: "Egypt" },

                    company: "MNO Inc.",

                    representative: { name: "Fatima Ahmed" },
                },

                {
                    name: "Hans Schmidt",

                    country: { name: "Germany" },

                    company: "PQR Corp.",

                    representative: { name: "Anna Mueller" },
                },

                {
                    name: "Yuki Nakamura",

                    country: { name: "Japan" },

                    company: "STU Inc.",

                    representative: { name: "Taro Yamada" },
                },

                {
                    name: "Maria Rodriguez",

                    country: { name: "Spain" },

                    company: "VWX Corp.",

                    representative: { name: "Carlos Sanchez" },
                },

                {
                    name: "Lena Svensson",

                    country: { name: "Sweden" },

                    company: "YZA Inc.",

                    representative: { name: "Erik Johansson" },
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
