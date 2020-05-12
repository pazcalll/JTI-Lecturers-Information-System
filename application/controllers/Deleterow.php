<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Deleterow extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('delete_model');
    }
    
    public function deletebearer($id)
    {
        // $decode=base64_decode($year);
        // $id=$this->input->get('kode');
        // $id=$this->uri->segment(3);
        $jabatanid=$this->uri->segment(4);
        $year=$this->uri->segment(5);
        $this->delete_model->deletebearer($id, $jabatanid, $year);
        // echo $id;
        // echo $jabatanid;

        // $this->session->set_flashdata('flash-data', 'deleted');
        redirect('project/bearer','refresh');
    }
    public function deleteclasses($classid)
    {
        $class_name=$this->uri->segment(4);
        $program_std=$this->uri->segment(5);
        $this->delete_model->deleteclasses($classid, $class_name, $program_std);
        redirect('project/classes','refresh');
    }
    public function deletedpa($classid)
    {
        $kode=$this->uri->segment(4);
        $year=$this->uri->segment(5);
        $this->delete_model->deletedpa($classid, $kode, $year);
        redirect('project/dpa','refresh');
    }
    public function deletejabatan($jabatanid)
    {
        $jabatan_name=$this->uri->segment(4);
        $this->delete_model->deletejabatan($jabatanid, $jabatan_name);
        redirect('project/jabatan','refresh');
    }
    public function deletesubjects($nama_matkul)
    {
        $kode_matkul=$this->uri->segment(4);
        $prodi=$this->uri->segment(5);
        $tingkat=$this->uri->segment(6);
        $semester=$this->uri->segment(7);
        $sks=$this->uri->segment(8);
        $jam=$this->uri->segment(9);
        $this->delete_model->deletesubjects($nama_matkul, $kode_matkul,$prodi, $tingkat, $semester, $sks, $jam);
        redirect('project/subjects','refresh');
    }
    public function deletelecturers($nip)
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
        $this->delete_model->deletelecturers($nip, $nidn,$kode, $prodiid, $akreid, $teamid, $nama, $statuses, $kuota_ngajar, $jam_ngajar, $sks, $distribusi, $kuota_genap_19_20, $distr_genap_19_20, $jumlah_matkul_19_20, $homebase, $homebase_akre_d3);
        redirect('project/lecturers','refresh');
    }
    public function deleteteam($team_name)
    {
        $teamid=$this->uri->segment(4); 
        $this->delete_model->deleteteam($team_name, $teamid);
        redirect('project/team','refresh');
    }
    public function deleteresearch($rs_name)
    {
        $rsid=$this->uri->segment(4); 
        $this->delete_model->deleteresearch($rs_name, $rsid);
        redirect('project/research','refresh');
    }
    public function deleteresearcher($kode)
    {
        $rsid=$this->uri->segment(4); 
        $tingkat=$this->uri->segment(5); 
        $this->delete_model->deleteresearcher($kode, $rsid, $tingkat);
        redirect('project/researcher','refresh');
    }
    public function deleteinstructors($kode)
    {
        $nama_kelas=$this->uri->segment(4); 
        $nama_matkul=$this->uri->segment(5); 
        $sks=$this->uri->segment(6); 
        $kode_matkul=$this->uri->segment(7); 
        $this->delete_model->deleteinstructors($kode, $nama_kelas, $nama_matkul, $sks, $kode_matkul);
        redirect('project/instructors','refresh');
    }

}

/* End of file Deleterow.php */

?>