<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import AutoComplete from "primevue/autocomplete";
</script>


<template>
<AppLayout title="RegistrarEstudiante">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                FormularioRegistroEstudiante
            </h2>
        </template>

        <HeaderCard title="MATRICULAR ESTUDIANTE"/>
        
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

<style>

    .formulario
    {
        padding: 2% 5% 5% 5%;
        display: flex;
        flex-wrap: wrap;
        width: auto;
    }

    .item 
    {
        flex-basis: 50%;
        padding: 0.1%;
        box-sizing: border-box;
    }

    .itemdos 
    {
        flex-basis: 100%;
        padding: 2% 10% 1% 10%;
        box-sizing: border-box;
    }

    #tabla1,#tabla2,#tabla3,#tabla4
    {
        border: 1px solid rgb(99, 95, 95);
        padding: 5%;
        margin: 2%;
    }

    hr 
    {
        border: none;
        height: 1px;
        background-color: black;
    }
    
</style>



<script>
import { ref } from "vue";
import HeaderCard from "../SubComponents/HeaderCard.vue";

const semestres =  ['I','II','III','IV','V','VI','VII','VIII','IX','X'];
const escuelas = ['Ingenieria de Sistemas', 'Ingenieria Metalurgica', 'Ingenieria Economia'];
const items = ref(Array.from({ length: semestres.length }, (_, i) => ({
        label: semestres[i],
        value: i,
    })));

const itemsdos = ref(Array.from({ length: escuelas.length }, (_, i) => ({
        label: escuelas[i],
        value: i,
    })));

const selectedItem = ref();
const selectedEscuela = ref();
const filteredItems = ref();
const filteredEscuelas = ref();
const searchItems = (event) => {
    //in a real application, make a request to a remote url with the query and return filtered results, for demo we filter at client side
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



const searchEscuelas = (event) => {
    //in a real application, make a request to a remote url with the query and return filtered results, for demo we filter at client side
    let query = event.query;
    let _filteredItems = [];

    for (let i = 0; i < itemsdos.value.length; i++) {
        let item = itemsdos.value[i];

        if (item.label.toLowerCase().indexOf(query.toLowerCase()) === 0) {
            _filteredItems.push(item);
        }
    }

    filteredEscuelas.value = _filteredItems;
};

</script>

