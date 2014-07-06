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
    $id_modulo =  $this->input->post('id_mod'); 

    $si = '0';
    foreach($canmodulo->result() as $row){
       $id = $row->id_mod;
       if($id == $id_modulo){
          $si = '1';
       }
    }

    if ($si == '0'){
      $data = array(
      'id_mod' => $id_modulo,
      'h_inicio' => $this->input->post('h_inicio'), 
       'h_fin' => $this->input->post('h_fin') 
      );
      $this->mod_modulos->insertar_modulos($data);

      // COLOCAR AVISO DE INGRESADO

      //$resultado = $this->mod_modulos->insertar_modulos($data);
      //$respuesta = array("error" => false,"Módulo Registrado" => $resultado);
    }
    else{

      // COLOCAR AVISO DE NO INGRESADO
      //$respuesta = array("error" => true,"Módulo No Registrado" => $resultado);
    }
    redirect('modulos');
  }


  public function EliminarModulo(){

    $id_mod = $this->uri->segment(3);

    $resultado = $this->mod_modulos->eliminar_modulos($id_mod);

    $respuesta = array("error" => false,"Módulo eliminado" => $resultado);

    redirect('modulos');

  }
}
