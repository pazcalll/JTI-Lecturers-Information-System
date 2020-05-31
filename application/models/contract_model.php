<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contract_model extends CI_Model {

    public function getmycontract($user)
    {
        $this->db->group_by('kode_matkul');
        $this->db->where('username',$user);
        $sql = $this->db->get('contracts');
        return $sql->result();
    }

    public function getallcontract()
    {
        $this->db->group_by('kode_matkul');
        $this->db->group_by('username');
        $this->db->where('username !=','admin');
        $sql = $this->db->get('contracts');
        return $sql->result();
    }

    public function getmycontractlist($user,$subjectid)
    {
        $this->db->group_by('contracts.kode_matkul',$subjectid);
        $this->db->group_by('contracts.username',$user);
        $this->db->where('contracts.username',$user);
        $this->db->where('contracts.kode_matkul',$subjectid);
        $sql = $this->db->join('mata_kuliah','mata_kuliah.kode_matkul = contracts.kode_matkul')
                    ->from('contracts')
                    ->select('mata_kuliah.nama_matkul, contracts.kode_matkul, contracts.prodi, username, contracts.tingkat');
        return $sql->get()->result();
    }

    public function getcontractadmin($user,$subjectid)
    {
        $this->db->group_by('contracts.kode_matkul');
        $this->db->group_by('contracts.username');
        $this->db->where('contracts.username !=',$user);
        $this->db->where('contracts.kode_matkul',$subjectid);
        $sql = $this->db->join('mata_kuliah','mata_kuliah.kode_matkul = contracts.kode_matkul')
                    ->from('contracts')
                    ->select('mata_kuliah.nama_matkul, contracts.kode_matkul, contracts.prodi, username, contracts.tingkat');
        return $sql->get()->result();
    }

    public function getlecturercontract($user, $subjectid)
    {
        $this->db->where('username', $user);
        $this->db->where('kode_matkul', $subjectid);
        $sql = $this->db->get('contracts');
        return $sql->result();
    }

    public function exportcontract($subjectid, $prodi, $user, $tingkat)
    {
        $this->db->where('kode_matkul',$subjectid);
        $this->db->where('prodi',$prodi);
        $this->db->where('username',$user);
        $this->db->where('tingkat',$tingkat);
        $sql = $this->db->select('minggu, tanggal, bahasan, metode')->get('contracts');
        return $sql->result_array();
    }

    public function deletecontract($subjectid, $prodi, $user, $tingkat)
    {
        $this->db->where('kode_matkul',$subjectid);
        $this->db->where('prodi',$prodi);
        $this->db->where('username',$user);
        $this->db->where('tingkat',$tingkat);
        $this->db->delete('contracts');
    }

}

/* End of file Contract_model.php */

?>