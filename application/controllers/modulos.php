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

    $todos_mod = $this->mod_modulos->obtener_modulos();


    $canmodulo = $this->mod_modulos->obtener_can_modulos();
    $id_modulo =  $this->input->post('id_mod'); 
    $h_inicio = $this->input->post('h_inicio'); 
    $h_fin = $this->input->post('h_fin'); 


    $si = '1';
    if($h_fin > $h_inicio){ // el fin es menos que el inicio
        $si = '0';
        foreach($todos_mod->result() as $row){
           $id = $row->id_mod;
           $h_i = $row->inicio;
           $h_f = $row->fin;
           if($id == $id_modulo){ // ya existe
              $si = '1';
           } else{
             if($id < $id_modulo) { // mod anterior
                if($h_f > $h_inicio){ // el fin del anterior mayor que el inicio del nuevo
                  $si = '1';
                }
             }else if ($id > $id_modulo){ // mod siguiente
               if($h_fin > $h_i){ // el inicio del siguiente menor que el fin del nuevo
                  $si = '1';
                }
             }
           }
        }
      }


    if ($si == '0'){
      $data = array(
      'id_mod' => $id_modulo,
      'h_inicio' => $h_inicio, 
       'h_fin' => $h_fin 
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
