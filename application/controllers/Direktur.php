<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direktur extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('rangking_m');

        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role']  = $this->session->userdata('id_role');
        if(!isset($this->data['username']) || $this->data['id_role'] != 2)
        {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('id_role');
            $this->session->unset_userdata('id');
            echo "<script>alert('you must login first');window.location = ".json_encode(site_url('Login')).";</script>";
            exit;
        }
    }

    public function index()
    {
        $this->data['title'] ='Direktur | Hasil Rangking';
        $this->data['content'] = 'direktur/main';
        $this->data['active'] = 0;
        $this->data['perawat'] = $this->rangking_m->getDataJoin(['perawat'],['perawat.id_perawat = rangking.id_perawat']);

        $this->load->view('direktur/template/template', $this->data);
    }
}

/* End of file Admin.php */
