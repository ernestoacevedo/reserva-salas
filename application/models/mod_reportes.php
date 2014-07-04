<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_reportes extends CI_Model
{
 
// Reporte Diario

    public function total_reservas_dia($fecha)  // reservas sin eliminar //
    {
	 	 $data = $this->db->query("select count(id_a) as max from reservas where fecha ='$fecha' and  eliminada = '0'");
	 	 
		  foreach ($data->result() as $row)
		{
		    $data2= $row->max;
		    return $data2;
		}
	}

public function total_reservas_sala_dia($fecha)  // reservas sin eliminar //
    {
	 	 $data = $this->db->query("select sala, count(sala) as cant from reservas where fecha ='$fecha' and eliminada ='0' group by sala");
		 return $data;
	}


public function total_reservas_usuario_dia($fecha)  // reservas sin eliminar //
    {
	 	 $data = $this->db->query("select id_e, count(id_e) as cant from reservas where fecha ='$fecha' and eliminada ="0" group by id_e");
		 return $data;
	}

 public function obtener_reservas_diarias_dia($fecha)
    {
      $this->db->select('modulo,sala,id_a,nombre_a,carrera_a, id_e');
      $this->db->from('reservas');
      $this->db->where('fecha',$fecha);
      $this->db->where('eliminada',"0");
      return $query = $this->db->get();
    }


// Reporte semanal


    public function total_reservas_semana($fecha)  // reservas sin eliminar //
    {
	 	 $data = $this->db->query("select count(id_a) as max from reservas where fecha ='$fecha' and  eliminada = '0'");
	 	 // select count(id_a) as max from reservas where fecha between '24/06/2014' and '30/06/2014'  and  eliminada = '0'
		  foreach ($data->result() as $row)
		{
		    $data2= $row->max;
		    return $data2;
		}
	}

public function total_reservas_sala_semana($fecha)  // reservas sin eliminar //
    {
	 	 $data = $this->db->query("select sala, count(sala) as cant from reservas where fecha ='$fecha' and eliminada ='0' group by sala");
	 	 //select sala, count(sala) as cant from reservas where fecha between '24/06/2014' and '30/06/2014' and eliminada ='0' group by sala
		 return $data;
	}


public function total_reservas_usuario_semana($fecha)  // reservas sin eliminar //
    {
	 	 $data = $this->db->query("select id_e, count(id_e) as cant from reservas where fecha ='$fecha' and eliminada ="0" group by id_e");
	 	 //select id_e, count(id_e) as cant from reservas where fecha between '24/06/2014' and '30/06/2014' and eliminada ='0' group by id_e
		 return $data;
	}

 public function obtener_reservas_diarias_semana($fecha)
    {
    	/*
      $this->db->select('modulo,sala,id_a,nombre_a,carrera_a, id_e');
      $this->db->from('reservas');
      $this->db->where('fecha',$fecha); // between fecha 1 & fecha 2 = semana
      $this->db->where('eliminada',"0");
      return $query = $this->db->get();
      */
    }

}

?>