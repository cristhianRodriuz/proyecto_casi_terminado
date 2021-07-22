<div class="container">

    <!-- Outer Row -->
    <div class="row d-flex justify-content-center align-items-center" style="min-height: 100vh;">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image">

                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Sistema de Administración</h1>
                                    <h3 class="h4 text-gray-900 mb-4">Asociación Asopagua</h3>
                                </div>
                                <div id="contentSearchEmail">
                                    <form class="user" method="POST" id="formSearchEmail">
                                        <div class="form-group">
                                            <label for="">Em@il:</label>
                                            <input type="email" class="form-control form-control-user" id="searchEmail" aria-describedby="searchEmail" placeholder="em@il" name="searchEmail" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Recibir código
                                        </button>
                                    </form>
                                </div>
                                <div id="contentChangePassword">
                                    <form class="user" method="POST" id="formChangePassword">
                                        <div class="form-group">
                                            <label for="">Código de recuperación:</label>
                                            <input type="text" class="form-control form-control-user" id="codeRecuperacion" aria-describedby="codeRecuperacion" placeholder="<code/>" name="codeRecuperacion" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nueva contraseña</label>
                                            <input type="text" class="form-control form-control-user" id="nuevaPassword" placeholder="Contraseña" name="nuevaPassword" disabled required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block btnChangePassword"  disabled>
                                            Cambiar contraseña
                                        </button>
                                    </form>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>

