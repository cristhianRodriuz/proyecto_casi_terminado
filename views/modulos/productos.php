<div class="container-fluid">

    <!-- Page Heading -->
    <h3 class="h3 mb-2 text-gray-800">Tabla de Productos</h3>
    <div class="card shadow mb-4">
        <div class="card-header border-0">
            <button class="btn btn-primary btnNuevo" data-toggle="modal" data-target="#modalProducto">Agregar nuevo producto</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped dt-responsive" style="font-size: 12px;" id="dataTableProductos" width="100%" cellspacing="0">
                    <thead style="font-weight: bold; color: black;" class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>$(Público)</th>
                            <th>$(Mayorista)</th>
                            <th>Detalle</th>
                            <th>$(Minorista)</th>
                            <th>Detalle</th>
                            <th>Fecha</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalProducto" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-gradient-primary text-white">
                                    <h4 class="modal-title font-weight-bold titleModalProducto text-center" id="exampleModalLabel">NUEVO PRODUCTO</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" id="formProducto">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <form method="POST" enctype="multipart/form-data" id="agregarFoto">
                                                    <div class="card text-center">
                                                        <div class="card-header bg-white">
                                                            <output id="imageProducto">
                                                                <img src="<?php echo URL; ?>uploads/productos/productoDefault.jpg" data-dir="<?php echo URL; ?>uploads/productos/" alt="" id="imgProducto" class="img-thumbnail">
                                                            </output>
                                                        </div>
                                                        <div class="card-body">
                                                            <label class="btn btn-primary d-block mb-3" for="files">Cargar foto</label>
                                                            <div class="files" style="visibility: hidden; width: 0.1px; height: 0.1px;">
                                                                <input accept="images/" name="file" type="file" id="files">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="hidden" class="idProducto">
                                                <div class="form-group mb-3">
                                                    <label for="inputCategoria">Categoria</label>
                                                    <select id="selectCategoria" class="form-control">
                                                        <option selected disabled>--- Seleccione una categoría</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="regCodigo">Código</label>
                                                    <input type="number" id="regCodigo" name="regCodigo" class="form-control form-control-lg" disabled>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="regNombreProducto">Nombre</label>
                                                    <input type="text" id="regNombreProducto" name="regNombreProducto" class="form-control form-control-lg">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="regDescProducto">Descripción</label>
                                                    <input type="text" class="form-control form-control-lg" name="regDescProducto" id="regDescProducto">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="regStock">Stock</label>
                                                    <input type="number" minlength="1" class="form-control form-control-lg" name="regStock" id="regStock">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="regPrecioPublico">$(Precio al público)</label>
                                                    <input type="number" step="0.01" min="0" class="form-control form-control-lg" name="regPrecioPublico" id="regPrecioPublico">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="regPrecioMayorista">$(Precio mayorista)</label>
                                                    <input type="number" step="0.01" min="0" class="form-control form-control-lg" name="regPrecioMayorista" id="regPrecioMayorista">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="regDetalleMayorista">Detalle</label>
                                                    <input type="text" class="form-control form-control-lg" name="regDetalleMayorista" id="detalleMayorista">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="regPrecioMinorista">$(Precio minorista)</label>
                                                    <input type="number" step="0.01" min="0" class="form-control form-control-lg" name="regPrecioMinorista" id="regPrecioMinorista">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="regDetalleMinorista">Detalle</label>
                                                    <input type="text" class="form-control form-control-lg" name="regDetalleMinorista" id="regDetalleMinorista">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btnEditAdd" id="btnEditAdd">Registrar</button>
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
<script src="<?php echo URL.VW?>assets/js/productos.js"></script>
<!-- /.container-fluid -->