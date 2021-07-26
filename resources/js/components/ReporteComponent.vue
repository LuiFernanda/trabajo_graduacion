<template>
    <div>
    <div class="d-flex justify-content-center">
            <button @click="selectedComponent = 'One'" class="btn">Personas</button>
            <button @click="selectedComponent = 'Two'" class="btn">Positivos</button>
            <button @click="selectedComponent = 'Three'" class="btn">En cuarentena</button>
            <button @click="selectedComponent = 'Four'" class="btn">De alta</button>
        </div>
        <div class="d-flex justify-content-center">
            <keep-alive>
                <component :is="selectedComponent"></component>
            </keep-alive>
        </div>
    <div class="row justify-content-end p-2">
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
import One from './reportes/todos.vue';
import Two from './reportes/estado.vue';
import Three from './reportes/cuarentena.vue';
import Four from './reportes/alta.vue';
    export default {
        components: {One, Two, Three, Four},

        data(){
            return{
                selectedComponent: 'One'
            }
        },
        mounted(){
        },
        methods:{
            createPDF() {
            html2canvas($("#tab")[0],{
                onrendered:function(canvas){
                    var data=canvas.toDataURL();
                    var docDefinition={
                        content:[{
                            image:data,
                            width:500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Table.pdf");
                }
            })   
            }
        }
    }
</script>

<style>

</style>