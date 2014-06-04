<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function __construct()
	{
   		parent::__construct();

   		$this->load->model('mod_alumno');
   	}


class Home extends CI_Controller {
	public function index()
	{
		$data['variable']=$this->mod_alumno->selAlumno();
		
		$this->load->view('view_index');
	}
}