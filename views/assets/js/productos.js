$(document).ready(function () {
    if ($("#formProducto")) {
        let ajaxCategoria;
        $.ajax({
            type: "POST",
            url: "ajax/categorias.php",
            data: {
                "categoria_get": ""
            },
            success: function(response) {
                ajaxCategoria = JSON.parse(response);
                let createHtml = '<option selected disabled>--- Seleccione una categoría ---</option>';
                for (const item of ajaxCategoria) {
                    createHtml += `<option value=${item.id}>${item.categoria}</option>`;
                }
                $("#selectCategoria").html(createHtml);
            }
        });
        $("#selectCategoria").on("change", function(e) {
            let refCategoria = e.target.value;
            if (refCategoria != '') {
                $.ajax({
                    type: "POST",
                    url: "ajax/productos.php",
                    data: {
                        "productsCategoria": refCategoria
                    },
                    success: function(response) {
                        let codResponse = JSON.parse(response);
                        $("#regCodigo").val(Number(codResponse.codigo) + 1);
                    }
                });
            }
        })
        $(document).on("change", "#files", function() {
            $("#btnAñadir").removeAttr("disabled");
            let file = this.files;
            let supporteImages = ["image/jpeg", "image/png", "image/jpeg", "image/jpg"];
            let element = file[0];
            if (supporteImages.indexOf(element.type) != -1) {
                createPreview(element);
            }
            function createPreview(file) {
                let imgCodified = URL.createObjectURL(file);
                $("#imgProducto").removeAttr('src');
                $("#imgProducto").attr('src', imgCodified);
            }
        })
        $("#dataTableProductos").on("click","button.btnAction",function(){
            $(".titleModalProducto").html("EDITAR PRODUCTO");
            let idProducto = $(this).attr("idProducto");
            let imgUrl = $("#imgProducto").data("dir");
            $(".btnEditAdd").attr("disabled",false);
            $(".btnEditAdd").html("Editar");
            let infoData = {
                idProducto
            };
            $.ajax({
                type: "POST",
                url: 'ajax/productos.php',
                data: infoData,
                success: function (response) {
                    let data = JSON.parse(response)
                    $(".idProducto").val(data.id);
                    $("#selectCategoria option[value='" + data.id_categoria + "']").attr("selected", true);
                    $("#selectCategoria").attr("disabled", true);
                    $("#regCodigo").val(data.codigo);
                    $("#regNombreProducto").val(data.nombre);
                    $("#regDescProducto").val(data.descripcion);
                    $("#regStock").val(data.stock);
                    $("#regPrecioPublico").val(data.precio_publico);
                    $("#regPrecioMayorista").val(data.precio_mayorista);
                    $("#detalleMayorista").val(data.d_precio_mayorista);
                    $("#regPrecioMinorista").val(data.precio_minorista);
                    $("#regDetalleMinorista").val(data.d_precio_minorista);
                    $("#imgProducto").attr('src', imgUrl + data.imagen);
                    $("#imgProducto").attr('data-title',data.imagen);
                    $(".btnEditAdd").html("Editar");
                    $(".btnEliminar").show();
                    $(".btnEliminar").attr("id", idProducto);
                }
            })
        })
        $("#formProducto").on("submit", function(e) {
            e.preventDefault();
            let formData = new FormData();
            let files = $("#files")[0].files[0];
            formData.append("accion", ($("#btnEditAdd").html() == "Editar") ? "Editar" : "Agregar");
            if (formData.get("accion") == "Editar" && files == undefined) {
                formData.append("uploadImage", "NO");
                formData.append("productDefault", $("#imgProducto").data('title'));
            } else if (formData.get("accion") == "Agregar" && files == undefined) {
                formData.append("uploadImage", "NO");
                formData.append("productDefault", "productoDefault.jpg");
            } else {
                formData.append("uploadImage", "SI");
                formData.append("regProductImage", files);
            }
            if ($("#btnEditAdd").html() == "Editar") {
                formData.append("editIdProducto", $(".idProducto").val());
            }
      
            formData.append("regIdCategoria", $("#selectCategoria").val());
            formData.append("regCodigo", $("#regCodigo").val());
            formData.append("regNombreProducto", $("#regNombreProducto").val());
            formData.append("regDescProducto", $("#regDescProducto").val());
            formData.append("regStock", $("#regStock").val());
            formData.append("regPrecioPublico", $("#regPrecioPublico").val());
            formData.append("regPrecioMayorista", $("#regPrecioMayorista").val());
            formData.append("regDetalleMayorista", $("#detalleMayorista").val());
            formData.append("regPrecioMinorista", $("#regPrecioMinorista").val());
            formData.append("regDetalleMinorista", $("#regDetalleMinorista").val());
            $.ajax({
                type: "POST",
                url: "ajax/productos.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    let status = JSON.parse(response);
                    let mensaje = (formData.get("accion") == "Editar") ? "Producto editado correctamente" : "Producto agregado correctamente";
                    if (status.verificado) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: mensaje,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "productos";
                            }
                        })
                    }else {
                        Swal.fire(
                            'No se ha realizado ningun cambio',
                            'Se actualizará la página',
                            'warning'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "productos";
                            }
                        })
                    }
                }
            });
        })
        $("#formProducto").on("click", "button.btnEliminar", function () {
            Swal.fire({
                title: '¿Estás seguro de eliminar este producto?',
                text: "¡Esta acción no se puede revertir, se eliminará el producto seleccionado!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminarlo!',
                cancelButtonText: "Cancelar",
            }).then((result) => {
                let idEliminarProducto = $(".idProducto").val();
                let infoDelete = {
                    idEliminarProducto
                }
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: 'ajax/productos.php',
                        data: infoDelete,
                        success: function (response) {
                            if (response) {
                                Swal.fire(
                                    'Eliminado',
                                    'EL producto ha sido eliminado.',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "productos";
                                    }
                                })
                            }
                        }
                    })
                }
            })
        })
    }
});