<div class="container-fluid">

    <!-- Page Heading -->
    <h3 class="h3 mb-2 text-gray-800">Noticias</h3>
    <div class="card shadow mb-4">
        <div class="card-header border-0">
            <button class="btn btn-primary btnNuevo" data-toggle="modal" data-target="#modalActionNoticias">Agregar nuevo noticia</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped dt-responsive" style="font-size: 12px;" id="dataTableNoticias" width="100%" cellspacing="0">
                    <thead style="font-weight: bold; color: black;" class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Título</th>
                            <th>Decripción</th>
                            <th>Creador</th>
                            <th>Fecha</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalActionNoticias" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-gradient-primary text-white">
                                    <h4 class="modal-title font-weight-bold titleModal text-center" id="exampleModalLabel">NUEVA NOTICIA</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" id="formNoticia">
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="col-md-6 mx-auto">
                                                    <div class="card mb-5 text-center">
                                                        <div class="card-header bg-white">
                                                            <output id="imageNoticia">
                                                                <img src="<?php echo URL; ?>uploads/noticias/noticiasDefault.png" data-dir="<?php echo URL; ?>uploads/noticias/" alt="" id="imgNoticia" class="img-thumbnail">
                                                            </output>
                                                        </div>
                                                        <div class="card-body">
                                                            <span class="text-center text-muted">Max: 2MB</span>
                                                            <label class="btn btn-primary d-block my-3" for="files">Cargar foto</label>
                                                            <div class="files" style="visibility: hidden; width: 0.1px; height: 0.1px;">
                                                                <input accept="images/" name="file" type="file" id="files">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card text-center">
                                                        <div class="card-header bg-white">
                                                            <output id="vNoticia" class="embed-responsive embed-responsive-21by9">
                                                                <video src="" id="videoNoticia" autoplay loop controls tabindex="0" data-dir="<?php echo URL; ?>uploads/noticias/">
                                                                    <source src="" type="video/mp4">
                                                                </video>
                                                            </output>
                                                        </div>
                                                        <div class="card-body">
                                                            <label class="btn btn-primary d-block mb-3" for="customFile">Cargar video</label>
                                                            <div class="files" style="visibility: hidden; width: 0.1px; height: 0.1px;">
                                                                <input class="custom-file-input" name="file_video" type="file" id="customFile">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <input type="hidden" class="noticia">
                                                    <div class="form-group mb-3">
                                                        <label for="regTituloNoticia">Título</label>
                                                        <input type="text" id="regTituloNoticia" name="regTituloNoticia" class="form-control form-control-lg">

                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="regDescripcionNoticia">Descripción</label>
                                                        <input type="text" name="regDescripcionNoticia" id="regDescripcionNoticia" class="form-control form-control-lg" placeholder="20 palabras max.">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="regDesarrolloNoticia">Desarrollo</label>
                                                        <textarea name="regDesarrolloNoticia" id="regDesarrolloNoticia" class="form-control" rows="7"></textarea>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="regCreadoPor">Registrado por</label>
                                                        <input type="text" id="regCreadoPor" name="regCreadoPor" class="form-control text-secondary" value="<?php echo $_SESSION["full_name"]; ?>" disabled style="font-size: 14px;">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btnEditAdd" id="btnEditAdd">Registrar</button>
                                                        <button type="button" class="btn btn-danger btnEliminar" data-dismiss="modal">Eliminar</button>
                                                        <button type="button" class="btn btn-dark float-right" id="btnCancelar" data-dismiss="modal">Cancelar</button>
                                                    </div>
                                            </div>
                                        </div>
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
<script src="<?php echo URL . VW; ?>assets/js/noticias.js"></script>