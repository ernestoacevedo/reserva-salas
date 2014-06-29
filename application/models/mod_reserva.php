<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_reserva extends CI_Model
{

    public function obtener_alum_fecha($fecha, $id) {

  $data = $this->db->query("select count(id_a) as max from reservas where fecha ='$fecha' and  id_a = '$id'");

  foreach ($data->result() as $row)
{
    $data2= $row->max;
    return $data2;
}

    }

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


    public function agregar_reserva($data){

      if($this->db->insert('reservas',$data)){ // hacer lo mismo con update
        return true;
      }
      else{
        return false;
      }
    }

    public function actualizar_reserva($fecha, $modulo, $sala, $data){

    	$this->db->where('fecha', $fecha);
    	$this->db->where('modulo', $modulo);
    	$this->db->where('sala', $sala);
      $this->db->where('eliminada', "0");
    	$this->db->update('reservas', $data);

    }

    public function obtener_reservas($fecha)
    {
      $this->db->select('modulo,sala,eliminada,confirmada,estado,id_a,nombre_a,carrera_a');
      $this->db->from('reservas');
      $this->db->where('fecha',$fecha);
      $this->db->where('eliminada',"0");
      return $query = $this->db->get();
    }

}
?>
