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
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputCui">CUI</label>
                                                <input type="numer" class="form-control" v-model="inputCuiu" placeholder="Ingrese su CUI" minlegth="13" maxlength="13" required="true">
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group cold-md-4">
                                                <label for="inputGender">Genero</label>
                                                <select class="form-control" v-model="inputGenderu" required="true">
                                                    <option value="M" selected>Masculino</option>
                                                    <option value="F">Femenino</option>
                                                </select>
                                            </div>
                                            <div class="form-group cold-md-8">
                                                <label for="inputAddress">Dirección</label>
                                                <input type="text" class="form-control" v-model="inputAddressu" placeholder="Solola, Solola" required="true">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="inputDate">Fecha nacimiento</label>
                                            <input type="date" class="form-control" v-model="inputDateu" required="true">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputCel">Celular</label>
                                            <input type="number" class="form-control" v-model="inputCelu" placeholder="12549875" minlegth="8" maxlength="8" required="true">
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
    methods:{
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
                .then((response) => 
                this.inputNameu = '',
                this.inputCuiu = '',
                this.inputGenderu = '',
                this.inputDateu = '',
                this.inputAddressu = '',
                this.inputCelu = '',
                this.idp = '',
                $('#udateModal').modal('hide')),
                this.$alertify.alert('Trabajo de graduacion','Actualizado!',
                function(){
                    alertify.success('Ok'); 
                }),
                this.viewPersonas()
            }
    }
}
</script>