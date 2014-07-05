<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_disponibilidad extends CI_Model
{




	public function bloquear($data)  // reservas sin eliminar //
    {
	 	if($this->db->insert('reservas',$data)){ // hacer lo mismo con update
        return true;
      }
      else{
        return false;
      }
	}



public function desbloquear($fecha, $modulo, $sala)  // reservas sin eliminar //
    {

      $q_string = "delete from reservas where fecha ='".$fecha."' and modulo = '".$modulo."' and sala = '".$sala."' and eliminada = '0'";
      $this->db->query($q_string);

	}

}
?>