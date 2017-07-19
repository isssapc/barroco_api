<?php

class Producto extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {

        $sql = "SELECT p.*, c.nombre AS categoria
                FROM producto p
                JOIN producto_categoria c ON c.id_producto_categoria= p.id_producto_categoria";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_one($id) {

        $sql = "SELECT p.*
                FROM producto p
                JOIN producto_categoria c ON c.id_producto_categoria= p.id_producto_categoria
                WHERE p.id_producto= $id LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function get_categorias() {
        $sql = "SELECT *
                FROM producto_categoria";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    /*
     * 
     * TODO
     */
    public function del_one($id) {

        $sql = "SELECT p.*
                FROM producto p
                WHERE p.id_producto= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

        /*
     * 
     * TODO
     */
    public function del_many($ids) {

        $sql = "SELECT p.*
                FROM producto p
                WHERE p.id_producto= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function create_one($producto) {
        $this->db->insert("producto", $producto);
        $id = $this->db->insert_id();

        $data = $this->get_one($id);
        return $data;
    }

    public function update_one($id, $props) {

        $where = "id_producto = $id";
        $sql = $this->db->update_string('producto', $props, $where);
        $this->db->query($sql);

        $producto = $this->get_one($id);
        return $producto;
    }

}
