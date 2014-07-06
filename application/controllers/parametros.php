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
  $this->load->view('view_parametros');
}


public function ModificarAlumxdia()  // reservas sin eliminar //
    {

     $datos = $this->mod_parametros->obtener_parametros();
     $alumxdia = $this->input->post('alumxdia');
     $dataPK= array(
          'cant_salas'=> $datos['cant_salas'],
          'plazo_para_reservar'=> $datos['plazo_para_reservar'],
          'n_reservas_diarias'=>$datos['n_reservas_diarias']
          );

     $dataNEW= array(
          'cant_salas'=> $datos['cant_salas'],
          'plazo_para_reservar'=> $datos['plazo_para_reservar'],
          'n_reservas_diarias'=>$alumxdia,
          );

     $this->mod_parametros->actualizar_alumxdia($dataPK, $dataNEW);

	}

public function ModificarPlazo()  // reservas sin eliminar //
    {

    $datos = $this->mod_parametros->obtener_parametros();
     $plazo = $this->input->post('plazo');
     $dataPK= array(
          'cant_salas'=> $datos['cant_salas'],
          'plazo_para_reservar'=> $datos['plazo_para_reservar'],
          'n_reservas_diarias'=>$datos['n_reservas_diarias']
          );

     $dataNEW= array(
          'cant_salas'=> $datos['cant_salas'],
          'plazo_para_reservar'=> $plazo,
          'n_reservas_diarias'=>$datos['n_reservas_diarias']
          );

     $this->mod_parametros->actualizar_plazo($dataPK, $dataNEW);
	}

}
