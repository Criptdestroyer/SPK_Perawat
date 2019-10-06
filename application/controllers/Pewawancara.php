<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pewawancara extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('wawancara_m');

        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role']  = $this->session->userdata('id_role');
        if(!isset($this->data['username']) || $this->data['id_role'] != 3)
        {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('id_role');
            echo "<script>alert('you must login first');window.location = ".json_encode(site_url('Login')).";</script>";
            exit;
        }
    }

    public function index()
    {
        $this->data['title'] ='Pewawancara | Nilai Wawancara';
        $this->data['content'] = 'pewawancara/main';
        $this->data['active'] = 0;
        $this->data['perawat'] = $this->wawancara_m->getDataJoin(['perawat'],['perawat.id_perawat = wawancara.id_perawat']);

        $this->load->view('pewawancara/template/template', $this->data);
    }

    public function updateNilaiWawancara($id)
    {
        $this->data['perawat'] = $this->wawancara_m->getDataJoinWhere(['perawat'],['perawat.id_perawat = wawancara.id_perawat'],"perawat.id_perawat=".$id);

        if($this->POST("submit")){
            $data = [
                'b_inggris'=>$this->POST('b_inggris'),
                'psikotes'=>$this->POST('psikotes')
            ];

            if($this->wawancara_m->update_where("id_perawat=".$id, $data)){
                echo "<script>alert('Nilai Wawancara berhasil diupdate');window.location = ".json_encode(site_url('Pewawancara')).";</script>";
                exit;
            }else{
                echo "<script>alert('Nilai Wawancara gagal diupdate');window.location = ".json_encode(site_url('Pewawancara/updateNilaiWawancara/'.$id)).";</script>";
                exit;
            }
        }

        $this->data['title'] ='Update | Update Nilai Wawancara';
        $this->data['content'] = 'pewawancara/updateNilaiWawancara';
        $this->data['active'] = 0;
        $this->load->view('admin/template/template', $this->data);
    }
}

/* End of file Admin.php */
