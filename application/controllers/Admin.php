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
                    echo "<script>alert('User gagal diedit');window.location = ".json_encode(site_url('Admin/editUser/'.$id)).";</script>";
                    exit;
                }
            }else{
                if($this->user_m->update($id, $data)){
                    echo "<script>alert('User berhasil diedit');window.location = ".json_encode(site_url('Admin')).";</script>";
                    exit;
                }else{
                    echo "<script>alert('User gagal diedit');window.location = ".json_encode(site_url('Admin/editUser/'.$id)).";</script>";
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

    public function updatePerawat($id)
    {
        $this->data['perawat'] = $this->perawat_m->get_row("id_perawat=".$id);

        if($this->POST("submit")){
            $data = [
                "nama" => $this->POST("nama"),
                "tanggal_lahir" => $this->POST("tanggal_lahir"),
                'alamat' => $this->POST('alamat'),
                'no_hp' => $this->POST('no_hp'),
                'jenis_kelamin' => $this->POST('jenis_kelamin')
            ];

            if($this->perawat_m->update($id, $data)){
                echo "<script>alert('Perawat berhasil diupdate');window.location = ".json_encode(site_url('Admin/perawat')).";</script>";
                exit;
            }else{
                echo "<script>alert('Perawat gagal diupdate');window.location = ".json_encode(site_url('Admin/updatePerawat/'.$id)).";</script>";
                exit;
            }
        }

        $this->data['title'] ='Admin | Update Perawat';
        $this->data['content'] = 'admin/updatePerawat';
        $this->data['active'] = 1;
        
        $this->load->view('admin/template/template', $this->data);
    }

    public function nilaiMengaji()
    {
        $this->data['title'] ='Admin | Nilai Mengaji';
        $this->data['content'] = 'admin/nilaiMengaji';
        $this->data['active'] = 2;
        $this->data['perawat'] = $this->nilai_mengaji_m->getDataJoin(['perawat'],['perawat.id_perawat = nilai_mengaji.id_perawat']);

        $this->load->view('admin/template/template', $this->data);
    }

    public function updateNilaiMengaji($id){
        $this->data['perawat'] = $this->nilai_mengaji_m->getDataJoinWhere(['perawat'],['perawat.id_perawat = nilai_mengaji.id_perawat'],"id_perawat=".$id);

        if($this->POST("submit")){
            $data = [
                'ilmu_tajwid'=>$this->POST('ilmu_tajwid'),
                'lapal'=>$this->POST('lapal')
            ];

            if($this->nilai_mengaji_m->update_where("id_perawat=".$id, $data)){
                echo "<script>alert('Nilai Mengaji berhasil diupdate');window.location = ".json_encode(site_url('Admin/nilaiMengaji')).";</script>";
                exit;
            }else{
                echo "<script>alert('Nilai Mengaji gagal diupdate');window.location = ".json_encode(site_url('Admin/updateNilaiMengaji/'.$id)).";</script>";
                exit;
            }
        }

        $this->data['title'] ='Admin | Update Nilai Mengaji';
        $this->data['content'] = 'admin/updateNilaiMengaji';
        $this->data['active'] = 2;
        $this->load->view('admin/template/template', $this->data);
    }

    public function nilaiSholat()
    {
        $this->data['title'] ='Admin | Nilai Praktik Sholat';
        $this->data['content'] = 'admin/nilaiSholat';
        $this->data['active'] = 3;
        $this->data['perawat'] = $this->nilai_sholat_m->getDataJoin(['perawat'],['perawat.id_perawat = nilai_praktek_sholat.id_perawat']);

        $this->load->view('admin/template/template', $this->data);
    }

    public function updateNilaiSholat($id){
        $this->data['perawat'] = $this->nilai_sholat_m->getDataJoinWhere(['perawat'],['perawat.id_perawat = nilai_praktek_sholat.id_perawat'],"id_perawat=".$id);

        if($this->POST("submit")){
            $data = [
                'niat'=>$this->POST('niat'),
                'bacaan_surat'=>$this->POST('bacaan_surat'),
                'gerakan'=>$this->POST('gerakan')
            ];

            if($this->nilai_sholat_m->update_where("id_perawat=".$id, $data)){
                echo "<script>alert('Nilai Praktek Sholat berhasil diupdate');window.location = ".json_encode(site_url('Admin/nilaiSholat')).";</script>";
                exit;
            }else{
                echo "<script>alert('Nilai Praktek Sholat gagal diupdate');window.location = ".json_encode(site_url('Admin/updateNilaiSholat/'.$id)).";</script>";
                exit;
            }
        }

        $this->data['title'] ='Admin | Update Nilai Praktek Sholat';
        $this->data['content'] = 'admin/updateNilaiSholat';
        $this->data['active'] = 3;
        $this->load->view('admin/template/template', $this->data);
    }

    public function nilaiTertulis()
    {
        $this->data['title'] ='Admin | Nilai Tertulis';
        $this->data['content'] = 'admin/nilaiTertulis';
        $this->data['active'] = 4;
        $this->data['perawat'] = $this->nilai_tertulis_m->getDataJoin(['perawat'],['perawat.id_perawat = nilai_tertulis.id_perawat']);

        $this->load->view('admin/template/template', $this->data);
    }

    public function updateNilaiTertulis($id){
        $this->data['perawat'] = $this->nilai_tertulis_m->getDataJoinWhere(['perawat'],['perawat.id_perawat = nilai_tertulis.id_perawat'],"id_perawat=".$id);

        if($this->POST("submit")){
            $data = [
                'pengetahuan_umum'=>$this->POST('pengetahuan_umum'),
                'nama_penyakit'=>$this->POST('nama_penyakit'),
                'kode_penyakit'=>$this->POST('kode_penyakit'),
                'indikator_rumahsakit'=>$this->POST('indikator_rumahsakit')
            ];

            if($this->nilai_tertulis_m->update_where("id_perawat=".$id, $data)){
                echo "<script>alert('Nilai Tertulis berhasil diupdate');window.location = ".json_encode(site_url('Admin/nilaiTertulis')).";</script>";
                exit;
            }else{
                echo "<script>alert('Nilai Tertulis gagal diupdate');window.location = ".json_encode(site_url('Admin/updateNilaiTertulis/'.$id)).";</script>";
                exit;
            }
        }

        $this->data['title'] ='Admin | Update Nilai Tertulis';
        $this->data['content'] = 'admin/updateNilaiTertulis';
        $this->data['active'] = 4;
        $this->load->view('admin/template/template', $this->data);
    }
}

/* End of file Admin.php */
