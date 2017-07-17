<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Entradas extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("entrada");
    }

    public function index_get() {
        $datos = $this->entrada->get_all();
        $this->response($datos);
    }

    public function get_entrada_get($id) {
        $datos = $this->entrada->get_one($id);
        $this->response($datos);
    }

    public function del_entrada_post($id) {
        $datos = $this->entrada->del_one($id);
        $this->response($datos);
    }

    public function del_entradas_post() {
        $ids = $this->post("id_entradas");
        $datos = $this->entrada->del_many($ids);
        $this->response($datos);
    }

    public function create_entrada_post() {
        $entrada = $this->post("entrada");
        $datos = $this->entrada->create_one($entrada);
        $this->response($datos);
    }

    public function update_entrada_post() {
        $entrada = $this->post("entrada");
        $datos = $this->entrada->update_one($entrada);
        $this->response($datos);
    }

}
