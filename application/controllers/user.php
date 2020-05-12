<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->model('project_model');
        $data['level']='user';
        if ($this->session->userdata('level')!="user") {
            redirect('login','refresh');
        }
    }

    public function index()
    {
        $data['title']='User Information System';
        $this->load->view('templates/header_user', $data);
        $this->load->view('lecturer/user', $data);
        $this->load->view('templates/footer_user');
    }

    public function listSemester(){
        $this->load->model('project_model');
        // $this->load->database();
        $data['semesters']= $this->project_model->datatables_semesters();
        $data['title']='Matkul Semester';
        $data['level']='user';
        $data['add']='addlistsemester';
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/viewlist/semesters',$data);
        $this->load->view('templates/footer_user');
    }
    public function dpa18()
    {
        $data['dpa']=$this->project_model->dpa18();
        $data['title']='dpa18/19';
        $data['level']='user';
        $data['add']='adddpa18/19';
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/viewlist/dpa18',$data);
        $this->load->view('templates/footer_user');
    }
    public function dpa19()
    {
        $data['dpa']=$this->project_model->dpa19();
        $data['title']='dpa19/20';
        $data['level']='user';
        $data['add']='adddpa19/20';
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/viewlist/dpa18',$data);
        $this->load->view('templates/footer_user');
    }
    public function pns()
    {
        $data['lecturers']=$this->project_model->pns();
        $data['title']='Government Employee Lecturers';
        $data['level']='user';
        $data['add']='addgovernmentemployeelecturers';
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/viewlist/list_dosen_etc',$data);
        $this->load->view('templates/footer_user');
    }
    public function cpns()
    {
        $data['title']='CPNS Lecturers';
        $data['add']='addcpnslecturers';
        $data['level']='user';
        $data['lecturers']=$this->project_model->cpns();
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/viewlist/list_dosen_etc',$data);
        $this->load->view('templates/footer_user');
    }
    public function mku()
    {
        $data['title']='MKU Lecturers';
        $data['add']='addmkulecturers';
        $data['level']='user';
        $data['lecturers']=$this->project_model->mku();
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/viewlist/list_dosen_etc',$data);
        $this->load->view('templates/footer_user');
    }
    public function lb()
    {
        $data['title']='External Lecturers';
        $data['add']='addexternallecturers';
        $data['level']='user';
        $data['lecturers']=$this->project_model->lb();
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/viewlist/list_dosen_etc',$data);
        $this->load->view('templates/footer_user');
    }
    public function classes()
    {
        $data['title']='Class List';
        $data['level']='user';
        $data['add']='addclasslist';
        $data['classes']=$this->project_model->classes();
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/tablelist/classes',$data);
        $this->load->view('templates/footer_user');
    }
    public function dpa()
    {
        $data['title']='DPA List';
        $data['add']='adddpalist';
        $data['level']='user';
        $data['dpa']=$this->project_model->dpa();
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/tablelist/dpa',$data);
        $this->load->view('templates/footer_user');
    }
    public function jabatan()
    {
        $data['title']='Jabatan';
        $data['add']='addjabatan';
        $data['level']='user';
        $data['jabatan']=$this->project_model->jabatan();
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/tablelist/jabatan',$data);
        $this->load->view('templates/footer_user');
    }
    public function lecturers()
    {
        $data['title']='Lecturers Data';
        $data['add']='addlecturers';
        $data['level']='user';
        $data['lecturers']=$this->project_model->lecturers();
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/tablelist/lecturers',$data);
        $this->load->view('templates/footer_user');
    }
    public function subjects()
    {
        $data['title']='Subject List';
        $data['level']='user';
        $data['add']='addsubjects';
        $data['subjects']=$this->project_model->subjects();
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/tablelist/subjects',$data);
        $this->load->view('templates/footer_user');
    }
    public function instructors()
    {
        $data['title']='Instructors';
        $data['level']='user';
        $data['add']='addinstructors';
        $data['instructors']=$this->project_model->instructors();
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/tablelist/instructors',$data);
        $this->load->view('templates/footer_user');
    }
    public function bearer()
    {
        $data['title']='Bearer of Jabatan';
        $data['add']='addbearer';
        $data['level'] = 'user';
        $data['bearer']=$this->project_model->bearer();
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/tablelist/bearer',$data);
        $this->load->view('templates/footer_user');
    }
    public function stdprogram()
    {
        $data['title']='Study Program List';
        $data['add']='addstudyprogramlist';
        $data['level']='user';
        $data['studyprogram']=$this->project_model->stdprogram();
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/tablelist/studyprogram',$data);
        $this->load->view('templates/footer_user');
    }
    public function research()
    {
        $data['title']='Research Name List';
        $data['add']='addresearch';
        $data['level']='user';
        $data['research']=$this->project_model->research();
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/tablelist/research',$data);
        $this->load->view('templates/footer_user');
    }
    public function researcher()
    {
        $data['title']='Researcher Roles';
        $data['add']='addresearcher';
        $data['level']='user';
        $data['researcher']=$this->project_model->researcher();
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/tablelist/researcher',$data);
        $this->load->view('templates/footer_user');
    }
    public function team()
    {
        $data['title']='Lecturer Teams';
        $data['add']='addteam';
        $data['level']='user';
        $data['team']=$this->project_model->team();
        $this->load->view('templates/header_user',$data);
        $this->load->view('project/tablelist/team',$data);
        $this->load->view('templates/footer_user');
    }
    public function userdetail()
    {
        $data['title']='User Detail';
        $data['level']='user';
        $data['user']=$this->project_model->user($this->session->userdata('user'));
        $this->load->view('templates/header_user',$data);
        $this->load->view('lecturer/user_detail',$data);
        $this->load->view('templates/footer_user');
    }
}

/* End of file user.php */

?>