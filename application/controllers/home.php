<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

function __construct()
	{
   		parent::__construct();
   		$this->load->model('mod_alumno');
   		$this->load->model('mod_usuario');
   		$this->load->model('mod_reserva');
   	}
	public function index()
	{
		//$data['variable']=$this->mod_alumno->getAlumno();
		//$this->load->view('view_index', $data);
		$this->load->model('mod_salas');
		$this->load->view('view_index');
		//$this->load->view('view_modulos');
	}
}
