<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modulos extends CI_Controller {

  function __construct(){
       parent::__construct();
// se integran los modelos
      $this->load->model('mod_modulos');

  }

  public function index(){
    $this->load->view('favicon');
    $this->load->view('view_modulos');
  }

  public function CrearModulo(){

    $todos_mod = $this->mod_modulos->obtener_modulos(); // objeto con los modulos de la BD.


    $canmodulo = $this->mod_modulos->obtener_can_modulos();// Se obtiene la cantidad de módulos de la BD.
    $id_modulo =  $this->input->post('id_mod');  // Se obtiene el valor 'id' del text area vía AJAX.
    $h_inicio = $this->input->post('h_inicio');  // Se obtiene el valor 'hora de inicio' del text area vía AJAX.
    $h_fin = $this->input->post('h_fin'); // Se obtiene el valor 'hora de fin' del text area vía AJAX. 


    $si = '1'; // si inicia bandera 'si'
    if($h_fin > $h_inicio){ // el fin es menos que el inicio
        $si = '0';
        foreach($todos_mod->result() as $row){ // se recorren los módulos de la BD por tuplas, del objeto con los módulos.
           $id = $row->id_mod;  // se rescata el 'id modulos' de la tupla.
           $h_i = $row->inicio;  // se rescata la 'hora de inicio' de la tupla.
           $h_f = $row->fin;  // se rescata la 'hora de fin' de la tupla
           if($id == $id_modulo){ // ya existe, cambia estado de la bandera.
              $si = '1'; 
           } else{
             if($id < $id_modulo) { // mod anterior
                if($h_f > $h_inicio){ // el fin del anterior mayor que el inicio del nuevo, sino cambia estado de la bandera.
                  $si = '1';
                }
             }else if ($id > $id_modulo){ // mod siguiente
               if($h_fin > $h_i){ // el inicio del siguiente menor que el fin del nuevo, sino cambia estado de la bandera.
                  $si = '1';
                }
             }
           }
        }
      }


    if ($si == '0'){ // Si no ocurre ninguna de las restricciones antes analizadas, si la badera está en cero.
        $data = array( // Se crea el array con los datos rescatados por AJAX.
        'id_mod' => $id_modulo,
        'h_inicio' => $h_inicio, 
         'h_fin' => $h_fin 
        );
      $this->mod_modulos->insertar_modulos($data); // Se llama a la función ingresar modulos en el modelo módulos y se pasa el array por parámetro.

      // COLOCAR AVISO DE INGRESADO

      //$resultado = $this->mod_modulos->insertar_modulos($data);
      //$respuesta = array("error" => false,"Módulo Registrado" => $resultado);
    }
    else{

      // COLOCAR AVISO DE NO INGRESADO
      //$respuesta = array("error" => true,"Módulo No Registrado" => $resultado);
    }
    redirect('modulos'); // Carga la vista.
  }


  public function EliminarModulo(){

    $id_mod = $this->uri->segment(3); // se acciona el botón eliminar por metodo URI de codeigniter

    $resultado = $this->mod_modulos->eliminar_modulos($id_mod);

    $respuesta = array("error" => false,"Módulo eliminado" => $resultado);

    redirect('modulos');

  }
}
