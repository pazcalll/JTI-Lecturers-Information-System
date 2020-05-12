<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class edit_model extends CI_Model {
	public function bearerdata($id, $jabatanid, $year)
	{
		# code...
		$this->db->where('KODE', $id);
		$this->db->where('JABATANID', $jabatanid);
		$this->db->where('YEAR', base64_decode($year));
		// $this->db->select('*');
		$query=$this->db->get('pengemban');
		$row = $query->row_array();
		// return var_dump($row);
		return $row;
	}
    public function editbearer()
	{
		$data=[
            "kode" => $this->input->post('kode',true),
            "jabatanid" => $this->input->post('jabatanid',true),
			"year" => $this->input->post('year',true)        
		];
        $this->db->where('kode', $this->input->post('kode'));
        // $this->db->where('jabatanid', $this->input->post('jabatanid'));
		// $this->db->where('year', $this->input->post('year'));
        $this->db->update('pengemban', $data);
	}
	public function classesdata($classid, $class_name, $program_std)
	{
		# code...
		$this->db->where('CLASSID', $classid);
		$this->db->where('CLASS_NAME', $class_name);
		$this->db->where('PROGRAM_STD', $program_std);
		// $this->db->select('*');
		$query=$this->db->get('class');
		$row = $query->row_array();
		// return var_dump($row);
		return $row;
	}
    public function editclasses()
	{
		$data=[
            "classid" => $this->input->post('classid',true),
            "class_name" => $this->input->post('class_name',true),
			"program_std" => $this->input->post('program_std',true)        
		];
        $this->db->where('classid', $this->input->post('classid'));
        // $this->db->where('jabatanid', $this->input->post('jabatanid'));
		// $this->db->where('year', $this->input->post('year'));
        $this->db->update('class', $data);
	}
	public function dpadata($classid, $kode, $year)
	{
		# code...
		$this->db->where('CLASSID', $classid);
		$this->db->where('KODE', $kode);
		$this->db->where('YEAR', base64_decode($year));
		// $this->db->select('*');
		$query=$this->db->get('dpa');
		$row = $query->row_array();
		// return var_dump($row);
		return $row;
	}
    public function editdpa($classid, $kode, $year)
	{
		$data=[
            "classid" => $this->input->post('classid',true),
            "kode" => $this->input->post('kode',true),
			"year" => $this->input->post('year',true)        
		];
        $this->db->where('classid', $classid);
        $this->db->where('kode', $kode);
		$this->db->where('year', base64_decode($year));
        // $this->db->where('classid', $this->input->post('classid'));
        // $this->db->where('kode', $this->input->post('jabatanid'));
		// $this->db->where('year', $this->input->post('year'));
        $this->db->update('dpa', $data);
	}
	public function jabatandata($jabatanid, $jabatan_name)
	{
		# code...
		$this->db->where('JABATANID', $jabatanid);
		$this->db->where('JABATAN_NAME', base64_decode($jabatan_name));
		$query=$this->db->get('jabatan');
		$row = $query->row_array();
		return $row;
	}
    public function editjabatan($jabatanid, $jabatan_name)
	{
		$data=[
            "jabatanid" => $this->input->post('jabatanid',true),
            "jabatan_name" => $this->input->post('jabatan_name',true),    
		];
        $this->db->where('jabatanid', $jabatanid);
        $this->db->where('jabatan_name', base64_decode($jabatan_name));
        $this->db->update('jabatan', $data);
	}
	public function subjectsdata($nama_matkul,$kode_matkul,$prodi,$tingkat,$semester,$sks,$jam)
	{
		# code...
		$this->db->where('nama_matkul', base64_decode($nama_matkul));
		$this->db->where('kode_matkul', $kode_matkul);
		$this->db->where('prodi', $prodi);
		$this->db->where('tingkat', $tingkat);
		$this->db->where('semester', $semester);
		$this->db->where('SKS', $sks);
		$this->db->where('jam', $jam);
		$query=$this->db->get('mata_kuliah');
		$row = $query->row_array();
		return $row;
	}
    public function editsubjects($nama_matkul,$kode_matkul,$prodi,$tingkat,$semester,$sks,$jam)
	{
		$data=[
            "nama_matkul" => $this->input->post('nama_matkul',true),
            "kode_matkul" => $this->input->post('kode_matkul',true),    
            "prodi" => $this->input->post('prodi',true),    
            "tingkat" => $this->input->post('tingkat',true),    
            "semester" => $this->input->post('semester',true),    
            "sks" => $this->input->post('sks',true),    
            "jam" => $this->input->post('jam',true),    
		];
        $this->db->where('nama_matkul', base64_decode($nama_matkul));
        $this->db->where('kode_matkul', $kode_matkul);
        $this->db->where('prodi', $prodi);
        $this->db->where('tingkat', $tingkat);
        $this->db->where('semester', $semester);
        $this->db->where('sks', $sks);
        $this->db->where('jam', $jam);
        $this->db->update('mata_kuliah', $data);
	}
	public function lecturersdata($nip,$nidn,$kode,$prodiid,$akreid,$teamid,$nama,$statuses,$kuota_ngajar,$jam_ngajar,$sks,$distribusi,$kuota_genap_19_20,$distr_genap_19_20,$jumlah_matkul_19_20,$homebase,$homebase_akre_d3)
	{
		# code...
		$this->db->where('NIP', $nip);
		$this->db->where('NIDN', $nidn);
		$this->db->where('KODE', $kode);
		$this->db->where('PRODIID', $prodiid);
		$this->db->where('AKREID', $akreid);
		$this->db->where('TEAMID', $teamid);
		$this->db->where('NAMA', base64_decode($nama));
		$this->db->where('STATUSES', base64_decode($statuses));
		$this->db->where('KUOTA_NGAJAR', $kuota_ngajar);
		$this->db->where('JAM_NGAJAR', $jam_ngajar);
		$this->db->where('SKS', $sks);
		$this->db->where('DISTRIBUSI', $distribusi);
		$this->db->where('KUOTA_GENAP_19_20', $kuota_genap_19_20);
		$this->db->where('DISTR_GENAP_19_20', $distr_genap_19_20);
		$this->db->where('JUMLAH_MATKUL_19_20', $jumlah_matkul_19_20);
		$this->db->where('HOMEBASE', $homebase);
		$this->db->where('HOMEBASE_AKRE_D3', $homebase_akre_d3);
		$query=$this->db->get('lecturers');
		$row = $query->row_array();
		return $row;
	}
    public function editlecturers($nip,$nidn,$kode,$prodiid,$akreid,$teamid,$nama,$statuses,$kuota_ngajar,$jam_ngajar,$sks,$distribusi,$kuota_genap_19_20,$distr_genap_19_20,$jumlah_matkul_19_20,$homebase,$homebase_akre_d3)
	{
		$data=[
            "nip" => $this->input->post('nip',true),
            "nidn" => $this->input->post('nidn',true),    
            "kode" => $this->input->post('kode',true),    
            "prodiid" => $this->input->post('prodiid',true),    
            "akreid" => $this->input->post('akreid',true),    
            "teamid" => $this->input->post('teamid',true),    
            "nama" => $this->input->post('nama',true),    
            "statuses" => $this->input->post('statuses',true),    
            "kuota_ngajar" => $this->input->post('kuota_ngajar',true),    
            "jam_ngajar" => $this->input->post('jam_ngajar',true),    
            "sks" => $this->input->post('sks',true),    
            "distribusi" => $this->input->post('distribusi',true),    
            "kuota_genap_19_20" => $this->input->post('kuota_genap_19_20',true),    
            "distr_genap_19_20" => $this->input->post('distr_genap_19_20',true),    
            "jumlah_matkul_19_20" => $this->input->post('jumlah_matkul_19_20',true),    
            "homebase" => $this->input->post('homebase',true),    
            "homebase_akre_d3" => $this->input->post('homebase_akre_d3',true),    
		];
        $this->db->where('NIP', $nip);
		$this->db->where('NIDN', $nidn);
		$this->db->where('KODE', $kode);
		$this->db->where('PRODIID', $prodiid);
		$this->db->where('AKREID', $akreid);
		$this->db->where('TEAMID', $teamid);
		$this->db->where('NAMA', base64_decode($nama));
		$this->db->where('STATUSES', base64_decode($statuses));
		$this->db->where('KUOTA_NGAJAR', $kuota_ngajar);
		$this->db->where('JAM_NGAJAR', $jam_ngajar);
		$this->db->where('SKS', $sks);
		$this->db->where('DISTRIBUSI', $distribusi);
		$this->db->where('KUOTA_GENAP_19_20', $kuota_genap_19_20);
		$this->db->where('DISTR_GENAP_19_20', $distr_genap_19_20);
		$this->db->where('JUMLAH_MATKUL_19_20', $jumlah_matkul_19_20);
		$this->db->where('HOMEBASE', $homebase);
		$this->db->where('HOMEBASE_AKRE_D3', $homebase_akre_d3);
        $this->db->update('lecturers', $data);
	}
	public function teamdata($team_name,$teamid)
	{
		# code...
		$this->db->where('team_name', $team_name);
		$this->db->where('teamid', $teamid);
		$query=$this->db->get('team');
		$row = $query->row_array();
		return $row;
	}
    public function editteam($team_name,$teamid)
	{
		$data=[
            "team_name" => $this->input->post('team_name',true),
            "teamid" => $this->input->post('teamid',true),
		];
        $this->db->where('team_name', $team_name);
        $this->db->where('teamid', $teamid);
        $this->db->update('team', $data);
	}
	public function researchdata($rs_name,$rsid)
	{
		# code...
		$this->db->where('rs_name', $rs_name);
		$this->db->where('rsid', $rsid);
		$query=$this->db->get('research');
		$row = $query->row_array();
		return $row;
	}
    public function editresearch($rs_name,$rsid)
	{
		$data=[
            "rs_name" => $this->input->post('rs_name',true),
            "rsid" => $this->input->post('rsid',true),
		];
        $this->db->where('rs_name', $rs_name);
        $this->db->where('rsid', $rsid);
        $this->db->update('research', $data);
	}
	public function researcherdata($kode,$rsid, $tingkat)
	{
		# code...
		$this->db->where('kode', $kode);
		$this->db->where('rsid', $rsid);
		$this->db->where('tingkat', $tingkat);
		$query=$this->db->get('researcher');
		$row = $query->row_array();
		return $row;
	}
    public function editresearcher($kode,$rsid, $tingkat)
	{
		$data=[
            "kode" => $this->input->post('kode',true),
            "rsid" => $this->input->post('rsid',true),
            "tingkat" => $this->input->post('tingkat',true),
		];
        $this->db->where('kode', $kode);
        $this->db->where('rsid', $rsid);
        $this->db->where('tingkat', $tingkat);
        $this->db->update('researcher', $data);
	}
	public function instructorsdata($kode, $nama_kelas, $nama_matkul, $sks, $kode_matkul)
	{
		# code...
		$this->db->where('KODE', $kode);
		$this->db->where('nama_kelas', base64_decode($nama_kelas));
		$this->db->where('nama_matkul', base64_decode($nama_matkul));
		$this->db->where('SKS', $sks);
		$this->db->where('kode_matkul', $kode_matkul);
		$query=$this->db->get('pengajar');
		$row = $query->row_array();
		return $row;
	}
    public function editinstructors($kode,$nama_kelas, $nama_matkul, $sks, $kode_matkul)
	{
		$data=[
            "kode" => $this->input->post('kode',true),
            "nama_kelas" => $this->input->post('nama_kelas',true),
            "nama_matkul" => $this->input->post('nama_matkul',true),
            "sks" => $this->input->post('sks',true),
            "kode_matkul" => $this->input->post('kode_matkul',true)
		];
        $this->db->where('kode', $kode);
        $this->db->where('nama_kelas', base64_decode($nama_kelas));
        $this->db->where('nama_matkul', base64_decode($nama_matkul));
        $this->db->where('sks', $sks);
        $this->db->where('kode_matkul', $kode_matkul);
        $this->db->update('pengajar', $data);
	}
	public function userdata($nip,$nidn,$kode,$prodiid,$akreid,$teamid,$nama,$statuses,$kuota_ngajar,$jam_ngajar,$sks,$distribusi,$kuota_genap_19_20,$distr_genap_19_20,$jumlah_matkul_19_20,$homebase,$homebase_akre_d3)
	{
		# code...
		$this->db->where('NIP', $nip);
		$this->db->where('NIDN', $nidn);
		$this->db->where('KODE', $kode);
		$this->db->where('PRODIID', $prodiid);
		$this->db->where('AKREID', $akreid);
		$this->db->where('TEAMID', $teamid);
		$this->db->where('NAMA', base64_decode($nama));
		$this->db->where('STATUSES', base64_decode($statuses));
		$this->db->where('KUOTA_NGAJAR', $kuota_ngajar);
		$this->db->where('JAM_NGAJAR', $jam_ngajar);
		$this->db->where('SKS', $sks);
		$this->db->where('DISTRIBUSI', $distribusi);
		$this->db->where('KUOTA_GENAP_19_20', $kuota_genap_19_20);
		$this->db->where('DISTR_GENAP_19_20', $distr_genap_19_20);
		$this->db->where('JUMLAH_MATKUL_19_20', $jumlah_matkul_19_20);
		$this->db->where('HOMEBASE', $homebase);
		$this->db->where('HOMEBASE_AKRE_D3', $homebase_akre_d3);
		$query=$this->db->get('lecturers');
		$row = $query->row_array();
		return $row;
	}
    public function edituser($nip,$nidn,$kode,$prodiid,$akreid,$teamid,$nama,$statuses,$kuota_ngajar,$jam_ngajar,$sks,$distribusi,$kuota_genap_19_20,$distr_genap_19_20,$jumlah_matkul_19_20,$homebase,$homebase_akre_d3)
	{
		$data=[
            "nip" => $this->input->post('nip',true),
            "nidn" => $this->input->post('nidn',true),    
            "kode" => $this->input->post('kode',true),    
            "prodiid" => $this->input->post('prodiid',true),    
            "akreid" => $this->input->post('akreid',true),    
            "teamid" => $this->input->post('teamid',true),    
            "nama" => $this->input->post('nama',true),    
            "statuses" => $this->input->post('statuses',true),    
            "kuota_ngajar" => $this->input->post('kuota_ngajar',true),    
            "jam_ngajar" => $this->input->post('jam_ngajar',true),    
            "sks" => $this->input->post('sks',true),    
            "distribusi" => $this->input->post('distribusi',true),    
            "kuota_genap_19_20" => $this->input->post('kuota_genap_19_20',true),    
            "distr_genap_19_20" => $this->input->post('distr_genap_19_20',true),    
            "jumlah_matkul_19_20" => $this->input->post('jumlah_matkul_19_20',true),    
            "homebase" => $this->input->post('homebase',true),    
            "homebase_akre_d3" => $this->input->post('homebase_akre_d3',true),    
		];
        $this->db->where('NIP', $nip);
		$this->db->where('NIDN', $nidn);
		$this->db->where('KODE', $kode);
		$this->db->where('PRODIID', $prodiid);
		$this->db->where('AKREID', $akreid);
		$this->db->where('TEAMID', $teamid);
		$this->db->where('NAMA', base64_decode($nama));
		$this->db->where('STATUSES', base64_decode($statuses));
		$this->db->where('KUOTA_NGAJAR', $kuota_ngajar);
		$this->db->where('JAM_NGAJAR', $jam_ngajar);
		$this->db->where('SKS', $sks);
		$this->db->where('DISTRIBUSI', $distribusi);
		$this->db->where('KUOTA_GENAP_19_20', $kuota_genap_19_20);
		$this->db->where('DISTR_GENAP_19_20', $distr_genap_19_20);
		$this->db->where('JUMLAH_MATKUL_19_20', $jumlah_matkul_19_20);
		$this->db->where('HOMEBASE', $homebase);
		$this->db->where('HOMEBASE_AKRE_D3', $homebase_akre_d3);
        $this->db->update('lecturers', $data);
	}

}

/* End of file edit_model.php */

?>