<?php
include_once '../controllers/noticias.controller.php';
include_once '../models/noticias.model.php';
class AjaxNoticias{
    public function ajaxGetNoticia($idNoticia){
        $respuesta = ControllerNoticias::ctrGetNoticia($idNoticia);
        echo json_encode($respuesta);
    }
    public function ajaxAgregarNoticia($noticia){
        $respuesta = array("verificado" => ControllerNoticias::ctrAgregarNoticia($noticia));
        echo json_encode($respuesta);
    }
    public function ajaxEditarNoticia($noticia){
        $respuesta = array("verificado" => ControllerNoticias::ctrEditarNoticias($noticia));
        echo json_encode($respuesta);
    }
    public function ajaxEliminarNoticias($idEliminar){
        $respuesta = array("verificado" => ControllerNoticias::ctrEliminarNoticias($idEliminar));
        echo json_encode($respuesta);
    }
    public function ajaxGetAllNoticias(){
        $res = ControllerNoticias::ctrGetNoticias();
        echo json_encode($res);
    }
}
if(isset($_POST["idNoticia"])){
    $getNoticia = new AjaxNoticias();
    $getNoticia->ajaxGetNoticia($_POST["idNoticia"]);
}
if(isset($_FILES["regImageNoticia"]) && !isset($_POST["editIDNoticia"])){
    $noticias = new AjaxNoticias();
    $datos = [];
    if(isset($_POST["accion"])){
        if($_POST["accion"] == "Agregar"){
            if(isset($_FILES["regImageNoticia"]) && isset($_FILES["regVideoNoticia"])){
                $imageNoticia = $_FILES["regImageNoticia"]["name"];
                $videoNoticia = $_FILES["regVideoNoticia"]["name"];

                if(isset($imageNoticia) && isset($videoNoticia)){
                    // Propiedades Imagen
                    $tipo_imagen = $_FILES["regImageNoticia"]["type"];
                    $size_imagen = $_FILES["regImageNoticia"]["size"];
                    $temp_imagen = $_FILES["regImageNoticia"]["tmp_name"];
                    // Propiedades Video
                    $tipo_video = $_FILES["regVideoNoticia"]["type"];
                    $size_video = $_FILES["regVideoNoticia"]["size"];
                    $temp_video = $_FILES["regVideoNoticia"]["tmp_name"];
                    
                    if(move_uploaded_file($temp_imagen, '../uploads/noticias/' . $imageNoticia) && move_uploaded_file($temp_video,'../uploads/noticias/' . $videoNoticia)){
                        array_push($datos,$imageNoticia);
                        array_push($datos,$videoNoticia);
                        chmod('../uploads/noticias/' . $imageNoticia, 0777);
                        chmod('../uploads/noticias/' . $videoNoticia, 0777);
                    }
                }
            }
            
            array_push($datos,[
                "titulo" => $_POST["regTituloNoticia"],
                "descripcion" => $_POST["regDescripcionNoticia"],
                "desarrollo" => $_POST["regDesarrolloNoticia"],
                "publicador" => $_POST["regCreadoPor"]
            ]);
            $noticias->ajaxAgregarNoticia($datos);
        }
    }
}
if(isset($_POST["editIDNoticia"])){
    $noticias = new AjaxNoticias();
    $datos = [];
    if(isset($_POST["editImageNoticia"]) && isset($_POST["editVideoNoticia"])){
        $imageNoticia = $_FILES["regImageNoticia"]["name"];
        $videoNoticia = $_FILES["regVideoNoticia"]["name"];

        if(isset($imageNoticia) && isset($videoNoticia)){
            // Propiedades de la imagen

            $tipo_imagen = $_FILES["regImageNoticia"]["type"];
            $size_imagen = $_FILES["regImageNoticia"]["size"];
            $temp_imagen = $_FILES["regImageNoticia"]["tmp_name"];

            // Propiedades del video
            $tipo_video = $_FILES["regVideoNoticia"]["type"];
            $size_video = $_FILES["regVideoNoticia"]["size"];
            $temp_video = $_FILES["regVideoNoticia"]["tmp_name"];

            if(move_uploaded_file($temp_imagen,'../uploads/noticias/' . $imageNoticia) && move_uploaded_file($temp_video,'../uploads/noticias/' . $videoNoticia)){
                array_push($datos,$imageNoticia);
                array_push($datos, $videoNoticia);
                
                chmod('../uploads/noticias/' . $imageNoticia, 0777);
                chmod('../uploads/noticias/' . $videoNoticia,0777);
            }
        }
    }else if(isset($_POST["editImageNoticia"]) && !isset($_POST["editVideoNoticia"])){
        $imageNoticia = $_FILES["regImageNoticia"]["name"];
        
        if (isset($imageNoticia)) {
            // Propiedades de la imagen
            $tipo_imagen = $_FILES["regImageNoticia"]["type"];
            $size_imagen = $_FILES["regImageNoticia"]["size"];
            $temp_imagen = $_FILES["regImageNoticia"]["tmp_name"];
            
            if(move_uploaded_file($temp_imagen, '../uploads/noticias/' . $imageNoticia)){
                array_push($datos,$imageNoticia);
                array_push($datos, $_POST["regVideoNoticia"]);
                chmod('../uploads/noticias/' . $imageNoticia, 0777);
            }
        }
    } else if (!isset($_POST["editImageNoticia"]) && isset($_POST["editVideoNoticia"])) {
        $videoNoticia = $_FILES["regVideoNoticia"]["name"];

        if (isset($videoNoticia)) {
            // Propiedades Imagen
            $tipo_video = $_FILES["regVideoNoticia"]["type"];
            $size_video = $_FILES["regVideoNoticia"]["size"];
            $temp_video = $_FILES["regVideoNoticia"]["tmp_name"];
            // Propiedades Video

            if (move_uploaded_file($temp_video, '../uploads/noticias/' . $videoNoticia)) {
                array_push($datos, $_POST["regImageNoticia"]);
                array_push($datos, $videoNoticia);
                chmod('../uploads/noticias/' . $videoNoticia, 0777);
            }
        }
    }else{
        array_push($datos, $_POST["regImageNoticia"]);
        array_push($datos, $_POST["regVideoNoticia"]);   
    }
                
    array_push($datos,[
        "titulo" => $_POST["regTituloNoticia"],
        "descripcion" => $_POST["regDescripcionNoticia"],
        "desarrollo" => $_POST["regDesarrolloNoticia"],
        "publicador" => $_POST["regCreadoPor"],
        "id" => $_POST["editIDNoticia"]
    ]);
    $noticias->ajaxEditarNoticia($datos);
}
if(isset($_POST["idEliminarNoticia"])){
    $eliminarNoticia = new AjaxNoticias();
    $eliminarNoticia->ajaxEliminarNoticias($_POST["idEliminarNoticia"]);
}
if(isset($_POST["getAllNoticias"])){
    $getAllNotices = new AjaxNoticias();
    $getAllNotices->ajaxGetAllNoticias();
}