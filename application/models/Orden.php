<?php

class Orden extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {

        $sql = "SELECT *
                FROM orden_compra";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_one($id) {

        $sql = "SELECT o.*
                FROM orden_compra o
                WHERE o.id_orden_compra= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function del_one($id) {

        $sql = "SELECT o.*
                FROM orden_compra o
                WHERE o.id_orden_compra= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function del_many($ids) {

        $sql = "SELECT o.*
                FROM orden_compra o
                WHERE o.id_orden_compra= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function create_one($orden_compra) {

        $sql = "SELECT o.*
                FROM orden_compra o
                WHERE o.id_orden_compra= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function update_one($orden_compra) {

        $sql = "SELECT o.*
                FROM orden_compra o
                WHERE o.id_orden_compra= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
