<div class="modal" id="modal-catalogo">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_modal">Agregar</h5>
            </div>
            <div class="modal-body">
                <form name="formCatalogo">
                    <div class="col">
                        <div class="form-group">
                            <label>*Nombre</label>
                            <input type="text" name="nombre" class="form-control" />
                            <small id="msg_nombre" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <input type="hidden" name="catalogo_id" class="form-control" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="btn-modal-agregar" type="button" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                <button id="btn-modal-editar" type="button" class="btn btn-primary"><i class="fas fa-save"></i> Editar</button>
            </div>
        </div>
    </div>
</div>