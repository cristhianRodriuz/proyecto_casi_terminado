<?php
require 'conexion.php';
date_default_timezone_set("America/Guayaquil");
class ModelNoticias{
    public static function mdlGetNoticias(){
        try{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM noticias");
            $stmt->execute();
            return ($stmt->rowCount() > 0)  ? $stmt->fetchAll() : [];
        }catch(PDOException $e){
            return [];
        }
    }
    public static function mdlGetNoticia($idNoticia){
        try{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM noticias WHERE id=:idNoticia");
            $stmt->execute(["idNoticia" => $idNoticia]);
            return ($stmt->rowCount() > 0)  ? $stmt->fetch() : [];
        }catch(PDOException $e){
            return [];
        }
    }
    public static function mdlAddNoticias($noticia){
        try{
            $stmt = Conexion::conectar()->prepare("INSERT INTO noticias VALUES(0,:imagen,:video,:titulo,:descripcion,:creador,:fecha,:desarrollo)");
            $stmt->execute([
                "titulo" => $noticia[2]["titulo"],
                "descripcion" => $noticia[2]["descripcion"],
                "creador" => $noticia[2]["publicador"],
                "imagen" => $noticia[0],
                "video" => $noticia[1],
                "fecha" => date("Y-m-d H:i:s"),
                "desarrollo" => $noticia[2]["desarrollo"],
            ]);
            return ($stmt->rowCount() > 0)  ? true : false;
        }catch(PDOException $e){
            return false;
        }
    }
    
    public static function mdlUpdateNoticias($noticia){
        try{
            $stmt = Conexion::conectar()->prepare("UPDATE noticias set imagen=:image,video=:video,titulo=:titulo, descripcion = :descripcion, publicador = :publicador, desarrollo=:desarrollo WHERE id=:id");
            $stmt->execute([
               "image" => $noticia[0],
               "video" => $noticia[1],
              "titulo" => $noticia[2]["titulo"],
              "descripcion" => $noticia[2]["descripcion"],
              "publicador" => $noticia[2]["publicador"],
              "desarrollo" => $noticia[2]["desarrollo"],
              "id" => $noticia[2]["id"]
            ]);
            if($stmt->rowCount() > 0){
               return true;
            }else{
               return false;
            }
        }catch(PDOException $e){
            return false;
        }
    }
    public static function mdlEliminarNoticias($idEliminarNoticia){
        try{
            $stmt = Conexion::conectar()->prepare("DELETE FROM noticias WHERE id=:id");
            $stmt->execute([
              "id" => $idEliminarNoticia]);
            if($stmt->rowCount() > 0){
               return true;
            }else{
               return false;
            }
        }catch(PDOException $e){
            return false;
        }
    }
}