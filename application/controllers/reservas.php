<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reservas extends CI_Controller {

  function __construct(){
       parent::__construct();

      $this->load->model('mod_alumno');
      $this->load->model('mod_usuario');
      $this->load->model('mod_reserva');
      $this->load->model('mod_parametros');
      $this->load->model('mod_reportes');

      $this->load->helper('form','html');
  }


  public function ValidarAlumno(){

    /* Obtiene los alumnos para rellenar el modal de reserva y con ello realizar la reserva*/

    $rut = $this->input->post('rut');
    $datos = $this->mod_alumno->obtener_alumno($rut);
    $alumno = array();
    foreach($datos as $row){
      $alumno['nombre'] = $row->nombre_a;
      $alumno['apellido'] = $row->apellidos_a;
      $alumno['carrera'] = $row->carrera;
    }
    if(sizeof($alumno)>0){
      echo json_encode(array("error"=> false, "alumno"=>$alumno));
    }
    else {
      echo json_encode(array("error" => true));
    }
  }

  public function index(){
    /*
    -Al presionar el dia en el calendario, se deben cargar desde la tabla "reserva" en la BD  las
    reservas (realizadas: ["eliminada =0(default)" y "confirmada =0 (default)"]) y las reservas
    (asistidas/confirmadas: ["eliminada =0(default)" y "confirmada =1"]),de manera que en las reservas realizadas
    aparezcan los datos del alumno "nombre" y "carrera" como modificables (botón de eliminar, confirmar)
    y las reservas (asistidas/confirmadas) aparezcan como bloquedas, con los datos del alumno "nombre" y
    "carrera".
    En otras palabras, los modulos/salas que serán cargados para el caso de las reservas (asistidas/confirmadas)
    son aquellos con los datos "fecha", "modulo", "sala", "eliminar=0" y "confirmada=1", para el caso de
    las reservas (realizadas) se cargaran los modulos/salas  con los datos "fecha", "modulo", "sala",
    "eliminar=0(default)" y "confirmada =0(default)".

    -El botón reservar o + debe aparecer solo en el dia "hoy" y "el dia siguiente", por RF2, para los
    modulos/salas no reservados y con hora vigente, esto será controlado por página no por BD y se prodrá
    editar en un mantenedor por el ADMINISTRADOR.

    Aclaracion:
    -Reservas Realizadas son las reservas Activas.
    -Reservas Asistidas/Confirmadas son las reservas Inactivas.
    */
  }

  public function NuevaReserva(){
    /*
    Al momento de aparecer el modal, debemos tomar los datos, tanto el "codigo de barras"
    como el "rut", y buscar en la base de datos el "nombre", "carrera" y "foto" para mostrar
    en el modal.  Esto lo debemos hacer con un llamado a la funcion "selAlumno", que está en
    el modelo "mod_alumno". selAlumno(id_a) donde id_a es el "rut" del alumno o  es
    el "codigo de barras" de la credencial, este debe retornar "nombre", "carrera" en una variable y
    foto.

    Al presionar el boton reservar en el modal, se debe verificar el cumplimiento del requisito
    "solo uno por dia", de manera que se deben rescatar, del estado del dia (tabla de salas/modulos),
    en una variable tanto la "fecha", "modulo", "sala" y "eliminada = 0 (dato default)", luego
    se busca en las reservas en el modelo "mod_reserva" en la funcion "selReserva" y se obtiene el
    rut o la credencial "id_a" y se compara. Si son iguales una funcion de comparacion deberia retornar "false"
    en caso contrario "true" la cual daría permiso para la reserva.

    Para registrar la reserva, se debe llamar a "insReserva" en "mod_reserva" e insertar los siguientes datos:
    -pk: "fecha", "modulo", "sala" y "eliminada=0"
    -fk: "id_a" se obtiene con rut o credencial, "id_e" el cual se obtiene de la session.
    -otros: "confirmada =0", "observacion: Reservada"

    */


    $rut = $this->input->post('rut');
    $fecha = $this->input->post('fecha');
    $modulo = $this->input->post('modulo');
    $sala = $this->input->post('sala');
    $nombre = $this->input->post('nombre');
    $carrera = $this->input->post('carrera');

 
 // mod_parametros, obtener_alumxdia
  // $limitexdia // parametros, plazo_para_reservar
 // mod_parametros, obtener_plazo
    $alumxdia = $this->mod_parametros->obtener_alumxdia();  // buscar en BD, parametros, n_reservas_diarias
    $max=$this->mod_reserva->obtener_alum_fecha($fecha, $rut);

  //  $fec = $this->mod_reportes->total_reservas_dia($fecha); 
   // log_message('debug',print_r($fec,TRUE));

    log_message('debug',print_r($alumxdia,TRUE));
    log_message('debug',print_r($max,TRUE));

  if ($max < $alumxdia){

    $data= array(
          'fecha'=> $fecha,
          'modulo'=> $modulo,
          'sala'=>$sala,
           'eliminada' => 0,
           'id_a'=>$rut,
           'nombre_a' => $nombre,
           'carrera_a' => $carrera,
            'confirmada' => 0,
            'estado' => 1,
          //'id_e'=>$this->input->post('loggin'), // obtener del sesion
            'id_e' => '12.312.312-3',
            'observacion' => 'Reservada'
          );
    $resultado = $this->mod_reserva->agregar_reserva($data);

    $respuesta = array("error" => false,"insertado" => $resultado);
   }
    else{
      $respuesta = array("error"=> true);
    }


    echo json_encode($respuesta);


  }

  public function ConfirmarReserva(){

/*
    -El (botón confirmar) solo debe aparecer  en las reservas (realizadas: ["eliminada =0(default)" y "confirmada =0 (default)"]),
    cuando se esta cumpliendo la hora en el modulo y debe durar 15 minutos.

    -Caso confirmada: en este caso, si se presiona confirmar se actualizan los datos de la BD, se buscan en BD
    por "fecha", "modulo", "sala" y "eliminada =0" y se cambia el dato "confirmada =0 (default)" a "confirmada =1",
    agregando la "observación" ["Confirmada"].
    Para este caso los botones Eliminar y Confirmar desaparecerán y la reserva pasará a asistida/confirmada.

    -Caso no confirmada: en este caso, automáticamente controlado por página no por BD pasado 15 minutos, se debe llamar a eliminar,
    agregando la "observación" ["No confirmada"], en "eliminar" se actualizará el dato "eliminar =0(default)" a "eliminar =1" y se mantendrá
    "confirmar = 0".

    OBS: El dato "eliminar = 1" nos dice que fue eliminada por no confirmación

*/



    $fecha = $this->input->post('fecha');
    $modulo = $this->input->post('modulo');
    $sala = $this->input->post('sala');

/*
    log_message('debug',print_r($fecha,TRUE));
    log_message('debug',print_r($modulo,TRUE));
    log_message('debug',print_r($sala,TRUE));
*/

      $data= array(
      //'eliminada' => 0, // opcional
      'confirmada' => 1,
      'observacion' => 'Confirmada'
      );

    $this->mod_reserva->actualizar_reserva($fecha, $modulo, $sala, $data);


    $respuesta = array("error" => true,"confirmado" => $resultado);
    echo json_encode($respuesta);

}

  public function EliminarReserva(){
   /* -El (botón eliminar) que sólo aparece en las reservas (realizadas) y en cualquier hora, debe permitir
    agregar "observación" con la concatenacion de texto ["Eliminada por usuario:"."  ".textoingresado], una
    vez presionado confirmar se debe leer en la BD el máximo_valor de "eliminada" con parametros
    "fecha", "modulo" y "sala", y actualizar la reserva "fecha", "modulo", "sala" y "eliminada=0",
    a "eliminada = máximo_valor +1" y "observacion" con concatenación. Si el máximo_valor = 0 (no se ha
    eliminado ninguna reserva), el maximo_valor comienza en 2.  maximo_valor>=1 para eliminar.

    -Este procedimiento sirve para la emiminación lógica. el maximo valor aumentado nos permite borrar la misma
    reserva "fecha", "modulo", "sala" las veces que queramos, siendo maximo_valor >=1 un historial de eliminaciones
    para la reserva.


    Reglas de "Eliminación":
    - = 0, no eliminada
    - = 1, eliminada por no confirmacion
    - >1, elimanada por alumno

    todas estas banderas no serán ingresadas por usuario, seran activadas por acciones/ eventos Botones
    el unico ingreso de usuario será el rut del alumno, lo demás será seleccionar y apretar botones.
    */


    $fecha = $this->input->post('fecha');
    $modulo = $this->input->post('modulo');
    $sala = $this->input->post('sala');

    $max = $this->mod_reserva->obtener_max_eliminada($fecha, $modulo, $sala);

    if ($max < 1){
      $max =1;
    }

     $data= array(
      'eliminada' =>  $max +1,
      'confirmada' => 0, // opcional
      'observacion' => 'Eliminada:   '.$this->input->post('observacion')
      );

    $this->mod_reserva->actualizar_reserva($fecha, $modulo, $sala, $data);

    $respuesta = array("error" => true,"borrado" => $resultado);
    echo json_encode($respuesta);
  }


 public function ReservaNoConfirmada(){

/*
    $fecha = $this->input->post('fecha');
    $modulo = $this->input->post('modulo');
    $sala = $this->input->post('sala');

    // $eliminada = 1;
    //$confirmar =0;
    //$observacion = 'Eliminada por no Confirmación');

    $data= array(
      'eliminada' => 1,
      'confirmada' => 0,
      'observacion' => 'Eliminada por no Confirmación')
      );

    $this->mod_reserva->actualizar_reserva($fecha, $modulo, $sala, $data);
*/
  }


 public function BloquearReserva(){

/*
  El valor en el estado "estado = 1 (dato default)"  nos dice que la sala, en ese modulo y fecha está disponible, el valor
  "estado = 0", nos dice que la sala, modulo, fecha está bloqueado.
*/

/*
    $fecha = $this->input->post('fecha');
    $modulo = $this->input->post('modulo');
    $sala = $this->input->post('sala');
    //$estado = 0;
    //$observacion = 'Eliminada por Bloqueo';

      $data= array(
      'estado' => $this->input->post('estado'), // =>0,
      'observacion' => 'Bloqueada'
      );

    $this->mod_reserva->actualizar_reserva($fecha, $modulo, $sala, $data);
*/
  }


  public function AgregarObservacion(){


    $fecha = $this->input->post('fecha');
    $modulo = $this->input->post('modulo');
    $sala = $this->input->post('sala');

    $data= array(
      'observacion' => 'Observacion:   '.$this->input->post('observacion')
      );

    $this->mod_reserva->actualizar_reserva($fecha, $modulo, $sala, $data);

    $respuesta = array("error" => true,"Observación Agregada" => $resultado);
    echo json_encode($respuesta);
  }


  public function ObtenerReservas(){
    $query = $this->mod_reserva->obtener_reservas($this->input->post('fecha'));
    $reservas = array();
    $reserva = array();
    foreach($query->result() as $row){
      $reserva['modulo'] = $row->modulo;
      $reserva['sala'] = $row->sala;
      $reserva['eliminada'] = $row->eliminada;
      $reserva['confirmada'] = $row->confirmada;
      $reserva['estado'] = $row->estado;
      $reserva['id_a'] = $row->id_a;
      $reserva['nombre_a'] = $row->nombre_a;
      $reserva['carrera_a'] = $row->carrera_a;
      $reservas[] = $reserva;
    }
    echo json_encode($reservas);
  }
}

/*
Casos:


*/
