<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("producto");
    }

    public function index_get() {
        $datos = $this->producto->get_all();
        $this->response($datos);
    }

    public function get_producto_get($id) {
        $datos = $this->producto->get_one($id);
        $this->response($datos);
    }

    public function get_almacen_entrada_get() {
        $datos = $this->producto->get_almacen_entrada();
        $this->response($datos);
    }

    public function get_categorias_get() {
        $datos = $this->producto->get_categorias();
        $this->response($datos);
    }

    public function create_categoria_post() {
        $categoria = $this->post("categoria");
        $datos = $this->producto->create_one_categoria($categoria);
        $this->response($datos);
    }

//    public function get_tipos_get() {
//        $datos = $this->producto->get_tipos();
//        $this->response($datos);
//    }

    public function search_producto_get($nombre) {
        //$nombre= $this->post("nombre");
        $datos = $this->producto->search_by_nombre($nombre);
        $this->response($datos);
        //$this->response(array($nombre));
    }

    public function search_producto_orden_get($nombre) {
        //$nombre= $this->post("nombre");
        $datos = $this->producto->search_producto_orden_by_nombre($nombre);
        $this->response($datos);
        //$this->response(array($nombre));
    }

    public function del_producto_post($id) {
        $datos = $this->producto->del_one($id);
        $this->response($datos);
    }

    public function del_productos_post() {
        $ids = $this->post("id_productos");
        $datos = $this->producto->del_many($ids);
        $this->response($datos);
    }

    public function create_producto_post() {
        $producto = $this->post("producto");
        $datos = $this->producto->create_one($producto);
        $this->response($datos);
    }

    public function update_producto_post($id) {
        $producto = $this->post("producto");
        $datos = $this->producto->update_one($id, $producto);
        $this->response($datos);
    }

    public function upload_fichatecnica_post() {

        $id_producto = $this->post('id_producto');
        $descripcion = $this->post('descripcion');

       
        
        $path = "./upload/productos/" . $id_producto . "/";

        if (!file_exists($path)) {
            mkdir($path, 0777, TRUE);
        }

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = 4096; //4MB 1024*4
        $config['overwrite'] = FALSE;
        $config['file_ext_tolower'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);

        $file = 'file';
        if (!$this->upload->do_upload($file)) {
            $error = $this->upload->error_msg;
            $this->response(["error" => $error], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $data = $this->upload->data();
            $filename = $path . $data['file_name'];
            $id_documento = $this->producto->add_documento($id_producto, $filename, $descripcion);

            // ini resize ------------------------------------------------
            /*
            $config['image_library'] = 'gd2';
            $config['source_image'] = $path . $filename;
            //$config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 1200; //1000
            //$config['height'] = 900;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            */
            // fin resize ------------------------------------------------


            $this->response(["file_name" => $filename, "id" => $id_documento]);
        }
    }

}
