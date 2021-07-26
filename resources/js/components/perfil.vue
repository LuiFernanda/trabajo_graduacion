<template>
    <div class="container">
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="media d-sm-flex d-block text-center text-sm-left pb-4 mb-4 border-bottom">
                    <div class="media-body align-items-center">
                        <div class="d-sm-flex d-block justify-content-between my-3 my-sm-0">
                            <div>
                                <h3>{{dpersona.nombre_completo}}</h3>
                                <p class="mb-2 mb-sm-2">{{dpersona.cui}}</p>
                            </div>
                        </div>
                        <div class="btn btn-rounded text-black mb-2 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/>
                            </svg>
                            <p v-if="dpersona.genero == 'F'">Femenino</p>
                            <p v-if="dpersona.genero == 'M'">Masculino</p>
                        </div>
                        <div class="btn btn-rounded text-black mb-2 mr-2">
                            <div v-if="destado == 0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#369DC9" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                    <circle cx="8" cy="8" r="8"/>
                                </svg>
                                <p >Normal</p>
                            </div>
                            <div v-for="data in destado" :key="data.id">
                                <div v-if="data.estado == '1'" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F46B68" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="8"/>
                                    </svg>
                                    <p >Positivo</p>
                                </div>
                                <div v-if="data.cuarentena == '1'" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFB800" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="8"/>
                                    </svg>
                                    <p >Cuarentena</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <div class="media">
                            <span class="p-3 border border-primary-light rounded-circle mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pin-map" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                                    <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                                </svg>
                            </span>
                            <div class="">
                                <span class="d-block text-light mb-2">Dirección</span>
                                <p class="fs-18 text-dark">{{dpersona.direccion}}</p>
                            </div>
                        </div>
                    </div><div class="col-lg-6 mb-3">
                        <div class="media">
                            <span class="p-3 border border-primary-light rounded-circle mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                            </span>
                            <div class="">
                                <span class="d-block text-light mb-2">Celular</span>
                                <p class="fs-18 text-dark">{{dpersona.no_tel}}</p>
                            </div>
                        </div>
                    </div><div class="col-lg-6 mb-3">
                        <div class="media">
                            <span class="p-3 border border-primary-light rounded-circle mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-calendar4-event" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"/>
                                    <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                </svg>
                            </span>
                            <div class="">
                                <span class="d-block text-light mb-2">Dirección</span>
                                <p class="fs-18 text-dark">{{dpersona.fecha_nac | moment("D/M/YYYY")}}</p>
                            </div>
                        </div>
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
            dpersona: [],
            destado: []
        }
    },
    mounted(){
    },
    methods:{
        persona(id){
            axios.get('busquedaCui/'+id)
            .then((response) =>{
                this.dpersona = response.data
                this.estadop(this.dpersona.id)
            })
            .catch(function(error) {
                console.log(error);
            });
        },
        estadop(id){
            axios.get('estado/'+id)
            .then((response) =>{
                this.destado = response.data,
                console.log(this.destado)
                if(this.destado == ''){
                    this.destado = 0
                }
            })
            .catch(function(error) {
                console.log(error);
            });
        }
    }
}
</script>