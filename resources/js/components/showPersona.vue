<template>
    <div class="row">
        <!-- Modal -->
        <div class="modal fade" id="udateModal" tabindex="-1" aria-labelledby="personaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="udateModalLabel">Editar perosna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="col-md-10" action="" v-on:submit.prevent="updatePersona()">
                <div class="modal-body">
                        <div class="form-row">
                            <input type="hidden" v-model="idp">
                            <div class="form-group col-md-6">
                                <label for="inputName">Nombre completo</label>
                                <input type="text" class="form-control" v-model="inputNameu" required="true">
                                <div class="alert alert-danger" v-if="errors && errors.name">
                                    {{ errors.name[0] }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputCui">CUI</label>
                                <input type="number" class="form-control" v-model="inputCuiu" placeholder="Ingrese su CUI" required="true">
                                <div class="alert alert-danger" v-if="errors && errors.cui">
                                    {{ errors.cui[0] }}
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="form-group cold-md-4">
                                <label for="inputGender">Genero</label>
                                <select class="form-control" v-model="inputGenderu" required="true">
                                    <option value="M" selected>Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                                <div class="alert alert-danger" v-if="errors && errors.gender">
                                    {{ errors.gender[0] }}
                                </div>
                            </div>
                            <div class="form-group cold-md-8">
                                <label for="inputAddress">Dirección</label>
                                <input type="text" class="form-control" v-model="inputAddressu" placeholder="Solola, Solola" required="true">
                                <div class="alert alert-danger" v-if="errors && errors.address">
                                    {{ errors.address[0] }}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputDate">Fecha nacimiento</label>
                            <input type="date" class="form-control" v-model="inputDateu" required="true">
                            <div class="alert alert-danger" v-if="errors && errors.date">
                                {{ errors.date[0] }}
                            </div>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputCel">Celular</label>
                            <input type="number" class="form-control" v-model="inputCelu" placeholder="12549875" required="true">
                            <div class="alert alert-danger" v-if="errors && errors.cel">
                                {{ errors.cel[0] }}
                            </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    <!-- table -->
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">CUI</th>
                <th scope="col">Nombre completo</th>
                <th scope="col">Dirección</th>
                <th scope="col">Genero</th>
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
                <td>{{data.genero}}</td>
                <td>{{data.fecha_nac}}</td>
                <td>{{data.no_tel}}</td>
                <td><button type="button" class="btn btn-warning" v-on:click="verPersona(data.id)"> Actualizar </button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            persona: [],
            upersona: [],
            inputNameu: "",
            inputCuiu: "",
            inputGenderu: "",
            inputDateu: "",
            inputCelu: "",
            inputAddressu: "",
            idp: "",
            errors: []
        }
    },
    mounted(){
    },
    methods:{
        verPersona(id){
            axios.get('persona/'+id)
            .then((response) =>{
                $('#udateModal').modal('show'),
                this.upersona = response.data,
                this.inputNameu = this.upersona.nombre_completo,
                this.inputCuiu = this.upersona.cui,
                this.inputGenderu = this.upersona.genero,
                this.inputDateu = this.upersona.fecha_nac,
                this.inputAddressu = this.upersona.direccion,
                this.inputCelu = this.upersona.no_tel,
                this.idp = this.upersona.id
            })
            .catch(function(error) {
                console.log(error);
            });
        },
        updatePersona(){
                const paramsu ={
                    cui: this.inputCuiu,
                    name: this.inputNameu,
                    gender: this.inputGenderu,
                    address: this.inputAddressu,
                    date: this.inputDateu,
                    cel: this.inputCelu
                }
                axios.put('persona/'+this.idp, paramsu)
                    .then(res => {
                        this.inputNameu = '',
                        this.inputCuiu = '',
                        this.inputGenderu = '',
                        this.inputDateu = '',
                        this.inputAddressu = '',
                        this.inputCelu = '',
                        $('#udateModal').modal('hide'),
                        this.$alertify.alert('Trabajo de graduacion','Actualizado!',
                        function(){
                            alertify.success('Ok'); 
                        }),
                        this.viewPersonas()
                    }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }else{
                        $('#udateModal').modal('hide'),
                        this.$alertify.alert('Trabajo de graduacion','Actualizado!',
                        function(){
                            alertify.success('Ok'); 
                        }),
                        this.viewPersonas()
                    }
                })
        },
        viewPersonas(){
            axios.get('persona')
            .then((response) =>{
                this.persona = response.data
            })
            .catch(function(error) {
                console.log(error);
            });
        }
    }        
}
</script>