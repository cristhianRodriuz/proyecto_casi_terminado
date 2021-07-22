<div class="container-fluid">

    <!-- Page Heading -->
    <h3 class="h3 mb-2 text-gray-800">Tabla de Clientes</h3>
    <div class="card shadow mb-4">
        <div class="card-header border-0">
            <button class="btn btn-primary btnNuevoCliente" data-toggle="modal" data-target="#modalActionCliente">Nuevo Cliente</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped dt-responsive" style="font-size: 12px;" id="dataTableClientes" width="100%" cellspacing="0">
                    <thead style="font-weight: bold; color: black;" class="text-center">
                        <tr>
                            <th>#</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Provincia</th>
                            <th>Cantón</th>
                            <th>Parroquia</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="modal fade" tabindex="-1" role="dialog" id="modalActionCliente" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-gradient-primary text-white">
                                    <h4 class="modal-title font-weight-bold titleModalCliente text-center" id="exampleModalLabel">NUEVO CLIENTE</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" id="formCliente">
                                        <input type="hidden" class="idCliente">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="">Nombre</label>
                                                <input type="text" class="form-control" name="regNombreCliente" id="regNombreCliente" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Apellido</label>
                                                <input type="text" class="form-control" name="regApellidoCliente" id="regApellidoCliente" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">DNI</label>
                                            <input type="number" class="form-control" name="regDNICliente" id="regDNICliente">
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="">Teléfono</label>
                                                <input type="number" class="form-control" name="regTelefonoCliente" id="regTelefonoCliente" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Celular</label>
                                                <input type="text" class="form-control" name="regCelularCliente" id="regCelularCliente" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">E-mail</label>
                                            <input type="email" name="regEmailCliente" id="regEmailCliente" class="form-control">
                                        </div>
                                        <div class="forn-group mb-3">
                                            <label for="inputProvincia">Provincia</label>
                                            <select id="selectProvincia" class="form-control">
                                            </select>
                                        </div>
                                        <div class="forn-group mb-3">
                                            <label for="inputCanton">Cantón</label>
                                            <select id="selectCanton" class="form-control">
                                            </select>
                                        </div>
                                        <div class="forn-group mb-3">
                                            <label for="inputParroquia">Parroquia</label>
                                            <select id="selectParroquia" class="form-control">
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="regDireccionCliente">Dirección(Opcional)</label>
                                            <textarea name="regDireccionCliente" disabled class="form-control" id="regDireccionCliente" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btnEditAdd" id="btnEditAdd">Registrar</button>
                                            <button type="button" class="btn btn-danger btnEliminar" data-dismiss="modal">Eliminar</button>
                                            <button type="button" class="btn btn-dark float-right" id="btnCancelar" data-dismiss="modal">Cancelar</button>
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
<script src="<?php echo URL.VW?>assets/js/clientes.js"></script>
<!-- /.container-fluid -->