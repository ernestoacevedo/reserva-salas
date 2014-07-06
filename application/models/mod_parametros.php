<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_parametros extends CI_Model
{

    public function obtener_parametros() {

        $this->db->select('*');
        $data=$this->db->get('parametros');
        foreach ($data->result() as $row)
        {
            $data2['cant_salas']= $row->cant_salas;
            $data2['n_reservas_diarias']= $row->n_reservas_diarias;
            $data2['plazo_para_reservar']= $row->plazo_para_reservar;
            return $data2;
        }


    }

    public function obtener_alumxdia() {

        $this->db->select('n_reservas_diarias');
        $data=$this->db->get('parametros');

       foreach ($data->result() as $row)
        {
            $data2= $row->n_reservas_diarias;
            return $data2;
        }

    }

    public function obtener_plazo() {

        $this->db->select('plazo_para_reservar');
        $data=$this->db->get('parametros');

        foreach ($data->result() as $row)
        {
            $data2= $row->plazo_para_reservar;
            return $data2;
        }


    }

    

    public function actualizar_plazo($dataPK, $dataNEW) {

        $this->db->where('cant_salas', $dataPK['cant_salas']);
        $this->db->where('plazo_para_reservar', $dataPK['plazo_para_reservar']);
        $this->db->where('n_reservas_diarias', $dataPK['n_reservas_diarias']);    
        
        $this->db->update('parametros', $dataNEW);  
      

    }

    public function actualizar_alumxdia($dataPK, $dataNEW) {

        $this->db->where('cant_salas', $dataPK['cant_salas']);
        $this->db->where('plazo_para_reservar', $dataPK['plazo_para_reservar']);
        $this->db->where('n_reservas_diarias', $dataPK['n_reservas_diarias']);    
        
        $this->db->update('parametros', $dataNEW);  
      
    }


}
?>
