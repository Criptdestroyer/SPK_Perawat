<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_m');
        $this->load->model('perawat_m');
        $this->load->model('nilai_mengaji_m');
        $this->load->model('nilai_sholat_m');
        $this->load->model('nilai_tertulis_m');
        $this->load->model('sertifikat_m');
        $this->load->model('wawancara_m');
        $this->load->model('kriteria_m');
        $this->load->model('rangking_m');

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
            }
            exit;
        }
    }
    public function index()
    {
        if($this->POST('submit')){
            if($this->POST('username') && $this->POST('password')) {
                $data = [
                    'nama' => $this->POST('name'),
                    'username' => $this->POST('username'),
                    'email' => $this->POST('email'),
                    'password' => md5($this->POST('password')),
                    'role' => 4
                ];

                $cek = $this->user_m->get_num_row("username='".$this->POST('username')."' or email='".$this->POST('email')."'");

                if($cek <= 0){
                    if($this->user_m->insert($data)){
                        $user = $this->user_m->get_row($data);
                        $ijazah = $this->uploadFile("ijazah_".$user->id, 'Admin/img', 'ijazah');

                        $this->perawat_m->insert(["id"=>$user->id, "nama"=>$user->nama, "no_hp"=>$this->POST('nohp'), "ijazah"=>$ijazah]);
                        $perawat = $this->perawat_m->get_row("id=".$user->id);
    
                        $this->nilai_mengaji_m->insert(["id_perawat"=>$perawat->id_perawat]);
                        $this->nilai_sholat_m->insert(["id_perawat"=>$perawat->id_perawat]);
                        $this->nilai_tertulis_m->insert(["id_perawat"=>$perawat->id_perawat]);
                        $this->wawancara_m->insert(["id_perawat"=>$perawat->id_perawat]);
                        echo "<script>alert('Pendaftaran Berhasil');window.location = ".json_encode(site_url('Login')).";</script>";
                        exit;
                    }else{
                        echo "<script>alert('Pendaftaran Gagal');window.location = ".json_encode(site_url('Register')).";</script>";
                        exit;
                    }
                }else{
                    echo "<script>alert('Username atau Email telah digunakan');window.location = ".json_encode(site_url('Register')).";</script>";
                    exit;
                }
                
            }
        }
        
        $this->data['title'] = 'Register | SPK Perawat';
        $this->load->view('register', $this->data);
    }

}
/* End of file Controllername.php */
