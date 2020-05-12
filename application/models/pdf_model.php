<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pdf_model extends CI_Model {

    public function get_allrps()
    {
        $query=$this->db->get('rps');
        return $query->result();
    }
    public function get_koderps($nama_matkul)
    {
        # code...
        $query=$this->db->where('nama_matkul',$nama_matkul)->select('kode_matkul')->get('mata_kuliah');
        return $query->result();
    }
    public function get_duplicaterps($kode_matkul)
    {
        $query=$this->db->where('kode_matkul',$kode_matkul)->select('kode_matkul')->get('rps');
        return $query->result();
    }
    public function deleterps($kode_matkul)
    {
        $query = $this->db->where('kode_matkul',($kode_matkul));
        return $query->delete('rps');
    }

    public function insertrps($data)
    {
        # code...
        return $this->db->insert('rps',$data);
    }


// ==================================== SAP ======================================
    public function get_allsap()
    {
        $query=$this->db->get('sap');
        return $query->result();
    }
    public function get_kodesap($nama_matkul)
    {
        # code...
        $query=$this->db->where('nama_matkul',$nama_matkul)->select('kode_matkul')->get('mata_kuliah');
        return $query->result();
    }

    public function get_duplicatesap($kode_matkul)
    {
        $query=$this->db->where('kode_matkul',$kode_matkul)->select('kode_matkul')->get('sap');
        return $query->result();
    }

    // public function download_sap($filename)
    // {
    //     # code...
    //     $this->load->helper('download');
    //     $file='uploads/'.$filename;
    //     force_download($file,NULL);
    // }

    public function deletesap($kode_matkul)
    {
        $query = $this->db->where('kode_matkul',($kode_matkul));
        return $query->delete('sap');
    }

    public function insertsap($data)
    {
        # code...
        return $this->db->insert('sap',$data);
    }

}

/* End of file pdf_model.php */

?>