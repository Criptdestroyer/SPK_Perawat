<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Hasil Perhitungan</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content">

                        <div class="table-responsive">
                <form action="<?=site_url("Admin/hitung")?>" method="POST">
                
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nilai Mengaji</th>
                            <th>Nilai Praktik Sholat</th>
                            <th>Nilai Tertulis</th>
                            <th>Wawancara</th>
                            <th>Sertifikat</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        $j = 0;
                        foreach($perawat as $p){
                            $sert = 0;
                            foreach($sertifikat as $s){
                                if($s->id_perawat == $p->id_perawat){
                                    $sert++;
                                }
                            }

                            $mengaji = ($p->ilmu_tajwid+$p->lapal)/2;
                            $sholat = ($p->niat+$p->bacaan_surat+$p->gerakan)/3;
                            $tertulis = ($p->pengetahuan_umum+$p->nama_penyakit+$p->kode_penyakit+$p->indikator_rumahsakit)/4;
                            $wawancara = ($p->b_inggris+$p->psikotes)/2;
                    ?>
                        <tr class="gradeX">
                            <td><?=$i++?></td>
                            <td><?=$p->nama?></td>
                            <td>
                                <input type="hidden" name="id_perawat[]" value="<?=$p->id_perawat?>">
                                <input type="hidden" name="mengaji[]" value="<?=$mengaji?>">
                                <?=$mengaji?>
                            </td>
                            <td>
                                <input type="hidden" name="sholat[]" value="<?=$sholat?>">
                                <?=$sholat?>
                            </td>
                            <td>
                                <input type="hidden" name="tertulis[]" value="<?=$tertulis?>">
                                <?=$tertulis?>
                            </td>
                            <td>
                                <input type="hidden" name="wawancara[]" value="<?=$wawancara?>">
                                <?=$wawancara?>
                            </td>
                            <td>
                                <input type="hidden" name="sertifikat[]" value="<?=$sert?>">
                                <?=$sert?>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>No</th>
                            <th>Nama</th>
                            <th>Nilai Mengaji</th>
                            <th>Nilai Praktik Sholat</th>
                            <th>Nilai Tertulis</th>
                            <th>Wawancara</th>
                            <th>Sertifikat</th>
                        </tr>
                    </tfoot>
                    </table>
                    <button class="btn btn-primary btn-sm" type="submit" name="submit" value="submit">Hitung</button>
                    </form>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>