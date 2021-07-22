$().ready(function(){
    $("#contentChangePassword").hide();
    let code;
    if($("#formSearchEmail")){
        $("#formSearchEmail").on("submit",function(e){
            e.preventDefault();
            let userEmailPassword = $("#searchEmail").val();
            console.log(userEmailPassword);
            $.ajax({
                type: "POST",
                url: "ajax/administrador.php",
                data: {
                    userEmailPassword
                },
                success: function(response) {
                    console.log(response);
                    let dataVerificated = JSON.parse(response);
                    Swal.fire({
                        title: "Verificando email",
                        html: "Esperando a que el sistema verifique su email. Esto puede tardar un momento",
                        timer: 5000,
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
                        if(dataVerificated["nombre"]){
                           Swal.fire({
                               icon: "success",
                               title: "Verificación completada",
                               text: "El equipo de ASOPAGUA le enviará un email con el código de recuperación"
                           }).then((result) => {
                               if(result.isConfirmed){
                                   $("#contentSearchEmail").hide();
                                   $("#contentChangePassword").show();
                                   $(".btnChangePassword").attr('id',dataVerificated["id"]);
                                   $.ajax({
                                       type: "POST",
                                       url: "ajax/administrador.php",
                                       data: {
                                           dataVerificated
                                       },
                                       success: function (response) {
                                             let dataJson = JSON.parse(response);
                                             code = dataJson["code"];
                                       }
                                   });
                               }
                           })
                        }
                    })
                }
            });
        })
        $("#codeRecuperacion").on("change",function(e){
            let inputPassword = e.target.value;
            if(inputPassword == code){
                Swal.fire({
                    "icon": 'success',
                    "title": 'El código es válido'
                }).then((result) => {
                    if(result.isConfirmed){
                        $("#codeRecuperacion").attr('disabled',true);
                        $("#nuevaPassword").attr('disabled',false);
                        $(".btnChangePassword").attr("disabled",false);
                    }
                })
            }else{
                Swal.fire({
                    "icon": 'error',
                    "title": 'El código es inválido'
                })
            }
        })
        $("#formChangePassword").on("submit",function(e){
            e.preventDefault();
            let nuevaPassword = $("#nuevaPassword").val();
            let idChange = $(".btnChangePassword").attr('id');
            $.ajax({
                type: "POST",
                url: "ajax/administrador.php",
                data: {
                    nuevaPassword,
                    idChange
                },
                success: function (response) {
                    let jsonRes = JSON.parse(response);
                    if(jsonRes.verificado == true){
                        Swal.fire({
                            icon: "success",
                            title: "Proceso completado",
                            text: "Se ha cambiando su contraseña. Ahora puede iniciar sesión"
                        }).then((result) => {
                            if(result.isConfirmed){
                                window.location.href = "admin";
                            }
                        })
                    }
                }
            });
        })
    }
})