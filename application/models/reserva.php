<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reserva extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function insertar()
    {
        $data['id_a'] = $this->input->post('id_a');
        $this->db->insert('reserva',$data);
    }

    public function actualizar()
    {
        //$data[''] = $this->input->post('');
        //$this->db->where('reserva.id_reserva',$this->input->post('id_reserva'));
        //$this->db->update('reserva',$data);
    }

    public function eliminar($id_reserva)
    {
        //$this->db->where('reserva.id_reserva',$id_reserva );
        //$this->db->delete('reserva');
    }
}
