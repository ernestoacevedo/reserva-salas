<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_parametros extends CI_Model
{
 
    public function obtener_parametros() {

        $this->db->select('*');
        $data=$this->db->get('parametros');
        return $data->result();
        
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
            $data2= $row->n_reservas_diarias;
            return $data2;
        }
 

    }    

    public function actualizar_plazo($dataPK, $dataNEW) {

      /*  $this->db->where('fecha', $fecha);
        $this->db->where('modulo', $modulo);
        $this->db->where('sala', $sala);
      */ // obtener pk para actualizar
        $this->db->where('parametros', $dataPK);
        $this->db->update('parametros', $dataNEW);
    } 

    public function actualizar_alumxdia($dataPK, $dataNEW) {

     /*  $this->db->where('fecha', $fecha);
        $this->db->where('modulo', $modulo);
        $this->db->where('sala', $sala);
      */ // obtener pk para actualizar
         $this->db->where('parametros', $dataPK);
        $this->db->update('parametros', $dataNEW);
    } 

 
}
?>