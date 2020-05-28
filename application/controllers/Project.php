<?php

defined('BASEPATH') or exit('No direct script access are allowed');

class Project extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('project_model');
        $this->load->library('form_validation');
        $this->load->database();
        if ($this->session->userdata('level')!="admin") {
            redirect('login','refresh');
        }
        // $this->load->library('form_validation');
        
    }
    public function index(){
        $data['title']='Project';
        $data['level']='admin';
        $this->load->view('templates/header',$data);
        // $this->project_model->tablename();
        $this->load->view('project/home/index');
        $this->load->view('templates/footer');
    }
    public function listSemester(){
        $this->load->model('project_model');
        // $this->load->database();
        $data['semesters']= $this->project_model->datatables_semesters();
        $data['title']='Matkul Semester';
        $data['level']='admin';
        $data['export']='listsemester';
        $data['add']='addlistsemester';
        $this->load->view('templates/header',$data);
        $this->load->view('project/viewlist/semesters',$data);
        $this->load->view('templates/footer');
    }
    public function dpa18()
    {
        $data['dpa']=$this->project_model->dpa18();
        $data['title']='dpa18/19';
        $data['level']='admin';
        $data['export']='dpa18';
        $data['year']='2018/2019';
        // $data['add']='adddpa18/19';
        $this->load->view('templates/header',$data);
        $this->load->view('project/viewlist/dpa18',$data);
        $this->load->view('templates/footer');
    }
    public function dpa19()
    {
        $data['dpa']=$this->project_model->dpa19();
        $data['title']='dpa19/20';
        $data['level']='admin';
        $data['export']='dpa19';
        $data['year']='2019/2020';
        // $data['add']='adddpa19/20';
        $this->load->view('templates/header',$data);
        $this->load->view('project/viewlist/dpa18',$data);
        $this->load->view('templates/footer');
    }
    public function pns()
    {
        $data['lecturers']=$this->project_model->pns();
        $data['title']='Government Employee Lecturers';
        $data['level']='admin';
        $data['export']='pns';
        // $data['add']='addgovernmentemployeelecturers';
        $this->load->view('templates/header',$data);
        $this->load->view('project/viewlist/list_dosen_etc',$data);
        $this->load->view('templates/footer');
    }
    public function cpns()
    {
        $data['title']='CPNS Lecturers';
        // $data['add']='addcpnslecturers';
        $data['level']='admin';
        $data['export']='cpns';
        $data['lecturers']=$this->project_model->cpns();
        $this->load->view('templates/header',$data);
        $this->load->view('project/viewlist/list_dosen_etc',$data);
        $this->load->view('templates/footer');
    }
    public function mku()
    {
        $data['title']='MKU Lecturers';
        // $data['add']='addmkulecturers';
        $data['level']='admin';
        $data['export']='mku';
        $data['lecturers']=$this->project_model->mku();
        $this->load->view('templates/header',$data);
        $this->load->view('project/viewlist/list_dosen_etc',$data);
        $this->load->view('templates/footer');
    }
    public function lb()
    {
        $data['title']='External Lecturers';
        // $data['add']='addexternallecturers';
        $data['level']='admin';
        $data['export']='lb';
        $data['lecturers']=$this->project_model->lb();
        $this->load->view('templates/header',$data);
        $this->load->view('project/viewlist/list_dosen_etc',$data);
        $this->load->view('templates/footer');
    }
    public function classes()
    {
        $data['title']='Class List';
        $data['level']='admin';
        $data['export']='classes';
        $data['add']='addclasslist';
        $data['classes']=$this->project_model->classes();
        $this->load->view('templates/header',$data);
        $this->load->view('project/tablelist/classes',$data);
        $this->load->view('templates/footer');
    }
    public function dpa()
    {
        $data['title']='DPA List';
        $data['add']='adddpalist';
        $data['level']='admin';
        $data['export']='dpa';
        $data['dpa']=$this->project_model->dpa();
        $this->load->view('templates/header',$data);
        $this->load->view('project/tablelist/dpa',$data);
        $this->load->view('templates/footer');
    }
    public function jabatan()
    {
        $data['title']='Jabatan';
        $data['add']='addjabatan';
        $data['level']='admin';
        $data['export']='jabatan';
        $data['jabatan']=$this->project_model->jabatan();
        $this->load->view('templates/header',$data);
        $this->load->view('project/tablelist/jabatan',$data);
        $this->load->view('templates/footer');
    }
    public function lecturers()
    {
        $data['title']='Lecturers Data';
        $data['add']='addlecturers';
        $data['level']='admin';
        $data['export']='lecturers';
        $data['lecturers']=$this->project_model->lecturers();
        $this->load->view('templates/header',$data);
        $this->load->view('project/tablelist/lecturers',$data);
        $this->load->view('templates/footer');
    }
    public function subjects()
    {
        $data['title']='Subject List';
        $data['level']='admin';
        $data['export']='subjects';
        $data['add']='addsubjects';
        $data['subjects']=$this->project_model->subjects();
        $this->load->view('templates/header',$data);
        $this->load->view('project/tablelist/subjects',$data);
        $this->load->view('templates/footer');
    }
    public function instructors()
    {
        $data['title']='Instructors';
        $data['level']='admin';
        $data['export']='instructors';
        $data['add']='addinstructors';
        $data['instructors']=$this->project_model->instructors();
        $this->load->view('templates/header',$data);
        $this->load->view('project/tablelist/instructors',$data);
        $this->load->view('templates/footer');
    }
    public function bearer()
    {
        $data['title']='Bearer of Jabatan';
        $data['add']='addbearer';
        $data['export']='bearer';
        $data['level'] = 'admin';
        $data['bearer']=$this->project_model->bearer();
        $this->load->view('templates/header',$data);
        $this->load->view('project/tablelist/bearer',$data);
        $this->load->view('templates/footer');
    }
    public function stdprogram()
    {
        $data['title']='Study Program List';
        $data['add']='addstudyprogramlist';
        $data['level']='admin';
        $data['export']='stdprogram';
        $data['studyprogram']=$this->project_model->stdprogram();
        $this->load->view('templates/header',$data);
        $this->load->view('project/tablelist/studyprogram',$data);
        $this->load->view('templates/footer');
    }
    public function research()
    {
        $data['title']='Research Name List';
        $data['add']='addresearch';
        $data['level']='admin';
        $data['export']='research';
        $data['research']=$this->project_model->research();
        $this->load->view('templates/header',$data);
        $this->load->view('project/tablelist/research',$data);
        $this->load->view('templates/footer');
    }
    public function researcher()
    {
        $data['title']='Researcher Roles';
        $data['add']='addresearcher';
        $data['level']='admin';
        $data['export']='researcher';
        $data['researcher']=$this->project_model->researcher();
        $this->load->view('templates/header',$data);
        $this->load->view('project/tablelist/researcher',$data);
        $this->load->view('templates/footer');
    }
    public function team()
    {
        $data['title']='Lecturer Teams';
        $data['add']='addteam';
        $data['level']='admin';
        $data['export']='team';
        $data['team']=$this->project_model->team();
        $this->load->view('templates/header',$data);
        $this->load->view('project/tablelist/team',$data);
        $this->load->view('templates/footer');
    }
}

?>