<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_usuario extends CI_Model
{
 
    public function selUsuario() {

    	$this->db->select('*');
        $data=$this->db->get('usuarios');
        return $data->result();
        
    }

}
?>