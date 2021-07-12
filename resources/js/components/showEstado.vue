<template>
    <div>
    <h3 class="text-black font-w600">Estados</h3>
    <form class="d-flex">
        <input class="form-control me-2" v-on:keyup="buscarPersona()" v-model="idp" type="search" placeholder="Buscar por CUI" aria-label="Search">
    </form>
    <!-- Modal -->
        <div class="modal fade" id="estadoModal" tabindex="-1" aria-labelledby="personaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEstado">Agregar estado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="col-md-10" action="" v-on:submit.prevent="setEstado()">
                <div class="modal-body">
                    <div class="form-row">
                        <input type="hidden" v-model="idper"/>
                        <div class="form-group col-md-6">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" v-model="cuarentena" id="inpc">
                            <label class="form-check-label" for="cuarentena">
                                En cuarentena
                            </label>
                            <div class="alert alert-danger" v-if="errors && errors.cuarentena">
                                {{ errors.cuarentena[0] }}
                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" v-model="positive">
                            <label class="form-check-label" for="positive">
                                Positivo
                            </label>
                            <div class="alert alert-danger" v-if="errors && errors.positive">
                                {{ errors.positive[0] }}
                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6" id="highInput">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" v-model="high">
                            <label class="form-check-label" for="high">
                                De alta
                            </label>
                            <div class="alert alert-danger" v-if="errors && errors.high">
                                {{ errors.high[0] }}
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="createEstado">Registrar</button>
                    <button type="button" class="btn btn-primary" id="updateEstado" v-on:click="updateEstado()">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">CUI</th>
                <th scope="col">Nombre completo</th>
                <th scope="col">Dirección</th>
                <th scope="col">Genero</th>
                <th scope="col">Numero de celular</th>
                <th colspan="2">
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
                <td>{{data.no_tel}}</td>
                <td><button type="button" class="btn btn-primary" v-on:click="verPersona(data.id)"> Ver estado </button></td>
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
            idp: "",
            idper: "",
            positive: "",
            cuarentena: "",
            high: "",
            errors: [],
            setTime: ""
        }
    },
    mounted(){
    let Checked = null;
    //The class name can vary
    for (let CheckBox of document.getElementsByClassName('form-check-input')){
        CheckBox.onclick = function(){
            if(Checked!=null){
            Checked.checked = false;
            Checked = CheckBox;
            }
            Checked = CheckBox;
        }
    }
    },
    methods :{
        bPersona(){
            axios.get('busqueda/'+this.idp)
            .then((response) =>{
                this.persona = response.data
            })
            .catch(function(error) {
                console.log(error);
            });
        },
        buscarPersona(){
            clearTimeout(this.setTime),
            this.setTime = setTimeout(this.bPersona, 360)
        },
        verPersona(id){
            axios.get('estado/'+id)
            .then((response) =>{
                $('#estadoModal').modal('show'),
                $("#createEstado").show(),
                $("#updateEstado").show(),
                $("#highInput").show(),
                this.upersona = response.data
                if (this.isObjEmpty(this.upersona)){
                        this.cuarentena = "",
                        this.positive = "",
                        this.high = "",
                        this.idper = id,
                        $("#updateEstado").hide(),
                        $("#highInput").hide()
                    }else{
                        $("#createEstado").hide(),
                        this.cuarentena = this.upersona[0].cuarentena,
                        this.positive = this.upersona[0].estado,
                        this.idper = this.upersona[0].persona_id
                    }
            })
            .catch(function(error) {
                console.log(error);
            });
        },
        setEstado(){
            const estados ={
                    cuarentena: this.cuarentena,
                    positivo: this.positive,
                    id: this.idper
                }
                axios.post('estado', estados)
                    .then(res => {
                        this.cuarentena = "",
                        this.positive = "",
                        console.log(res.data)
                        $('#estadoModal').modal('hide'),
                        this.$alertify.alert('Trabajo de graduacion','Actualizado!',
                        function(){
                            alertify.success('Ok'); 
                        })
                    }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }else{
                        this.cuarentena = "",
                        this.positive = "",
                        $('#estadoModal').modal('hide'),
                        this.$alertify.alert('Trabajo de graduacion','Actualizado!',
                        function(){
                            alertify.success('Ok'); 
                        })
                    }
                })
        },
        updateEstado(){
            const estadosu ={
                    cuarentena: this.cuarentena,
                    positivo: this.positive,
                    id: this.idper,
                    alta: this.high
                }
                axios.put('estado/'+this.idper, estadosu)
                    .then(res => {
                        this.cuarentena = "",
                        this.positive = "",
                        this.high = "",
                        console.log(res.data)
                        $('#estadoModal').modal('hide'),
                        this.$alertify.alert('Trabajo de graduacion','Agregado!',
                        function(){
                            alertify.success('Ok'); 
                        })
                    }).catch(error => {
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors;
                        }else{
                            this.cuarentena = "",
                            this.positive = "",
                            this.high = "",
                            $('#estadoModal').modal('hide'),
                            this.$alertify.alert('Trabajo de graduacion','Agregado!',
                            function(){
                                alertify.success('Ok'); 
                            })
                        }
                    })
        },
        isObjEmpty(obj) {
            return Object.keys(obj).length === 0;
        }
    }
}
</script>