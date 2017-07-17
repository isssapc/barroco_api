<?php

class Salida extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {

        $sql = "SELECT *
                FROM salida";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_one($id) {

        $sql = "SELECT s.*
                FROM salida s
                WHERE s.id_salida= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function del_one($id) {

        $sql = "SELECT s.*
                FROM salida s
                WHERE s.id_salida= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function del_many($ids) {

        $sql = "SELECT s.*
                FROM salida s
                WHERE s.id_salida= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function create_one($salida) {

        $sql = "SELECT s.*
                FROM salida s
                WHERE s.id_salida= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function update_one($salida) {

        $sql = "SELECT s.*
                FROM salida s
                WHERE s.id_salida= $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
