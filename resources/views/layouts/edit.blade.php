<form method="POST" v-on:submit.prevent="createPersona>
    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4>Editar persona</h4>
                </div>
                <div class="modal-body">
                    <label for="inptName">Nombre completo</label>
                    <input type="text" name="inptName" class="form-control" v-model="inptName">
                    <span v-for="error in errors" class="text-danger">@{{ error }}</span>

                    <label for="inptCUI">CUI</label>
                    <input type="number" name="inptCUI" class="form-control" v-model="inptCUI">
                    <span v-for="error in errors" class="text-danger">@{{ error }}</span>

                    <label for="inptAddress">Nueva persona</label>
                    <input type="text" name="inptAddress" class="form-control" v-model="inptAddress">
                    <span v-for="error in errors" class="text-danger">@{{ error }}</span>

                    <label for="inptData">Fecha nacimiento</label>
                    <input type="data" name="inptData" class="form-control" v-model="inptData">
                    <span v-for="error in errors" class="text-danger">@{{ error }}</span>

                    <label for="inptCel">Numero de celular</label>
                    <input type="text" name="inptCel" class="form-control" v-model="inptCel">
                    <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </div>
        </div>
    </div>
</form>