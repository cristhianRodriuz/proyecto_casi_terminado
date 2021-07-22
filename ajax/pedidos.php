<?php
include_once '../controllers/pedidos.controller.php';
include_once '../models/pedidos.model.php';
class AjaxPedidos{
    public function ajaxGetPedido($idPedido){
        $res = ControllerPedidos::ctrGetPedido($idPedido);
        echo json_encode($res);
    }
    public function ajaxGetDetallePedido($idPedido){
        $res = ControllerPedidos::ctrGetDetallePedido($idPedido);
        echo json_encode($res);
    }
    public function ajaxDeletePedido($idPedido){
        $res = array("verificado" =>ControllerPedidos::ctrDeletePedido($idPedido));
        echo json_encode($res);
    }
    public function ajaxSetEstadoPedido($idPedido,$estado){
        $res = array("verificado" =>ControllerPedidos::ctrSetEstadoPedido($idPedido,$estado));
        echo json_encode($res);
    }
    public function ajaxNuevoPedido($idCliente,$detallePedido,$totalPago){
        $res = ControllerPedidos::ctrAddNuevoPedido($idCliente,$detallePedido,$totalPago);
        echo json_encode($res);
    }
    public function ajaxListPedidoCliente($datos){
        $res = ControllerPedidos::ctrListPedidoCliente($datos);
        echo json_encode($res);
    }
    public function ajaxSetComprobante($datos){
        $res = array("verificado" => ControllerPedidos::ctrSetComprobantePedido($datos));
        echo json_encode($res);
    }
    public function  ajaxGetPedidosCliente($idCliente){
        $res = ControllerPedidos::ctrGetPedidosCliente($idCliente);
        echo json_encode($res);
    }
}

if(isset($_POST["idPedido"])){
    $getPedido = new AjaxPedidos();
    $getPedido->ajaxGetPedido($_POST["idPedido"]);
}
if(isset($_POST["getDetallePedido"])){
    $getDetallePedido = new AjaxPedidos();
    $getDetallePedido->ajaxGetDetallePedido($_POST["getDetallePedido"]);
}
if(isset($_POST["cmbPedidoPerId"])){
    $setEstadoPedido = new AjaxPedidos();
    $setEstadoPedido->ajaxSetEstadoPedido($_POST["cmbPedidoPerId"],$_POST["newEstado"]);
    // echo json_encode($_POST["newEstado"]);
}
if(isset($_POST["deletePedidoPerId"])){
   $deletePedido = new AjaxPedidos();
   $deletePedido->ajaxDeletePedido($_POST["deletePedidoPerId"]);
}
if(isset($_POST["nuevo_pedido"])){
    $nuevoPedido = new AjaxPedidos();
    $nuevoPedido->ajaxNuevoPedido($_POST["clienteReg"],$_POST["detalle_pedido"],$_POST["totalPago"]);
}
if(isset($_POST["listPedidoDNI"])){
    $pedidos = new AjaxPedidos();
    $datos = array("dniList" => $_POST["listPedidoDNI"],"emailList" => $_POST["listPedidoEmail"], "codigoList" => $_POST["listPedidoCodigo"]);
    $pedidos->ajaxListPedidoCliente($datos);
}

if (isset($_FILES["fileComprobante"])) {
    $pedidos = new AjaxPedidos();
    $datos = [];
    $imageComprobante = $_FILES["fileComprobante"]["name"];
    if (isset($imageComprobante)) {
        // Propiedades Imagen
        $tipo_comprobante = $_FILES["fileComprobante"]["type"];
        $size_comprobante = $_FILES["fileComprobante"]["size"];
        $temp_comprobante = $_FILES["fileComprobante"]["tmp_name"];

        if (move_uploaded_file($temp_comprobante, '../uploads/comprobantes/' . $imageComprobante)) {
            array_push($datos, $imageComprobante);
            chmod('../uploads/noticias/' . $imageComprobante, 0777);
        }
    }
    array_push($datos, [
        "idPedidoComprobante" => $_POST["idComprobantePedido"]
    ]);
    $pedidos->ajaxSetComprobante($datos);
}
if(isset($_POST["id_cliente"])){
    $pedidos = new AjaxPedidos();
    $idCliente = $_POST["id_cliente"];

    $pedidos->ajaxGetPedidosCliente($idCliente);
}