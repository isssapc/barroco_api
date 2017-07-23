<?php

class Orden extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {

        $sql = "SELECT o.*, c.nombre AS cliente, fp.nombre AS forma_pago 
                FROM orden_compra o
                JOIN cliente c ON c.id_cliente= o.id_cliente
                JOIN forma_pago fp ON fp.id_forma_pago=o.id_forma_pago";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_one($id) {

        $sql = "SELECT o.*, c.nombre AS cliente, fp.nombre AS forma_pago 
                FROM orden_compra o
                JOIN cliente c ON c.id_cliente= o.id_cliente
                JOIN forma_pago fp ON fp.id_forma_pago=o.id_forma_pago
                WHERE o.id_orden_compra= $id LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function get_formas_pago() {

        $sql = "SELECT fp.* 
                FROM forma_pago fp";
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

    public function create_one($orden) {

        $this->db->insert("orden_compra", $orden);
        $id = $this->db->insert_id();

        $data = $this->get_one($id);
        return $data;
    }

    public function update_one($id, $props) {

        $where = "id_orden_compra = $id";
        $sql = $this->db->update_string('orden_compra', $props, $where);
        $this->db->query($sql);

        $orden = $this->get_one($id);
        return $orden;
    }

}
