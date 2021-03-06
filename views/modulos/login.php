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
                                <form class="user" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Nombre de usuario..." name="username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" placeholder="Contraseña" name="password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Recordar inicio de sesión</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Iniciar sesión
                                    </button>
                                    <?php 
                                    $login = new ControllerAdministrador();
                                    $login->ctrAdministrador();
                                ?>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="recuperar-password">¿Olvidaste tu contraseña?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>