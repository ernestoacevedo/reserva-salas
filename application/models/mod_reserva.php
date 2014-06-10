<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_reserva extends CI_Model
{
 
    public function getAlumReserva($fecha, $modulo, $sala, $id) {

    	$this->db->select('id_a');
    	$this->db->where('fecha',$fecha);
        $this->db->where('fecha',$modulo);
        $this->db->where('fecha',$sala);
    	$this->db->where('id_a',$id);
        $data=$this->db->get('reservas',1);
        return $data->result();


/*	if ($data =! null){
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

    	//data['id_a'] = $this->input->post('id_a');
        $this->db->insert('reservas',$data); 

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

}
?>