<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modulos extends CI_Controller {

  function __construct(){
       parent::__construct();

      $this->load->model('mod_modulos');

  }

  public function index(){
    $this->load->view('view_modulos');
  }

  public function CrearModulo(){

    $canmodulo = $this->mod_modulos->obtener_can_modulos();
    $id_mod =  $this->imput-post('id_mod');

    $si = '0';
    foreach($canmodulo->result() as $row){
       $id = $row->id_mod;
       if($id = $id_mod){
          $si = '1';
       }
    }

    if ($si = '0'){
      $data = array(
      'id_mod' => $id_mod,
      'h_inicio' => $this->imput->post('h_inicio'),
       'h_fin' => $this->imput->post('h_fin')
      );

      $resultado = $this->mod_modulos->insertar_modulos($data);
      $respuesta = array("error" => false,"Módulo Registrado" => $resultado);
    }
    else{
      $respuesta = array("error" => false,"Módulo No Registrado" => $resultado);
    }


  }

  public function EditarModulo($id){



  }

  public function EliminarModulo(){

  }
}
