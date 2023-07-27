<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import DataTable from "primevue/datatable";
import Chart from "primevue/chart";
import Column from "primevue/column";
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Datatable
            </h2>
        </template>

        <div>
            <div
                class="bg-white min-h-screen overflow-hidden shadow-xl sm:rounded-lg p-4 flex flex-col gap-8"
            >
                <!-- <Welcome /> -->
                <h2 class="uppercase text-3xl font-bold text-gray-800">
                    Bienvenidos a Datatable
                </h2>
                <div class="card">
                    <Chart
                        type="bar"
                        :data="chartData"
                        :options="chartOptions"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { ref } from "vue";

const chartData = ref({
    labels: ["Q1", "Q2", "Q3", "Q4"],
    datasets: [
        {
            label: "Sales",
            data: [540, 325, 702, 620],
            backgroundColor: [
                "rgba(255, 159, 64, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(153, 102, 255, 0.2)",
            ],
            borderColor: [
                "rgb(255, 159, 64)",
                "rgb(75, 192, 192)",
                "rgb(54, 162, 235)",
                "rgb(153, 102, 255)",
            ],
            borderWidth: 1,
        },
    ],
});
const chartOptions = ref({
    scales: {
        y: {
            beginAtZero: true,
        },
    },
});

export default {
    components: {
        Chart,
    },
};
</script>
