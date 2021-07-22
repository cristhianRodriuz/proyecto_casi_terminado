<div class="container-fluid">

    <!-- Page Heading -->
    <h3 class="h3 mb-2 text-gray-800">Categorías</h3>
    <div class="card shadow mb-4">
        <div class="card-header border-0">
            <button class="btn btn-primary btnNuevaCategoria" data-toggle="modal" data-target="#modalCategoria">Agregar nueva categoría</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped dt-responsive" style="font-size: 12px;" id="dataTableCategorias" width="100%" cellspacing="0">
                    <thead style="font-weight: bold; color: black;" class="text-center">
                        <tr>
                            <th>#</th>
                            <th>Categoría</th>  
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="modal fade" tabindex="-1" role="dialog" id="modalCategoria" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-gradient-primary text-white">
                                    <h4 class="modal-title font-weight-bold titleModal titleModalCategoria text-center" id="exampleModalLabel">NUEVA CATEGORÍA</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" id="formCategoria">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" class="categoria">
                                                <div class="form-group mb-3">
                                                    <label for="regCategoria">Categoría</label>
                                                    <input type="text"  name="regCategoria" id="regCategoria" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btnEditAdd" id="btnEditAdd" disabled>Registrar</button>
                                                    <button type="button" class="btn btn-danger btnEliminar" data-dismiss="modal">Eliminar</button>
                                                    <button type="button" class="btn btn-dark float-right" id="btnCancelar" data-dismiss="modal">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--- ROW-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo URL.VW?>assets/js/categorias.js"></script>
<!-- /.container-fluid -->