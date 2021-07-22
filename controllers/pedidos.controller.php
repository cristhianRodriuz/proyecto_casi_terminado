<?php
class ControllerPedidos{
    public static function ctrGetPedidos(){
        return ModelPedidos::mdlGetPedidos();
    }
    public static function ctrGetPedido($idPedido){
        return ModelPedidos::mdlGetPedido($idPedido);
    }
    public static function ctrGetDetallePedido($idPedido){
        return ModelPedidos::mdlGetDetallePedido($idPedido);
    }
    public static function ctrGetPedidosFilter($filter){
        return ModelPedidos::mdlGetPedidosFilter($filter);
    }
    public static function ctrDeletePedido($idPedido){
        return ModelPedidos::mdlDeletePedido($idPedido);
    }
    public static function ctrSetEstadoPedido($idPedido,$estado){
        return ModelPedidos::mdlSetEstadoPedido($idPedido,$estado);
    }
    public static function ctrAddNuevoPedido($idCliente,$detallePedido,$totalPago){
        return ModelPedidos::mdlAddNuevoPedido($idCliente,$detallePedido,$totalPago);
    }
    public static function ctrListPedidoCliente($datos){
        return ModelPedidos::mdlListPedidosCliente($datos);
    }
    public static function ctrSetComprobantePedido($datos){
        return ModelPedidos::mdlSetComprobantePedido($datos);
    }
    public static function ctrGetPedidosCliente($idCliente){
        return ModelPedidos::mdlGetPedidosCliente($idCliente);
    }
}