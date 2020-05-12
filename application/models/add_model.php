<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Add_model extends CI_Model {

    public function addbearer()
    {
        $data=[
            "kode"  =>  $this->input->post('kode', true),
            "jabatanid"  =>  $this->input->post('jabatanid', true),
            "year"  =>  $this->input->post('year', true)
        ];
        $this->db->insert('pengemban', $data);
    }
    public function addclasslist()
    {
        $data=[
            "classid"  =>  $this->input->post('classid', true),
            "class_name"  =>  $this->input->post('class_name', true),
            "program_std"  =>  $this->input->post('program_std', true)
        ];
        $this->db->insert('class', $data);
    }
    public function adddpalist()
    {
        $data=[
            "classid"  =>  $this->input->post('classid', true),
            "kode"  =>  $this->input->post('kode', true),
            "year"  =>  $this->input->post('year', true)
        ];
        $this->db->insert('dpa', $data);
    }
    public function addjabatan()
    {
        $data=[
            "jabatanid"  =>  $this->input->post('jabatanid', true),
            "jabatan_name"  =>  $this->input->post('jabatan_name', true)
        ];
        $this->db->insert('jabatan', $data);
    }
    public function addsubjects()
    {
        $data=[
            "nama_matkul"  =>  $this->input->post('nama_matkul', true),
            "kode_matkul"  =>  $this->input->post('kode_matkul', true),
            "prodi"  =>  $this->input->post('prodi', true),
            "tingkat"  =>  $this->input->post('tingkat', true),
            "semester"  =>  $this->input->post('semester', true),
            "sks"  =>  $this->input->post('sks', true),
            "jam"  =>  $this->input->post('jam', true)
        ];
        $this->db->insert('mata_kuliah', $data);
    }
    public function addlecturers()
    {
        $data=[
            "nip"  =>  $this->input->post('nip', true),
            "nidn"  =>  $this->input->post('nidn', true),
            "kode"  =>  $this->input->post('kode', true),
            "prodiid"  =>  $this->input->post('prodiid', true),
            "akreid"  =>  $this->input->post('akreid', true),
            "teamid"  =>  $this->input->post('teamid', true),
            "nama"  =>  $this->input->post('nama', true),
            "statuses"  =>  $this->input->post('statuses', true),
            "kuota_ngajar"  =>  $this->input->post('kuota_ngajar', true),
            "jam_ngajar"  =>  $this->input->post('jam_ngajar', true),
            "sks"  =>  $this->input->post('sks', true),
            "distribusi"  =>  $this->input->post('distribusi', true),
            "kuota_genap_19_20"  =>  $this->input->post('kuota_genap_19_20', true),
            "distr_genap_19_20"  =>  $this->input->post('distr_genap_19_20', true),
            "jumlah_matkul_19_20"  =>  $this->input->post('jumlah_matkul_19_20', true),
            "homebase"  =>  $this->input->post('homebase', true),
            "homebase_akre_d3"  =>  $this->input->post('homebase_akre_d3', true)
        ];
        $this->db->insert('lecturers', $data);
    }
    
    public function addteam()
    {
        $data=[
            "team_name"  =>  $this->input->post('team_name', true),
            "teamid"  =>  $this->input->post('teamid', true)
        ];
        $this->db->insert('team', $data);
    }
    public function addresearch()
    {
        $data=[
            "rs_name"  =>  $this->input->post('rs_name', true),
            "rsid"  =>  $this->input->post('rsid', true)
        ];
        $this->db->insert('research', $data);
    }
    public function addresearcher()
    {
        $data=[
            "kode"  =>  $this->input->post('kode', true),
            "rsid"  =>  $this->input->post('rsid', true),
            "tingkat"  =>  $this->input->post('tingkat', true)
        ];
        $this->db->insert('researcher', $data);
    }
    public function fetchresearcher()
    {
        $this->db->select('rsid');
        $this->db->from('research');
        $resultset = $this->db->get()->result_array();
        return $resultset;
    }
    public function addinstructors()
    {
        $data=[
            "kode"  =>  $this->input->post('kode', true),
            "nama_kelas"  =>  $this->input->post('nama_kelas', true),
            "nama_matkul"  =>  $this->input->post('nama_matkul', true),
            "sks"  =>  $this->input->post('sks', true),
            "kode_matkul"  =>  $this->input->post('kode_matkul', true)
        ];
        $this->db->insert('pengajar', $data);
    }

}

/* End of file Add_model.php */

?>