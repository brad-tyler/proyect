<template>
    <div class="">
        <div class="card">
            <Toolbar class="mb-4">
                <template #start>
                    <div class="flex gap-2">
                        <Button
                            label="Agregar Tarea"
                            icon="pi pi-plus"
                            severity="success"
                            class="mr-2"
                            @click="openNew"
                        />
                        
                        <Button
                            label="Delete"
                            icon="pi pi-trash"
                            severity="danger"
                            @click="confirmDeleteSelected"
                            :disabled="
                                !selectedProducts || !selectedProducts.length
                            "
                        />
                    </div>
                </template>

                <template #end>
                    <div class="flex gap-2">
                        <Button
                            label="Ver estudiantes"
                            icon="pi pi-users"
                            severity="secondary"
                            class="mr-2"
                        />
                        <FileUpload
                            mode="basic"
                            accept="image/*"
                            :maxFileSize="1000000"
                            label="Import"
                            chooseLabel="Import"
                            class="mr-2 inline-block"
                        />
                        <Button
                            label="Export"
                            icon="pi pi-upload"
                            severity="help"
                            @click="exportCSV($event)"
                        />
                    </div>
                </template>
            </Toolbar>

            <DataTable
                ref="dt"
                :value="products"
                v-model:selection="selectedProducts"
                dataKey="id"
                :paginator="true"
                :rows="10"
                :filters="filters"
                paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                :rowsPerPageOptions="[5, 10, 25]"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords} products"
            >
                <template #header>
                    <div
                        class="flex flex-wrap gap-2 align-items-center justify-content-between"
                    >
                        <h4 class="m-0">Manage Products</h4>
                        <span class="p-input-icon-left">
                            <i class="pi pi-search" />
                            <InputText
                                v-model="filters['global'].value"
                                placeholder="Search..."
                            />
                        </span>
                    </div>
                </template>

                <Column
                    selectionMode="multiple"
                    style="width: 3rem"
                    :exportable="false"
                ></Column>  
                <Column
                    field="name"
                    header="Nombre de la tarea"
                    sortable
                    style="min-width: 14rem"
                ></Column>
                <Column
                    field="name"
                    header="Nota Maxima"
                    sortable
                    style="min-width: 10rem"
                ></Column>
                <Column
                    field="name"
                    header="N° Intentos"
                    sortable
                    style="min-width: 10rem"
                ></Column>
                <Column
                    field="name"
                    header="Fecha"
                    sortable
                    style="min-width: 1rem"
                ></Column>
                <Column
                    field="name"
                    header="Descripción"
                    sortable
                    style="min-width: 1rem"
                ></Column>
                <Column header="PDF">
                    <template #body="slotProps">
                        <img
                            :src="`https://primefaces.org/cdn/primevue/images/product/${slotProps.data.image}`"
                            :alt="slotProps.data.image"
                            class="shadow-2 border-round"
                            style="width: 64px"
                        />
                    </template>
                </Column>
                <Column
                    field="inventoryStatus"
                    header="Estado"
                    sortable
                    style="min-width: 4rem"
                >
                    <template #body="slotProps">
                        <Tag
                            :value="slotProps.data.inventoryStatus"
                            :severity="
                                getStatusLabel(slotProps.data.inventoryStatus)
                            "
                        />
                    </template>
                </Column>
                <Column :exportable="false" style="min-width: 8rem">
                    <template #body="slotProps">
                        <Button
                            icon="pi pi-pencil"
                            outlined
                            rounded
                            class="mr-2"
                            @click="editProduct(slotProps.data)"
                        />
                        <Button
                            icon="pi pi-trash"
                            outlined
                            rounded
                            severity="danger"
                            @click="confirmDeleteProduct(slotProps.data)"
                        />
                    </template>
                </Column>
            </DataTable>
        </div>
        <Dialog
                            v-model:visible="productDialog"
                            header="Crear Nueva Tarea"
                            :style="{
                                width: '60vw',
                                background: 'white',
                            }"
                        >
                            <form class="flex gap-5">
                                <div class="flex flex-col w-1/2 gap-4">
                                    <div class="flex-1">
                                        <label
                                            class="font-bold block mb-2 text-sm"
                                        >
                                            Nombre de Tarea:
                                        </label>
                                        <span class="p-input-icon-right w-full">
                                            <i class="pi pi-spin pi-spinner" />
                                            <InputText
                                                v-model="value2"
                                                class="w-full"
                                            />
                                        </span>
                                    </div>
                                    <div class="flex gap-2 w-full">
                                        <div class="w-1/2">
                                            <label
                                                class="font-bold block mb-2 text-sm"
                                            >
                                                Calificación Maxima:
                                            </label>
                                            <span
                                                class="p-input-icon-right w-full"
                                            >
                                                <InputText
                                                    v-model="value2"
                                                    class="w-full"
                                                />
                                            </span>
                                        </div>
                                        <div class="w-1/2">
                                            <label
                                                class="font-bold block mb-2 text-sm"
                                            >
                                                Numero de Intentos:
                                            </label>
                                            <span
                                                class="p-input-icon-right w-full"
                                            >
                                                <InputText
                                                    v-model="value2"
                                                    class="w-full"
                                                />
                                            </span>
                                        </div>
                                    </div>

                                    <div class="flex gap-2 w-full">
                                        <div class="flex-1/2">
                                            <label
                                                class="font-bold block mb-2 text-sm"
                                            >
                                                Fecha de Inicio:
                                            </label>
                                            <Calendar
                                                id="calendar-12h"
                                                v-model="datetime12h"
                                                showTime
                                                hourFormat="12"
                                            />
                                        </div>
                                        <div class="flex-1/2">
                                            <label
                                                class="font-bold block mb-2 text-sm"
                                            >
                                                Fecha de Vencimiento:
                                            </label>
                                            <Calendar
                                                id="calendar-12h"
                                                v-model="datetime12h"
                                                showTime
                                                hourFormat="12"
                                            />
                                        </div>
                                    </div>

                                    <div class="flex-1">
                                        <label
                                            class="font-bold block mb-2 text-sm"
                                        >
                                            Descripcion:
                                        </label>
                                        <Textarea
                                            v-model="value"
                                            rows="5"
                                            cols="30"
                                            class="w-full rounded-md border border-black/20"
                                        />
                                    </div>
                                </div>

                                <div class="w-1/2 flex flex-col gap-4">
                                    <div>
                                        <label
                                            class="font-bold block mb-2 text-sm"
                                        >
                                            Seleccionar Archivo:
                                        </label>
                                        <FileUpload
                                            name=""
                                            url="./upload.php"
                                            @upload="onAdvancedUpload($event)"
                                            :multiple="true"
                                            accept="application/pdf"
                                            :maxFileSize="10000000"
                                            chooseLabel="Subir"
                                            class="bg-red-500"
                                            :style="{
                                                background: '#0079FF',
                                            }"
                                        >
                                            <template #empty>
                                                <p>
                                                    Carga un Documento PDF,
                                                    Word, excel o JPG; menor a
                                                    20MB
                                                </p>
                                            </template>
                                        </FileUpload>
                                    </div>
                                    <div class="flex justify-end gap-4">
                                        <Button
                                            size="small"
                                            severity="help"
                                            outlined
                                            label="Cancelar"
                                        />
                                        <Button size="small" label="Guardar" />
                                    </div>
                                </div>
                            </form>
                        </Dialog>

        <Dialog
            v-model:visible="deleteProductDialog"
            :style="{ width: '450px' }"
            header="Confirm"
            :modal="true"
        >
            <div class="confirmation-content">
                <i
                    class="pi pi-exclamation-triangle mr-3"
                    style="font-size: 2rem"
                />
                <span v-if="product"
                    >Are you sure you want to delete <b>{{ product.name }}</b
                    >?</span
                >
            </div>
            <template #footer>
                <Button
                    label="No"
                    icon="pi pi-times"
                    text
                    @click="deleteProductDialog = false"
                />
                <Button
                    label="Yes"
                    icon="pi pi-check"
                    text
                    @click="deleteProduct"
                />
            </template>
        </Dialog>

        <Dialog
            v-model:visible="deleteProductsDialog"
            :style="{ width: '450px' }"
            header="Confirm"
            :modal="true"
        >
            <div class="confirmation-content">
                <i
                    class="pi pi-exclamation-triangle mr-3"
                    style="font-size: 2rem"
                />
                <span v-if="product"
                    >Are you sure you want to delete the selected
                    products?</span
                >
            </div>
            <template #footer>
                <Button
                    label="No"
                    icon="pi pi-times"
                    text
                    @click="deleteProductsDialog = false"
                />
                <Button
                    label="Yes"
                    icon="pi pi-check"
                    text
                    @click="deleteSelectedProducts"
                />
            </template>
        </Dialog>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { FilterMatchMode } from "primevue/api";
import { useToast } from "primevue/usetoast";
import { ProductService } from "../services/ProductService";
import Toolbar from "primevue/toolbar";
import Button from "primevue/button";
import FileUpload from "primevue/fileupload";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import Dialog from "primevue/dialog";
import Dropdown from "primevue/dropdown";
import RadioButton from "primevue/radiobutton";
import InputNumber from "primevue/inputnumber";

onMounted(() => {
    ProductService.getProducts().then((data) => (products.value = data));
});

const toast = useToast();
const dt = ref();
const products = ref();
const productDialog = ref(false);
const deleteProductDialog = ref(false);
const deleteProductsDialog = ref(false);
const product = ref({});
const selectedProducts = ref();
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
});
const submitted = ref(false);
const statuses = ref([
    { label: "INSTOCK", value: "instock" },
    { label: "LOWSTOCK", value: "lowstock" },
    { label: "OUTOFSTOCK", value: "outofstock" },
]);

const formatCurrency = (value) => {
    if (value)
        return value.toLocaleString("en-US", {
            style: "currency",
            currency: "USD",
        });
    return;
};
const openNew = () => {
    product.value = {};
    submitted.value = false;
    productDialog.value = true;
};
const hideDialog = () => {
    productDialog.value = false;
    submitted.value = false;
};
const saveProduct = () => {
    submitted.value = true;

    if (product.value.name.trim()) {
        if (product.value.id) {
            product.value.inventoryStatus = product.value.inventoryStatus.value
                ? product.value.inventoryStatus.value
                : product.value.inventoryStatus;
            products.value[findIndexById(product.value.id)] = product.value;
            toast.add({
                severity: "success",
                summary: "Successful",
                detail: "Product Updated",
                life: 3000,
            });
        } else {
            product.value.id = createId();
            product.value.code = createId();
            product.value.image = "product-placeholder.svg";
            product.value.inventoryStatus = product.value.inventoryStatus
                ? product.value.inventoryStatus.value
                : "INSTOCK";
            products.value.push(product.value);
            toast.add({
                severity: "success",
                summary: "Successful",
                detail: "Product Created",
                life: 3000,
            });
        }

        productDialog.value = false;
        product.value = {};
    }
};
const editProduct = (prod) => {
    product.value = { ...prod };
    productDialog.value = true;
};
const confirmDeleteProduct = (prod) => {
    product.value = prod;
    deleteProductDialog.value = true;
};
const deleteProduct = () => {
    products.value = products.value.filter(
        (val) => val.id !== product.value.id
    );
    deleteProductDialog.value = false;
    product.value = {};
    toast.add({
        severity: "success",
        summary: "Successful",
        detail: "Product Deleted",
        life: 3000,
    });
};
const findIndexById = (id) => {
    let index = -1;
    for (let i = 0; i < products.value.length; i++) {
        if (products.value[i].id === id) {
            index = i;
            break;
        }
    }

    return index;
};
const createId = () => {
    let id = "";
    var chars =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for (var i = 0; i < 5; i++) {
        id += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return id;
};
const exportCSV = () => {
    dt.value.exportCSV();
};
const confirmDeleteSelected = () => {
    deleteProductsDialog.value = true;
};
const deleteSelectedProducts = () => {
    products.value = products.value.filter(
        (val) => !selectedProducts.value.includes(val)
    );
    deleteProductsDialog.value = false;
    selectedProducts.value = null;
    toast.add({
        severity: "success",
        summary: "Successful",
        detail: "Products Deleted",
        life: 3000,
    });
};

const getStatusLabel = (status) => {
    switch (status) {
        case "INSTOCK":
            return "success";

        case "LOWSTOCK":
            return "warning";

        case "OUTOFSTOCK":
            return "danger";

        default:
            return null;
    }
};
</script>
