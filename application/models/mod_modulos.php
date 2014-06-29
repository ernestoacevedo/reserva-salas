<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_modulos extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }


    public function insertar_modulos()
    {
        $data['hora_inicio'] = $this->input->post('hora_inicio');
        $data['hora_fin'] = $this->input->post('hora_fin');
        $this->db->insert('modulo',$data);
    }

    public function actualizar_modulos()
    {
        //$data[''] = $this->input->post('');
        //$this->db->where('reserva.id_reserva',$this->input->post('id_reserva'));
        //$this->db->update('reserva',$data);
    }

    public function eliminar_modulos($id_reserva)
    {
        //$this->db->where('reserva.id_reserva',$id_reserva );
        //$this->db->delete('reserva');
    }


}
?>