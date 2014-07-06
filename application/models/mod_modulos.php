<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_modulos extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }


    public function insertar_modulos($data)
    {
            
      if($this->db->insert('modulos',$data)){ 
        return true;
      }
      else{
        return false;
      }
    }


    public function eliminar_modulos($id_mod)
    {
       $q_string = "delete from modulos where id_mod ='".$id_mod."'";
        $this->db->query($q_string);
    }


    public function obtener_modulos(){
      $q_string = "select id_mod, time_format(h_inicio, '%H:%m') as inicio, time_format(h_fin, '%H:%m') as fin from modulos";
      //select  time_format(h_inicio, '%H : %m') from modulos
      $data = $this->db->query($q_string);
      return $data;
    }

    public function obtener_can_modulos(){
      $this->db->select('id_mod');
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
