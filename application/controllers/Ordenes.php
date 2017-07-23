<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenes extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("orden");
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

    public function del_orden_post($id) {
        $datos = $this->orden->del_one($id);
        $this->response($datos);
    }

    public function del_ordens_post() {
        $ids = $this->post("id_ordens");
        $datos = $this->orden->del_many($ids);
        $this->response($datos);
    }

    public function create_orden_post() {
        $orden = $this->post("orden");
        $datos = $this->orden->create_one($orden);
        $this->response($datos);
    }

    public function update_orden_post() {
        $orden = $this->post("orden");
        $datos = $this->orden->update_one($orden);
        $this->response($datos);
    }

}
