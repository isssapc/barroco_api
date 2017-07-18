<?php

class Producto extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {

        $sql = "SELECT *
                FROM producto";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_one($id) {

        $sql = "SELECT p.*
                FROM producto p
                WHERE p.id_producto= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
      public function get_categorias() {
        $sql = "SELECT *
                FROM producto_categoria";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    

    public function del_one($id) {

        $sql = "SELECT p.*
                FROM producto p
                WHERE p.id_producto= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function del_many($ids) {

        $sql = "SELECT p.*
                FROM producto p
                WHERE p.id_producto= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function create_one($producto) {        
        $this->db->insert("producto", $producto);
        $id= $this->db->insert_id();
        $data= $this->get_one($id);
        return $data;
    }

    public function update_one($producto) {

        $sql = "SELECT p.*
                FROM producto p
                WHERE p.id_producto= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
