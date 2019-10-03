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
        $this->load->model("user_m");
        $this->data['title'] ='Admin | User';
        $this->data['content'] = 'admin/main';
        $this->data['active'] = 0;
        $this->data['user'] = $this->user_m->get();

        $this->load->view('admin/template/template', $this->data);
    }

    public function addUser()
    {
        if($this->POST('submit')){
            if($this->POST('username') && $this->POST('password')) {
                $this->load->model('user_m');
                $data = [
                    'nama' => $this->POST('nama'),
                    'username' => $this->POST('username'),
                    'email' => $this->POST('email'),
                    'password' => md5($this->POST('password')),
                    'role' => $this->POST('role')
                ];

                if($this->user_m->insert($data)){
                    $user = $this->user_m->get_row("nama='".$this->POST('nama')."' and username='".$this->POST('username')."' and email='".$this->POST('email')."' and password='".md5($this->POST('password'))."' and role=".$this->POST('role')); 
                    if($user->role == 4 || $user->role == 5){
                        $this->load->model('perawat_m');
                        if($this->perawat_m->insert(['id'=>$user->id, 'nama'=>$user->nama])){
                            echo "<script>alert('User berhasil ditambah');window.location = ".json_encode(site_url('Admin')).";</script>";
                            exit;
                        }else{
                            $this->user_m->delete($user->id); 
                            echo "<script>alert('User gagal ditambah');window.location = ".json_encode(site_url('Admin/addUser')).";</script>";
                            exit;
                        }
                    }else{
                        echo "<script>alert('User berhasil ditambah');window.location = ".json_encode(site_url('Admin')).";</script>";
                        exit;
                    }
                }else{
                    echo "<script>alert('User gagal ditambah');window.location = ".json_encode(site_url('Admin/addUser')).";</script>";
                    exit;
                }
            }
        }


        $this->data['title'] ='Admin | Add User';
        $this->data['content'] = 'admin/addUser';
        $this->data['active'] = 0;
    
        $this->load->view('admin/template/template', $this->data);
    }

    public function perawat()
    {
        $this->load->model("perawat_m");
        $this->data['title'] ='Admin | Perawat';
        $this->data['content'] = 'admin/perawat';
        $this->data['active'] = 1;
        $this->data['perawat'] = $this->perawat_m->get();

        $this->load->view('admin/template/template', $this->data);
    }
}

/* End of file Admin.php */
