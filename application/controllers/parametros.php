<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Parametros extends CI_Controller {

  function __construct(){
       parent::__construct();

      $this->load->model('mod_parametros');

  }

// N_reservas
	// Plazo
public function index(){
  $this->load->model('mod_parametros');
  $this->load->model('mod_salas');
  $this->load->model('mod_modulos');
  $this->load->view('view_parametros');
}


public function ModificarAlumxdia()  // reservas sin eliminar //
    {

     $datos = $this->mod_parametros->obtener_parametros(); 
     
     $alumxdia = $this->input->post('reservas');
      //log_message('debug',print_r($salas,TRUE));

     $dataPK= array(
          'cant_salas'=> (int)$datos['cant_salas'],
          'plazo_para_reservar'=> (int)$datos['plazo_para_reservar'],
          'n_reservas_diarias'=> (int)$datos['n_reservas_diarias']
          );

     $dataNEW= array(
          'cant_salas'=> (int)$datos['cant_salas'],
          'plazo_para_reservar'=> (int)$datos['plazo_para_reservar'],
          'n_reservas_diarias'=> (int)$alumxdia
          );

     $this->mod_parametros->actualizar_alumxdia($dataPK, $dataNEW);

         redirect('parametros');


	}

public function ModificarPlazo()  // reservas sin eliminar //
    {


     $datos = $this->mod_parametros->obtener_parametros(); 
     
     $plazo = $this->input->post('plazo');
      //log_message('debug',print_r($salas,TRUE));

     $dataPK= array(
          'cant_salas'=> (int)$datos['cant_salas'],
          'plazo_para_reservar'=> (int)$datos['plazo_para_reservar'],
          'n_reservas_diarias'=> (int)$datos['n_reservas_diarias']
          );

     $dataNEW= array(
          'cant_salas'=> (int)$datos['cant_salas'],
          'plazo_para_reservar'=> (int)$plazo,
           'n_reservas_diarias'=> (int)$datos['n_reservas_diarias']
          );

     $this->mod_parametros->actualizar_plazo($dataPK, $dataNEW);

         redirect('parametros');

	}

}
