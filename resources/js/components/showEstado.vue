<template>
    <div>
    <form class="d-flex" v-on:submit.prevent="verPersona()">
        <input class="form-control me-2" v-model="idp" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
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
            errors: []
        }
    },
    mounted(){
    },
    methods :{
        verPersona(){
            console.log(this.idp)
            axios.get('busqueda/'+this.idp)
            .then((response) =>{
                console.log(response.data)
            })
            .catch(function(error) {
                console.log(error);
            });
        }
    }
}
</script>