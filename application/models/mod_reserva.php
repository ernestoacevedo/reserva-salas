<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_reserva extends CI_Model
{

    public function getAlumReserva($fecha, $id) {
/*
    	$this->db->select('id_a');
    	$this->db->where('fecha',$fecha);
    	$this->db->where('id_a',$id);
        $data=$this->db->get('reservas',1);
        //return $data->result();
*/
  $data = $this->db->query("select count(id_a) as max from reservas where fecha ='$fecha' and  id_a = '$id'");

  foreach ($data->result() as $row)
{
    $data2= $row->max;
    return $data2;
}


/*
if ($data =! null){
        	return true;
        }
        else{
        	return false;
        }
*/


    }

    public function getMaxReserva($fecha, $modulo, $sala) {

    	$this->db->select_max('eliminada');
    	$this->db->where('fecha',$fecha);
    	$this->db->where('modulo',$modulo);
    	$this->db->where('modulo',$modulo);
        $data=$this->db->get('reservas');
        return $data->result();


    }


    public function addReserva($data){
      if($this->db->insert('reservas',$data)){
        return true;
      }
      else{
        return false;
      }
    }

    public function updateReserva($fecha, $modulo, $sala, $data){
        //$data[''] = $this->input->post('');
        //$this->db->where('reserva.id_reserva',$this->input->post('id_reserva'));
        //$this->db->update('reserva',$data);

    	$this->db->where('fecha', $fecha);
    	$this->db->where('modulo', $modulo);
    	$this->db->where('sala', $sala);
    	$this->db->update('reserva', $data);

    }

    public function obtener_reservas($fecha)
    {
      $this->db->select('modulo,sala,eliminada,confirmada,estado,id_a');
      $this->db->from('reservas');
      $this->db->where('fecha',$fecha);
      return $query = $this->db->get();
    }

}
?>
