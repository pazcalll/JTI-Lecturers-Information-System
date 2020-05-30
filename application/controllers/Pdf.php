<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('project_model');
        $this->load->model('pdf_model');
        $this->load->library('form_validation');
        $this->load->database();
        if ($this->session->userdata('level')==null) {
            redirect('login','refresh');
        }
    }

    public function rps()
    {
        $data['title']='RPS Control';
        $data['dropdown']=$this->project_model->subjects();
        $data['matkul']=$this->pdf_model->get_allrps();
        if ($this->session->userdata('level')!="admin") {
            $this->load->view('templates/header_user',$data);
            $this->load->view('pdf/rps/index', $data);
            $this->load->view('templates/footer_user');
        }
        elseif ($this->session->userdata('level')!="user") {
            $this->load->view('templates/header',$data);
            $this->load->view('pdf/rps/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function addrps()
    {
        // $nama_matkul=$this->input->post('nama_matkul');
        // $pdf = $_FILES['pdf']['name'];
        // $level = $this->input->post('level');
        // $program = $this->input->post('program');
        $config['upload_path']          = './uploads/rps/';
        $config['allowed_types']        = 'doc|pdf|docx';
        $config['max_size']             = 0;

        $this->load->library('upload', $config);
        $this->form_validation->set_rules('nama_matkul', 'Subject Name', 'required');
        $this->form_validation->set_rules('program', 'Study Program', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');        

        if ( $this->form_validation->run() == FALSE || ! $this->upload->do_upload('pdf') )
        {
                // $this->load->view('upload_form', $error);
                // $this->session->set_flashdata('uploadpdf', 'Failed to upload');
                $data['title']='RPS Control';
                $data['dropdown']=$this->project_model->subjects();
                $data['matkul']=$this->pdf_model->get_allsap();
                if ($this->session->userdata('level')!="admin") {
                    $this->load->view('templates/header_user',$data);
                    $this->load->view('pdf/rps/index', $data);
                    $this->load->view('templates/footer_user');
                }
                elseif ($this->session->userdata('level')!="user") {
                    $this->load->view('templates/header',$data);
                    $this->load->view('pdf/rps/index', $data);
                    $this->load->view('templates/footer');
                }
                
        }
        else
        {
                $upload_data = $this->upload->data();
                $kode = $this->pdf_model->get_koderps($this->input->post('nama_matkul'));
                $new_kode='';
                foreach ($kode as $key ) {
                    $new_kode= $key->kode_matkul;
                }
                $data = array(
                    'kode_matkul' => $new_kode,
                    'nama_matkul' => $this->input->post('nama_matkul'),
                    'tingkat' => $this->input->post('level'),
                    'std_program' => $this->input->post('program'),
                    'file' => $upload_data['file_name'],
                    'upload_by' => $this->session->userdata('user')
                );
                if ($this->pdf_model->get_duplicaterps($new_kode) != null) {
                    $this->session->set_flashdata('uploadpdf', 'Error, Duplicated Entry. Please delete the previous file of the subject!');
                    redirect('pdf/rps','refresh');
                }
                $this->pdf_model->insertrps($data);
                $this->session->set_flashdata('uploadpdf', 'Your data is uploaded');
                redirect('pdf/rps','refresh');
                // $this->load->view('upload_success', $data);
        }
    }
    public function downloadrps($filename)
    {
        $this->load->helper('download');
        $file='uploads/rps/'.$filename;
        force_download($file,NULL);
    }

    public function deleterps($kode_matkul)
    {
        $file = $this->uri->segment(4);
        $nama_file = './uploads/rps/'.base64_decode($file);

        if (is_readable($nama_file) && unlink($nama_file)) {
            $this->pdf_model->deleterps(($kode_matkul));
            $this->session->set_flashdata('uploadpdf','Flie is deleted');
            redirect('pdf/rps','refresh');
        }
        else{
            $this->session->set_flashdata('uploadpdf','Failed to delete');
            redirect('pdf/rps','refresh');
        }
    }


// ========================================= SAP ++++++++++++++++++++++++++++++++++++++++++++++++++++

    public function sap()
    {
        $data['title']='SAP Control';
        $data['dropdown']=$this->project_model->subjects();
        $data['matkul']=$this->pdf_model->get_allsap();
        if ($this->session->userdata('level')!="admin") {
            $this->load->view('templates/header_user',$data);
            $this->load->view('pdf/sap/index', $data);
            $this->load->view('templates/footer_user');
        }
        elseif ($this->session->userdata('level')!="user") {
            $this->load->view('templates/header',$data);
            $this->load->view('pdf/sap/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function addsap()
    {
        // $nama_matkul=$this->input->post('nama_matkul');
        // $pdf = $_FILES['pdf']['name'];
        // $level = $this->input->post('level');
        // $program = $this->input->post('program');
        $config['upload_path']          = './uploads/sap/';
        $config['allowed_types']        = 'doc|pdf|docx';
        $config['max_size']             = 0;

        $this->load->library('upload', $config);
        // $this->form_validation->set_rules('kode_matkul', 'kode matkul', 'required');
        $this->form_validation->set_rules('nama_matkul', 'Subject Name', 'required');
        $this->form_validation->set_rules('program', 'Study Program', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');           

        if ( $this->form_validation->run()==FALSE || ! $this->upload->do_upload('pdf'))
        {
                $error = array('error' => $this->upload->display_errors());

                // $this->load->view('upload_form', $error);
                // $this->session->set_flashdata('uploadpdf', 'Failed to upload');
                $data['title']='SAP Control';
                $data['dropdown']=$this->project_model->subjects();
                $data['matkul']=$this->pdf_model->get_allsap();
                if ($this->session->userdata('level')!="admin") {
                    $this->load->view('templates/header_user',$data);
                    $this->load->view('pdf/sap/index', $data);
                    $this->load->view('templates/footer_user');
                }
                elseif ($this->session->userdata('level')!="user") {
                    $this->load->view('templates/header',$data);
                    $this->load->view('pdf/sap/index', $data);
                    $this->load->view('templates/footer');
                }
        }
        else
        {
                $upload_data = $this->upload->data();
                $kode = $this->pdf_model->get_kodesap($this->input->post('nama_matkul'));
                $new_kode='';
                foreach ($kode as $key ) {
                    $new_kode= $key->kode_matkul;
                }
                $data = array(
                    'kode_matkul' => $new_kode,
                    'nama_matkul' => $this->input->post('nama_matkul'),
                    'tingkat' => $this->input->post('level'),
                    'std_program' => $this->input->post('program'),
                    'file' => $upload_data['file_name'],
                    'upload_by' => $this->session->userdata('user')
                );
                if ($this->pdf_model->get_duplicatesap($new_kode) != null) {
                    $this->session->set_flashdata('uploadpdf', 'Error, Duplicated Entry. Please delete the previous file of the subject!');
                    redirect('pdf/sap','refresh');
                }
                $this->pdf_model->insertsap($data);
                $this->session->set_flashdata('uploadpdf', 'Your data is uploaded');
                redirect('pdf/sap','refresh');
                // $this->load->view('upload_success', $data);
        }
    }

    public function downloadsap($filename)
    {
        $this->load->helper('download');
        $file='uploads/sap/'.$filename;
        force_download($file,NULL);
    }

    public function deletesap($kode_matkul)
    {
        $file = $this->uri->segment(4);
        $nama_file = './uploads/sap/'.base64_decode($file);
        if (is_readable($nama_file) && unlink($nama_file)) {
            $this->pdf_model->deletesap($kode_matkul);
            $this->session->set_flashdata('uploadpdf','Flie is deleted');
            redirect('pdf/sap','refresh');
        }
        else{
            $this->session->set_flashdata('uploadpdf','Failed to delete');
            // redirect('pdf/sap','refresh');
            echo $nama_file;
        }
    }
}

/* End of file Pdf.php */

?>