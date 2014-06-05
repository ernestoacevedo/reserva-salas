<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

function __construct()
	{
   		parent::__construct();

   		$this->load->model('mod_alumno');
   	}
	public function index()
	{
		$data['variable']=$this->mod_alumno->selAlumno();

		$this->load->view('view_index');
	}
}