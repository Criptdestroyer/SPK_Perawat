<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Selamat Datang <strong><?=$perawat->nama?></strong></h2>
                </div>
                
                <div class="col-lg-2">
                
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                <?php
                    if($timeline->status == 0){
                        $color = "#b3ffda";
                        $message = "Pendaftar diharapkan segera melengkapkan data dan sertifikat";
                    }else if($timeline->status == 1){
                        $color = "#ccffe6";
                        $message = "Sedang masa seleksi, silahkan tunggu sampai pengumuman diberitahukan";
                    }else{
                        if(isset($hasil)){
                            if($hasil->net_flow >= 0){
                                $color = "#00ff84";
                                $message = "Selamat anda lulus seleksi";
                            }else{
                                $color = "#ff704d";
                                $message = "Mohon maaf anda belum lulus seleksi";
                            }
                        }else{
                            $color = "yellow";
                            $message = "Hasil Perhitungan belum di publish. harap hubungin admin";
                        }
                    }
                ?>
                    <div class="ibox-content" style="background-color:<?=$color?>">
                        <?=$message?>
                    </div>
                </div>
            </div>
            </div>
        </div>