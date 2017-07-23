<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("categoria");
    }

    public function index_get() {
        $datos = $this->categoria->get_all();
        $this->response($datos);
    }

    public function get_categoria_get($id) {
        $datos = $this->categoria->get_one($id);
        $this->response($datos);
    }

    public function del_categoria_post($id) {
        $datos = $this->categoria->del_one($id);
        $this->response($datos);
    }

    public function del_categorias_post() {
        $ids = $this->post("id_categorias");
        $datos = $this->categoria->del_many($ids);
        $this->response($datos);
    }

    public function create_categoria_post() {
        $categoria = $this->post("categoria");
        $datos = $this->categoria->create_one($categoria);
        $this->response($datos);
    }

    public function update_categoria_post($id) {
        $categoria = $this->post("categoria");
        $datos = $this->categoria->update_one($id, $categoria);
        $this->response($datos);
    }

}
