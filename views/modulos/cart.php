    <link rel="stylesheet" href="https://assets.jumpseller.com/store/verduleria-online/themes/290816/styles.css?1619244409" />
    <link rel="stylesheet" href="https://assets.jumpseller.com/store/verduleria-online/themes/290816/color_pickers.css?1619244409" />
    <link rel="stylesheet" href="https://assets.jumpseller.com/store/verduleria-online/themes/290816/linear-icon.css?1619244409" />
    <style>
        * {
            margin: 0;
            padding: 0
        }

        h2 {
            color: #2F8D46;
        }

        #form {
            text-align: center;
            position: relative;
        }

        #form fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            margin: 0;
            position: relative
        }

        .finish {
            text-align: center
        }

        #form fieldset:not(:first-of-type) {
            display: none
        }

        #form .previous-step,
        .next-step {
            width: 100px;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            float: right
        }

        .form,
        .previous-step {
            background: #616161;
        }

        .form,
        .next-step {
            background: #2F8D46;
        }

        #form .previous-step:hover,
        #form .previous-step:focus {
            background-color: #000000
        }

        #form .next-step:hover,
        #form .next-step:focus {
            background-color: #2F8D46
        }

        .text {
            color: #2F8D46;
            font-weight: normal
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }


        #progressbar .active {
            color: #2F8D46
        }

        #progressbar li {
            list-style-type: none;
            font-size: 15px;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400;
        }

        #progressbar #step1:before {
            content: "1";
        }

        #progressbar #step2:before {
            content: "2";
        }

        #progressbar #step3:before {
            content: "3";
        }

        #progressbar #step4:before {
            content: "4";
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px;
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1;
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #2F8D46;
        }

        .steps {
            z-index: 10 !important;
            color: grey;
        }
    </style>
    <header class="header">
        <div class="preheader">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="preheader-message">
                            Estamos en facebook como: <a href="https://www.facebook.com/asopagua.asopagua.75" class="text-white" target="_blank"><b>@Asopagua</b></a> ¡Síguenos!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="logo-area">
            <div class="align-items-center">
                <div class="col-12 d-lg-none text-center">
                    <a href="/" title="Despacho Pistacho" class="navbar-brand">
                        <img src="ASOPAGUA.png" class="store-image" alt="Despacho Pistacho" />
                    </a>
                </div>
                <div class="col-2 d-lg-none">
                    <button class="btn primary mobile-menu-trigger">
                        <div class="nav-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-4 d-none d-lg-block">
                            <a href="" title="Despacho Pistacho" class="navbar-brand">
                                <!-- <img src="bg_small.png" class="store-image" style="max-width: 50%;" alt="Despacho Pistacho" /> -->
                                <span class="logo_text">Logo pendiente</span>
                            </a>
                        </div>
                        <div class="col-md-8 cartValido">
                            <div>
                                <form id="form">
                                    <ul id="progressbar">
                                        <li class="active steps" id="step1">
                                            <strong>Carro</strong>
                                        </li>
                                        <li id="step2" class="steps"><strong>Proceso de pago</strong></li>
                                        <li id="step3" class="steps"><strong>Revisión</strong></li>
                                        <li id="step4" class="steps"><strong>Éxito</strong></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container container-main mt-0 cartValido">
        <div class="row">
            <div class="col-lg-8" id="divAllDetalles">
                <div class="col divCarrito">
                    <div>
                        <h2 class="block-header">Carrito de pedidos</h2>
                    </div>
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Precio final</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                        </table>
                    </div>
                </div>
                <form class="col infoUser" id="clienteForm">
                    <div class="col">
                        <h2 class="block-header">Información del cliente</h2>
                    </div>
                    <div class="col">
                        <div>
                            <span class="text-secondary">* Si eres un cliente recurrente, puedes ingresar tu DNI y tu email y tu información se cargará automáticamente</span>
                        </div>
                        <div action="">
                            <div class="form-group my-3 form-check">
                                <input type="checkbox" class="form-check-input" id="checkInformacionCliente" disabled>
                                <label class="form-check-label" for="checkInformacionCliente">Editar Información</label>
                            </div>
                            <div class="row">
                                <input type="hidden" id="clienteRegistrado">
                                <div class="col-md-6 form-group">
                                    <label for="">DNI</label>
                                    <input type="number" id="dniCliente" class="form-control">
                                </div>
                                <div class="col-md 6 form-group">
                                    <label for="">Email</label>
                                    <input type="email" id="emailCliente" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" id="btnVerificarInformacion" class="btn btn-primary">Verificar</button>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" name="nombreClientePedido" id="nombreClientePedido" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="">Apellido</label>
                                    <input type="text" name="apellidoClientePedido" id="apellidoClientePedido" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="">Teléfono</label>
                                    <input type="number" name="telefonoClientePedido" id="telefonoClientePedido" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="">Celular</label>
                                    <input type="number" name="celularClientePedido" id="celularClientePedido" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h2 class="block-header">Información de envío</h2>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Provincia</label>
                            <input type="text" name="provinciaClientePedido" id="provinciaClientePedido" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Cantón</label>
                            <input type="text" name="cantonClientePedido" id="cantonClientePedido" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Parroquia</label>
                            <input type="text" name="parroquiaClientePedido" id="parroquiaClientePedido" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Dirección</label>
                            <textarea class="form-control" name="direccionClientePedido" id="direccionClientePedido"></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <button class="btn btn-primary btnProcesarPedido">Procesar pedido</button>
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-md-4 order-md-2 mb-4 divResumenPago">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-success">Resumen del pedido</span>
                    <span class="badge badge-secondary badge-pill total_products">0</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Subtotal</h6>
                            <small class="text-muted">Precio sin IVA</small>
                        </div>
                        <span class="text-muted txtSubtotal">$0.00</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Envío</h6>
                            <small class="text-muted">Costo de envío</small>
                        </div>
                        <span class="text-muted">$0.00</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Descuentos</h6>
                        </div>
                        <span class="text-muted">$0.00</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0 text-success">TOTAL</h6>
                        </div>
                        <span class="text-success txtTotal">$0.00</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <button class="btn btn-primary btn-block btnCompletar">Confirmar pedido</button>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <button class="btn btn-danger btn-block btnVaciarCarrito">Vaciar carrito</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container container-main cartInvalido" style="height: 500px">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card text-center border-0">
                    <div class="card-header border-0 bg-white">
                        <img class="img-responsive" style="width:50%;" src="<?php echo URL . VW; ?>assets/images/carritoVacio.png" alt="">
                    </div>
                    <div class="card-body border-0">
                        <h5>Su carro de pedidos actualmente esta vacío</h5>
                        <a href="catalogo-productos" class="text-primary">Agregar productos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer" class="footer-1 mt-2">
        <div class="main-footer widgets-dark typo-light">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="widget subscribe no-box">
                            <h5 class="widget-title">ASOPAGUA<span></span></h5>
                            <p>Con el financiamiento de la empresa extremeña de cooperación AEXCID se ha logrado también el proyecto "Desarrollo sostenible para la inclusión de mujeres y jóvenes en cadenas productivas de Pucayacu y Guasaganda en la provincia de Cotopaxi, ECuador." que busca el impulso a las cadenas de cacao, caña y leche.</p>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="widget no-box">
                            <h5 class="widget-title">Contactos<span></span></h5>
                            <p>Números de teléfonos</p>
                            <p>+593 981 574 500 - 02 3047 124</p>
                        </div>
                        <div class="widget no-box">
                            <p>Ubicación</p>
                            <p>Cantón la Maná a 5km en la vía Guasaganda, Pacayacu, recinto el Copal</p>
                        </div>
                        <div class="widget no-box">
                            <p>Horario comercial</p>
                            <p>Lun. - Vier. 08:00 am - 05:00 pm</p>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4">

                        <div class="widget no-box">
                            <h5 class="widget-title">Síguenos<span></span></h5>
                            <ul class="social-footer2">
                                <li class=""><a title="youtube" target="_blank" href="https://www.youtube.com/channel/UC_osRDuNAp1ZZxKckdKlNsw?sub_confirmation=1"><img alt="youtube" width="30" height="30" src="data:image/png;base64,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"></a></li>
                                <li class=""><a href="https://www.facebook.com/" target="_blank" title="Facebook"><img alt="Facebook" width="30" height="30" src="data:image/png;base64,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"></a></li>
                                <li class=""><a href="https://twitter.com" target="_blank" title="Twitter"><img alt="Twitter" width="30" height="30" src="data:image/png;base64,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"></a></li>
                                <li class=""><a title="instagram" target="_blank" href="https://www.instagram.com/"><img alt="instagram" width="30" height="30" src="data:image/png;base64,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"></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Copyright Asopagua © 2021. Todos los derechos reservados.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <style>
        footer .main-footer {
            padding: 20px 0;
            background: #252525;
        }

        footer ul {
            padding-left: 0;
            list-style: none;
        }

        /* Copy Right Footer */
        .footer-copyright {
            background: #222;
            padding: 5px 0;
        }

        .footer-copyright .logo {
            display: inherit;
        }

        .footer-copyright nav {
            float: right;
            margin-top: 5px;
        }

        .footer-copyright nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .footer-copyright nav ul li {
            border-left: 1px solid #505050;
            display: inline-block;
            line-height: 12px;
            margin: 0;
            padding: 0 8px;
        }

        .footer-copyright nav ul li a {
            color: #969696;
        }

        .footer-copyright nav ul li:first-child {
            border: medium none;
            padding-left: 0;
        }

        .footer-copyright p {
            color: #969696;
            margin: 2px 0 0;
        }

        /* Footer Top */
        .footer-top {
            background: #252525;
            padding-bottom: 30px;
            margin-bottom: 30px;
            border-bottom: 3px solid #222;
        }

        /* Footer transparent */
        footer.transparent .footer-top,
        footer.transparent .main-footer {
            background: transparent;
        }

        footer.transparent .footer-copyright {
            background: none repeat scroll 0 0 rgba(0, 0, 0, 0.3);
        }

        /* Footer light */
        footer.light .footer-top {
            background: #f9f9f9;
        }

        footer.light .main-footer {
            background: #f9f9f9;
        }

        footer.light .footer-copyright {
            background: none repeat scroll 0 0 rgba(255, 255, 255, 0.3);
        }

        /* Footer 4 */
        .footer- .logo {
            display: inline-block;
        }

        .widget {
            padding: 20px;
            margin-bottom: 40px;
        }

        .widget.widget-last {
            margin-bottom: 0px;
        }

        .widget.no-box {
            padding: 0;
            background-color: transparent;
            margin-bottom: 40px;
            box-shadow: none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            -ms-box-shadow: none;
            -o-box-shadow: none;
        }

        .widget.subscribe p {
            margin-bottom: 18px;
        }

        .widget li a {
            color: #ff8d1e;
        }

        .widget li a:hover {
            color: #4b92dc;
        }

        .widget-title {
            margin-bottom: 20px;
        }

        .widget-title span {
            background: #839FAD none repeat scroll 0 0;
            display: block;
            height: 1px;
            margin-top: 25px;
            position: relative;
            width: 20%;
        }

        .widget-title span::after {
            background: inherit;
            content: "";
            height: inherit;
            position: absolute;
            top: -4px;
            width: 50%;
        }

        .widget-title.text-center span,
        .widget-title.text-center span::after {
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
        }

        .widget .badge {
            float: right;
            background: #7f7f7f;
        }

        .typo-light h1,
        .typo-light h2,
        .typo-light h3,
        .typo-light h4,
        .typo-light h5,
        .typo-light h6,
        .typo-light p,
        .typo-light div,
        .typo-light span,
        .typo-light small {
            color: #fff;
        }

        ul.social-footer2 {
            margin: 0;
            padding: 0;
            width: auto;
        }

        ul.social-footer2 li {
            display: inline-block;
            padding: 0;
        }

        ul.social-footer2 li a:hover {
            background-color: #ff8d1e;
        }

        ul.social-footer2 li a {
            display: block;
            height: 30px;
            width: 30px;
            text-align: center;
        }

        .btn_footer {
            background-color: #ff8d1e;
            color: #fff;
        }

        .btn_footer:hover,
        .btn_footer:focus,
        .btn_footer.active {
            background: #4b92dc;
            color: #fff;
            -webkit-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            -ms-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            -o-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            -webkit-transition: all 250ms ease-in-out 0s;
            -moz-transition: all 250ms ease-in-out 0s;
            -ms-transition: all 250ms ease-in-out 0s;
            -o-transition: all 250ms ease-in-out 0s;
            transition: all 250ms ease-in-out 0s;

        }
    </style>
    <script>
        $(document).ready(function() {
            document.title = 'Carrito de pedidos';
            $(".cartInvalido").hide();
            $(".cartValido").hide();
            $(".infoUser").hide();
            let carrito = {};
            let nCantidad = 0;
            let subotal = 0;
            let descuento = 0;
            let costo_envio = 0;
            let total = 0;
            let precio_cobrar = 0.00;
            let smtps = ["gmail.com", "hotmail.com", "outlook.com"];
            if (localStorage.getItem('cart_user')) {
                $(".cartValido").show();
                carrito = JSON.parse(localStorage.getItem('cart_user'));
                createNewCar();
            } else {
                $(".cartInvalido").show();
            }

            function createNewCar() {
                let dataOficial = [];
                let cart_oficial = {
                    "codigo_producto": "",
                };
                let insertData = ``;
                Object.values(carrito).forEach(items => {
                    cart_oficial["codigo_producto"] = items.codigo_producto;
                    cart_oficial["nombre"] = items.nombre;
                    cart_oficial["cantidad"] = items.cantidad;
                    if (items.cantidad >= items.d_minorista && items.cantidad < items.d_mayorista) {
                        cart_oficial["precio"] = Number(items.precio_minorista).toFixed(2);
                    } else if (items.cantidad >= items.d_mayorista) {
                        cart_oficial["precio"] = Number(items.precio_mayorista).toFixed(2);
                    } else {
                        cart_oficial["precio"] = Number(items.precio_publico).toFixed(2);
                    }
                    cart_oficial["subtotal"] = Number(items.cantidad * cart_oficial["precio"]).toFixed(2);
                    dataOficial.push(cart_oficial);
                    cart_oficial = {};
                })
                localStorage.setItem("cart_oficial", JSON.stringify(dataOficial));
                let carritoOficial = JSON.parse(localStorage.getItem("cart_oficial"));
                printCarrito(carritoOficial);

            }

            function printCarrito(carritoOficial) {
                let insertData = ``;
                Object.values(carritoOficial).forEach(items => {
                    insertData += `<tr>
                    <td>${items.nombre}</td>
                    <td>$ ${items.precio}</td>
                    <td>${items.cantidad}</td>
                    <td>$ ${items.subtotal}</td>
                    </tr>`;
                })
                $("#tbody").html(insertData);
                printResumen(carritoOficial);

            }

            function printResumen(carritoOficial) {
                nCantidad = Object.values(carritoOficial).reduce((acc, {
                    cantidad
                }) => acc + Number(cantidad), 0);
                subotal = Object.values(carritoOficial).reduce((acc, {
                    subtotal
                }) => acc + Number(subtotal), 0);
                total = (subotal + costo_envio) - descuento;
                $(".total_products").html(nCantidad);
                $(".txtSubtotal").html("$ " + subotal.toFixed(2));
                $(".txtTotal").html("$ " + total.toFixed(2));
            }
            $(".back").click(function() {
                window.location.href = "inicio#productosDestacados";
            })
            let currentGfgStep, nextGfgStep, previousG
            let fgStep;
            let opacity;
            let current = 1;
            let steps = 4;
            // setProgressBar(current);
            $(".btnCompletar").click(function() {
                current++;
                let id = "step" + current;
                $(`#${id}`).addClass('active');
                $(".divCarrito").fadeOut(1000);
                $(".infoUser").fadeIn(1000);
                $(".divResumenPago").fadeOut(1000);
                $("#divAllDetalles").removeClass('col-lg-8');
                $("#divAllDetalles").addClass('col-12');
            })
            $(".btnProcesarPedido").click(function(e) {
                current++;
                let id = "step" + current;
                $(`#${id}`).addClass('active');
                e.preventDefault();
                let formData = new FormData();
                formData.append("regClienteCart", "");
                formData.append("regNombreClienteCart", $("#nombreClientePedido").val());
                formData.append("regApellidoClienteCart", $("#apellidoClientePedido").val());
                formData.append("regDNIClienteCart", $("#dniCliente").val());
                formData.append("regTelefonoClienteCart", $("#telefonoClientePedido").val());
                formData.append("regCelularClienteCart", $("#celularClientePedido").val());
                formData.append("regEmailClienteCart", $("#emailCliente").val());
                formData.append("regProvinciaClienteCart", $("#provinciaClientePedido").val());
                formData.append("regCantonClienteCart", $("#cantonClientePedido").val());
                formData.append("regParroquiaClienteCart", $("#parroquiaClientePedido").val());
                formData.append("regDireccionClienteCart", $("#direccionClientePedido").val());
                let detallePedido = JSON.parse(localStorage.getItem("cart_oficial"));
                let totalPago = $(".txtTotal").html();
                if ($("#clienteRegistrado").val() != '') {
                    if (localStorage.getItem("change_info_envio") == "YES") {
                        console.log($("#clienteRegistrado").val());
                        formData.append("editIdClienteCart", $("#clienteRegistrado").val());
                        formData.append("accionCart", "Editar");
                        $.ajax({
                            type: "POST",
                            url: "ajax/clientes.php",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                let status = JSON.parse(response);
                                if (status.verificado) {
                                    return;
                                }
                            }
                        });
                    }
                    let clienteReg = $("#clienteRegistrado").val();
                    console.log(clienteReg);
                    let detalle_pedido = JSON.parse(localStorage.getItem('cart_oficial'));
                    let totalPago = $(".txtTotal").html();
                    $.ajax({
                        type: "POST",
                        url: "ajax/pedidos.php",
                        data: {
                            "nuevo_pedido": "Yes",
                            clienteReg,
                            detalle_pedido,
                            totalPago

                        },
                        success: function(response) {
                            console.log(response);
                            let dataResponse = JSON.parse(response);
                            Swal.fire({
                                position: 'top-end',
                                title: "Procesando pedido",
                                html: "Estamos procesando su pedido. Esto puede tardar un momento",
                                timer: 1000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading()
                                    timeInterval = setInterval(() => {
                                        const content = Swal.getHtmlContainer()
                                        if (content) {
                                            const b = content.querySelector('b');
                                            if (b) {
                                                b.textContent = Swal.getTimerLeft()
                                            }
                                        }
                                    }, 100)
                                },
                                willClose: () => {
                                    clearInterval(timeInterval)
                                }
                            }).then(() => {
                                if (dataResponse) {
                                    localStorage.setItem('detalle_cliente_pedido', JSON.stringify(dataResponse));
                                    localStorage.removeItem("cart_user");
                                    localStorage.removeItem("cart_oficial");
                                    window.location.href = "confirmacion";
                                }
                            })
                        }
                    });
                } else {
                    $.ajax({
                        type: "POST",
                        url: "ajax/clientes.php",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            let responseJson = JSON.parse(response);
                            if (responseJson) {
                                let idCliente = responseJson["id"];
                                let detalle_pedido = JSON.parse(localStorage.getItem('cart_oficial'));
                                let totalPago = $(".txtTotal").html();
                                $.ajax({
                                    type: "POST",
                                    url: "ajax/pedidos.php",
                                    data: {
                                        "nuevo_pedido": "Yes",
                                        clienteReg: idCliente,
                                        detalle_pedido,
                                        totalPago

                                    },
                                    success: function(response) {
                                        console.log(response);
                                        let dataResponse = JSON.parse(response);
                                        Swal.fire({
                                            position: 'top-end',
                                            title: "Procesando pedido",
                                            html: "Estamos procesando su pedido. Esto puede tardar un momento",
                                            timer: 1000,
                                            timerProgressBar: true,
                                            didOpen: () => {
                                                Swal.showLoading()
                                                timeInterval = setInterval(() => {
                                                    const content = Swal.getHtmlContainer()
                                                    if (content) {
                                                        const b = content.querySelector('b');
                                                        if (b) {
                                                            b.textContent = Swal.getTimerLeft()
                                                        }
                                                    }
                                                }, 100)
                                            },
                                            willClose: () => {
                                                clearInterval(timeInterval)
                                            }
                                        }).then(() => {
                                            if (dataResponse) {
                                                localStorage.setItem('detalle_cliente_pedido', JSON.stringify(dataResponse));
                                                localStorage.removeItem("cart_user");
                                                localStorage.removeItem("cart_oficial");
                                                window.location.href = "confirmacion";
                                                
                                            }
                                        })
                                    }
                                });

                            }
                        }
                    });
                    // sendProcessPedido(null, detallePedido, totalPago, formData);
                }
            })

            $(".btnVaciarCarrito").click(function() {
                Swal.fire({
                    title: '¿Quieres vaciar tu carrito de pedidos?',
                    text: "Perderás todos los productos seleccionados",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí!',
                    cancelButtonText: '¡No!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        localStorage.removeItem('cart_user');
                        localStorage.removeItem('cart_oficial');
                        localStorage.removeItem('change_info_envio');

                        Swal.fire(
                            'Carrito vacío!',
                            'Su carrito de pedidos esta vacío',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "cart";
                            }
                        })
                    }
                })
            })
            // $(".next-step").click(function() {
            //     currentGfgStep = $(this).parent();
            //     nextGfgStep = $(this).parent().next();

            //     $("#progressbar li").eq($("fieldset")
            //         .index(nextGfgStep)).addClass("active");

            //     nextGfgStep.show();
            //     currentGfgStep.animate({
            //         opacity: 0
            //     }, {
            //         step: function(now) {
            //             opacity = 1 - now;

            //             currentGfgStep.css({
            //                 'display': 'none',
            //                 'position': 'relative'
            //             });
            //             nextGfgStep.css({
            //                 'opacity': opacity
            //             });
            //         },
            //         duration: 500
            //     });
            //     setProgressBar(++current);
            // });

            // $(".previous-step").click(function() {

            //     currentGfgStep = $(this).parent();
            //     previousGfgStep = $(this).parent().prev();

            //     $("#progressbar li").eq($("fieldset")
            //         .index(currentGfgStep)).removeClass("active");

            //     previousGfgStep.show();

            //     currentGfgStep.animate({
            //         opacity: 0
            //     }, {
            //         step: function(now) {
            //             opacity = 1 - now;
            //             currentGfgStep.css({
            //                 'display': 'none',
            //                 'position': 'relative'
            //             });
            //             previousGfgStep.css({
            //                 'opacity': opacity
            //             });
            //         },
            //         duration: 500
            //     });
            //     setProgressBar(--current);
            // });

            // function setProgressBar(currentStep) {
            //     var percent = parseFloat(100 / steps) * current;
            //     percent = percent.toFixed();
            //     $(".progress-bar")
            //         .css("width", percent + "%")
            // }

            // Capturar información de los formularios
            $("#btnVerificarInformacion").on("click", function() {
                if ($("#dniCliente").val() == '' || $("#emailCliente").val() == '') {
                    alert("Necesitas ingresar todos los campos");
                } else {
                    let cedula = $("#dniCliente").val();
                    let responseDni = verificateDni(cedula);
                    let responseEmail = validarEmail($("#emailCliente").val());
                    console.log(responseDni, responseEmail);
                    if (responseDni == true && responseEmail == true) {
                        nextProcess(cedula, $("#emailCliente").val());
                    } else if (responseDni == false && responseEmail == true) {
                        $("#dniCliente").focus();
                        Swal.fire({
                            icon: 'error',
                            title: 'El número de DNI ingresado no es válido',
                            text: 'Ingrese un número de cédula diferente'
                        })
                    } else if (responseDni == true && responseEmail == false) {
                        $("#emailCliente").focus();
                        Swal.fire({
                            icon: 'error',
                            title: 'La dirección de correo ingresada no es válida',
                            text: 'Ingrese una dirección de correo diferente'
                        })

                    } else {
                        $("#dniCliente").focus();
                        Swal.fire({
                            icon: 'error',
                            title: 'Los datos ingresados no son correcots',
                            text: "Verifique sus datos e ingrese datos vàlidos"
                        })

                    }
                }
            })
            $("#telefonoClientePedido").blur(function(e){
                let telefono = e.target.value;
                if(telefono.length != 10){
                    $("#telefonoClientePedido").focus();
                    Swal.fire({
                        icon: 'error',
                        title: 'La cantidad de números es incorreca',
                        text: "Recuerde que un número de teléfono esta compuesto por 10 números"

                    })
                }
            })
            $("#celularClientePedido").blur(function(e){
                let celular = e.target.value;
                if(celular.length != 10){
                    $("#celularClientePedido").focus();
                    Swal.fire({
                        icon: 'error',
                        title: 'La cantidad de números es incorreca',
                        text: "Recuerde que un número de celular esta compuesto por 10 números"

                    })
                }
            })
            $("#checkInformacionCliente").on("change", function() {
                Swal.fire({
                    title: '¿Realmente desea cambiar su información previamente almacenada?',
                    text: "¡Recuerde que su información es confidencial y nos permitirá comunicarnos con UD!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, cambiar!',
                    cancelButtonText: "No",
                }).then((result) => {
                    if (result.isConfirmed) {
                        localStorage.setItem('change_info_envio', "YES");
                        contactInfoDisabled(false);
                        $(this).attr("disabled", true);
                    } else {
                        localStorage.setItem('change_info_envio', "NO");
                        $("#checkInformacionCliente").prop("checked", false);
                    }
                })
            })

            function contactInfoDisabled(valor) {
                // Info-Contacto inputs
                if (localStorage.getItem('change_info_envio') == "NO") {
                    $("#dniCliente").attr("disabled", valor);
                    $("#emailCliente").attr("disabled", valor);
                    $("#nombreClientePedido").attr("disabled", valor);
                    $("#apellidoClientePedido").attr("disabled", valor);

                }
                $("#telefonoClientePedido").attr("disabled", valor);
                $("#celularClientePedido").attr("disabled", valor);

                //info-Envio inputs
                $("#provinciaClientePedido").attr("disabled", valor);
                $("#cantonClientePedido").attr("disabled", valor);
                $("#parroquiaClientePedido").attr("disabled", valor);
                $("#direccionClientePedido").attr("disabled", valor);

            }
            function nextProcess(dni, email) {
                $.ajax({
                    type: "POST",
                    url: "ajax/clientes.php",
                    data: {
                        "verifiyDNI": dni,
                        "verifyEmail": email
                    },
                    success: function(response) {
                        let resJson = JSON.parse(response);
                        Swal.fire({
                            position: "top-end",
                            title: "Verificando su información",
                            html: "Esperando a que el sistema verifique los datos. Esto puede tardar un momento",
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                timeInterval = setInterval(() => {
                                    const content = Swal.getHtmlContainer()
                                    if (content) {
                                        const b = content.querySelector('b');
                                        if (b) {
                                            b.textContent = Swal.getTimerLeft()
                                        }
                                    }
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timeInterval)
                            }
                        }).then(() => {
                            if (resJson.length > 0) {
                                Swal.fire({
                                    position: "top-end",
                                    title: "Hola, " + resJson[0].nombre + ' ' + resJson[0].apellido,
                                    html: "Gracias por realizar un pedido nuevo y confiar en nosotros",
                                    timer: 2000,
                                    didOpen: () => {
                                        Swal.showLoading()
                                        timeInterval = setInterval(() => {
                                            const content = Swal.getHtmlContainer()
                                            if (content) {
                                                const b = content.querySelector('b');
                                                if (b) {
                                                    b.textContent = Swal.getTimerLeft()
                                                }
                                            }
                                        }, 100)
                                    },
                                    willClose: () => {
                                        clearInterval(timeInterval)
                                    }
                                }).then(() => {
                                    printDataCliente(resJson[0]);
                                    $("#checkInformacionCliente").attr("disabled", false);
                                    localStorage.setItem('change_info_envio', "NO");
                                    contactInfoDisabled(true);

                                })
                            } else {
                                localStorage.setItem('change_info_envio', "NO");
                                Swal.fire({
                                    position: "top-end",
                                    title: "Hola, Bienvenido",
                                    html: "Este es el sitema de pedidos de Asopagua, complete su información de contacto",
                                    timer: 2000,
                                    didOpen: () => {
                                        Swal.showLoading()
                                        timeInterval = setInterval(() => {
                                            const content = Swal.getHtmlContainer()
                                            if (content) {
                                                const b = content.querySelector('b');
                                                if (b) {
                                                    b.textContent = Swal.getTimerLeft()
                                                }
                                            }
                                        }, 100)
                                    },
                                    willClose: () => {
                                        clearInterval(timeInterval)
                                    }
                                })
                            }
                            // if (resJson.verificado == false) {
                            //     console.log(resJson.data);
                            // } else {
                            //     Swal.fire({
                            //         icon: 'error',
                            //         title: 'Esta dirección de correo no está disponible!',
                            //         text: 'Ingrese una dirección de correo diferente'
                            //     })
                            //     // addDisabled();
                            // }
                        })
                    }
                });
            }

            function verificateDni(cedula) {
                let resulVerificate = false;
                if (cedula.length == 10) {
                    let digito_region = cedula.substring(0, 2);
                    if (digito_region >= 1 && digito_region <= 24) {
                        let ultimo_digito = cedula.substring(9, 10);
                        let result_impares = 0;
                        let sum_pares = 0;
                        for (let i = 0; i < cedula.length - 1; i++) {
                            if (i % 2 != 0) {
                                sum_pares += parseInt(cedula[i]);
                            } else {
                                let result = parseInt(cedula[i] * 2);
                                if (result > 9) {
                                    result_impares += (result - 9);
                                } else {
                                    result_impares += result;
                                }
                            }
                        }
                        let sum_total = sum_pares + result_impares;
                        let mod = (sum_total % 10);
                        if (10 - mod == ultimo_digito) {
                            resulVerificate = true;
                        }
                    } else {
                        resulVerificate = false;
                    }
                } else {
                    resulVerificate = false;
                }
                return resulVerificate;
            }

            function validarEmail(email) {
                let servidores = ["gmail.com", "hotmail.com", "outlook.com"];
                let arrCorreo = email.split('@');
                return servidores.includes(arrCorreo[1]);
                //Mail incorrecto
            }
            function printDataCliente(data) {
                $("#nombreClientePedido").val(data.nombre);
                $("#apellidoClientePedido").val(data.apellido);
                $("#telefonoClientePedido").val(data.telefono);
                $("#celularClientePedido").val(data.celular);
                $("#provinciaClientePedido").val(data.provincia);
                $("#cantonClientePedido").val(data.canton);
                $("#parroquiaClientePedido").val(data.parroquia);
                $("#direccionClientePedido").val(data.direccion);
                $("#clienteRegistrado").val(data.id);
            }
        });
    </script>
    <script type="text/javascript">
        WebFont.load({
            google: {
                families: ["Source Sans Pro:300,400,500,600,700,800", "Open Sans:300,400,500,600,700,800",
                    "Source Sans Pro:300,400,500,600,700,800"
                ]
            }
        });
    </script>
    <style type="text/css">
        body {
            font-family: 'Source Sans Pro' !important;
        }

        .page-header,
        h2 {
            font-family: 'Open Sans' !important;
        }

        .navbar-brand,
        .text-logo {
            font-family: 'Source Sans Pro' !important;
        }

        p,
        .caption h4,
        label,
        table,
        .panel {
            font-size: 16px !important;
        }

        h1.block-header,
        h2.block-header,
        h2.summary-title {
            font-size: 18px !important;
        }

        .navbar-brand,
        .text-logo {
            font-size: 32px !important;
        }

        header #main-menu .navbar-nav a.nav-link {
            font-size: 14px !important;
        }
    </style>