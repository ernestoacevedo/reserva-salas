<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Disponibilidad extends CI_Controller {


  function __construct(){
       parent::__construct();

      $this->load->model('mod_disponibilidad');
      $this->load->model('mod_salas');
      $this->load->model('mod_modulos');

	}
// Bandera Estado


public function Bloqueo(){
  

    (int)$bandera = $this->input->post('bandera');
    $fecha = $this->input->post('fecha');

      if ($bandera == 1){


                  $sala = $this->input->post('sala_bloq');
                  (int)$modulo_inicio = $this->input->post('modulo_inicio');
                  (int)$modulo_fin = $this->input->post('modulo_fin');

                  

                for ($i=$modulo_inicio; $i<= $modulo_fin; $i++) {

                        $data= array(
                          'fecha'=> $fecha,
                          'modulo'=> $i,
                          'sala'=>$sala,
                          'eliminada' => 0,
                           'id_a'=> '0',
                           'nombre_a' => 'Bloqueada',
                           'carrera_a' => 'No Disponible',
                            'confirmada' => 0,
                            'estado' => 0,
                          //'id_e'=>$this->input->post('loggin'), // obtener del sesion
                            'id_e' => '12.312.312-3', // Administrador
                            'observacion' => 'Bloqueada'
                      );
                
                   $this->mod_disponibilidad->bloquear($data);
                   // $resultado = $this->mod_disponibilidad->bloquear($data);

                }

      } else if ($bandera == 2){

            $sala = $this->mod_salas->obtener_salas();
            $modulo = $this->mod_modulos->obtener_max_modulos();

            for($j=1; $j<= $sala; $j++)
            for ($i=1; $i<= $modulo; $i++) {
              log_message('debug',print_r("sala :".$j,TRUE));    
              log_message('debug',print_r("modulo: ".$i,TRUE));    
              log_message('debug',print_r("fecha: ".$fecha,TRUE));    
                    $data= array(
                      'fecha'=> $fecha,
                      'modulo'=> $i,
                      'sala'=>$j,
                       'eliminada' => 0,
                       'id_a'=> '0',
                       'nombre_a' => 'Bloqueada',
                       'carrera_a' => 'No Disponible',
                        'confirmada' => 0,
                        'estado' => 0,
                      //'id_e'=>$this->input->post('loggin'), // obtener del sesion
                        'id_e' => '12.312.312-3', // Administrador
                        'observacion' => 'Bloqueada'
                      );

               $this->mod_disponibilidad->bloquear($data);
               // $resultado = $this->mod_reserva->bloquear($data);

            }
              //$respuesta = array("error" => false,"Bloqueado" => $resultado);
                    

        }
  
}

public function Desbloqueo(){

        (int)$bandera = $this->input->post('bandera');
        $fecha = $this->input->post('fecha');

        if ($bandera == 1){


                $sala = $this->input->post('sala_bloq');
                (int)$modulo_inicio = $this->input->post('modulo_inicio');
                (int)$modulo_fin = $this->input->post('modulo_fin');

                  
                for ($i=$modulo_inicio; $i<= $modulo_fin; $i++) {
                      
                      $this->mod_disponibilidad->desbloquear($fecha, $i, $sala);

                     // $resultado = $this->mod_disponibilidad->desbloquear($fecha, $i, $sala);
                      //$respuesta = array("error" => false,"Desbloqueado" => $resultado);
                    }
               
          } else if ($bandera == 2){

            $sala = $this->mod_salas->obtener_salas();
            $modulo = $this->mod_modulos->obtener_max_modulos();

                for($j=1; $j<= $sala; $j++){
                  for ($i=1; $i<= $modulo; $i++) {

                    $this->mod_disponibilidad->desbloquear($fecha, $i, $j);
                //	$resultado = $this->mod_disponibilidad->desbloquear($fecha, $i, $j);

            		}
            	}
               // $respuesta = array("error" => false,"Desbloqueado" => $resultado);

              
            }

        }
}
