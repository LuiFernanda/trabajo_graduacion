<template>
    <div class="container">
        <div class="row justify-content-center">
            <form class="col-md-10"  method="post" v-on:submit.prevent="funcion">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Nombre completo</label>
                    <input type="text" class="form-control" v-model="inputName" placeholder="Nombre completo" required="true">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputCui">CUI</label>
                    <input type="numer" class="form-control" v-model="inputCui" placeholder="Ingrese su CUI" minlegth="13" maxlength="13" required="true">
                    <span v-for="error in errors" class="text-danger"> @{{ error }}</span>
                </div>
                
            </div>
            <div class="form-group">
                <label for="inputAddress">Dirección</label>
                <input type="text" class="form-control" v-model="inputAddress" placeholder="Solola, Solola" required="true">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputDate">Fecha nacimiento</label>
                <input type="date" class="form-control" v-model="inputDate" required="true">
                </div>
                <div class="form-group col-md-6">
                <label for="inputCel">Celular</label>
                <input type="number" class="form-control" v-model="inputCel" placeholder="12549875" minlegth="8" maxlength="8" required="true">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
