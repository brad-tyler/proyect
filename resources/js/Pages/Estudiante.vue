<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import AutoComplete from "primevue/autocomplete";
import Calendar from "primevue/calendar";
import Password from "primevue/password";
import FileUpload from "primevue/fileupload";
</script>

<template>
    <AppLayout title="Dashboard">
        <HeaderCard title="Estudiante" />

        <h:form>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10 flex flex-col border gap-4 pb-16 w-full">
                <h2 class="pb-0 font-semibold text-xl text-[#1C2434]">
                    Matricula
                </h2>
                <form>
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-wrap md:flex-nowrap gap-5">
                            <div class="w-1/2 border shadow-sm rounded-md">
                                <h2 class=" px-5 py-4 border-b">
                                    Datos del estudiante
                                </h2>
                                <div class="w-full px-6 py-8 flex flex-col gap-7">
                                    <div class="flex-auto">
                                        <span class="p-float-label">
                                            <InputText class="w-full" id="username" v-model="value" />
                                            <label for="username">Codigo del estudiante</label>
                                        </span>
                                    </div>
                                    <div class="flex-auto">
                                        <span class="p-float-label">
                                            <InputText class="w-full" id="username" v-model="value" />

                                            <label for="username">Nombre del estudiante</label>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="w-1/2 border shadow-sm rounded-md">
                                <h2 class=" px-5 py-4 border-b">
                                    Datos de la Carrera
                                </h2>
                                <div class="w-full px-6 py-8 flex flex-col gap-7">
                                    <div class="flex-auto">
                                        <span class="p-float-label">
                                            <!-- <AutoComplete
                                                class="w-full"
                                                v-model="selectedItem"
                                                dropdown
                                                :suggestions="filteredItems"
                                                @complete="searchItems"
                                            /> -->
                                            <AutoComplete class="w-full" v-model="selectedItem" :suggestions="filteredItems"
                                                @complete="searchItems" :virtualScrollerOptions="{
                                                    itemSize: 38,
                                                }" optionLabel="label" dropdown />
                                            <label for="username">Seleccionar semestre</label>
                                        </span>
                                    </div>
                                    <div class="flex-auto">
                                        <span class="p-float-label">
                                            <!-- <AutoComplete
                                                class="w-full"
                                                v-model="selectedItem"
                                                dropdown
                                                :suggestions="filteredItems"
                                                @complete="searchItems"
                                            /> -->
                                            <AutoComplete class="w-full" v-model="selectedItem" :suggestions="filteredItems"
                                                @complete="searchItems" :virtualScrollerOptions="{
                                                    itemSize: 38,
                                                }" optionLabel="label" dropdown />
                                            <label for="username">Escuela profesional</label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap md:flex-nowrap gap-5">
                            <div class="w-1/2 border shadow-sm rounded-md">
                                <h2 class=" px-5 py-4 border-b">
                                    DNI
                                </h2>
                                <div class="w-full px-6 py-8 flex flex-col gap-7">
                                    <div class="card">
                                        <Toast />
                                        <FileUpload name="demo[]" url="./upload.php" @upload="onAdvancedUpload($event)"
                                            :multiple="true" accept="image/*" :maxFileSize="1000000">
                                            <template #empty>
                                                <p>Drag and drop files to here to upload.</p>
                                            </template>
                                        </FileUpload>
                                    </div>
                                </div>
                            </div>

                            <div class="w-1/2 border shadow-sm rounded-md">
                                <h2 class=" px-5 py-4 border-b">
                                    Datos del Curso
                                </h2>
                                <div class="w-full px-6 py-8 flex flex-col gap-7">
                                    <div class="flex-auto">
                                        <span class="p-float-label">
                                            <InputText class="w-full" id="name_curse" v-model="value" />
                                            <label for="username">Nombre del curso</label>
                                        </span>
                                    </div>
                                    <div class="flex-auto">
                                        <span class="p-float-label">
                                            <!-- <AutoComplete
                                                class="w-full"
                                                v-model="selectedItem"
                                                dropdown
                                                :suggestions="filteredItems"
                                                @complete="searchItems"
                                            /> -->
                                            <AutoComplete class="w-full" v-model="selectedItem" :suggestions="filteredItems"
                                                @complete="searchItems" :virtualScrollerOptions="{
                                                    itemSize: 38,
                                                }" optionLabel="label" dropdown />
                                            <label for="username">Grupo</label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-center py-2">
                            <Button label="Matricular" severity="success" type="button"
                                style="background-color: #3c50e0; border: none" />
                        </div>
                    </div>
                </form>
            </div>
        </h:form> -->
        <h:form class="container formulario">
        <div class="item">
            <div class="flex-1 transform hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" id="tabla1">
                <p><b>DATOS DEL ESTUDIANTE</b></p>
                <hr>
                <br>
                <div class="flex-auto">
                        <!--CODIGO DEL ESTUDIANTE-->
                        <label for="codigoestudiante">Codigo del Estudiante</label>
                        <span class="p-float-label">
                    
                            <InputText
                                class="w-full"
                                id="codigoestudiante"
                                v-model="value"
                            />
                        </span>
                        <br>
                        <!--NOMBRES DEL ESTUDIANTE-->
                        <label for="nombreestudiante">Nombres del Estudiante</label>
                        <span class="p-float-label">
                            
                            <InputText
                                class="w-full"
                                id="nombreestudiante"
                                v-model="value"
                            />
                        </span>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="flex-1 transform hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" id="tabla2">
                <p><b>DATOS DE LA CARRERA</b></p>
                <hr>
                <br>
                <div class="flex-auto">
                        <!--SEMESTRE-->
                        <label for="semestre">Seleccionar Semestre</label>
                        <span class="p-float-label">
                            <AutoComplete v-model="selectedItem" :suggestions="filteredItems" @complete="searchItems"
                            :virtualScrollerOptions="{ itemSize: 38 }" optionLabel="label" dropdown style="width: 100%;"/>
                        </span>
                        <br>
                        <!--ESCUELA PROFESIONAL-->
                        <label for="escuela">Escuela Profesional</label>
                        <span class="p-float-label">
                            <AutoComplete v-model="selectedEscuela" :suggestions="filteredEscuelas" @complete="searchEscuelas"
                            :virtualScrollerOptions="{ itemSize: 38 }" optionLabel="label" dropdown style="width: 100%;"/>
                        </span>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="flex-1 transform hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" id="tabla3">
                <p><b>ARCHIVOS</b></p>
                <hr>
                <br>
                <div class="flex-auto">
                        <!--CODIGO DEL ESTUDIANTE-->
                        <label for="perfil">Subir Foto de Perfil</label>
                        
                </div>
            </div>
        </div>

        <div class="item">
            <div class="flex-1 transform hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" id="tabla4">
                <p><b>DATOS DEL CURSO</b></p>
                <hr>
                <br>
                <div class="flex-auto">
                        <!--NOMBRE DEL CURSO-->
                        <label for="nombrecurso">Nombre del Curso</label>
                        <span class="p-float-label">
                    
                            <InputText
                                class="w-full"
                                id="nombrecurso"
                                v-model="value"
                            />
                        </span>
                        <br>
                        <!--GRUPO DEL CURSO-->
                        <label for="grupocurso">Grupo del Curso</label>
                        <span class="p-float-label">
                            
                            <InputText
                                class="w-full"
                                id="grupocurso"
                                v-model="value"
                            />
                        </span>
                </div>
            </div>
        </div>
        

            <div class="itemdos">
                        <Button label="Matricular" severity="success" type="submit" style="width: 100%;"/>
            </div>
    
        </h:form>
    </AppLayout>
</template>

<script>
import { ref } from "vue";
import HeaderCard from "../SubComponents/HeaderCard.vue";

let today = new Date();
let month = today.getMonth();
let year = today.getFullYear();
let prevMonth = month === 0 ? 11 : month - 1;
let prevYear = prevMonth === 11 ? year - 1 : year;
let nextMonth = month === 11 ? 0 : month + 1;
let nextYear = nextMonth === 0 ? year + 1 : year;

const date2 = ref();

const minDate = ref(new Date());
const maxDate = ref(new Date());

minDate.value.setMonth(prevMonth);
minDate.value.setFullYear(prevYear);
maxDate.value.setMonth(nextMonth);
maxDate.value.setFullYear(nextYear);

const countries = ["Peru", "Colombia", "Ecuador", "Argentina"];

const items = ref(
    Array.from({ length: countries.length }, (_, i) => ({
        label: countries[i],
        value: i,
    }))
);
const selectedItem = ref();
const filteredItems = ref();
const searchItems = (event) => {
    let query = event.query;
    let _filteredItems = [];

    for (let i = 0; i < items.value.length; i++) {
        let item = items.value[i];

        if (item.label.toLowerCase().indexOf(query.toLowerCase()) === 0) {
            _filteredItems.push(item);
        }
    }

    filteredItems.value = _filteredItems;
};
</script>
