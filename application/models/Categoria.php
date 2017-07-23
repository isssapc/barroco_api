<?php

class Categoria extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {

        $sql = "SELECT c.*
                FROM producto_categoria c";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_one($id) {

        $sql = "SELECT c.*
                FROM producto_categoria c               
                WHERE c.id_producto_categoria= $id LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row_array();
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

    public function create_one($categoria) {
        $this->db->insert("producto_categoria", $categoria);
        $id = $this->db->insert_id();

        $data = $this->get_one($id);
        return $data;
    }

    public function update_one($id, $props) {

        $where = "id_producto_categoria = $id";
        $sql = $this->db->update_string('producto_categoria', $props, $where);
        $this->db->query($sql);

        $categoria = $this->get_one($id);
        return $categoria;
    }

}
