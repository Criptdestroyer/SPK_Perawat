<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Hasil Perhitungan</h2>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content">

                        <div class="table-responsive">
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
                        foreach($perawat as $p){
                            $sert = 0;
                            foreach($sertifikat as $s){
                                if($s->id_perawat == $p->id_perawat){
                                    $sert++;
                                }
                            }
                    ?>
                        <tr class="gradeX">
                            <td><?=$i++?></td>
                            <td><?=$p->nama?></td>
                            <td><?=($p->ilmu_tajwid+$p->lapal)/2?></td>
                            <td><?=($p->niat+$p->bacaan_surat+$p->gerakan)/3?></td>
                            <td><?=($p->pengetahuan_umum+$p->nama_penyakit+$p->kode_penyakit+$p->indikator_rumahsakit)/4?></td>
                            <td><?=($p->b_inggris+$p->psikotes)/2?></td>
                            <td><?=$sert?></td>
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
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>