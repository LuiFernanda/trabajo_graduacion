<template>
<div class="row" >
    <div class="col-xl-4 col-xxl-4 col-sm-4">
        <div class="card gradient-bx text-white rounded" style="background-color: #369DC9;">	
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                        <p class="mb-1">Alta</p>
                        <div class="d-flex flex-wrap" >
                            <h2  class="fs-40 font-w600 text-white mb-0 mr-3">
                            {{nestado.alta}}
                            </h2>
                        </div>
                    </div>
                    <span class="border rounded-circle p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-emoji-laughing" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zM7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5z"/>
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-xxl-4 col-sm-4">
        <div class="card gradient-bx text-white rounded" style="background-color: #FFB800;">	
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                        <p class="mb-1">Cuarentena</p>
                        <div class="d-flex flex-wrap">
                            <h2 class="fs-40 font-w600 text-white mb-0 mr-3">
                            {{nestado.cuarentena}}
                            </h2>
                        </div>
                    </div>
                    <span class="border rounded-circle p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-emoji-neutral" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4 10.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5zm3-4C7 5.672 6.552 5 6 5s-1 .672-1 1.5S5.448 8 6 8s1-.672 1-1.5zm4 0c0-.828-.448-1.5-1-1.5s-1 .672-1 1.5S9.448 8 10 8s1-.672 1-1.5z"/>
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-xxl-4 col-sm-4">
        <div class="card gradient-bx text-white rounded" style="background-color: #F46B68;">	
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                        <p class="mb-1">Positivo</p>
                        <div class="d-flex flex-wrap">
                            <h2 class="fs-40 font-w600 text-white mb-0 mr-3">
                            {{nestado.estado}}
                            </h2>
                        </div>
                    </div>
                    <span class="border rounded-circle p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-emoji-expressionless" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm5 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </span>
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
            nestado: []
        }
    },
    mounted(){
        this.status();
    },
    methods:{
        status (){
            axios.get('estatus')
            .then((response) =>{
                this.nestado = response.data
            })
            .catch(function(error) {
                console.log(error);
            });
        }
    }
}
</script>