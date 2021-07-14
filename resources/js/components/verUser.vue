<template>
    <div class="mx-auto table-responsive-xl">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Tipo de usuario</th>
                <th colspan="1">
					&nbsp;
				</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="data in user" :key="data.id">
                <th scope="row">{{data.id}}</th>
                <td>{{data.name}}</td>
                <td>{{data.email}}</td>
                <td v-if="data.tipo == 1">Administrador</td>
                <td v-if="data.tipo == 0">Estandar</td>
                <td><button type="button" class="btn btn-secondary" v-on:click="updateUser(data.id)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                    </svg>
                    Deshabilitar </button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            user: [],
            upersona: [],
            i: 1
        }
    },
    mounted(){
        this.viewUsers();

    },
    methods:{
        updateUser(id){
                const paramsu ={
                    estado: 1,
                }
                axios.put('user/'+id, paramsu)
                    .then(res => {
                        this.$alertify.alert('Trabajo de graduacion','Actualizado!',
                        function(){
                            alertify.success('Ok'); 
                        }),
                        this.viewUsers()
                    }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }else{
                        this.$alertify.alert('Trabajo de graduacion','Actualizado!',
                        function(){
                            alertify.success('Ok'); 
                        }),
                        this.viewUsers()
                    }
                })
        },
        viewUsers(){
            axios.get('user')
            .then((response) =>{
                this.user = response.data
                console.log(this.user)
            })
            .catch(function(error) {
                console.log(error);
            });
        }
    }
}
</script>