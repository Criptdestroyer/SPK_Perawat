<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role']  = $this->session->userdata('id_role');
        if(!isset($this->data['username']) || $this->data['id_role'] != 1)
        {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('id_role');
            echo "<script>alert('you must login first');window.location = ".json_encode(site_url('Login')).";</script>";
            exit;
        }
    }

    public function index()
    {
        $this->load->model("perawat_m");
        $this->data['title'] ='Admin | Dashboard';
        $this->data['content'] = 'admin/main';
        $this->data['active'] = 0;
        $this->data['perawat'] = $this->perawat_m->get();

        $this->load->view('admin/template/template', $this->data);
    }
}

/* End of file Admin.php */
