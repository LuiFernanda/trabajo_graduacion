<template>
    <div class="row">
        <!-- Button open modal -->
        <!-- Modal -->
        <div class="modal fade" id="personaModal" tabindex="-1" aria-labelledby="personaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="personaModalLabel">Registrar perosna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="col-md-10" action="" v-on:submit.prevent="createPersona()">
                <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputName">Nombre completo</label>
                                <input type="text" class="form-control" v-model="inputName" placeholder="Nombre completo" required="true">
                                <div class="alert alert-danger" v-if="errors && errors.name">
                                    {{ errors.name[0] }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputCui">CUI</label>
                                <input type="number" class="form-control" v-model="inputCui" placeholder="Ingrese su CUI" required="true">
                                <div class="alert alert-danger" v-if="errors && errors.cui">
                                    {{ errors.cui[0] }}
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="form-group cold-md-4">
                                <label for="inputGender">Genero</label>
                                <select class="form-control" v-model="inputGender" required="true">
                                    <option value="M" selected>Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                                <div class="alert alert-danger" v-if="errors && errors.gender">
                                    {{ errors.gender[0] }}
                                </div>
                            </div>
                            <div class="form-group cold-md-8">
                                <label for="inputAddress">Dirección</label>
                                <input type="text" class="form-control" v-model="inputAddress" placeholder="Solola, Solola" required="true">
                                <div class="alert alert-danger" v-if="errors && errors.address">
                                    {{ errors.address[0] }}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputDate">Fecha nacimiento</label>
                            <input type="date" class="form-control" v-model="inputDate" required="true">
                            <div class="alert alert-danger" v-if="errors && errors.date">
                                {{ errors.date[0] }}
                            </div>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputCel">Celular</label>
                            <input type="number" class="form-control" v-model="inputCel" placeholder="12549875" required="true">
                            <div class="alert alert-danger" v-if="errors && errors.cel">
                                {{ errors.cel[0] }}
                            </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
            return{
                inputName: "",
                inputCui: "",
                inputGender: "",
                inputDate: "",
                inputCel: "",
                inputAddress: "",
                errors: []
            }
        },
        methods:{
            createPersona(){
                const params ={
                    cui: this.inputCui,
                    name: this.inputName,
                    gender: this.inputGender,
                    address: this.inputAddress,
                    date: this.inputDate,
                    cel: this.inputCel
                }
                axios.post('persona', params)
                    .then(res => {
                        this.inputName = '',
                        this.inputCui = '',
                        this.inputGender = '',
                        this.inputDate = '',
                        this.inputAddress = '',
                        this.inputCel = '',
                        $('#personaModal').modal('hide'),
                        this.$alertify.alert('Trabajo de graduacion','Agregado!',
                        function(){
                            alertify.success('Ok'); 
                        }),
                        this.$emit('register')
                    }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }else{
                        $('#personaModal').modal('hide'),
                        this.$alertify.alert('Trabajo de graduacion','Agregado!',
                        function(){
                            alertify.success('Ok'); 
                        }),
                        this.$emit('register')
                    }
                })
            }
        }
}
</script>