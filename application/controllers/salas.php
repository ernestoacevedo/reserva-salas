<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Salas extends CI_Controller {


  function __construct(){
       parent::__construct();

      $this->load->model('mod_salas');
      $this->load->model('mod_parametros');

  }

  public function index(){
    $this->load->view('view_parametros');
  }


public function ModificarSalas(){
    
	   $datos = $this->mod_parametros->obtener_parametros(); 
     
     $salas = $this->input->post('salas');
      //log_message('debug',print_r($salas,TRUE));

     $dataPK= array(
          'cant_salas'=> (int)$datos['cant_salas'],
          'plazo_para_reservar'=> (int)$datos['plazo_para_reservar'],
          'n_reservas_diarias'=> (int)$datos['n_reservas_diarias']
          );

     $dataNEW= array(
          'cant_salas'=> (int)$salas,
          'plazo_para_reservar'=> (int)$datos['plazo_para_reservar'],
          'n_reservas_diarias'=> (int)$datos['n_reservas_diarias']
          );

     $this->mod_salas->actualizar_salas($dataPK, $dataNEW);

         redirect('parametros');

	}

  

}
