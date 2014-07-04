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
