<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {
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
                    redirect('pewancara');
                    break;
                case 4:
                    redirect('perawat');
            }
            exit;
        }
    }
    public function index()
    {
        if($this->POST('submit')){
            if($this->POST('username') && $this->POST('password')) {
                $this->load->model('user_m');
                $data = [
                    'nama' => $this->POST('name'),
                    'username' => $this->POST('username'),
                    'email' => $this->POST('email'),
                    'password' => md5($this->POST('password')),
                    'role' => 4
                ];

                if($this->user_m->insert($data)){
                    $user = $this->user_m->get_row("nama='".$this->POST('name')."' and username='".$this->POST('username')."' and email='".$this->POST('email')."' and password='".md5($this->POST('password'))."' and role=4"); 
                    $this->load->model('perawat_m');
                    if($this->perawat_m->insert(['id'=>$user->id, 'nama'=>$user->nama])){
                        echo "<script>alert('Pendaftaran Berhasil');window.location = ".json_encode(site_url('Login')).";</script>";
                        exit;
                    }else{
                        $this->user_m->delete($user->id); 
                        echo "<script>alert('Pendaftaran Gagal');window.location = ".json_encode(site_url('Register')).";</script>";
                        exit;
                    }
                }else{
                    echo "<script>alert('Pendaftaran Gagal');window.location = ".json_encode(site_url('Register')).";</script>";
                    exit;
                }
            }
        }
        
        $this->data['title'] = 'Register | SPK Perawat';
        $this->load->view('register', $this->data);
    }

}
/* End of file Controllername.php */
