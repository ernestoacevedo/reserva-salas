<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_modulos extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }


    public function insertar_modulos( $data)
    {
       // $data['hora_inicio'] = $this->input->post('hora_inicio'); // en controlador
        //$data['hora_fin'] = $this->input->post('hora_fin'); // en controlador

        $this->db->insert('modulos',$data);
    }

    public function actualizar_modulos($data) // en controlador
    {

        //$data[''] = $this->input->post('');
        //$this->db->where('reserva.id_reserva',$this->input->post('id_reserva'));

        //$this->db->where('');
        $this->db->update('modulos',$data);
    }

    public function eliminar_modulos($data)
    {
        //$this->db->where('reserva.id_reserva',$id_reserva );

        //$this->db->where('');
        $this->db->delete('modulos');
    }

    public function obtener_modulos(){
      $this->db->select('id_mod,h_inicio,h_fin');
      $this->db->from('modulos');
      return $this->db->get();
    }

    public function obtener_max_modulos(){
      $data = $this->db->query("select count(id_mod) as max from modulos");
      foreach ($data->result() as $row)
      {
          $data2= $row->max;
          return $data2;
      }
    }
}
?>
