<template>
    <!-- table -->
    <div class="table-responsive-xl" id="tab">
    <h2> Reporte personas</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">CUI</th>
                <th scope="col">Nombre completo</th>
                <th scope="col">Dirección</th>
                <th scope="col">Genero</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Numero de celular</th>
                <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(data, index) in alta" :key="data.id">
                <td >{{ index +1 }}</td>
                <td >{{data.cui}}</td>
                <td>{{data.nombre_completo}}</td>
                <td>{{data.direccion}}</td>
                <td>{{data.genero}}</td>
                <td>{{data.fecha_nac | moment("D/M/YYYY") }}</td>
                <td>{{data.no_tel}}</td>
                <td>{{data.updated_at | moment("D/M/YYYY, h:mm:ss a") }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                alta: []
            }
        },
        mounted(){
            this.viewPersonas();
        },
        methods:{
            viewPersonas(){
                axios.get('buscadora')
                .then((response) =>{
                    this.alta = response.data
                })
                .catch(function(error) {
                    console.log(error);
                });
            }
        }
    }
</script>
