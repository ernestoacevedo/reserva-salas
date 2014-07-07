﻿<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
   $total = 0;
   foreach($query->result() as $row){
       $name = 'Sala '.$row->sala;
       $point = ['name'=> $name,'data'=>[(int)$row->cant]];
       $total+=$row->cant;
       array_push($series,$point);
   }
   $data['title'] = 'Nº de Reservas';
   $data['series'] = $series;
   $data['total'] = $total;
   $data['xls_path'] = site_url('reportes/ReporteDiario_toExcel');
   echo json_encode($data);
 }

 public function ReporteDiario_toExcel(){
   $query = $this->mod_reportes->total_reservas_sala_dia($this->input->post('fecha'));
   $data = array();
   $data['header'] = ['Sala','Reservas'];
   $content = '';
   foreach($query->result() as $row){
       $sala = $row->sala;
       $cant = $row->cant;
       $content .= "<tr><td>$sala</td><td>$cant</td></tr>";
   }
   $data['contenido'] = $content;
   $data['titulo'] = 'reporte_diario';
   $this->load->view('view_excel',$data);
 }

public function ReporteSemanal(){
    $query = $this->mod_reportes->total_reservas_sala_semana($this->input->post('fecha'));
    $series = array();
    $total = 0;
    foreach($query->result() as $row){
      $name = 'Sala '.$row->sala;
      $point = ['name'=>$name,'data'=>[(int)$row->con]];
      $total+=$row->con;
      array_push($series,$point);
    }
    $data['title'] = 'Nº de Reservas';
    $data['series'] = $series;
    $data['total'] = $total;
    $data['xls_path'] = site_url('reportes/ReporteSemanal_toExcel');
    echo json_encode($data);
  }

public function ReporteSemanal_toExcel(){
    $query = $this->mod_reportes->total_reservas_sala_semana($this->input->post('fecha'));
    $series = array();
    $total = 0;
    $data = array();
    $data['header'] = ['Sala','Reservas'];
    $datos = array();
    $i = 0;
    foreach($query->result() as $row){
      $datos[$i] = [$row->sala,$row->con];
      $i++;
    }
    $data['datos'] = $datos;
    $data['titulo'] = 'reporte_semanal';
    $this->load->view('view_excel',$data);
  }

public function ReporteMensual(){
    $query = $this->mod_reportes->total_reservas_sala_mes($this->input->post('fecha'));
    $series = array();
    $total = 0;
    foreach($query->result() as $row){
      $name = 'Sala '.$row->sala;
      $point = ['name'=>$name,'data'=>[(int)$row->cant]];
      $total+=$row->cant;
      array_push($series,$point);
    }
    $data['title'] = 'Nº de Reservas';
    $data['series'] = $series;
    $data['total'] = $total;
    echo json_encode($data);
  }


public function ReporteUsuario(){

  }

public function ReporteCarrera(){
    $query = $this->mod_reportes->total_reservas_carrera($this->input->post('fecha'),$this->input->post('fecha_fin'));
    $series = array();
    $total = 0;
    foreach($query->result() as $row){
      $name = $row->carrera_a;
      $point = ['name'=>$name,'data'=>[(int)$row->max]];
      $total+=$row->max;
      array_push($series,$point);
    }
    $data['title'] = 'Nº de Reservas';
    $data['series'] = $series;
    $data['total'] = $total;
    echo json_encode($data);
  }

public function ReporteInasistencias(){
    $query = $this->mod_reportes->inasistencia($this->input->post('fecha'),$this->input->post('fecha_fin'));
    $series = array();
    $total = 0;
    foreach($query->result() as $row){
      $name = $row->carrera_a;
      $point = ['name'=>$name,'data'=>[(int)$row->con]];
      $total+=$row->con;
      array_push($series,$point);
    }
    $data['title'] = 'Nº de Reservas';
    $data['series'] = $series;
    $data['total'] = $total;
    echo json_encode($data);
  }


public function ReporteHorariosPunta(){
    $query = $this->mod_reportes->horarios_punta($this->input->post('fecha'),$this->input->post('fecha_fin'));
    $series = array();
    $total = 0;
    foreach($query->result() as $row){
      $name = 'Módulo '.$row->modulo;
      $point = ['name'=>$name,'data'=>[(int)$row->con]];
      $total+=$row->con;
      array_push($series,$point);
    }
    $data['title'] = 'Nº de Reservas';
    $data['series'] = $series;
    $data['total'] = $total;
    echo json_encode($data);

  }

public function ReporteOcupacion(){
    $query = $this->mod_reportes->ocupacion($this->input->post('fecha'),$this->input->post('fecha_fin'));
    $series = array();
    $total = 0;
    foreach($query->result() as $row){
      $name = 'Sala '.$row->sala;
      $point = ['name'=>$name,'data'=>[(int)$row->con]];
      $total+=$row->con;
      array_push($series,$point);
    }
    $data['title'] = 'Nº de Reservas';
    $data['series'] = $series;
    $data['total'] = $total;
    echo json_encode($data);
  }

public function ReporteEliminaciones(){
    $query = $this->mod_reportes->eliminaciones($this->input->post('fecha'),$this->input->post('fecha_fin'));
    $series = array();
    $total = 0;
    foreach($query->result() as $row){
      $name = $row->carrera_a;
      $point = ['name'=>$name,'data'=>[(int)$row->con]];
      $total+=$row->con;
      array_push($series,$point);
    }
    $data['title'] = 'Nº de Reservas';
    $data['series'] = $series;
    $data['total'] = $total;
    echo json_encode($data);
  }
}
