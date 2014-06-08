<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_reserva extends CI_Model
{
 
    public function selReserva() {

    	$this->db->select('*');
        $data=$this->db->get('reservas');
        return $data->result();
        
    }

    public function insReserva(){
    	//$data['id_a'] = $this->input->post('id_a');
        //$this->db->insert('reserva',$data); 

    }

    public function updReserva(){
        //$data[''] = $this->input->post('');
        //$this->db->where('reserva.id_reserva',$this->input->post('id_reserva'));
        //$this->db->update('reserva',$data);

    }

}
?>