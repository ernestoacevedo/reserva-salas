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
    $modulos => $this->mod_modulos->obtener_can_modulos();

    $id_mod => $this->imput-post('id_mod');
    $data = array(
      'h_inicio' => $this->imput->post('h_inicio'),
       'h_fin' => $this->imput->post('h_fin'),
       'dimension' => $this->imput->post('dimension')
      );


  }

  public function EditarModulo(){



  }

  public function EliminarModulo(){



  }
}
