<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role']  = $this->session->userdata('id_role');
        if (isset($this->data['username'], $this->data['id_role']))
        {
            switch ($this->data['id_role'])
            {
                case 1:
                    redirect('admin');
                    break;
                case 2:
                    redirect('direktur');
                    break;
                case 3:
                    redirect('pewawancara');
                    break;
                case 4:
                    redirect('perawat');
                case 5:
                    redirect('perawat');
            }
            exit;
        }
    }
    public function index()
    {
        if($this->post('submit')){
            if($this->POST('username') && $this->POST('password')) {
                $this->load->model('user_m');
                if($this->user_m->cek_login(array('username' => $this->POST('username'), 'password' => $this->POST('password')))) {
                    redirect('Login');
                    exit;
                } else {
                    echo "<script>alert('Username/password salah!');window.location = ".json_encode(site_url('Login')).";</script>";
                    exit;
                }
            }
        }
        
        $this->data['title'] = 'Login | SPK Perawat';
        $this->load->view('login', $this->data);
    }
}