<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar usuario</div>

                <div class="card-body">
                    <form action="" v-on:submit.prevent="createUser()">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " v-model="name" required autofocus>

                                <div class="alert alert-danger" v-if="errors && errors.name">
                                    {{ errors.name[0] }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Dirección de correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="email"  required autocomplete="email">
                                <div class="alert alert-danger" v-if="errors && errors.email">
                                    {{ errors.email[0] }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo de usuario</label>

                            <div class="col-md-6">
                                <select class="form-control" id="tipo" v-model='tipo'>
                                    <option value="1">Administrador</option>
                                    <option value="0">Estandar</option>
                                </select>

                                <div class="alert alert-danger" v-if="errors && errors.tipo">
                                    {{ errors.tipo[0] }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " v-model="password" required autocomplete="new-password">

                                <div class="alert alert-danger" v-if="errors && errors.password">
                                    {{ errors.password[0] }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" v-model="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
            return{
                name: "",
                email: "",
                tipo: "",
                password: "",
                password_confirmation: "",
                errors: []
            }
        },
        methods:{
            createUser(){
                const params ={
                    name: this.name,
                    email: this.email,
                    tipo: this.tipo,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                }
                axios.post('user', params)
                    .then(res => {
                        this.name = '',
                        this.email = '',
                        this.tipo = '',
                        this.password = '',
                        this.password_confirmation = '',
                        this.$alertify.alert('Trabajo de graduacion','Agregado!',
                        function(){
                            alertify.success('Ok'); 
                        }),
                        this.$emit('register')
                    }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }else{
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
