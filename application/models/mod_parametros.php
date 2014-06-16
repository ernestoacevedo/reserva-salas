<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_parametros extends CI_Model
{
 

    public function obtener_alumxdia() {

        $this->db->select('n_reservas_diarias');
        $data=$this->db->get('parametros');
        return $data->result();
        
    }

    public function obtener_plazo() {

        $this->db->select('plazo_para_reservar');
        $data=$this->db->get('parametros');
        return $data->result();
        
    }    


 
}
?>