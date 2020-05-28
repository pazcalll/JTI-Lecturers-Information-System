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
                            'KODE' => $data[0],
                            'nama_kelas' => $data[1],
                            'nama_matkul' => $data[2],
                            'SKS' => $data[3],
                            'kode_matkul' => $data[4],
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
                        $this->db->delete('jabatan',$stuff);
                        $this->db->insert('jabatan',$stuff);
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