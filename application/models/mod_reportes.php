<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class mod_reportes extends CI_Model
{
// Reporte Diario

// La suma total de reservas. //PDF

public function total_reservas_sala_dia($fecha)  // reservas sin eliminar // //PDF
    {
     $q_string = "select sala, count(sala) as cant from reservas where fecha ='".$fecha."' and eliminada ='0' and estado ='1' group by sala";
	 	 $data = $this->db->query($q_string);
		 return $data;
	}

//Todas las reervas del dia

 public function obtener_reservas_diarias($fecha) //EXCELL
    {
      $this->db->select('modulo,sala,id_a,nombre_a,carrera_a, id_e');
      $this->db->from('reservas');
      $this->db->where('fecha',$fecha);
      $this->db->where('eliminada',"0");
      $this->db->where('estado',"1");
      return $query = $this->db->get();
    }


// Reporte semanal

//La suma total de reservas.

public function total_reservas_sala_semana($fecha)  // reservas sin eliminar // /PDF
    {
     $q_string = "select sala, count(sala) as con from reservas where week(fecha) =week('".$fecha."') and eliminada ='0' and estado ='1' group by sala";
	 	 $data = $this->db->query($q_string);
	 	 //select sala, count(sala) as con
	 	 //from reservas
	 	 //where week(fecha) = week('2014-06-29') and  eliminada = '0' and estado ='1'
	 	 //group by sala
		 return $data;
	}


// todas las reservas en la semana

 public function obtener_reservas_semanales($fecha) //EXCELL
    {

    	 $q_string = "select fecha, modulo, id_a, nombre_a, carrera_a from reservas where week(fecha) = week('".$fecha."') and eliminada ='0' and estado ='1'";
	 	 $data = $this->db->query($q_string);
		//select fecha, modulo, id_a, nombre_a, carrera_a
	 	 //from reservas where week(fecha) = week('2014-07-05') and eliminada ='0' and estado ='1'
		 return $data;

    }




	// REPORTE MENSUAL

//Cantidad de reservas realizadas por cada sala.

public function total_reservas_sala_mes($fecha)  // reservas sin eliminar // //PDF
    {

     $q_string = "select sala, count(sala) as cant from reservas where month(fecha) = month('".$fecha."') and eliminada ='0' and estado ='1' group by sala";
     //select sala, count(sala) as cant
     //from reservas where month(fecha) ='6' and eliminada ='0' and estado ='1'
     //group by sala
	 	 $data = $this->db->query($q_string);
		 return $data;
	}


//Todas las reservas mensuales

 public function obtener_reservas_mensuales($fecha) //EXCELL
    {

     $q_string = "select fecha, sala, modulo, id_a, nombre_a, carrera_a from reservas where month(fecha) = month('".$fecha."') and eliminada ='0' and estado ='1' group by fecha";
		//select fecha, sala, modulo, id_a, nombre_a, carrera_a
		//from reservas
		//where month(fecha) = '06' and eliminada ='0' and estado ='1'
		//group by fecha
	 	 $data = $this->db->query($q_string);
		 return $data;
    }


// REPORTE POR CARRERA en un intervalo de fecha

    //Mayor ocupación de salas por la carrera

    public function total_reservas_carrera($finicio, $ffin)  // reservas sin eliminar // //PDF
    {

     $q_string = "select count(id_a) as max, carrera_a  from reservas where fecha between '".$finicio."' and '".$ffin."' and eliminada = '0' and estado ='1' group by carrera_a";
     //select count(id_a) as max, carrera_a
     //from reservas where fecha between '2014/06/30' and '2014/06/30' and eliminada = '0' and estado ='1'
     //group by carrera_a
	 	 $data = $this->db->query($q_string);
	 	 return $data;
	}

	//Las Salas que más  se ocuparon por la carrera.
	//Las Salas que menos se ocuparon por la carrera.

    public function max_salas_carrera($finicio, $ffin)  // reservas sin eliminar // // EXCELL esta se puede borrar, no es tan importante
    {

     $q_string = "select sala, carrera_a, count(sala) as con from reservas where fecha between '".$finicio."' and '".$ffin."' and eliminada = '0' and estado ='1' group by carrera_a, sala";
     //select sala, carrera_a, count(sala) as coun
     //from reservas where fecha between '2014/06/05' and '2014/06/30' and eliminada = '0' and estado ='1'
     //group by carrera_a, sala
	 	 $data = $this->db->query($q_string);
	 	 return $data;
	}

	//Los Días que más  se ocuparon  las salas por la carrera.
	//Los Dias que menos se ocuparon las salas por la carrera.

    public function max_salas_carrera_xdia($finicio, $ffin)  // reservas sin eliminar // //EXCELL esta si
    {
     $q_string = "select fecha, sala, carrera_a, count(fecha) as con from reservas where fecha between '".$finicio."' and '".$ffin."' and eliminada = '0' and estado ='1' group by fecha, sala, carrera_a order by fecha, sala, con";

    //select fecha, sala, carrera_a, count(fecha) as con
	//from reservas
	//where fecha between '2014/06/05' and '2014/06/30' and eliminada = '0' and estado ='1'
	//group by fecha, sala, carrera_a
	//order by fecha, sala, con

	 	 $data = $this->db->query($q_string);
	 	 return $data;

	}

	//Horarios Punta.

    public function horarios_punta($finicio, $ffin)  // reservas sin eliminar // //PDF , EXCELL
    {
    	$q_string = "select modulo, count(modulo) as con from reservas where fecha between '".$finicio."' and '".$ffin."' and eliminada = '0' and estado ='1' group by modulo order by modulo";
		//select modulo, count(modulo) as con
		//from reservas
		//where fecha between '2014/06/05' and '2014/06/30' and eliminada = '0' and estado ='1'
		//group by modulo
		//order by modulo

    	$data = $this->db->query($q_string);
	 	 return $data;

	}

	// REPORTE POR INASISTENCIA

	//Total inaistentcias
    public function inasistencia($finicio, $ffin) //PDF
    {
    	$q_string = "select id_a, nombre_a, carrera_a, count(id_a) as con from reservas where fecha between '".$finicio."' and '".$ffin."' and eliminada = '1' and confirmada = '0' and estado ='1' group by id_a, nombre_a";
		//select id_a, nombre_a, carrera_a, count(id_a) as con
		//from reservas
		//where fecha between '2014/06/05' and '2014/06/30' and eliminada = '1' and confirmada = '0' and estado ='1'
		//group by id_a, nombre_a

    	$data = $this->db->query($q_string);
	 	 return $data;

	}


	// total reservas // misma para eliminaciones
    public function reservas_totales($id_a, $finicio, $ffin) //EXCELL

    {
    	$q_string = "select id_a, nombre_a, carrera_a, count(id_a) as tot from reservas where fecha between '".$finicio."' and '".$ffin."' and id_a = '".$id_a."' and estado ='1' group by id_a";
			//select id_a, nombre_a, carrera_a, count(id_a) as tot   // SE PUEDE OBTENER SOLO CON
			//from reservas
			//where fecha between '2014/06/05' and '2014/06/30' and id_a = '1' and estado ='1'
			//group by id_a
    	$data = $this->db->query($q_string);
	 	 return $data;

	}


	// REPORTE POR ELIMINACIÓN

	//eliminaciones modulos
    public function eliminaciones($finicio, $ffin) //PDF
    {
    	$q_string = "select modulo, count(modulo) as con from reservas where fecha between '".$finicio."' and '".$ffin."' and eliminada > '0' and estado ='1' group by modulo order by modulo";
		//select id_a, nombre_a, carrera_a, count(id_a) as con
		//from reservas
		//where fecha between '2014/06/05' and '2014/06/30' and eliminada > '1' and confirmada = '0' and estado ='1'
		//group by id_a, nombre_a

    	$data = $this->db->query($q_string);
	 	 return $data;

	}

	// Observaciones

	    public function observaciones_eliminadas($finicio, $ffin) //EXCELL
    {
    	$q_string = "select fecha, sala, modulo, id_a, nombre_a, carrera_a, observacion from reservas where fecha between '".$finicio."' and '".$ffin."' and eliminada > '1' and confirmada = '0' and estado ='1' order by fecha";
		//select fecha, sala, modulo, id_a, nombre_a, carrera_a, observacion
		//from reservas
		//where fecha between '2014/06/05' and '2014/06/30' and eliminada > '1' and confirmada = '0' and estado ='1'
		//order by fecha
    	$data = $this->db->query($q_string);
	 	 return $data;

	}



	//OCUPACION
	   public function ocupacion($finicio, $ffin) //PDF
    {
    	$q_string = "select sala, count(sala) as con from reservas where fecha between '".$finicio."' and '".$ffin."' and eliminada = '0' and estado ='1' group by sala order by sala";
		//select sala, count(sala) as con
		//from reservas
		//where fecha between '2014/06/05' and '2014/06/30' and eliminada = '0' and estado ='1'
		//group by sala
		//order by sala
    	  $data = $this->db->query($q_string);
	 	 return $data;

	}

	// observaciones

	    public function observaciones_no_eliminadas($finicio, $ffin) // EXCELL
    {
    	$q_string = "select fecha, sala, modulo, id_a, nombre_a, carrera_a, observacion from reservas where fecha between '".$finicio."' and '".$ffin."' and eliminada = '0' order by fecha";
		//select fecha, sala, modulo, id_a, nombre_a, carrera_a, observacion
		//from reservas
		//where fecha between '2014/06/05' and '2014/06/30' and eliminada > '1' and confirmada = '0'
		//order by fecha
    	$data = $this->db->query($q_string);
	 	 return $data;

	}

	//USUARIOS

	   public function reservas_usuarios($finicio, $ffin) //PDF //EXCELL
    {
    	$q_string = "select fecha, id_e, count(id_a) as con from reservas where fecha between '".$finicio."' and '".$ffin."' and eliminada = '0' and estado ='1' group by fecha order by fecha";
		//select fecha, id_e, count(id_a) as con
		//from reservas
		//where fecha between '2014/06/05' and '2014/06/30' and eliminada = '0' and estado ='1'
		//group by fecha
		//order by fecha
    	  $data = $this->db->query($q_string);
	 	 return $data;

	}

}
