<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ContractController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('contract_model');
        $this->load->model('project_model');
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->database();
        if ($this->session->userdata('level')==null) {
            redirect('login','refresh');
        }
    }

    public function index()
    {
        $data['title']='Subjects of Contract';
        $data['subjects']= $this->project_model->subjects();
        if ($this->session->userdata('level')=='admin') {
            $this->load->view('templates/header',$data);
        }
        else{
            $this->load->view('templates/header_user',$data);
        }
        // $this->project_model->tablename();
        $this->load->view('contract/contractmain');
        $this->load->view('templates/footer');
    }

    public function contractform()
    {
        // $user= $this->session->userdata('username');
        $data['subjectid'] = $this->uri->segment(3);
        $data['subjectname'] = $this->uri->segment(4);
        $data['prodi'] = $this->uri->segment(5);
        $data['tingkat'] = $this->uri->segment(6);
        $data['user'] =$this->session->userdata('user');
        $data['title']='Contract Form';
        $data['subjects']= $this->project_model->subjects();
        if ($this->session->userdata('level')=='admin') {
            $this->load->view('templates/header',$data);
        }
        else{
            $this->load->view('templates/header_user',$data);
        }
        // $this->project_model->tablename();
        $this->load->view('contract/contractform');
        $this->load->view('templates/footer');
    }

    public function contractimport()
    {
        if (isset($_POST['submit'])) {
            $subjectid = $this->input->post('subjectid');
            $prodi = $this->input->post('prodi');
            $subjectname = $this->input->post('subjectname');
            $user = $this->input->post('user');
            $tingkat = $this->input->post('tingkat');

            $this->db->where('kode_matkul',$subjectid);
            $this->db->where('prodi',$prodi);
            $this->db->where('username',$user);
            $this->db->where('tingkat',$tingkat);
            $this->db->delete('contracts');

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
                            'minggu' => $data[0],
                            'tanggal' => $data[1],
                            'bahasan' => $data[2],
                            'metode' => $data[3],
                            'username' => $user,
                            'kode_matkul' => $subjectid,
                            'prodi' => $prodi,
                            'tingkat' => $tingkat,
                        );
                        $this->db->insert('contracts',$stuff);
                    }
                }
                $this->session->set_flashdata('import', '<div class="alert alert-success" style="text-align: center;"><h4>Import data success</h4></div>');
                redirect('contractcontroller/mycontractlist','refresh');
            }
            else{
                $this->session->set_flashdata('import', '<div class="alert alert-danger" style="text-align: center;"><h4>Import data failed</h4></div>');
                redirect('contractcontroller/mycontractlist','refresh');
            }
        }
    }

    public function mycontractlist()
    {
        $data['list'] = $this->contract_model->getmycontract($this->session->userdata('user'));
        $data['title']='Lecturer Contract List';
        $data['contracts']=array();
        $this->load->view('templates/header_user',$data);
        foreach($data['list'] as $key => $value){
            // echo $value->kode_matkul;
            $data['contracts']= $this->contract_model->getmycontractlist($this->session->userdata('user'), $value->kode_matkul);
        }
        // $this->project_model->tablename();
        $this->load->view('contract/contractlist',$data);
        $this->load->view('templates/footer_user');
    }

    public function allcontract()
    {
        $data['list'] = $this->contract_model->getallcontract();
        $data['title']='All Contract List';
        $data['contracts'][]=array();
        $i=0;
        $this->load->view('templates/header',$data);
        foreach($data['list'] as $key => $value){
            // echo $value->kode_matkul;
            $data['contracts'][$i]= $this->contract_model->getcontractadmin($this->session->userdata('user'), $value->kode_matkul);
            $i++;
        }
        // var_dump($data['contracts']);
        $this->load->view('contract/contractall',$data);
        $this->load->view('templates/footer_user');
    }

    public function getmycontract()
    {
        $data['subjectname'] = base64_decode($this->uri->segment(3));
        $data['subjectid'] = $this->uri->segment(4);
        $data['prodi'] = $this->uri->segment(5);
        $data['level'] = $this->uri->segment(6);
        $data['contract'] = $this->contract_model->getlecturercontract($this->session->userdata('user'), $data['subjectid']);
        $data['title']='Lecturer Contract';
        $this->load->view('templates/header_user', $data);
        $this->load->view('contract/contractcontent', $data);
        $this->load->view('templates/footer');
    }

    public function downloadcontract()
    {
        $data['subjectname'] = $this->uri->segment(3);
        $data['subjectid'] = $this->uri->segment(4);
        $data['prodi'] = $this->uri->segment(5);
        $data['tingkat'] = $this->uri->segment(6);
        $data['user'] =$this->session->userdata('user');
        $data['contract']=$this->contract_model->exportcontract($data['subjectid'], $data['prodi'], $data['user'], $data['tingkat']);
        $this->load->view('contract/contractdownload', $data);
    }

    public function deletecontract()
    {
        $data['subjectname'] = $this->uri->segment(3);
        $data['subjectid'] = $this->uri->segment(4);
        $data['prodi'] = $this->uri->segment(5);
        $data['tingkat'] = $this->uri->segment(6);
        $data['user'] =$this->session->userdata('user');
        $this->contract_model->deletecontract($data['subjectid'], $data['prodi'], $data['user'], $data['tingkat']);
        redirect('contractcontroller/mycontractlist');
    }

    public function getadmincontract()
    {
        $data['subjectname'] = base64_decode($this->uri->segment(3));
        $data['subjectid'] = $this->uri->segment(4);
        $data['prodi'] = $this->uri->segment(5);
        $data['level'] = $this->uri->segment(6);
        $data['user'] = $this->uri->segment(7);
        $data['contract'] = $this->contract_model->getlecturercontract($data['user'], $data['subjectid']);
        $data['title']='Lecturer Contract';
        $this->load->view('templates/header', $data);
        $this->load->view('contract/contractcontent', $data);
        $this->load->view('templates/footer');
    }

    public function deleteadmincontract()
    {
        $data['subjectname'] = $this->uri->segment(3);
        $data['subjectid'] = $this->uri->segment(4);
        $data['prodi'] = $this->uri->segment(5);
        $data['tingkat'] = $this->uri->segment(6);
        $data['user'] = $this->uri->segment(7);
        $this->contract_model->deletecontract($data['subjectid'], $data['prodi'], $data['user'], $data['tingkat']);
        redirect('contractcontroller/allcontract');
    }

    public function downloadadmincontract()
    {
        $data['subjectname'] = $this->uri->segment(3);
        $data['subjectid'] = $this->uri->segment(4);
        $data['prodi'] = $this->uri->segment(5);
        $data['tingkat'] = $this->uri->segment(6);
        $data['user'] = $this->uri->segment(7);
        $data['contract']=$this->contract_model->exportcontract($data['subjectid'], $data['prodi'], $data['user'], $data['tingkat']);
        $this->load->view('contract/contractdownload', $data);
    }

}

/* End of file ContractController.php */

?>