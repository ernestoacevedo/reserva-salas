<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_alumno extends CI_Model
{
 
    public function selAlumno() {

    	$this->db->select('*');
        $data=$this->db->get('alumnos');
        return $data->result();
        
    }

}
?>