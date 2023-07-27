<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import Dropdown from 'primevue/dropdown';
import AutoComplete from "primevue/autocomplete";
import { router } from '@inertiajs/vue3'

const facultadref = ref();

const props = defineProps({ facultades: Object });
// console.log(props.facultades)
const escuelaref = ref();
const dataescuelaref = ref();

const handleclick = ()=>{
    const escuelas = router.get('escuelainfo/'+facultadref.id)
    console.log(escuelas);
} 
function escuelas(id=0){
    if (id != 0){
        fetch('http://127.0.0.1:8000/escuelas/' + id)
                .then(response => response.json())
                .then(data => {
                // Verifica si la respuesta tiene los campos necesarios
                dataescuelaref.value=data;
                console.log(data);
                })
                .catch(error => {
    
                });
    }
}
</script>


<template>
    <AppLayout title="Asignar Curso Docente">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                FormularioDocenteCurso
            </h2>
        </template>

        <HeaderCard title="Asignar docente" />

        <h:form>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10 flex flex-col border gap-4 pb-16 w-full">
                <h2 class="pb-0 font-semibold text-xl text-[#1C2434]">
                    Asignar Docente
                </h2>
                <form>
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-wrap md:flex-nowrap gap-5">
                            <div class="w-1/2 border shadow-sm rounded-md">
                                <h2 class=" px-5 py-4 border-b">
                                    Escuela Profesional
                                </h2>
                                <div class="w-full px-6 py-8 flex flex-col gap-7">
                                    <div class="flex-auto">
                                        <span class="p-float-label">
                                            <span class="p-float-label">
                                                <dropdown v-model="facultadref" :options="props.facultades" @click="()=>escuelas(facultadref.id)" optionLabel="nombre" placeholder="Select a City" class="w-full md:w-14rem" />
                                            </span>
                                            <label for="username">Seleccione la Facultad</label>
                                        </span>
                                    </div>
                                    <div class="flex-auto">
                                        <span class="p-float-label">
                                            <span class="p-float-label">
                                                <dropdown v-model="escuelaref" :options="dataescuelaref" optionLabel="nombre" placeholder="Select a City" class="w-full md:w-14rem" />
                                            </span>
                                            <label for="username">Seleccione Escuela Professional</label>
                                        </span>
                                    </div>
                                    <div class="flex-auto">
                                        <span class="p-float-label">
                                            <InputText class="w-full" id="username" v-model="value" />

                                            <label for="username">Nombre del Curso</label>
                                        </span>
                                    </div>
                                    <div class="flex-auto">
                                        <span class="p-float-label">
                                            <InputText class="w-full" id="username" v-model="value" />

                                            <label for="username">Grupo</label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-1/2 border shadow-sm rounded-md">
                                <h2 class=" px-5 py-4 border-b">
                                    Datos del docente
                                </h2>
                                <div class="w-full px-6 py-8 flex flex-col gap-7">
                                    <div class="flex-auto">
                                        <span class="p-float-label">
                                            <InputText class="w-full" id="username" v-model="value" />
                                            <label for="username">Nombre del Docente</label>
                                        </span>
                                    </div>
                                    <div class="flex-auto">
                                        <span class="p-float-label">
                                            <InputText class="w-full" id="username" v-model="value" />

                                            <label for="username">DNI</label>
                                        </span>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="flex flex-col items-center py-2">
                            <Button label="Asignar" severity="success" type="button"
                                style="background-color: #3c50e0; border: none" />
                        </div>
                    </div>
                </form>
            </div>
        </h:form>

    </AppLayout>
</template>

<style>
.formulario {
    padding: 2% 5% 5% 5%;
    display: flex;
    flex-wrap: wrap;
    width: auto;
}

.item {
    flex-basis: 50%;
    padding: 0.1%;
    box-sizing: border-box;
}

.itemdos {
    flex-basis: 100%;
    padding: 2% 10% 1% 10%;
    box-sizing: border-box;
}

#tabla1,
#tabla2,
#tabla3,
#tabla4 {
    border: 1px solid rgb(99, 95, 95);
    padding: 5%;
    margin: 2%;
}

hr {
    border: none;
    height: 1px;
    background-color: black;
}
</style>

<script>
import { ref, defineProps } from "vue";
import HeaderCard from "../SubComponents/HeaderCard.vue";



</script>

