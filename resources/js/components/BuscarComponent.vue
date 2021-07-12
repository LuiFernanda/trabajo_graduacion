<template>
    <div class="container">
        <div class="input-group search-area ml-auto d-inline-flex">
            <input class="form-control me-2" v-on:keyup="buscarPersona()" v-model="idp" type="search" placeholder="Buscar por CUI" aria-label="Search">
        </div>
        <perfil ref="perfil"></perfil>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                persona: [],
                upersona: [],
                nestado: [],
                idp: "",
                setTime: ""
            }
        },
        mounted(){
        },
        methods: {
            buscarE() {
                this.$refs.perfil.persona(this.idp);
            },
            buscarPersona(){
                clearTimeout(this.setTime),
                this.setTime = setTimeout(this.buscarE, 360)
            }
        }
    }
</script>