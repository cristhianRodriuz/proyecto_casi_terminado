$(document).ready(function () {
    if ($("#formMensajesDistribuidor")) {
        $("#dataTableMensajes").on("click", "button.btnAction", function() {
            let idMensaje = $(this).attr("idMensajeDist");
            let infoData = {
                getMensaje: idMensaje
            };
            $.ajax({
                type: "POST",
                url: 'ajax/mensajes.php',
                data: infoData,
                success: function(response) {
                    let data = JSON.parse(response);
                    $(".mensajes").val(data.id);
                    $("#inputNombres").val(data.nombres);
                    $("#inputTelefono").val(data.telefono);
                    $("#inputEmail").val(data.email);
                    $("#textMensaje").val(data.mensaje);
                }
            })
        })
        $("#formMensajesDistribuidor").on("click", "button.btnEliminar", function() {
            Swal.fire({
                title: '¿Estás seguro de eliminar este mensaje?',
                text: "¡Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: "Cancelar",
            }).then((result) => {
                let idEliminarMensaje = $(".mensajes").val();
                console.log(idEliminarMensaje);
                let infoDelete = {
                    deleteMensaje: idEliminarMensaje
                }
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: 'ajax/mensajes.php',
                        data: infoDelete,
                        success: function(response) {
                            if (response) {
                                Swal.fire(
                                    'Eliminado',
                                    'El mensaje se ha eliminado',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "mensajes";
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