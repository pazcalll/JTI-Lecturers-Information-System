<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class delete_model extends CI_Model {

    public function deletebearer($id, $jabatanid,$year)
    {
        $this->db->where('kode',$id);
        $this->db->where('jabatanid',$jabatanid);
        $this->db->where('year', base64_decode($year));
        $this->db->delete('pengemban');
    }
    public function deleteclasses($classid, $class_name,$program_std)
    {
        $this->db->where('classid',$classid);
        $this->db->where('class_name',$class_name);
        $this->db->where('program_std',$program_std);
        $this->db->delete('class');
    }
    public function deletedpa($classid, $kode,$year)
    {
        $this->db->where('classid',$classid);
        $this->db->where('kode',$kode);
        $this->db->where('year',base64_decode($year));
        $this->db->delete('dpa');
    }
    public function deletejabatan($jabatanid, $jabatan_name)
    {
        $this->db->where('jabatanid',$jabatanid);
        $this->db->where('jabatan_name',base64_decode($jabatan_name));
        $this->db->delete('jabatan');
    }
    public function deletesubjects($nama_matkul, $kode_matkul,$prodi, $tingkat, $semester, $sks, $jam)
    {
        $this->db->where('nama_matkul',base64_decode($nama_matkul));
        $this->db->where('kode_matkul',$kode_matkul);
        $this->db->where('prodi',$prodi);
        $this->db->where('tingkat',$tingkat);
        $this->db->where('semester',$semester);
        $this->db->where('SKS',$sks);
        $this->db->where('jam',$jam);
        $this->db->delete('mata_kuliah');
    }    
    public function deletelecturers($nip, $nidn,$kode, $prodiid, $akreid, $teamid, $nama, $statuses, $kuota_ngajar, $jam_ngajar, $sks, $distribusi, $kuota_genap_19_20, $distr_genap_19_20, $jumlah_matkul_19_20, $homebase, $homebase_akre_d3)
    {
        $this->db->where('NIP',$nip);
        $this->db->where('NIDN',$nidn);
        $this->db->where('KODE',$kode);
        // $this->db->where('PRODIID',$prodiid);
        // $this->db->where('AKREID',$akreid);
        // $this->db->where('TEAMID',$teamid);
        // $this->db->where('NAMA',($nama));
        // $this->db->where('STATUSES',($statuses));
        // $this->db->where('KUOTA_NGAJAR',$kuota_ngajar);
        // $this->db->where('JAM_NGAJAR',$jam_ngajar);
        // $this->db->where('SKS',$sks);
        // $this->db->where('DISTRIBUSI',$distribusi);
        // $this->db->where('KUOTA_GENAP_19_20',$kuota_genap_19_20);
        // $this->db->where('DISTR_GENAP_19_20',$distr_genap_19_20);
        // $this->db->where('JUMLAH_MATKUL_19_20',$jumlah_matkul_19_20);
        // $this->db->where('HOMEBASE',$homebase);
        // $this->db->where('HOMEBASE_AKRE_D3',$homebase_akre_d3);
        $this->db->delete('lecturers');
    }
    
    public function deleteteam($team_name, $teamid)
    {
        $this->db->where('TEAM_NAME',($team_name));
        $this->db->where('TEAMID',$teamid);
        $this->db->delete('team');
    }    
    public function deleteresearch($rs_name, $rsid)
    {
        $this->db->where('rs_name',($rs_name));
        $this->db->where('rsid',$rsid);
        $this->db->delete('research');
    }    
    public function deleteresearcher($kode, $rsid,$tingkat)
    {
        $this->db->where('kode',($kode));
        $this->db->where('rsid',$rsid);
        $this->db->where('tingkat',$tingkat);
        $this->db->delete('researcher');
    }    
    public function deleteinstructors($kode, $nama_kelas,$nama_matkul, $sks, $kode_matkul)
    {
        $this->db->where('kode',($kode));
        $this->db->where('nama_kelas',base64_decode($nama_kelas));
        $this->db->where('nama_matkul', base64_decode($nama_matkul));
        $this->db->where('sks',$sks);
        $this->db->where('kode_matkul',$kode_matkul);
        $this->db->delete('pengajar');
    }    

}

/* End of file delete_model.php */

?>