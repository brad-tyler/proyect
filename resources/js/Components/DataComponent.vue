<script setup>
import Button from "primevue/button";
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import InputText from 'primevue/inputtext';

import { ref, onMounted } from 'vue';


const tprops = defineProps({
    mprops: Object,
    urlget: String,
});

console.log('Props:', tprops.mprops.columns)



onMounted(() => {
    loading.value = true;
    lazyParams.value = {
        first: 0,
        rows: dt.value.rows,
        sortField: tprops.mprops.sortField,
        sortOrder: tprops.mprops.sortOrder,
        //filters: mfilter.value,
        global: global.value,
    };
    loadLazyData();
    tprops.mprops.columns.push({ 'dt': 'Acciones', 'db': 'acciones', 'show': true })

});
const mfilter = ref([]);
const dt = ref();
const loading = ref(false);
const totalRecords = ref(0);
const customers = ref();
const global = ref({ value: '' });

const lazyParams = ref({});

tprops.mprops.columns.forEach(elem => {
    mfilter.value.push({ [elem.db]: { 'value': '' } })
})//


// mfilter.value.push({ 'id': { 'value': '' } })
// mfilter.value.push({ 'name': { 'value': '' } })
// mfilter.value.push({ 'lastname': { 'value': '' } })
// mfilter.value.push({ 'address': { 'value': '' } })


// const filters = ref(props.value.columns)

const loadLazyData = () => {
    loading.value = true;

    //setTimeout(() => {
    getCustomers({ lazyEvent: JSON.stringify(lazyParams.value) }).then((data) => {
        console.log(data.error)
        customers.value = data.data;
        totalRecords.value = data.totalRecords;
        loading.value = false;
    });
    // }, Math.random() * 1000 + 250);
};
const onPage = (event) => {

    // tprops.mprops.columns.append({ 'dt': 'Acciones', 'db': 'acciones', 'show': true })
    lazyParams.value = event;
    loadLazyData();
};
const onSort = (event) => {
    console.log(event)
    lazyParams.value = event;
    loadLazyData();
};

const onFilter = (event) => {
    console.log(event)
    lazyParams.value = event;
    loadLazyData();
};

const getCustomers = (params) => {
    const queryParams = Object.keys(params)
        .map((k) => encodeURIComponent(k) + '=' + encodeURIComponent(params[k]))
        .join('&');
    return fetch(tprops.urlget + '?' + queryParams).then((res) => res.json());
}
console.log(tprops.mprops)
const rawHtml = "<a :href='slotProps.data.id'>Hola</a>"
</script>
<template>
    <DataTable :value="customers" responsiveLayout="scroll" :sortField="tprops.mprops.sortField"
        :sortOrder="tprops.mprops.sortOrder" lazy paginator :rows="10" v-model:filters="mfilter.value" ref="dt"
        :dataKey="tprops.mprops.dataKey" filterDisplay="menu" :totalRecords="totalRecords" :loading="loading"
        @page="onPage($event)" @sort="onSort($event)" @filter="onFilter($event)" :globalFilterFields="['name', 'lastname']"
        class="p-datatable-sm" tableStyle="min-width: 20rem">
        <template #header>
            <div class="flex justify-between">
                <Button size="small" type="button" icon="pi pi-filter-slash" label="Clear" outlined
                    @click="clearFilter()" />
                <span class="p-input-icon-left">
                    <i class="pi pi-search" />
                    <InputText v-model="global.value" placeholder="Keyword Search" @keyup="loadLazyData()" />
                </span>
            </div>
        </template>
        <template v-for="(item, index) in tprops.mprops.columns">
            <Column v-if="item.show" :field="item.db" :header="item.dt" sortable>
            </Column>

            <!-- <template v-for="(itemAcciones, index) in tprops.mprops.columnsAcciones">
                <Column v-if="itemAcciones.show" :field="itemAcciones.db" :header="itemAcciones.dt" sortable>
                    <template #body="slotProps">
                        <div class="flex gap-3">
                            <Button icon="pi pi-eye" outlined rounded value="primary" />
                            <Button icon="pi pi-trash" outlined rounded severity="danger" />
                            <Button icon="pi pi-download" outlined rounded severity="info" />
                        </div>
                    </template>
                </Column>
            </template> -->
        </template>

        <!-- <template v-for="(item, index) in tprops.mprops.columnsAcciones">
            <Column v-if="item.show" :field="item.db" :header="item.dt" sortable>
                <template #body="slotProps">
                    <div class="flex gap-3">
                        <Button icon="pi pi-eye" outlined rounded value="primary" />
                        <Button icon="pi pi-trash" outlined rounded severity="danger" />
                        <Button icon="pi pi-download" outlined rounded severity="info" />
                    </div>
                </template>
            </Column>
        </template> -->
    </DataTable>
</template>

