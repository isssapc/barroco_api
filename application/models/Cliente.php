<?php

class Cliente extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {

        $sql = "SELECT *
                FROM cliente";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_one($id) {

        $sql = "SELECT c.*
                FROM cliente c
                WHERE c.id_cliente= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function del_one($id) {

        $sql = "SELECT c.*
                FROM cliente c
                WHERE c.id_cliente= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function del_many($ids) {

        $sql = "SELECT c.*
                FROM cliente c
                WHERE c.id_cliente= $ids";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function create_one($cliente) {

        $sql = "SELECT c.*
                FROM cliente c
                WHERE d.id_cliente= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function update_one($cliente) {

        $sql = "SELECT c.*
                FROM cliente c
                WHERE c.id_cliente= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
