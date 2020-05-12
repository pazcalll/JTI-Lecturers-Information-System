<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('export_model');
        $this->load->model('project_model');
        
        // $this->load->database();
    }
    
    public function bearer()
    {
        $data['result']=$this->project_model->bearer();
        $this->load->view('exporter/bearer',$data);
    }
    public function classes()
    {
        $data['result']=$this->project_model->classes();
        $this->load->view('exporter/classes',$data);
    }
    public function dpa()
    {
        $data['result']=$this->project_model->dpa();
        $this->load->view('exporter/dpa',$data);
    }
    public function instructors()
    {
        $data['result']=$this->project_model->instructors();
        $this->load->view('exporter/instructors',$data);
    }
    public function jabatan()
    {
        $data['result']=$this->project_model->jabatan();
        $this->load->view('exporter/jabatan',$data);
    }
    public function lecturers()
    {
        $data['result']=$this->project_model->lecturers();
        $this->load->view('exporter/lecturers',$data);
    }
    public function research()
    {
        $data['result']=$this->project_model->research();
        $this->load->view('exporter/research',$data);
    }
    public function researcher()
    {
        $data['result']=$this->project_model->researcher();
        $this->load->view('exporter/researcher',$data);
    }
    public function stdprogram()
    {
        $data['result']=$this->project_model->stdprogram();
        $this->load->view('exporter/stdprogram',$data);
    }
    public function subjects()
    {
        $data['result']=$this->project_model->subjects();
        $this->load->view('exporter/subjects',$data);
    }
    public function team()
    {
        $data['result']=$this->project_model->team();
        $this->load->view('exporter/team',$data);
    }
    public function dpa18()
    {
        $data['result']=$this->project_model->dpa18();
        $this->load->view('exporter/dpa18',$data);
    }
    public function dpa19()
    {
        $data['result']=$this->project_model->dpa19();
        $this->load->view('exporter/dpa19',$data);
    }
    public function listsemester()
    {
        $data['result']=$this->project_model->getAllSemesters();
        $this->load->view('exporter/listsemester',$data);
    }
    public function cpns()
    {
        $data['result']=$this->project_model->cpns();
        $this->load->view('exporter/cpns',$data);
    }
    public function pns()
    {
        $data['result']=$this->project_model->pns();
        $this->load->view('exporter/pns',$data);
    }
    public function lb()
    {
        $data['result']=$this->project_model->lb();
        $this->load->view('exporter/lb',$data);
    }
    public function mku()
    {
        $data['result']=$this->project_model->mku();
        $this->load->view('exporter/mku',$data);
    }

}

/* End of file Export.php */

?>