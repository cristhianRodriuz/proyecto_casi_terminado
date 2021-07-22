$(document).ready(function(){
    if ($("#formNoticia")) {
        $("#dataTableNoticias").on("click", "button.btnAction", function () {
            let idNoticia = $(this).attr("idNoticia");
            let infoData = {
                idNoticia
            };
            $.ajax({
                type: "POST",
                url: 'ajax/noticias.php',
                data: infoData,
                success: function (response) {
                    let imgUrl = $("#imgNoticia").data("dir");
                    let videoUrl = $("#videoNoticia").data("dir");
                    let data = JSON.parse(response);
                    $(".titleModal").html("CONFIGURACIÓN DE NOTICIAS");
                    $(".noticia").val(data.id);
                    $("#regTituloNoticia").val(data.titulo);
                    $("#regDescripcionNoticia").val(data.descripcion);
                    $("#regDesarrolloNoticia").val(data.desarrollo);
                    $("#regCreadoPor").val(data.publicador);
                    $("#imgNoticia").attr('src', imgUrl + data.imagen);
                    $("#videoNoticia").attr('src', videoUrl + data.video);
                    $("#imgNoticia").attr('data-title',data.imagen);
                    $("#videoNoticia").attr('data-title',data.video);
                    $(".btnEditAdd").html("Editar");
                    $(".btnEliminar").show();
                    $(".btnEliminar").attr("id", idNoticia);
                }
            })
        })
        $(".btnNuevo").on("click", function () {
            let imgUrl = $("#imgNoticia").data("dir");
            let videoUrl = $("#videoNoticia").data("dir");
            $(".titleModal").html("Nueva Noticia");
            $("#regTituloNoticia").val("");
            $("#regDescripcionNoticia").val("");
            $("#regDesarrolloNoticia").val("");
            $(".btnEditAdd").html("Registrar");
            $("#imgNoticia").attr('src', imgUrl + "noticiasDefault.png");
            $("#videoNoticia").attr('src', videoUrl + "default-video.jpg");
            $(".btnEliminar").hide();
            initializeInputs();
        })

        $("#formNoticia").on("click", "button.btnEliminar", function () {
            Swal.fire({
                title: '¿Estás seguro de eliminar a este noticia?',
                text: "¡Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, elminarla!',
                cancelButtonText: "Cancelar",
            }).then((result) => {
                let idEliminarNoticia = $(".noticia").val();
                let infoDelete = {
                    idEliminarNoticia
                }
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: 'ajax/noticias.php',
                        data: infoDelete,
                        success: function (response) {
                            if (response) {
                                Swal.fire(
                                    'Eliminada',
                                    'La noticia ha sido eliminada satisfactoriamente.',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "noticias";
                                    }
                                })
                            }
                        }
                    })
                }
            })
        })
        $("#formNoticia").on("submit", function (e) {
            e.preventDefault();
            var files = '';
            var videoFiles = '';
            let formData = new FormData();
            if($("#btnEditAdd").html() != "Editar"){
                if($("#files")[0].files[0] == undefined && $("#customFile")[0].files[0] != undefined){
                    showMessageRequired("Debes seleccionar un imagen");
                    var videoFiles = $("#customFile")[0].files[0];
                }else if($("#files")[0].files[0] != undefined && $("#customFile")[0].files[0] == undefined){
                    showMessageRequired("Debes seleccionar un vídeo");
                    var files = $("#files")[0].files[0];
                }else if($("#files")[0].files[0] == undefined && $("#customFile")[0].files[0] == undefined){
                    showMessageRequired("Debes seleccionar una imagen y un vídeo");
                }else{
                    var files = $("#files")[0].files[0];
                    var videoFiles = $("#customFile")[0].files[0];
                }
            }else{
                if($("#files")[0].files[0] == undefined){
                    var files = $("#imgNoticia").data('title');
                }else{
                    formData.append("editImageNoticia","YES");
                    var files = $("#files")[0].files[0];
                    
                }
                if($("#customFile")[0].files[0] == undefined){
                    var videoFiles = $("#videoNoticia").data("title");
                }else{
                    formData.append("editVideoNoticia","YES");
                    var videoFiles = $("#customFile")[0].files[0];
                }
            }
            formData.append("accion", ($("#btnEditAdd").html() == "Editar") ? "Editar" : "Agregar");
            formData.append("regImageNoticia",files);
            formData.append("regVideoNoticia",videoFiles);
            formData.append("regTituloNoticia", $("#regTituloNoticia").val());
            formData.append("regDescripcionNoticia", $("#regDescripcionNoticia").val());
            formData.append("regDesarrolloNoticia",$("#regDesarrolloNoticia").val());
            formData.append("regCreadoPor", $("#regCreadoPor").val());
            if ($("#btnEditAdd").html() == "Editar") {
                formData.append("editIDNoticia", $(".noticia").val());
            }
            console.log(formData.get("regVideoNoticia"));
            console.log(formData.get("regImageNoticia"));
            console.log(formData.get("editIDNoticia"));
                $.ajax({
                    type: "POST",
                    url: "ajax/noticias.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (res) {
                        let stat = JSON.parse(res);
                        let mensaje = (formData.get("accion") == "Editar") ? "Noticia editada correctamente" : "Noticia agregada correctamente";
                        if (stat.verificado) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: mensaje,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "noticias";
                                }
                            })
                        } else {
                            Swal.fire(
                                'No se ha realizado ningun cambio',
                                'Se actualizará la página',
                                'warning'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "noticias";
                                }
                            })
                        }
                    }
                })
            
        })
        function showMessageRequired(mensaje){
            Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: mensaje,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
            })
        }
        $(document).on("change", "#files", function () {
            $("#btnAñadir").removeAttr("disabled");
            let file = this.files;
            let supporteImages = ["image/jpeg", "image/png", "image/jpeg", "image/jpg"];
            let element = file[0];
            if (supporteImages.indexOf(element.type) != -1) {
                createPreview(element);
            }
            function createPreview(file) {
                let imgCodified = URL.createObjectURL(file);
                $("#imgNoticia").removeAttr('src');
                $("#imgNoticia").attr('src', imgCodified);
            }
        })
        $(document).on("change","#customFile",function(){
            let file = this.files;
            let supportedVideos = ["video/mp4"];
            let element = file[0];
            if(supportedVideos.indexOf(element.type) != -1){
                createPreview(element);
            }
            function createPreview(file) {
                let videoCodified = URL.createObjectURL(file);
                $("#videoNoticia").removeAttr('src');
                $("#videoNoticia").attr('src', videoCodified);
            }

        })
        function initializeInputs() {
            $("#regTituloNoticia").attr("disabled", false);
            $("#regDescripcionNoticia").attr("disabled", false);
            $("#btnEditAdd").attr("disabled", false);
        }


    }
})