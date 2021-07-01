<template>
    <!-- table -->
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">CUI</th>
                <th scope="col">Nombre completo</th>
                <th scope="col">Dirección</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Numero de celular</th>
                <th colspan="1">
					&nbsp;
				</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="data in persona" :key="data.id">
                <th scope="row">{{data.id}}</th>
                <td>{{data.cui}}</td>
                <td>{{data.nombre_completo}}</td>
                <td>{{data.direccion}}</td>
                <td>{{data.fecha_na}}</td>
                <td>{{data.no_tel}}</td>
                <td><button type="button" class="btn btn-warning" v-on:click="updatePersona(data.id)"> Actualizar </button></td>
                </tr>
            </tbody>
            </table>
</template>

<script>
export default {
    data(){
        return{
            persona: [],
            upersona: []
        }
    },
    mounted(){
        axios.get('persona')
            .then((response) =>{
                this.persona = response.data,
            console.log(this.persona)
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    methods:{
        updatePersona(id){
            const params ={
                id: id
            }
            console.log(id),
            axios.get('persona/${id}')
            .then((response) =>{
                this.upersona = response.data,
            console.log(this.upersona)
            })
            .catch(function(error) {
                console.log(error);
            });
        }
        }
    
}
</script>