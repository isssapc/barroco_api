<?php

class Entrada extends CI_Model {

    public function __construct() {
        parent::__construct();
        $timezone = 'America/Mexico_City';
        date_default_timezone_set($timezone);
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
                WHERE e.id_entrada= $id LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row_array();
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

    public function create_one($num_factura, $productos) {

        $now = date("Y-m-d H:i:s");

        $entrada = array("num_factura" => $num_factura, "fecha" => $now);

        $this->db->insert("entrada", $entrada);
        $id = $this->db->insert_id();

        $result = $this->add_productos($id, $productos);

        $data = $this->get_one($id);
        return $data;
    }

    public function add_productos($id_entrada, $productos) {

        for ($i = 0; $i < count($productos); $i++) {
            $productos[$i]["id_entrada"] = $id_entrada;
        }

        $this->db->insert_batch('entrada_producto', $productos);
        $error = $this->db->error();
        $count = $this->db->affected_rows();
        return array("count" => $count, "error" => $error);
    }

    public function get_productos($id_entrada) {
        $sql = "SELECT ep.*, p.nombre, p.unidad, pc.nombre AS categoria 
                FROM entrada_producto ep
                JOIN producto p ON p.id_producto=ep.id_producto
                JOIN producto_categoria pc ON pc.id_producto_categoria= p.id_producto_categoria
                WHERE ep.id_entrada=$id_entrada";

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
