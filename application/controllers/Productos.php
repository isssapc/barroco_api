<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("producto");
    }

    public function index_get() {
        $datos = $this->producto->get_all();
        $this->response($datos);
    }

    public function get_producto_get($id) {
        $datos = $this->producto->get_one($id);
        $this->response($datos);
    }

    public function get_almacen_entrada_get() {
        $datos = $this->producto->get_almacen_entrada();
        $this->response($datos);
    }

    public function get_categorias_get() {
        $datos = $this->producto->get_categorias();
        $this->response($datos);
    }

    public function create_categoria_post() {
        $categoria = $this->post("categoria");
        $datos = $this->producto->create_one_categoria($categoria);
        $this->response($datos);
    }

//    public function get_tipos_get() {
//        $datos = $this->producto->get_tipos();
//        $this->response($datos);
//    }

    public function search_producto_get($nombre) {
        //$nombre= $this->post("nombre");
        $datos = $this->producto->search_by_nombre($nombre);
        $this->response($datos);
        //$this->response(array($nombre));
    }

    public function del_producto_post($id) {
        $datos = $this->producto->del_one($id);
        $this->response($datos);
    }

    public function del_productos_post() {
        $ids = $this->post("id_productos");
        $datos = $this->producto->del_many($ids);
        $this->response($datos);
    }

    public function create_producto_post() {
        $producto = $this->post("producto");
        $datos = $this->producto->create_one($producto);
        $this->response($datos);
    }

    public function update_producto_post($id) {
        $producto = $this->post("producto");
        $datos = $this->producto->update_one($id, $producto);
        $this->response($datos);
    }

}
