<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenes extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("orden");
        $timezone = 'America/Mexico_City';
        date_default_timezone_set($timezone);
    }

    public function index_get() {
        $datos = $this->orden->get_all();
        $this->response($datos);
    }

    public function get_orden_get($id) {
        $datos = $this->orden->get_one($id);
        $this->response($datos);
    }

    public function get_formas_pago_get() {
        $datos = $this->orden->get_formas_pago();
        $this->response($datos);
    }

    public function get_lugares_entrega_get() {
        $datos = $this->orden->get_lugares_entrega();
        $this->response($datos);
    }

    public function del_orden_post($id) {
        $count = $this->orden->del_one($id);
        $this->response(array("count" => $count));
    }

    public function del_ordenes_post() {
        $ids = $this->post("id_ordens");
        $datos = $this->orden->del_many($ids);
        $this->response($datos);
    }

    public function create_orden_post() {
        $orden = $this->post("orden");
        $productos = $this->post("productos");
        $orden["fecha_creacion"] = date("Y-m-d H:i:s");
        $datos = $this->orden->create_one($orden, $productos);
        $result = $this->orden->add_productos_orden($datos["id_orden_compra"], $productos);
        $this->response(array("orden" => $datos, "result" => $result));
    }

    public function update_orden_post() {
        $orden = $this->post("orden");
        $datos = $this->orden->update_one($orden);
        $this->response($datos);
    }

}
