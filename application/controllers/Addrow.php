<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addrow extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('add_model');
        $this->load->library('form_validation');
        $this->load->database();
        // $this->load->library('form_validation');

    }
    public function addbearer()
    {
        $data['title']='Add Bearer Data';
        $data['add']='addbearer';
        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('jabatanid', 'jabatanid', 'required|numeric');
        $this->form_validation->set_rules('year', 'year', 'required');
        
        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('project/addrow/addbearer',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->add_model->addbearer();
            redirect('project/bearer','refresh');
        }
    }
    public function addclasslist()
    {
        $data['title']='Add Class Data';
        $data['add']='addclasslist';
        $this->form_validation->set_rules('classid', 'classid', 'required');
        $this->form_validation->set_rules('class_name', 'class_name', 'required');
        $this->form_validation->set_rules('program_std', 'program_std', 'required');
        
        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('project/addrow/addclasslist',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->add_model->addclasslist();
            redirect('project/classes','refresh');
        }
    }
    public function adddpalist()
    {
        $data['title']='Add Class Data';
        $data['add']='addclasslist';
        $this->form_validation->set_rules('classid', 'classid', 'required');
        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('year', 'year', 'required');
        
        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('project/addrow/adddpalist',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->add_model->adddpalist();
            redirect('project/dpa','refresh');
        }
    }
    public function addjabatan()
    {
        $data['title']='Add Class Data';
        $data['add']='addjabatan';
        $this->form_validation->set_rules('jabatanid', 'jabatanid', 'required');
        $this->form_validation->set_rules('jabatan_name', 'jabatan_name', 'required');
        
        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('project/addrow/addjabatan',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->add_model->addjabatan();
            redirect('project/jabatan','refresh');
        }
    }
    public function addsubjects()
    {
        $data['title']='Add Subject Data';
        $data['add']='addsubjects';
        $this->form_validation->set_rules('nama_matkul', 'nama_matkul', 'required');
        $this->form_validation->set_rules('kode_matkul', 'kode_matkul', 'required');
        $this->form_validation->set_rules('prodi', 'prodi', 'required');
        $this->form_validation->set_rules('tingkat', 'tingkat', 'required');
        $this->form_validation->set_rules('semester', 'semester', 'required');
        $this->form_validation->set_rules('sks', 'sks', 'required');
        $this->form_validation->set_rules('jam', 'jam', 'required');
        
        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('project/addrow/addsubjects',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->add_model->addsubjects();
            redirect('project/subjects','refresh');
        }
    }
    public function addlecturers()
    {
        $data['title']='Add Lecturers Data';
        $data['add']='addlecturers';
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('statuses', 'statuses', 'required');
        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('akreid', 'akreid', 'required|numeric');
        // $this->form_validation->set_rules('prodi', 'prodi', 'required');
        // $this->form_validation->set_rules('tingkat', 'tingkat', 'required');
        // $this->form_validation->set_rules('semester', 'semester', 'required');
        // $this->form_validation->set_rules('sks', 'sks', 'required');
        // $this->form_validation->set_rules('jam', 'jam', 'required');
        
        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('project/addrow/addlecturers',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->add_model->addlecturers();
            redirect('project/lecturers','refresh');
        }
    }
    public function addteam()
    {
        $data['title']='Add Team Data';
        $data['add']='addteam';
        $this->form_validation->set_rules('team_name', 'team_name', 'required');
        $this->form_validation->set_rules('teamid', 'teamid', 'required|numeric');
        // $this->form_validation->set_rules('prodi', 'prodi', 'required');
        // $this->form_validation->set_rules('tingkat', 'tingkat', 'required');
        // $this->form_validation->set_rules('semester', 'semester', 'required');
        // $this->form_validation->set_rules('sks', 'sks', 'required');
        // $this->form_validation->set_rules('jam', 'jam', 'required');
        
        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('project/addrow/addteam',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->add_model->addteam();
            redirect('project/team','refresh');
        }
    }
    public function addresearch()
    {
        $data['title']='Add Research Data';
        $data['add']='addresearch';
        $this->form_validation->set_rules('rs_name', 'rs_name', 'required');
        $this->form_validation->set_rules('rsid', 'rsid', 'required|numeric');
        // $this->form_validation->set_rules('prodi', 'prodi', 'required');
        // $this->form_validation->set_rules('tingkat', 'tingkat', 'required');
        // $this->form_validation->set_rules('semester', 'semester', 'required');
        // $this->form_validation->set_rules('sks', 'sks', 'required');
        // $this->form_validation->set_rules('jam', 'jam', 'required');
        
        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('project/addrow/addresearch',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->add_model->addresearch();
            redirect('project/research','refresh');
        }
    }
    public function addresearcher()
    {
        $data['title']='Add Researcher Data';
        $data['add']='addresearcher';
        $data['res']=$this->add_model->fetchresearcher();
        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('rsid', 'rsid', 'required|numeric');
        $this->form_validation->set_rules('tingkat', 'tingkat', 'required');
        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('project/addrow/addresearcher',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->add_model->addresearcher();
            redirect('project/researcher','refresh');
        }
    }
    public function addinstructors()
    {
        $data['title']='Add Instructors Data';
        $data['add']='addinstructors';
        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('nama_kelas', 'nama_kelas', 'required');
        $this->form_validation->set_rules('nama_matkul', 'nama_matkul', 'required');
        $this->form_validation->set_rules('sks', 'sks', 'required');
        $this->form_validation->set_rules('kode_matkul', 'kode_matkul', 'required');
        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('project/addrow/addinstructors',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->add_model->addinstructors();
            redirect('project/instructors','refresh');
        }
    }

}

/* End of file Addrow.php */

?>