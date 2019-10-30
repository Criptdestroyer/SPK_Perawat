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
        $this->load->model('kriteria_m');
        $this->load->model('rangking_m');

        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role']  = $this->session->userdata('id_role');
        if(!isset($this->data['username']) || $this->data['id_role'] != 1)
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

            if($this->POST('role') == 5 && $this->data['user']->role != 5){
                if($this->user_m->update($id,$data)){
                    $user = $this->user_m->get_row($data);
                    $this->perawat_m->insert(["id"=>$user->id, "nama"=>$user->nama]);
                    $perawat = $this->perawat_m->get_row("id=".$user->id);

                    $this->nilai_mengaji_m->insert(["id_perawat"=>$perawat->id_perawat]);
                    $this->nilai_sholat_m->insert(["id_perawat"=>$perawat->id_perawat]);
                    $this->nilai_tertulis_m->insert(["id_perawat"=>$perawat->id_perawat]);
                    $this->wawancara_m->insert(["id_perawat"=>$perawat->id_perawat]);
                    echo "<script>alert('User berhasil diedit');window.location = ".json_encode(site_url('Admin')).";</script>";
                    exit;
                }else{
                    echo "<script>alert('User gagal diedit');window.location = ".json_encode(site_url('Admin/editUser/'.$id)).";</script>";
                    exit;
                }
            }else{
                if($this->POST('role') == 4 && $this->data['user']->role != 4){
                    $perawat = $this->perawat_m->get_row("id=".$id);
                    $this->nilai_mengaji_m->delete_by("id_perawat=".$perawat->id_perawat);
                    $this->nilai_sholat_m->delete_by("id_perawat=".$perawat->id_perawat);
                    $this->nilai_tertulis_m->delete_by("id_perawat=".$perawat->id_perawat);
                    $this->wawancara_m->delete_by("id_perawat=".$perawat->id_perawat);
                    $this->sertifikat_m->delete_by("id_perawat=".$perawat->id_perawat);
                    $this->perawat_m->delete_by("id=".$id);
                    if($this->user_m->update($id, $data)){
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
            $this->wawancara_m->delete_by("id_perawat=".$perawat->id_perawat);
            $this->sertifikat_m->delete_by("id_perawat=".$perawat->id_perawat);
            $this->rangking_m->delete_by("id_perawat=".$perawat->id_perawat);
            $this->perawat_m->delete_by("id=".$id);
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

    public function updateNilaiMengaji($id)
    {
        $this->data['perawat'] = $this->nilai_mengaji_m->getDataJoinWhere(['perawat'],['perawat.id_perawat = nilai_mengaji.id_perawat'],"perawat.id_perawat=".$id);
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

    public function updateNilaiSholat($id)
    {
        $this->data['perawat'] = $this->nilai_sholat_m->getDataJoinWhere(['perawat'],['perawat.id_perawat = nilai_praktek_sholat.id_perawat'],"perawat.id_perawat=".$id);

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

    public function updateNilaiTertulis($id)
    {
        $this->data['perawat'] = $this->nilai_tertulis_m->getDataJoinWhere(['perawat'],['perawat.id_perawat = nilai_tertulis.id_perawat'],"perawat.id_perawat=".$id);

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

    public function hasilPerhitungan()
    {
        $this->data['title'] ='Admin | Hasil Perhitungan';
        $this->data['content'] = 'admin/hasilPerhitungan';
        $this->data['active'] = 5;
        $this->data['perawat'] = $this->perawat_m->getDataJoin(
            ['nilai_tertulis','nilai_mengaji','nilai_praktek_sholat', 'wawancara'],
            [
                'perawat.id_perawat = nilai_tertulis.id_perawat',
                'perawat.id_perawat = nilai_mengaji.id_perawat',
                'perawat.id_perawat = nilai_praktek_sholat.id_perawat',
                'perawat.id_perawat = wawancara.id_perawat'
                ]
        ); 

        $this->data['sertifikat'] = $this->sertifikat_m->getDataJoin(['perawat'],['sertifikat.id_perawat = perawat.id_perawat']);

        $this->load->view('admin/template/template', $this->data);
    }

    public function hitung()
    {

        $mengaji = $this->POST('mengaji');
        $sholat = $this->POST('sholat');
        $tertulis = $this->POST('tertulis');
        $wawancara = $this->POST('wawancara');
        $sertifikat = $this->POST('sertifikat');

        $mengaji2 = $this->POST('mengaji');
        $sholat2 = $this->POST('sholat');
        $tertulis2 = $this->POST('tertulis');
        $wawancara2 = $this->POST('wawancara');
        $sertifikat2 = $this->POST('sertifikat');

        sort($mengaji);
        sort($sholat);
        sort($tertulis);
        sort($wawancara);

        $qMengaji = (($mengaji[count($mengaji)-1] - $mengaji[0]) - ($mengaji[1] - $mengaji[0]));
        $tresholdMengaji = round($qMengaji - ($qMengaji/count($mengaji)), 3);
        // echo $tresholdMengaji."\n";
        
        $qSholat = (($sholat[count($sholat)-1] - $sholat[0]) - ($sholat[1] - $sholat[0]));
        $tresholdSholat = round($qSholat - ($qSholat/count($sholat)), 3);
        // echo $tresholdSholat."\n";
        
        $qTertulis = (($tertulis[count($tertulis)-1] - $tertulis[0]) - ($tertulis[1] - $tertulis[0]));
        $tresholdTertulis = round($qTertulis - ($qTertulis/count($tertulis)), 3);
        // echo $tresholdTertulis."\n";
        
        $qWawancara = (($wawancara[count($wawancara)-1] - $wawancara[0]) - ($wawancara[1] - $wawancara[0]));
        $tresholdWawancara = round($qWawancara - ($qWawancara/count($wawancara)), 3);
        // echo $tresholdWawancara."\n";

        $qSertifikat = (($sertifikat[count($sertifikat)-1] - $sertifikat[0]) - ($sertifikat[1] - $sertifikat[0]));
        $tresholdSertifikat = round($qSertifikat - ($qSertifikat/count($sertifikat)), 3);
        // echo $tresholdSertifikat."\n";

        $kriteria = [0.1, 0.1, 0.5, 0.05, 0.25];

        $preferensiMengaji;
        for($i=0; $i<count($mengaji2); $i++){
            for($j=0; $j<count($mengaji2); $j++){
                if($i != $j){
                    $dj = $mengaji2[$i] - $mengaji2[$j];
                    if(abs($dj) > $tresholdMengaji){
                        $preferensiMengaji[$i][$j] = round(1*$kriteria[0], 3);
                    }else{
                        $preferensiMengaji[$i][$j] =round(($dj/$tresholdMengaji)*$kriteria[0],3);
                    }
                }else{
                    $preferensiMengaji[$i][$j] = 0;
                }
            }
        }

        $preferensiSholat;
        for($i=0; $i<count($sholat2); $i++){
            for($j=0; $j<count($sholat2); $j++){
                if($i != $j){
                    $dj = $sholat2[$i] - $sholat2[$j];
                    if(abs($dj) > $tresholdSholat){
                        $preferensiSholat[$i][$j] = round(1*$kriteria[1],3);
                    }else{
                        $preferensiSholat[$i][$j] =round(($dj/$tresholdSholat)*$kriteria[1], 3);
                    }
                }else{
                    $preferensiSholat[$i][$j] = 0;
                }
            }
        }

        $preferensiTertulis;
        for($i=0; $i<count($tertulis2); $i++){
            for($j=0; $j<count($tertulis2); $j++){
                if($i != $j){
                    $dj = $tertulis2[$i] - $tertulis2[$j];
                    if(abs($dj) > $tresholdTertulis){
                        $preferensiTertulis[$i][$j] = round(1*$kriteria[2], 3);
                    }else{
                        $preferensiTertulis[$i][$j] = round(($dj/$tresholdTertulis)*$kriteria[2], 3);
                    }
                }else{
                    $preferensiTertulis[$i][$j] = 0;
                }
            }
        }

        $preferensiSertifikat;
        for($i=0; $i<count($sertifikat2); $i++){
            for($j=0; $j<count($sertifikat2); $j++){
                if($i != $j){
                    $dj = $sertifikat2[$i] - $sertifikat2[$j];
                    if(abs($dj) > $tresholdSertifikat){
                        $preferensiSertifikat[$i][$j] = round(1*$kriteria[3], 3);
                    }else{
                        $preferensiSertifikat[$i][$j] =round(($dj/$tresholdSertifikat)*$kriteria[3], 3);
                    }
                }else{
                    $preferensiSertifikat[$i][$j] = 0;
                }
            }
        }

        $preferensiWawancara;
        for($i=0; $i<count($wawancara2); $i++){
            for($j=0; $j<count($wawancara2); $j++){
                if($i != $j){
                    $dj = $wawancara2[$i] - $wawancara2[$j];
                    if(abs($dj) > $tresholdWawancara){
                        $preferensiWawancara[$i][$j] = round(1*$kriteria[4], 3);
                    }else{
                        $cek[$i][$j] = $tresholdWawancara;
                        $preferensiWawancara[$i][$j] =round(($dj/$tresholdWawancara)*$kriteria[4], 3);
                    }
                }else{
                    $preferensiWawancara[$i][$j] = 0;
                }
            }
        }
        
        $preferensiMultikriteria;
        for($i=0; $i<count($wawancara2); $i++){
            for($j=0; $j<count($wawancara2); $j++){
                if($i != $j){
                    $preferensiMultikriteria[$i][$j] = round((1/5)*($preferensiMengaji[$i][$j]+$preferensiSertifikat[$i][$j]+$preferensiSholat[$i][$j]+$preferensiTertulis[$i][$j]+$preferensiWawancara[$i][$j]), 3);
                }else{
                    $preferensiMultikriteria[$i][$j] = 0;
                }
            }
        }

        $id_perawat = $this->POST('id_perawat');
        $leavingFlow;
        $enteringFlow;
        $netFlow;

        for($i=0; $i<count($wawancara2); $i++){
            $leavingFlow[$i] = 0;
            $enteringFlow[$i] = 0;
            for($j=0; $j<count($wawancara2); $j++){
                $leavingFlow[$i] += round($preferensiMultikriteria[$i][$j], 3);
                $enteringFlow[$i] += round($preferensiMultikriteria[$j][$i], 3);
            }
        }
        
        for($i=0; $i<count($leavingFlow); $i++){
            $netFlow[$i] = round(((1/5) * $leavingFlow[$i]), 3) - round(((1/5) * $enteringFlow[$i]), 3);
        }
        
        //rank
        $loop = true;
        $i = 0;
        while($i < count($netFlow) && $loop){
            $loop = false;
            for($j = $i; $j<count($netFlow)-1; $j++){
                if($netFlow[$j] < $netFlow[$j+1])
                {
                    $temp = $netFlow[$j];
                    $netFlow[$j] = $netFlow[$j+1];
                    $netFlow[$j+1] = $temp;

                    $temp = $id_perawat[$j];
                    $id_perawat[$j] = $id_perawat[$j+1];
                    $id_perawat[$j+1] = $temp;

                    $temp = $leavingFlow[$j];
                    $leavingFlow[$j] = $leavingFlow[$j+1];
                    $leavingFlow[$j+1] = $temp;

                    $temp = $enteringFlow[$j];
                    $enteringFlow[$j] = $enteringFlow[$j+1];
                    $enteringFlow[$j+1] = $temp;
                    $loop = true;
                }
            }
        }

        // print_r($id_perawat);echo "<br>";
        // print_r($leavingFlow);echo "<br>";
        // print_r($enteringFlow);echo "<br>";
        // print_r($netFlow);echo "<br>";

        $result = $this->db->query("TRUNCATE TABLE rangking");
        for($i=0; $i<count($id_perawat); $i++){
            $data = [
                'no' => $i+1,
                'id_perawat' => $id_perawat[$i],
                'leaving_flow' => $leavingFlow[$i],
                'entering_flow' => $enteringFlow[$i],
                'net_flow' => $netFlow[$i] 
            ];

            $this->rangking_m->insert($data);
        }


        $this->data['title'] ='Admin | Rangking';
        $this->data['content'] = 'admin/rangking';
        $this->data['active'] = 5;
        $this->data['perawat'] = $this->rangking_m->getDataJoin(['perawat'],['perawat.id_perawat = rangking.id_perawat']);
        $this->load->view('admin/template/template', $this->data);
    }
}

/* End of file Admin.php */
