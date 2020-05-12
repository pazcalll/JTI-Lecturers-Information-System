<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {

    public function getAllSemesters()
    {
        $query=$this->db->get('semesters2019/2020');
        return $query->result_array();
    }

    public function tablename()
    {
        $tables = $this->db->query("select t.table_name as tabel 
        from information_schema.tables as t
        where t.table_schema='dosen'")->result_array();
        foreach ($tables as $key => $val) {
            echo $val['tabel']."<br>";
        }
    }

    public function datatables_semesters(){
        $query= $this->db->order_by('prodi, tingkat, semester','ASC')->get('semesters2019/2020');
        return $query->result();
    }

    public function dpa18()
    {
        $query = $this->db->order_by('nama','ASC')->get('dpa18/19');
        return $query->result_array();
    }
    public function dpa19()
    {
        $query = $this->db->order_by('nama','ASC')->get('dpa19/20');
        return $query->result_array();
    }
    public function cpns()
    {
        $query = $this->db->order_by('nama','ASC')->get('list_dosen_cpns');
        return $query->result_array();
    }
    public function pns()
    {
        $query = $this->db->order_by('nama','ASC')->get('list_dosen_pns');
        return $query->result_array();
    }
    public function mku()
    {
        $query = $this->db->order_by('nama','ASC')->get('list_dosen_mku');
        return $query->result_array();
    }
    public function lb()
    {
        $query = $this->db->order_by('nama','ASC')->get('list_dosen_lb');
        return $query->result_array();
    }
    public function classes()
    {
        $query = $this->db->order_by('classid','ASC')->get('class');
        return $query->result_array();
    }
    public function dpa()
    {
        $query = $this->db->order_by('CLASSID','DESC')->where('CLASSID !=','null')->get('dpa');
        return $query->result_array();
    }
    public function jabatan()
    {
        $query = $this->db->order_by('JABATAN_NAME','ASC')->get('jabatan');
        return $query->result_array();
    }
    public function lecturers()
    {
        $query = $this->db->order_by('NAMA','ASC')->get('lecturers');
        return $query->result_array();
    }
    public function subjects()
    {
        $query = $this->db->order_by('kode_matkul','ASC')->get('mata_kuliah');
        return $query->result_array();
    }
    public function instructors()
    {
        $query = $this->db->order_by('kode_matkul','ASC')->get('pengajar');
        return $query->result_array();
    }
    public function bearer()
    {
        $query = $this->db->order_by('kode','ASC')->get('pengemban');
        return $query->result_array();
    }
    public function stdprogram()
    {
        $query = $this->db->order_by('prodiid','ASC')->get('program_std');
        return $query->result_array();
    }
    public function research()
    {
        $query = $this->db->order_by('rs_name','ASC')->get('research');
        return $query->result_array();
    }
    public function researcher()
    {
        $query = $this->db->order_by('tingkat','ASC')->get('researcher');
        return $query->result_array();
    }
    public function team()
    {
        $query = $this->db->order_by('team_name','ASC')->where('TEAM_NAME !=', 'null')->get('team');
        return $query->result_array();
    }
    public function user($user)
    {
        $query = $this->db->where('KODE',$user)->order_by('NAMA','ASC')->get('lecturers');
        return $query->result_array();
    }

}

/* End of file project_model.php */

?>