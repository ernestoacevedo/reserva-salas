<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_salas extends CI_Model
{


 	public function obtener_salas() {

        $this->db->select('cant_salas');
        $data=$this->db->get('parametros');
        foreach ($data->result() as $row)
      	{
          $data2= $row->cant_salas;
          return $data2;
      	}
        
    }


    public function actualizar_salas($dataPK, $dataNEW) {

         $this->db->where('parametros', $dataPK);
        $this->db->update('parametros', $dataNEW);
    } 




}
?>