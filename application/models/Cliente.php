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
                WHERE c.id_cliente= $id LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function search_by_nombre($nombre) {
        $sql = "SELECT *
                FROM cliente c 
                WHERE c.nombre like '%$nombre%'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function del_one($id) {

        $this->db->where('id_cliente', $id);
        $this->db->delete('cliente');
        $count = $this->db->affected_rows();
        return $count;
    }

    /*
     * 
     * TODO
     */

    public function del_many($ids) {

        $sql = "SELECT c.*
                FROM cliente c
                WHERE c.id_cliente= $ids";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function create_one($cliente) {

        $this->db->insert('cliente', $cliente);
        $id_cliente = $this->db->insert_id();

        $cliente = $this->get_one($id_cliente);
        return $cliente;
    }

    public function update_one($id, $props) {

        $where = "id_cliente = $id";
        $sql = $this->db->update_string('cliente', $props, $where);
        $this->db->query($sql);

        $cliente = $this->get_one($id);
        return $cliente;
    }

}
