<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('edit_model');
        $this->load->library('form_validation');
    }
    
    
    public function index()
    {
        // do nothing
    }
    public function bearer($id)
    {   
        $jabatanid=$this->uri->segment(4);
        $year=$this->uri->segment(5);
        $data['title']='Form Edit Data Bearer of Jabatan';
        $data['bearer']=$this->edit_model->bearerdata($id,$jabatanid,$year);
        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('jabatanid', 'jabatanid', 'required');
        $this->form_validation->set_rules('year', 'year', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('project/tablelist/edit/bearer',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->edit_model->editbearer();
            // $this->session->set_flashdata('flash-data', 'Edited');
            redirect('project/bearer','refresh');
        }
    }

    public function classes($classid)
    {   
        $class_name=$this->uri->segment(4);
        $program_std=$this->uri->segment(5);
        $data['title']='Form Edit Class List';
        $data['classes']=$this->edit_model->classesdata($classid,$class_name,$program_std);
        $this->form_validation->set_rules('classid', 'classid', 'required');
        $this->form_validation->set_rules('class_name', 'class_name', 'required');
        $this->form_validation->set_rules('program_std', 'program_std', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('project/tablelist/edit/classes',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->edit_model->editclasses();
            // $this->session->set_flashdata('flash-data', 'Edited');
            redirect('project/classes','refresh');
        }
    }

    public function dpa($classid)
    {   
        $kode=$this->uri->segment(4);
        $year=$this->uri->segment(5);
        $data['title']='Form Edit DPA';
        $data['dpa']=$this->edit_model->dpadata($classid,$kode,$year);
        $this->form_validation->set_rules('classid', 'classid', 'required');
        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('year', 'year', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('project/tablelist/edit/dpa',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->edit_model->editdpa($classid, $kode, $year);
            // $this->session->set_flashdata('flash-data', 'Edited');
            redirect('project/dpa','refresh');
        }
    }
    public function jabatan($jabatanid)
    {   
        $jabatan_name=$this->uri->segment(4);
        $data['title']='Form Edit Jabatan';
        $data['jabatan']=$this->edit_model->jabatandata($jabatanid,$jabatan_name);
        $this->form_validation->set_rules('jabatanid', 'jabatanid', 'required');
        $this->form_validation->set_rules('jabatan_name', 'jabatan_name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('project/tablelist/edit/jabatan',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->edit_model->editjabatan($jabatanid, $jabatan_name);
            // $this->session->set_flashdata('flash-data', 'Edited');
            redirect('project/jabatan','refresh');
        }
    }
    public function subjects($nama_matkul)
    {   
        $kode_matkul=$this->uri->segment(4);
        $prodi=$this->uri->segment(5);
        $tingkat=$this->uri->segment(6);
        $semester=$this->uri->segment(7);
        $sks=$this->uri->segment(8);
        $jam=$this->uri->segment(9);
        $data['title']='Form Edit Subjects';
        $data['subjects']=$this->edit_model->subjectsdata($nama_matkul,$kode_matkul,$prodi,$tingkat,$semester,$sks,$jam);
        $this->form_validation->set_rules('nama_matkul', 'nama_matkul', 'required');
        $this->form_validation->set_rules('kode_matkul', 'kode_matkul', 'required');
        $this->form_validation->set_rules('prodi', 'prodi', 'required');
        $this->form_validation->set_rules('tingkat', 'tingkat', 'required');
        $this->form_validation->set_rules('semester', 'semester', 'required');
        $this->form_validation->set_rules('sks', 'sks', 'required');
        $this->form_validation->set_rules('jam', 'jam', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('project/tablelist/edit/subjects',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->edit_model->editsubjects($nama_matkul,$kode_matkul,$prodi,$tingkat,$semester,$sks,$jam);
            // $this->session->set_flashdata('flash-data', 'Edited');
            redirect('project/subjects','refresh');
        }
    }
    public function lecturers($nip)
    {   
        $nidn=$this->uri->segment(4);
        $kode=$this->uri->segment(5);
        $prodiid=$this->uri->segment(6);
        $akreid=$this->uri->segment(7);
        $teamid=$this->uri->segment(8);
        $nama=$this->uri->segment(9);
        $statuses=$this->uri->segment(10);
        $kuota_ngajar=$this->uri->segment(11);
        $jam_ngajar=$this->uri->segment(12);
        $sks=$this->uri->segment(13);
        $distribusi=$this->uri->segment(14);
        $kuota_genap_19_20=$this->uri->segment(15);
        $distr_genap_19_20=$this->uri->segment(16);
        $jumlah_matkul_19_20=$this->uri->segment(17);
        $homebase=$this->uri->segment(18);
        $homebase_akre_d3=$this->uri->segment(19);
        $data['title']='Form Edit Lecturers';
        $data['lecturers']=$this->edit_model->lecturersdata($nip,$nidn,$kode,$prodiid,$akreid,$teamid,$nama,$statuses,$kuota_ngajar,$jam_ngajar,$sks,$distribusi,$kuota_genap_19_20,$distr_genap_19_20,$jumlah_matkul_19_20,$homebase,$homebase_akre_d3);
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('statuses', 'statuses', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('project/tablelist/edit/lecturers',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->edit_model->editlecturers($nip,$nidn,$kode,$prodiid,$akreid,$teamid,$nama,$statuses,$kuota_ngajar,$jam_ngajar,$sks,$distribusi,$kuota_genap_19_20,$distr_genap_19_20,$jumlah_matkul_19_20,$homebase,$homebase_akre_d3);
            // $this->session->set_flashdata('flash-data', 'Edited');
            redirect('project/lecturers','refresh');
        }
    }
    public function team($team_name)
    {   
        $teamid=$this->uri->segment(4);
        $data['title']='Form Edit Team';
        $data['team']=$this->edit_model->teamdata($team_name,$teamid);
        $this->form_validation->set_rules('team_name', 'team_name', 'required');
        $this->form_validation->set_rules('teamid', 'teamid', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('project/tablelist/edit/team',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->edit_model->editteam($team_name,$teamid);
            // $this->session->set_flashdata('flash-data', 'Edited');
            redirect('project/team','refresh');
        }
    }
    public function research($rs_name)
    {   
        $rsid=$this->uri->segment(4);
        $data['title']='Form Edit Research';
        $data['research']=$this->edit_model->researchdata($rs_name,$rsid);
        $this->form_validation->set_rules('rs_name', 'rs_name', 'required');
        $this->form_validation->set_rules('rsid', 'rsid', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('project/tablelist/edit/research',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->edit_model->editresearch($rs_name,$rsid);
            // $this->session->set_flashdata('flash-data', 'Edited');
            redirect('project/research','refresh');
        }
    }
    public function researcher($kode)
    {   
        $rsid=$this->uri->segment(4);
        $tingkat=$this->uri->segment(5);
        $data['title']='Form Edit Researcher Roles';
        $data['researcher']=$this->edit_model->researcherdata($kode,$rsid,$tingkat);
        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('rsid', 'rsid', 'required|numeric');
        $this->form_validation->set_rules('tingkat', 'tingkat', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('project/tablelist/edit/researcher',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->edit_model->editresearcher($kode,$rsid,$tingkat);
            // $this->session->set_flashdata('flash-data', 'Edited');
            redirect('project/researcher','refresh');
        }
    }
    public function instructors($kode)
    {   
        $nama_kelas=$this->uri->segment(4);
        $nama_matkul=$this->uri->segment(5);
        $sks=$this->uri->segment(6);
        $kode_matkul=$this->uri->segment(7);
        $data['title']='Form Edit Instructors';
        $data['instructors']=$this->edit_model->instructorsdata($kode,$nama_kelas,$nama_matkul, $sks, $kode_matkul);
        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('nama_kelas', 'nama_kelas', 'required');
        $this->form_validation->set_rules('nama_matkul', 'nama_matkul', 'required');
        $this->form_validation->set_rules('sks', 'sks', 'required|numeric');
        $this->form_validation->set_rules('kode_matkul', 'kode_matkul', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('project/tablelist/edit/instructors',$data);
            $this->load->view('templates/footer');
        }
        else{
            $this->edit_model->editinstructors($kode,$nama_kelas,$nama_matkul,$sks,$kode_matkul);
            // $this->session->set_flashdata('flash-data', 'Edited');
            redirect('project/instructors','refresh');
        }
    }
    public function user_edit($nip)
    {   
        $nidn=$this->uri->segment(4);
        $kode=$this->uri->segment(5);
        $prodiid=$this->uri->segment(6);
        $akreid=$this->uri->segment(7);
        $teamid=$this->uri->segment(8);
        $nama=$this->uri->segment(9);
        $statuses=$this->uri->segment(10);
        $kuota_ngajar=$this->uri->segment(11);
        $jam_ngajar=$this->uri->segment(12);
        $sks=$this->uri->segment(13);
        $distribusi=$this->uri->segment(14);
        $kuota_genap_19_20=$this->uri->segment(15);
        $distr_genap_19_20=$this->uri->segment(16);
        $jumlah_matkul_19_20=$this->uri->segment(17);
        $homebase=$this->uri->segment(18);
        $homebase_akre_d3=$this->uri->segment(19);
        $data['title']='Form Edit User';
        $data['user']=$this->edit_model->userdata($nip,$nidn,$kode,$prodiid,$akreid,$teamid,$nama,$statuses,$kuota_ngajar,$jam_ngajar,$sks,$distribusi,$kuota_genap_19_20,$distr_genap_19_20,$jumlah_matkul_19_20,$homebase,$homebase_akre_d3);
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('statuses', 'statuses', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_user',$data);
            $this->load->view('lecturer/user_edit',$data);
            $this->load->view('templates/footer_user');
        }
        else{
            $this->edit_model->edituser($nip,$nidn,$kode,$prodiid,$akreid,$teamid,$nama,$statuses,$kuota_ngajar,$jam_ngajar,$sks,$distribusi,$kuota_genap_19_20,$distr_genap_19_20,$jumlah_matkul_19_20,$homebase,$homebase_akre_d3);
            $this->session->set_flashdata('flash-data', 'Edited');
            redirect('user/userdetail','refresh');
        }
    }

}

/* End of file Edit.php */

?>