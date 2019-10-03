<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    
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
                $data = [
                    'nama' => $this->POST('nama'),
                    'username' => $this->POST('username'),
                    'email' => $this->POST('email'),
                    'password' => md5($this->POST('password')),
                    'role' => $this->POST('role')
                ];

                if($this->POST('role') == 5){
                    if($this->user_m->insert($data)){
                        $user = $this->user_m->get_row($data);
                        $this->perawat_m->insert(["id"=>$user->id, "nama"=>$user->nama]);
                        $perawat = $this->perawat_m->get_row("id=".$user->id);

                        $this->nilai_mengaji_m->insert(["id_perawat"=>$perawat->id_perawat]);
                        $this->nilai_sholat_m->insert(["id_perawat"=>$perawat->id_perawat]);
                        $this->nilai_tertulis_m->insert(["id_perawat"=>$perawat->id_perawat]);
                        $this->sertifikat_m->insert(["id_perawat"=>$perawat->id_perawat]);
                        $this->wawancara_m->insert(["id_perawat"=>$perawat->id_perawat]);
                        echo "<script>alert('User berhasil ditambah');window.location = ".json_encode(site_url('Admin')).";</script>";
                        exit;
                    }else{
                        echo "<script>alert('User gagal ditambah');window.location = ".json_encode(site_url('Admin/addUser')).";</script>";
                        exit;
                    }
                }else{
                    if($this->user_m->insert($data)){
                        echo "<script>alert('User berhasil ditambah');window.location = ".json_encode(site_url('Admin')).";</script>";
                        exit;
                    }else{
                        echo "<script>alert('User gagal ditambah');window.location = ".json_encode(site_url('Admin/addUser')).";</script>";
                        exit;
                    }
                }
            }
        }


        $this->data['title'] ='Admin | Add User';
        $this->data['content'] = 'admin/addUser';
        $this->data['active'] = 0;
    
        $this->load->view('admin/template/template', $this->data);
    }

    public function editUser($id){
        $this->data['user'] = $this->user_m->get_row("id=".$id);
        if($this->POST('submit')){
            $data = [
                'nama' => $this->POST('nama'),
                'username' => $this->POST('username'),
                'email' => $this->POST('email'),
                'role' => $this->POST('role')
            ];

            if($this->POST('role') == 5){
                if($this->user_m->update($id,$data)){
                    $user = $this->user_m->get_row($data);
                    $this->perawat_m->insert(["id"=>$user->id, "nama"=>$user->nama]);
                    $perawat = $this->perawat_m->get_row("id=".$user->id);

                    $this->nilai_mengaji_m->insert(["id_perawat"=>$perawat->id_perawat]);
                    $this->nilai_sholat_m->insert(["id_perawat"=>$perawat->id_perawat]);
                    $this->nilai_tertulis_m->insert(["id_perawat"=>$perawat->id_perawat]);
                    $this->sertifikat_m->insert(["id_perawat"=>$perawat->id_perawat]);
                    $this->wawancara_m->insert(["id_perawat"=>$perawat->id_perawat]);
                    echo "<script>alert('User berhasil diedit');window.location = ".json_encode(site_url('Admin')).";</script>";
                    exit;
                }else{
                    echo "<script>alert('User gagal diedit');window.location = ".json_encode(site_url('Admin/addUser')).";</script>";
                    exit;
                }
            }else{
                if($this->user_m->update($id, $data)){
                    echo "<script>alert('User berhasil diedit');window.location = ".json_encode(site_url('Admin')).";</script>";
                    exit;
                }else{
                    echo "<script>alert('User gagal diedit');window.location = ".json_encode(site_url('Admin/addUser')).";</script>";
                    exit;
                }
            }

        }
        $this->data['title'] = 'Admin | Edit User';
        $this->data['content'] = 'admin/editUser';
        $this->data['active'] = 0;

        $this->load->view('admin/template/template', $this->data);
    }

    public function deleteUser($id)
    {
        $user = $this->user_m->get_row("id=".$id);
        if($user->role == 5){
            $perawat = $this->perawat_m->get_row("id=".$id);
            $this->nilai_mengaji_m->delete_by("id_perawat=".$perawat->id_perawat);
            $this->nilai_sholat_m->delete_by("id_perawat=".$perawat->id_perawat);
            $this->nilai_tertulis_m->delete_by("id_perawat=".$perawat->id_perawat);
            $this->sertifikat_m->delete_by("id_perawat=".$perawat->id_perawat);
            $this->wawancara_m->delete_by("id_perawat=".$perawat->id_perawat);
            $this->perawat_m->delete($perawat->id_perawat);
            if($this->user_m->delete($id)){
                echo "<script>alert('User berhasil dihapus');window.location = ".json_encode(site_url('Admin')).";</script>";
                exit;
            }else{
                echo "<script>alert('User gagal dihapus');window.location = ".json_encode(site_url('Admin')).";</script>";
                exit;
            }
        }else{
            if($this->user_m->delete($id)){
                echo "<script>alert('User berhasil dihapus');window.location = ".json_encode(site_url('Admin')).";</script>";
                exit;
            }else{
                echo "<script>alert('User gagal dihapus');window.location = ".json_encode(site_url('Admin')).";</script>";
                exit;
            }
        }
    }

    public function perawat()
    {
        $this->data['title'] ='Admin | Perawat';
        $this->data['content'] = 'admin/perawat';
        $this->data['active'] = 1;
        $this->data['perawat'] = $this->perawat_m->get();

        $this->load->view('admin/template/template', $this->data);
    }
}

/* End of file Admin.php */
