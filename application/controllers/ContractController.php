<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ContractController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
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
        $data['title']='Project';
        $data['level']=$this->session->userdata('username');
        $this->load->view('templates/header',$data);
        // $this->project_model->tablename();
        $this->load->view('contract/contractmain');
        $this->load->view('templates/footer');
    }

}

/* End of file ContractController.php */

?>