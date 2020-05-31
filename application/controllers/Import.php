<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('csvimport');
        // $this->load->model('import_model');
        $this->load->model('project_model');
        if ($this->session->userdata('level')!="admin") {
            redirect('login','refresh');
        }
    }
    
    public function researcher()
    {
        $data['title']='Researcher Name List';
        $data['add']='addresearcher';
        // $data['level']='admin';
        $data['export']='Researcher';
        // $data['researcher']=$this->project_model->researcher();
        $this->load->view('templates/header',$data);
        $this->load->view('importer/index',$data);
        $this->load->view('templates/footer');
    }
    public function researcherimport()
    {
        if (isset($_POST['submit'])) {
            // echo 'asd';
            if ($_FILES['csvfile']['name']) {
                // echo 'asd';
                $filename=explode(".",$_FILES['csvfile']['name']);
                if ($filename[1]=='csv') {
                    // echo 'asd';
                    $handle = fopen($_FILES['csvfile']['tmp_name'],"r");
                    while ($data = fgetcsv($handle,0,',')) {
                        // echo $data[0], $data[1];
                        // $this->db->query($query);
                        $stuff = array(
                            'RESEARCHERID' => $data[0],
                            'KODE' => $data[1],
                            'RSID' => $data[2],
                            'TINGKAT' => $data[3]
                        );
                        $this->db->delete('researcher',$stuff);
                        $this->db->insert('researcher',$stuff);
                    }
                }
            }
            $this->session->set_flashdata('import', '<div class="alert alert-success" style="text-align: center;"><h4>Import data success</h4></div>');
            redirect('project/researcher','refresh');
        }
        else{
            $this->session->set_flashdata('import', '<div class="alert alert-danger" style="text-align: center;"><h4>Import data failed</h4></div>');
            redirect('project/researcher','refresh');
        }
    }
    public function research()
    {
        $data['title']='Research Name List';
        $data['add']='addresearch';
        // $data['level']='admin';
        $data['export']='Research';
        // $data['research']=$this->project_model->research();
        $this->load->view('templates/header',$data);
        $this->load->view('importer/index',$data);
        $this->load->view('templates/footer');
    }
    public function researchimport()
    {
        if (isset($_POST['submit'])) {
            // echo 'asd';
            if ($_FILES['csvfile']['name']) {
                // echo 'asd';
                $filename=explode(".",$_FILES['csvfile']['name']);
                if ($filename[1]=='csv') {
                    // echo 'asd';
                    $handle = fopen($_FILES['csvfile']['tmp_name'],"r");
                    while ($data = fgetcsv($handle,0,',')) {
                        // echo $data[0], $data[1];
                        // $this->db->query($query);
                        $stuff = array(
                            'RS_NAME' => $data[0],
                            'RSID' => $data[1]
                        );
                        $this->db->replace('research',$stuff);
                    }
                }
            }
            $this->session->set_flashdata('import', '<div class="alert alert-success" style="text-align: center;"><h4>Import data success</h4></div>');
            redirect('project/research','refresh');
        }
        else{
            $this->session->set_flashdata('import', '<div class="alert alert-danger" style="text-align: center;"><h4>Import data failed</h4></div>');
            redirect('project/research','refresh');
        }
    }
    public function bearer()
    {
        $data['title']='Bearer Name List';
        $data['add']='addbearer';
        // $data['level']='admin';
        $data['export']='Bearer';
        // $data['research']=$this->project_model->research();
        $this->load->view('templates/header',$data);
        $this->load->view('importer/index',$data);
        $this->load->view('templates/footer');
    }
    public function bearerimport()
    {
        if (isset($_POST['submit'])) {
            // echo 'asd';
            if ($_FILES['csvfile']['name']) {
                // echo 'asd';
                $filename=explode(".",$_FILES['csvfile']['name']);
                if ($filename[1]=='csv') {
                    // echo 'asd';
                    $handle = fopen($_FILES['csvfile']['tmp_name'],"r");
                    while ($data = fgetcsv($handle,0,',')) {
                        // echo $data[0], $data[1];
                        // $this->db->query($query);
                        $stuff = array(
                            'KODE' => $data[0],
                            'JABATANID' => $data[1],
                            'YEAR' => $data[2]
                        );
                        $this->db->replace('pengemban',$stuff);
                    }
                }
            }
            $this->session->set_flashdata('import', '<div class="alert alert-success" style="text-align: center;"><h4>Import data success</h4></div>');
            redirect('project/bearer','refresh');
        }
        else{
            $this->session->set_flashdata('import', '<div class="alert alert-danger" style="text-align: center;"><h4>Import data failed</h4></div>');
            redirect('project/bearer','refresh');
        }
    }
    public function classes()
    {
        $data['title']='Class Name List';
        $data['add']='addclass';
        // $data['level']='admin';
        $data['export']='Class';
        // $data['research']=$this->project_model->research();
        $this->load->view('templates/header',$data);
        $this->load->view('importer/index',$data);
        $this->load->view('templates/footer');
    }
    public function classimport()
    {
        if (isset($_POST['submit'])) {
            // echo 'asd';
            if ($_FILES['csvfile']['name']) {
                // echo 'asd';
                $filename=explode(".",$_FILES['csvfile']['name']);
                if ($filename[1]=='csv') {
                    // echo 'asd';
                    $handle = fopen($_FILES['csvfile']['tmp_name'],"r");
                    while ($data = fgetcsv($handle,0,',')) {
                        // echo $data[0], $data[1];
                        // $this->db->query($query);
                        $stuff = array(
                            'CLASSID' => $data[0],
                            'CLASS_NAME' => $data[1],
                            'PROGRAM_STD' => $data[2]
                        );
                        $this->db->replace('class',$stuff);
                    }
                }
            }
            $this->session->set_flashdata('import', '<div class="alert alert-success" style="text-align: center;"><h4>Import data success</h4></div>');
            redirect('project/classes','refresh');
        }
        else{
            $this->session->set_flashdata('import', '<div class="alert alert-danger" style="text-align: center;"><h4>Import data failed</h4></div>');
            redirect('project/classes','refresh');
        }
    }
    public function dpa()
    {
        $data['title']='DPA Name List';
        $data['add']='addcDPA';
        // $data['level']='admin';
        $data['export']='DPA';
        // $data['research']=$this->project_model->research();
        $this->load->view('templates/header',$data);
        $this->load->view('importer/index',$data);
        $this->load->view('templates/footer');
    }
    public function dpaimport()
    {
        if (isset($_POST['submit'])) {
            // echo 'asd';
            if ($_FILES['csvfile']['name']) {
                // echo 'asd';
                $filename=explode(".",$_FILES['csvfile']['name']);
                if ($filename[1]=='csv') {
                    // echo 'asd';
                    $handle = fopen($_FILES['csvfile']['tmp_name'],"r");
                    while ($data = fgetcsv($handle,0,',')) {
                        // echo $data[0], $data[1];
                        // $this->db->query($query);
                        $stuff = array(
                            'YEAR' => $data[0],
                            'KODE' => $data[1],
                            'CLASSID' => $data[2]
                        );
                        $this->db->delete('dpa',$stuff);
                        $this->db->insert('dpa',$stuff);
                    }
                }
                $this->session->set_flashdata('import', '<div class="alert alert-success" style="text-align: center;"><h4>Import data success</h4></div>');
                redirect('project/dpa','refresh');
            }
            else{
                $this->session->set_flashdata('import', '<div class="alert alert-danger" style="text-align: center;"><h4>Import data failed</h4></div>');
                redirect('project/dpa','refresh');
            }
        }
    }
    public function instructors()
    {
        $data['title']='Instructors List';
        $data['add']='addinstructors';
        // $data['level']='admin';
        $data['export']='Instructors';
        // $data['research']=$this->project_model->research();
        $this->load->view('templates/header',$data);
        $this->load->view('importer/index',$data);
        $this->load->view('templates/footer');
    }
    public function instructorsimport()
    {
        if (isset($_POST['submit'])) {
            // echo 'asd';
            if ($_FILES['csvfile']['name']) {
                // echo 'asd';
                $filename=explode(".",$_FILES['csvfile']['name']);
                if ($filename[1]=='csv') {
                    // echo 'asd';
                    $handle = fopen($_FILES['csvfile']['tmp_name'],"r");
                    while ($data = fgetcsv($handle,0,',')) {
                        // echo $data[0], $data[1];
                        // $this->db->query($query);
                        $stuff = array(
                            'INSTRUCTORID' => $data[0],
                            'KODE' => $data[1],
                            'nama_kelas' => $data[2],
                            'nama_matkul' => $data[3],
                            'SKS' => $data[4],
                            'kode_matkul' => $data[5],
                        );
                        $this->db->delete('pengajar',$stuff);
                        $this->db->insert('pengajar',$stuff);
                    }
                }
                $this->session->set_flashdata('import', '<div class="alert alert-success" style="text-align: center;"><h4>Import data success</h4></div>');
                redirect('project/instructors','refresh');
            }
            else{
                $this->session->set_flashdata('import', '<div class="alert alert-danger" style="text-align: center;"><h4>Import data failed</h4></div>');
                redirect('project/instructors','refresh');
            }
        }
    }
    public function lecturers()
    {
        $data['title']='lecturers List';
        $data['add']='addlecturers';
        // $data['level']='admin';
        $data['export']='lecturers';
        // $data['research']=$this->project_model->research();
        $this->load->view('templates/header',$data);
        $this->load->view('importer/index',$data);
        $this->load->view('templates/footer');
    }
    public function lecturersimport()
    {
        if (isset($_POST['submit'])) {
            // echo 'asd';
            if ($_FILES['csvfile']['name']) {
                // echo 'asd';
                $filename=explode(".",$_FILES['csvfile']['name']);
                if ($filename[1]=='csv') {
                    // echo 'asd';
                    $handle = fopen($_FILES['csvfile']['tmp_name'],"r");
                    while ($data = fgetcsv($handle,0,',')) {
                        // echo $data[0], $data[1];
                        // $this->db->query($query);
                        $stuff = array(
                            'NIP' => $data[0],
                            'NIDN' => $data[1],
                            'KODE' => $data[2],
                            'PRODIID' => $data[3],
                            'AKREID' => $data[4],
                            'TEAMID' => $data[5],
                            'NAMA' => $data[6],
                            'STATUSES' => $data[7],
                            'KUOTA_NGAJAR' => $data[8],
                            'JAM_NGAJAR' => $data[9],
                            'SKS' => $data[10],
                            'DISTRIBUSI' => $data[11],
                            'KUOTA_GENAP_19_20' => $data[12],
                            'DISTR_GENAP_19_20' => $data[13],
                            'JUMLAH_MATKUL_19_20' => $data[14],
                            'HOMEBASE' => $data[15],
                            'HOMEBASE_AKRE_D3' => $data[16]
                        );
                        $this->db->delete('lecturers',array('KODE'=>$data[2]));
                        $this->db->insert('lecturers',$stuff);
                    }
                }
                $this->session->set_flashdata('import', '<div class="alert alert-success" style="text-align: center;"><h4>Import data success</h4></div>');
                redirect('project/lecturers','refresh');
            }
            else{
                $this->session->set_flashdata('import', '<div class="alert alert-danger" style="text-align: center;"><h4>Import data failed</h4></div>');
                redirect('project/lecturers','refresh');
            }
        }
    }
    public function jabatan()
    {
        $data['title']='Jabatan List';
        $data['add']='addjabatan';
        // $data['level']='admin';
        $data['export']='Jabatan';
        // $data['research']=$this->project_model->research();
        $this->load->view('templates/header',$data);
        $this->load->view('importer/index',$data);
        $this->load->view('templates/footer');
    }
    public function jabatanimport()
    {
        if (isset($_POST['submit'])) {
            // echo 'asd';
            if ($_FILES['csvfile']['name']) {
                // echo 'asd';
                $filename=explode(".",$_FILES['csvfile']['name']);
                if ($filename[1]=='csv') {
                    // echo 'asd';
                    $handle = fopen($_FILES['csvfile']['tmp_name'],"r");
                    while ($data = fgetcsv($handle,0,',')) {
                        // echo $data[0], $data[1];
                        // $this->db->query($query);
                        $stuff = array(
                            'JABATAN_NAME' => $data[0],
                            'JABATANID' => $data[1],
                        );
                        // $this->db->where('JABATANID',$data[1]);
                        $queue= $this->db->where('JABATANID',$data[1])->select('JABATANID')->get('jabatan');
                        foreach($queue as $key => $value){
                            if ($queue->num_rows()===0) {
                                # code...
                                $sql = $this->db->insert_string('jabatan',$stuff).' ON DUPLICATE KEY UPDATE `JABATANID`='.$data[1].', `JABATAN_NAME`= "'.$data[0].'"';
                                $this->db->query($sql);
                            }
                            elseif($queue->num_rows()>0){
                                $this->db->where('JABATANID',$data[1])->update('jabatan',['JABATAN_NAME'=>$data[0]]);
                            }
                        }
                        // if (!$this->db->update('jabatan',$stuff)) {
                        //     $this->db->insert('jabatan',$stuff);
                        // }
                    }
                }
                $this->session->set_flashdata('import', '<div class="alert alert-success" style="text-align: center;"><h4>Import data success</h4></div>');
                redirect('project/jabatan','refresh');
            }
            else{
                $this->session->set_flashdata('import', '<div class="alert alert-danger" style="text-align: center;"><h4>Import data failed</h4></div>');
                redirect('project/jabatan','refresh');
            }
        }
    }
    public function subjects()
    {
        $data['title']='subjects List';
        $data['add']='addsubjects';
        // $data['level']='admin';
        $data['export']='subjects';
        // $data['research']=$this->project_model->research();
        $this->load->view('templates/header',$data);
        $this->load->view('importer/index',$data);
        $this->load->view('templates/footer');
    }
    public function subjectsimport()
    {
        if (isset($_POST['submit'])) {
            // echo 'asd';
            if ($_FILES['csvfile']['name']) {
                // echo 'asd';
                $filename=explode(".",$_FILES['csvfile']['name']);
                if ($filename[1]=='csv') {
                    // echo 'asd';
                    $handle = fopen($_FILES['csvfile']['tmp_name'],"r");
                    while ($data = fgetcsv($handle,0,',')) {
                        // echo $data[0], $data[1];
                        // $this->db->query($query);
                        $stuff = array(
                            'nama_matkul' => $data[0],
                            'kode_matkul' => $data[1],
                            'prodi' => $data[2],
                            'tingkat' => $data[3],
                            'semester' => $data[4],
                            'SKS' => $data[5],
                            'jam' => $data[6]
                        );
                        // $this->db->where('JABATANID',$data[1]);
                        $queue= $this->db->where('kode_matkul',$data[1])->select('kode_matkul')->get('mata_kuliah');
                        foreach($queue as $key => $value){
                            if ($queue->num_rows()===0) {
                                # code...
                                $sql = $this->db->insert_string('mata_kuliah',$stuff).' ON DUPLICATE KEY UPDATE `nama_matkul`="'.$data[0].
                                '", `kode_matkul`= "'.$data[1].
                                '", `prodi`= "'.$data[2].
                                '", `tingkat`= '.$data[3].
                                ', `semester`= "'.$data[4].
                                '", `SKS`= '.$data[5].
                                ', `jam`='.$data[6].'';
                                $this->db->query($sql);
                            }
                            elseif($queue->num_rows()>0){
                                $this->db->where('kode_matkul',$data[1])->update('mata_kuliah',['nama_matkul'=>$data[0]]);
                            }
                        }
                        // if (!$this->db->update('jabatan',$stuff)) {
                        //     $this->db->insert('jabatan',$stuff);
                        // }
                    }
                }
                $this->session->set_flashdata('import', '<div class="alert alert-success" style="text-align: center;"><h4>Import data success</h4></div>');
                redirect('project/jabatan','refresh');
            }
            else{
                $this->session->set_flashdata('import', '<div class="alert alert-danger" style="text-align: center;"><h4>Import data failed</h4></div>');
                redirect('project/jabatan','refresh');
            }
        }
    }

}

/* End of file Import.php */

?>