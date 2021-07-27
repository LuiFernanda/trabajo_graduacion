<template>
    <div>
    <div class="d-flex justify-content-center">
            <button @click="selectedComponent = 'One'" class="btn">CUI</button>
            <button @click="selectedComponent = 'Two'" class="btn">Positivos</button>
            <button @click="selectedComponent = 'Three'" class="btn">En cuarentena</button>
            <button @click="selectedComponent = 'Four'" class="btn">De alta</button>
            <button @click="selectedComponent = 'Five'" class="btn">Personas</button>
        </div>
        <div class="d-flex justify-content-center">
            <keep-alive>
                <component :is="selectedComponent"></component>
            </keep-alive>
        </div>
        <div class="row justify-content-end p-5">
            <button type="button" class="btn btn-secondary " v-on:click="createPDF()">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-printer" viewBox="0 0 20 20">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
            </svg>
            Imprimir</button>  
        </div>
    
    </div>
</template>

<script>
import One from './BuscarComponent.vue';
import Two from './reportes/estado.vue';
import Three from './reportes/cuarentena.vue';
import Four from './reportes/alta.vue';
import Five from './reportes/todos.vue';

    export default {
        components: {One, Two, Three, Four, Five},

        data(){
            return{
                selectedComponent: 'One'
            }
        },
        mounted(){
        },
        methods:{
            createPDF() {
            const $elementoParaConvertir = document.getElementById("tab"); // <-- Aquí puedes elegir cualquier elemento del DOM
            html2pdf()
                .set({
                    margin: 1,
                    filename: 'reporte.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 3, // A mayor escala, mejores gráficos, pero más peso
                        letterRendering: true,
                    },
                    jsPDF: {
                        unit: "in",
                        format: "a3",
                        orientation: 'portrait' // landscape o portrait
                    }
                })
                .from($elementoParaConvertir)
                .save()
                .catch(err => console.log(err));

            }
        }
    }
</script>

<style>

</style>