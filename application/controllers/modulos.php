<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modulos extends CI_Controller {

  function __construct(){
       parent::__construct();
  }

  public function index(){
    $this->load->view('view_modulos');
  }

  public function nuevo(){

  }

  public function editar(){

  }

  public function eliminar(){

  }
}
