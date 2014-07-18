<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_reserva extends CI_Model
{
    // obtiene la cantidad de veces que un alumno ha reservado, se ocupara para las reservas por dia.
    public function obtener_alum_fecha($fecha, $id) {
     $q_string = "select count(id_a) as max from reservas where fecha ='".$fecha."' and  id_a = '".$id."' and eliminada = '0' and confirmada = '0'";
     $data = $this->db->query($q_string);
      foreach ($data->result() as $row)
      {
          $data2= $row->max;
          return $data2;
      }

    }

    // obtiene el mayor valor de la bandera eliminada.
    public function obtener_max_eliminada($fecha, $modulo, $sala) {

      $this->db->select_max('eliminada');
    	$this->db->where('fecha',$fecha);
    	$this->db->where('modulo',$modulo);
    	$this->db->where('sala',$sala);
      $data=$this->db->get('reservas');

    foreach ($data->result() as $row)
    {
    $data2= $row->eliminada;
    return $data2;
    }

    }

    //inserta una reserva en la base de datos.
    public function agregar_reserva($data){

      if($this->db->insert('reservas',$data)){ // hacer lo mismo con update
        return "Reservado";
      }
      else{
        return false;
      }
    }
    // esta se utiliza para confirmar, eliminar, agregar observación.
    public function actualizar_reserva($fecha, $modulo, $sala, $data){

    	$this->db->where('fecha', $fecha);
    	$this->db->where('modulo', $modulo);
    	$this->db->where('sala', $sala);
      $this->db->where('eliminada', "0");
    	$this->db->update('reservas', $data);

    }

    // obtienes todas las reservas no eliminadas, de la base de datos.
    public function obtener_reservas($fecha)
    {
      $this->db->select('modulo,sala,eliminada,confirmada,estado,id_a,nombre_a,carrera_a');
      $this->db->from('reservas');
      $this->db->where('fecha',$fecha);
      $this->db->where('eliminada',"0");
      return $query = $this->db->get();
    } // PENDIENTE LOS BLOQUEOS TANTO POR HORA, COMO POR GESTION


    // obtiene solo las observaciones de las reservas.
    public function obtener_observacion($fecha, $modulo, $sala)
    {
      $this->db->select('observacion');
      $this->db->from('reservas');
      $this->db->where('fecha',$fecha);
      $this->db->where('modulo',$modulo);
      $this->db->where('sala',$sala);
      $this->db->where('eliminada',"0");
      $this->db->where('confirmada',"0");
      $data = $this->db->get();
    foreach ($data->result() as $row)
    {
    $data2= $row->observacion;
    return $data2;
    }
    }

}

?>
