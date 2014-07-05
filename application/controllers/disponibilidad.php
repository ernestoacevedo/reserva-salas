<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Disponibilidad extends CI_Controller {


  function __construct(){
       parent::__construct();

      $this->load->model('mod_disponibilidad');

	}
// Bandera Estado



public function BloquearModulo(){

    $fecha = $this->input->post('fecha');
    $sala = $this->input->post('sala');
    $modulo = $this->input->post('modulo');

        $data= array(
          'fecha'=> $fecha,
          'modulo'=> $modulo,
          'sala'=>$sala,
           'eliminada' => 0,
           'id_a'=> '',
           'nombre_a' => '',
           'carrera_a' => '',
            'confirmada' => 0,
            'estado' => 0,
          //'id_e'=>$this->input->post('loggin'), // obtener del sesion
            'id_e' => 'Administrador',
            'observacion' => 'Bloqueada'
          );

    $resultado = $this->mod_disponibilidad->bloquear($data);
    $respuesta = array("error" => false,"Bloqueado" => $resultado);

  }
  

public function BloquearSala(){

    $fecha = $this->input->post('fecha');
    $sala = $this->input->post('sala');

    $modulo = $this->mod_modulos->obtener_max_modulos();

	for ($i=1, $i<= $modulo, $i++) {

	        $data= array(
	          'fecha'=> $fecha,
	          'modulo'=> $i,
	          'sala'=>$sala,
	           'eliminada' => 0,
	           'id_a'=> '',
	           'nombre_a' => '',
	           'carrera_a' => '',
	            'confirmada' => 0,
	            'estado' => 0,
	          //'id_e'=>$this->input->post('loggin'), // obtener del sesion
	            'id_e' => 'Administrador',
	            'observacion' => 'Bloqueada'
	          );
	   $this->mod_disponibilidad->bloquear($data);
	   // $resultado = $this->mod_disponibilidad->bloquear($data);

	}

    $respuesta = array("error" => false,"Bloqueado" => $resultado);



  }


public function BloquearDia(){

    $fecha = $this->input->post('fecha');

    $sala = $this->mod_salas->obtener_salas();
    $modulo = $this->mod_modulos->obtener_max_modulos();

    for($j=1, $j<= $sala, $j++)
		for ($i=1, $i<= $modulo, $i++) {

		        $data= array(
		          'fecha'=> $fecha,
		          'modulo'=> $i,
		          'sala'=>$j,
		           'eliminada' => 0,
		           'id_a'=> '',
		           'nombre_a' => '',
		           'carrera_a' => '',
		            'confirmada' => 0,
		            'estado' => 0,
		          //'id_e'=>$this->input->post('loggin'), // obtener del sesion
		            'id_e' => 'Administrador',
		            'observacion' => 'Bloqueada'
		          );

		   $this->mod_disponibilidad->bloquear($data);
		   // $resultado = $this->mod_reserva->bloquear($data);

		}
	}

    $respuesta = array("error" => false,"Bloqueado" => $resultado);

    

  }

public function DesbloquearModulo(){
    
    $fecha = $this->input->post('fecha');
    $sala = $this->input->post('sala');
    $modulo = $this->input->post('modulo');

    $resultado = $this->mod_disponibilidad->desbloquear($fecha, $modulo, $sala);
    $respuesta = array("error" => false,"Desbloqueado" => $resultado);
   
  }
  

public function DesbloquearSala(){
    
    $fecha = $this->input->post('fecha');
    $sala = $this->input->post('sala');

    $modulo = $this->mod_modulos->obtener_max_modulos();

    for ($i=1, $i<= $modulo, $i++) {

    	$resultado = $this->mod_disponibilidad->desbloquear($fecha, $i, $sala);

	}
    $respuesta = array("error" => false,"Desbloqueado" => $resultado);
   

  }


public function DesbloquearDia(){
	
	$fecha = $this->input->post('fecha');

    $sala = $this->mod_salas->obtener_salas();
    $modulo = $this->mod_modulos->obtener_max_modulos();

    for($j=1, $j<= $sala, $j++){
      for ($i=1, $i<= $modulo, $i++) {

    	$resultado = $this->mod_disponibilidad->desbloquear($fecha, $i, $j);

		}
	}
    $respuesta = array("error" => false,"Desbloqueado" => $resultado);

  }


}
