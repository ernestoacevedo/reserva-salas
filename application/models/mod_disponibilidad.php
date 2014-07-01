<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_disponibilidad extends CI_Model
{




	public function bloquear_dia($data)  // reservas sin eliminar //
    {
    

	 	if($this->db->insert('reservas',$data)){ // hacer lo mismo con update
        return true;
      }
      else{
        return false;
      }

	}



public function bloquear_sala($data)  // reservas sin eliminar //
    {

    	 if($this->db->insert('reservas',$data)){ // hacer lo mismo con update
        return true;
      }
      else{
        return false;
      }
   
	}



public function bloquear_dia($data)  // reservas sin eliminar //
    {

 		if($this->db->insert('reservas',$data)){ // hacer lo mismo con update
        return true;
      }
      else{
        return false;
      }
  
	}




}
?>