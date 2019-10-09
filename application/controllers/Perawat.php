<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawat extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('perawat_m');
        $this->load->model('sertifikat_m');

        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role']  = $this->session->userdata('id_role');
        if(!isset($this->data['username']) || $this->data['id_role'] != 5)
        {
            if($this->data['id_role'] == 4){
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('id_role');
                $this->session->unset_userdata('id');
                echo "<script>alert('Anda belum tervalidasi oleh admin. silahkan coba login beberapa saat lagi');window.location = ".json_encode(site_url('Login')).";</script>";
                exit;
            }else{
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('id_role');
                $this->session->unset_userdata('id');
                echo "<script>alert('you must login first');window.location = ".json_encode(site_url('Login')).";</script>";
                exit;
            }
        }
    }

    public function index()
    {
        $this->data['title'] ='Perawat | Data Perawat';
        $this->data['content'] = 'perawat/main';
        $this->data['active'] = 0;
        $this->data['perawat'] = $this->perawat_m->get_row("id=".$this->session->userdata('id'));

        $this->load->view('perawat/template/template', $this->data);
    }

    public function updatePerawat()
    {
        $id = $this->session->userdata('id');
        $this->data['perawat'] = $this->perawat_m->get_row("id=".$id);

        if($this->POST("submit")){
            $data = [
                "nama" => $this->POST("nama"),
                "tanggal_lahir" => $this->POST("tanggal_lahir"),
                'alamat' => $this->POST('alamat'),
                'no_hp' => $this->POST('no_hp'),
                'jenis_kelamin' => $this->POST('jenis_kelamin')
            ];

            if($this->perawat_m->update_where("id=".$id, $data)){
                echo "<script>alert('Data berhasil diupdate');window.location = ".json_encode(site_url('Perawat/updatePerawat')).";</script>";
                exit;
            }else{
                echo "<script>alert('Data gagal diupdate');window.location = ".json_encode(site_url('Perawat/updatePerawat')).";</script>";
                exit;
            }
        }

        $this->data['title'] ='Perawat | Update Data';
        $this->data['content'] = 'perawat/updatePerawat';
        $this->data['active'] = 1;
        
        $this->load->view('perawat/template/template', $this->data);
    }

    public function sertifikat()
    {
        $user = $this->perawat_m->get_row("id=".$this->session->userdata('id'));
        $this->data['sertifikat'] = $this->sertifikat_m->getDataJoin(['perawat'], ['perawat.id_perawat = sertifikat.id_perawat'],"sertifikat.id_perawat=".$user->id_perawat);

        $this->data['title'] ='Perawat | Sertifikat';
        $this->data['content'] = 'perawat/sertifikat';
        $this->data['active'] = 2;
        
        $this->load->view('perawat/template/template', $this->data);
    }

    public function addSertifikat()
    {
        $user = $this->perawat_m->get_row("id=".$this->session->userdata('id'));

        if($this->POST('submit'))
        {
            $sertifikat = $this->uploadFile($this->POST('nama_sertifikat'), 'Admin/img', 'sertifikat');

            $data = array(
                'id_perawat' => $user->id_perawat,
                'nama_sertifikat' => $this->POST('nama_sertifikat'),
                'sertifikat' => $sertifikat,
            );

            if($this->sertifikat_m->insert($data)){
                echo "<script>alert('Sertifikat berhasil ditambah');window.location = ".json_encode(site_url('Perawat/sertifikat')).";</script>";
                exit;
            }else{
                echo "<script>alert('Sertifikat gagal ditambah');window.location = ".json_encode(site_url('Perawat/addSertifikat')).";</script>";
                exit;
            }
        }

        $this->data['content'] = 'perawat/addSertifikat';
        $this->data['title'] = 'Perawat | Add Sertifikat';
        $this->data['active'] = 2;
        $this->load->view('perawat/template/template',$this->data);
    }

    public function updateSertifikat($id)
    {
        $sertifikat = $this->sertifikat_m->get_row("id_sertifikat=".$id);
        $this->data['sertifikat'] = $sertifikat;

        if($this->POST('submit'))
        {
            if($_FILES['sertifikat']['size'] == 0){
                $sertifikat = $this->POST('temp_sertifikat');
            }else{
                $sertifikat = $this->uploadFile($this->POST('nama_sertifikat'), 'Admin/img', 'sertifikat');
                unlink("assets/Admin/img/".$this->POST('temp_sertifikat'));
            }
            
            $data = array(
                'nama_sertifikat' => $this->POST('nama_sertifikat'),
                'sertifikat' => $sertifikat,
            );

            if($this->sertifikat_m->update($id, $data)){
                echo "<script>alert('Sertifikat berhasil diupdate');window.location = ".json_encode(site_url('Perawat/sertifikat')).";</script>";
                exit;
            }else{
                echo "<script>alert('Sertifikat gagal diupdate');window.location = ".json_encode(site_url('Perawat/addSertifikat')).";</script>";
                exit;
            }
        }

        $this->data['content'] = 'perawat/updateSertifikat';
        $this->data['title'] = 'Perawat | Update Sertifikat';
        $this->data['active'] = 2;
        $this->load->view('perawat/template/template',$this->data);
    }

    public function deleteSertifikat($id)
    {
        $sertifikat = $this->sertifikat_m->get_row("id_sertifikat=".$id);
        if($this->sertifikat_m->delete($id)){
            unlink("assets/Admin/img/".$sertifikat->sertifikat);
            echo "<script>alert('Sertifikat berhasil dihapus');window.location = ".json_encode(site_url('Perawat/sertifikat')).";</script>";
            exit;
        }else{
            echo "<script>alert('Sertifikat gagal dihapus');window.location = ".json_encode(site_url('Perawat/sertifikat')).";</script>";
            exit;
        }
    }
}

/* End of file Admin.php */
