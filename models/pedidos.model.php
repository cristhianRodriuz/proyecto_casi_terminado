<?php
require 'conexion.php';
date_default_timezone_set("America/Guayaquil");
class ModelPedidos{
    public static function mdlGetPedidos(){
        try{
            $query = Conexion::conectar()->prepare("SELECT p.id,p.codigo,p.total,p.fecha_creacion,p.estado,p.id_cliente,c.nombre,c.apellido FROM pedidos p INNER JOIN clientes c ON c.id = p.id_cliente");
            $query->execute();
            return ($query->rowCount() > 0) ? $query->fetchAll() : [];
        }catch(PDOException $e){
            return [];
        }
    }
    public static function mdlGetPedido($idPedido){
        try{
            $query = Conexion::conectar()->prepare("SELECT * FROM pedidos WHERE id=:idPedido");
            $query->execute(["idPedido" => $idPedido]);
            return ($query->rowCount()>0) ? $query->fetch() : [];
        }catch(PDOException $e){
            return [];
        }
    }
    public static function mdlGetDetallePedido($idPedido){
        try{
            $query = Conexion::conectar()->prepare("SELECT * FROM detalle_pedido WHERE id_pedido=:idPedido");
            $query->execute(["idPedido" => $idPedido]);
            $query->execute(["idPedido" => $idPedido]);
            return ($query->rowCount()>0) ? $query->fetchAll() : [];
        }catch(PDOException $e){
            return [];
        }
    }
    public static function mdlGetPedidosFilter($filter){
        try{
            $query = Conexion::conectar()->prepare("SELECT p.id,p.codigo,p.total,p.fecha_creacion,p.estado,p.id_cliente,c.nombre,c.apellido FROM pedidos p INNER JOIN clientes c ON c.id = p.id_cliente WHERE p.estado=:estado");
            $query->execute(["estado" => $filter]);
            return ($query->rowCount()>0) ? $query->fetchAll() : [];
        }catch(PDOException $e){

        }
    }
    public static function mdlDeletePedido($idPedido){
        $bandera = false;
        try{
            if(ModelPedidos::mdlDeleteDetallePedido($idPedido)){
                $query = Conexion::conectar()->prepare("DELETE FROM pedidos WHERE id=:idPedido");
                $query->execute(["idPedido" => $idPedido]);
                $bandera = ($query->rowCount() > 0);
            }
        }catch(PDOException $e){
        }
        return $bandera;
    }
    public static function mdlDeleteDetallePedido($idPedido){
        try{
            $query = Conexion::conectar()->prepare("DELETE FROM detalle_pedido WHERE id_pedido=:idPedido");
            $query->execute(["idPedido" => $idPedido]);
            return ($query->rowCount()>0) ? true : false;
        }catch(PDOException $e){
            return false;

        }
    }
    public static function mdlSetEstadoPedido($idPedido,$estado){
        $bandera = false;
        try{
            $query = Conexion::conectar()->prepare("UPDATE pedidos set estado=:estado WHERE id=:idPedido");
            $query->execute(["estado" => $estado,"idPedido" => $idPedido]);
            if($estado == "Enviado"){
                $obtenerDetalles = Conexion::conectar()->prepare("SELECT * FROM detalle_pedido dp WHERE dp.id_pedido = :idPedido");
                $obtenerDetalles->execute(["idPedido" => $idPedido]);
                if($obtenerDetalles->rowCount() > 0){
                    $detalles = $obtenerDetalles->fetchAll();
                    $count = count($detalles);
                    for($i = 0; $i < $count; $i++){
                        $cantidad = $detalles[$i]["cantidad"];
                        $codigoProducto = $detalles[$i]["codigo_producto"];
                        $obtenerIDProducto = Conexion::conectar()->prepare("SELECT p.id FROM productos p WHERE p.codigo=:codigo");
                        $obtenerIDProducto->execute(["codigo" => $codigoProducto]);
                        if($obtenerIDProducto->rowCount() > 0){
                            $idProducto = $obtenerIDProducto->fetchColumn();
                            $reduceStock = Conexion::conectar()->prepare("UPDATE productos p SET p.stock = (p.stock - :cantidad) where p.id = :idProducto");
                            $reduceStock->execute(["cantidad" => $cantidad, "idProducto"=> $idProducto]);
                            $bandera = true;
                        }
                    }
                }else{
                    $bandera = false;
                }
            }
            if($query->rowCount() >  0){
                $bandera = true;
            }
            return $bandera;
        }catch(PDOException $e){

        }
    }
    public static function mdlAddNuevoPedido($idCliente,$detallePedido,$totalPago){
        try{
            $newCodigoPedido = ModelPedidos::getNewCodigo();
            $query = Conexion::conectar()->prepare("INSERT INTO pedidos VALUES(0,:codigo,:idCliente,:total,:fecha,:estado,:path_comprobante)");
            $query->execute(["codigo" => $newCodigoPedido,"idCliente" => $idCliente,"total"=> explode('$',$totalPago)[1], "fecha" => date("Y-m-d H:i:s"),"estado" => "Pendiente","path_comprobante" => "Sin adjuntar"]);
            if($query->rowCount() > 0){
                $stmt = Conexion::conectar()->prepare("SELECT id FROM pedidos WHERE codigo=:codigo");
                $stmt->execute(["codigo" => $newCodigoPedido]);
                if($stmt->rowCount()> 0){
                    $res =ModelPedidos::mdlSaveDetallePedido($stmt->fetchColumn(0),$detallePedido);
                    if($res){
                        $queryResult = Conexion::conectar()->prepare("SELECT * FROM clientes c INNER JOIN pedidos p ON c.id = p.id_cliente WHERE p.codigo = :codigo");
                        $queryResult->execute(["codigo" => $newCodigoPedido]);
                        return $queryResult->fetch();
                    }
                }
            }
        }catch(PDOException $e){
            return "Fallaste: ".$e->getMessage();
        }
    }
    public static function mdlSaveDetallePedido($idPedido,$detallePedido){
        $key = array();
        foreach($detallePedido as $clave => $valor){
            array_push($key,$clave);
        }
        $sql = "INSERT INTO detalle_pedido VALUES(0,:idPedido,:codigo,:nombreProducto,:cantidad,:precio)";
        for($i = 0; $i < count($key); $i++){
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->execute([
                "idPedido" => $idPedido,
                "codigo" => $detallePedido[$key[$i]]["codigo_producto"],
                "nombreProducto" => $detallePedido[$key[$i]]["nombre"], 
                "cantidad" => $detallePedido[$key[$i]]["cantidad"],
                "precio" => $detallePedido[$key[$i]]["precio"]
                ]);
        }
        return true;
    }
    public static function getNewCodigo(){
        try{
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $newCodigo = "ASO-". substr(str_shuffle($permitted_chars), 0, 10);
            $query = Conexion::conectar()->prepare("SELECT codigo FROM pedidos WHERE codigo=:codigo");
            $query->execute(["codigo" => $newCodigo]);
            if($query->rowCount() > 0){
                ModelPedidos::getNewCodigo();
            }else{
                return $newCodigo;
            }
        }catch(PDOException $e){

        }
    }
    public static function mdlListPedidosCliente($datos){
        try{
            $verificateCliente = Conexion::conectar()->prepare("SELECT * FROM clientes WHERE dni=:DNI AND email=:EMAIL");
            $verificateCliente->execute(["DNI" => $datos["dniList"], "EMAIL" => $datos["emailList"]]);
            if($verificateCliente->rowCount() > 0){
                $verificatePedido = Conexion::conectar()->prepare("SELECT * FROM pedidos WHERE codigo=:CODIGO");
                $verificatePedido->execute(["CODIGO" => $datos["codigoList"]]);
                if($verificatePedido->rowCount()>0){
                    $idCliente = $verificateCliente->fetchColumn();
                    $selectPedidosCliente = Conexion::conectar()->prepare("SELECT * FROM pedidos WHERE id_cliente=:IDCLIENTE");
                    $selectPedidosCliente->execute(["IDCLIENTE" => $idCliente]);
                    return $selectPedidosCliente->fetchAll();
                }else{
                    return array("existPedido" => "NO");
                }
            }else{
                return array("existCliente" => "NO");
            }
        }catch(PDOException $e){

        }
    }
    public static function mdlSetComprobantePedido($datos){
        try{
            $query = Conexion::conectar()->prepare("UPDATE pedidos SET path_comprobante=:COMPROBANTE WHERE id=:IDPEDIDO");
            $query->execute(["COMPROBANTE" => $datos[0], "IDPEDIDO" => $datos[1]["idPedidoComprobante"]]);
            return ($query->rowCount() > 0);

        }catch(PDOException $e){
            return false;
        }
    }
    public static function mdlGetPedidosCliente($idCliente){
        try{
            $query = Conexion::conectar()->prepare("SELECT * FROM pedidos WHERE id_cliente=:IDCLIENTE");
            $query->execute(["IDCLIENTE" => $idCliente]);
            if($query->rowCount() > 0){
                return $query->fetchAll();
            }else{
                return [];
            }
        }catch(PDOException $e){
            return [];
        }
    }
}