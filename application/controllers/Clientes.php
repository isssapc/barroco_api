<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("cliente");
    }

    public function index_get() {
        $datos = $this->cliente->get_all();
        $this->response($datos);
    }

    public function get_cliente_get($id) {
        $datos = $this->cliente->get_one($id);
        $this->response($datos);
    }

    public function search_cliente_get($nombre) {
        $datos = $this->cliente->search_by_nombre($nombre);
        $this->response($datos);
    }

    public function del_cliente_post($id) {
        $count = $this->cliente->del_one($id);
        $this->response(array("count" => $count));
    }

    public function del_clientes_post() {
        $ids = $this->post("id_clientes");
        $datos = $this->cliente->del_many($ids);
        $this->response($datos);
    }

    public function create_cliente_post() {
        $cliente = $this->post("cliente");
        $datos = $this->cliente->create_one($cliente);
        $this->response($datos);
    }

    public function update_cliente_post($id) {
        $cliente = $this->post("cliente");
        $datos = $this->cliente->update_one($id, $cliente);
        $this->response($datos);
    }

}
