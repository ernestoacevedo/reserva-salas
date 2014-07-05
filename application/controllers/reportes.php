<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reportes extends CI_Controller {


  function __construct(){
       parent::__construct();

      $this->load->model('mod_reportes');

  }

  public function index(){
    $this->load->view('view_reportes');
  }


 public function ReporteDiario(){
   $query = $this->mod_reportes->total_reservas_sala_dia($this->input->post('fecha'));
   $series = array();
   foreach($query->result() as $row){
     $name = 'Sala '.$row->sala;
     $point = ['name'=> $name,'data'=>[(int)$row->cant]];
     array_push($series,$point);
   }
   $data['title'] = 'Nº de Reservas';
   $data['series'] = $series;
   echo json_encode($data);
  }

public function ReporteSemanal(){


  }

public function ReporteMensual(){


  }


public function ReporteUsuario(){


  }

public function ReporteCarrera(){


  }

public function ReporteInasistencias(){


  }


public function ReporteHorariosPunta(){


  }

public function ReporteOcupacion(){


  }

public function ReporteInasistenciasSinJustificar(){


  }

}
