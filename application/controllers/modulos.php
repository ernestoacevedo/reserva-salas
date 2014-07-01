<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modulos extends CI_Controller {

  function __construct(){
       parent::__construct();

      $this->load->model('mod_modulos');

  }

  public function index(){
    $this->load->view('view_modulos');
  }

  public function CrearModulo(){



  }

  public function EditarModulo(){



  }

  public function EliminarModulo(){



  }
}
