<?php

class Orden extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {

        $sql = "SELECT o.*, c.nombre AS cliente, fp.nombre AS forma_pago 
                FROM orden_compra o
                JOIN cliente c ON c.id_cliente= o.id_cliente
                JOIN forma_pago fp ON fp.id_forma_pago=o.id_forma_pago
                ORDER BY o.id_orden_compra DESC";
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

    public function get_lugares_entrega() {

        $sql = "SELECT ce.* 
                FROM compra_entrega ce";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function del_one($id) {

        //borramos los productos de la orden
        $num_prods = $this->del_productos_orden($id);
        //borramos la orden
        $this->db->where('id_orden_compra', $id);
        $this->db->delete('orden_compra');
        $count = $this->db->affected_rows();
        return $count;
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

    public function add_productos_orden($id_orden, $productos) {

        for ($i = 0; $i < count($productos); $i++) {
            $productos[$i]["id_orden_compra"] = $id_orden;
            unset($productos[$i]["nombre"]);
            unset($productos[$i]["unidad"]);
        }

        $this->db->insert_batch("orden_compra_producto", $productos);
        $error = $this->db->error();

        $count = $this->db->affected_rows();
        return array("count" => $count, "error" => $error);
    }

    public function del_productos_orden($id_orden) {
        $this->db->where('id_orden_compra', $id_orden);
        $this->db->delete('orden_compra_producto');
        $count = $this->db->affected_rows();
        return $count;
    }

    public function update_one($id, $props) {

        $where = "id_orden_compra = $id";
        $sql = $this->db->update_string('orden_compra', $props, $where);
        $this->db->query($sql);

        $orden = $this->get_one($id);
        return $orden;
    }

}
