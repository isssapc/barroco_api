<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Salidas extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("salida");
    }

    public function index_get() {
        $datos = $this->salida->get_all();
        $this->response($datos);
    }

    public function get_salida_get($id) {
        $datos = $this->salida->get_one($id);
        $this->response($datos);
    }

    public function del_salida_post($id) {
        $datos = $this->salida->del_one($id);
        $this->response($datos);
    }

    public function del_salidas_post() {
        $ids = $this->post("id_salidas");
        $datos = $this->salida->del_many($ids);
        $this->response($datos);
    }

    public function create_salida_post() {
        $salida = $this->post("salida");
        $datos = $this->salida->create_one($salida);
        $this->response($datos);
    }

    public function update_salida_post() {
        $salida = $this->post("salida");
        $datos = $this->salida->update_one($salida);
        $this->response($datos);
    }

}
