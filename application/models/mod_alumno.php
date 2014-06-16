<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_alumno extends CI_Model
{
 
    public function obtener_alumno($id) {

    	$this->db->select('nombre_a', 'carrera');
    	$this->db->where('id_a',$id);
        $data=$this->db->get('alumnos');
        return $data->result();
        
    }

}
?>