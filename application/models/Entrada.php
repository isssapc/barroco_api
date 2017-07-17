<?php

class Entrada extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {

        $sql = "SELECT *
                FROM entrada";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_one($id) {

        $sql = "SELECT e.*
                FROM entrada e
                WHERE e.id_entrada= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function del_one($id) {

        $sql = "SELECT e.*
                FROM entrada e
                WHERE e.id_entrada= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function del_many($ids) {

        $sql = "SELECT e.*
                FROM entrada e
                WHERE e.id_entrada= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function create_one($entrada) {

        $sql = "SELECT e.*
                FROM entrada e
                WHERE e.id_entrada= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function update_one($entrada) {

        $sql = "SELECT e.*
                FROM entrada e
                WHERE e.id_entrada= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
