<template>
    <div class="container">
        <button type="button" id="modalp" class="btn btn-primary" data-toggle="modal" data-target="#personaModal"> Registrar </button>
        <form-persona @register="register">Ver registros</form-persona>
        <hr>
        <show-persona ref="actualiza">Ver registros</show-persona>
    </div>
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
            this.$refs.actualiza.viewPersonas();
        },
        methods: {
            register() {
                this.$refs.actualiza.viewPersonas();
            },
        }
    }
</script>
