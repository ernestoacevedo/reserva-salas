<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_salas extends CI_Model
{

  // Obtiene el número de salas, almacenados en la BD.
 	public function obtener_salas() {

        $this->db->select('cant_salas');
        $data=$this->db->get('parametros');
        foreach ($data->result() as $row)
      	{
          $data2= $row->cant_salas;
          return $data2;
      	}
        
    }

// Modifica el número de salas, almacenados en la BD.
    public function actualizar_salas($dataPK, $dataNEW) {

        $this->db->where('cant_salas', $dataPK['cant_salas']);
        $this->db->where('plazo_para_reservar', $dataPK['plazo_para_reservar']);
        $this->db->where('n_reservas_diarias', $dataPK['n_reservas_diarias']);    
        
        $this->db->update('parametros', $dataNEW);  
      
    } 




}
?>