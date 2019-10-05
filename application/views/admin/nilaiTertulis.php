<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Nilai Tertulis</h2>
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
                            <th>Pengetahuan umum</th>
                            <th>Nama Penyakit</th>
                            <th>Kode Penyakit</th>
                            <th>Indikator Rumah Sakit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        foreach($perawat as $p){
                    ?>
                        <tr class="gradeX">
                            <td><?=$i++?></td>
                            <td><?=$p->nama?></td>
                            <td><?=$p->pengetahuan_umum?></td>
                            <td><?=$p->nama_penyakit?></td>
                            <td><?=$p->kode_penyakit?></td>
                            <td><?=$p->indikator_rumahsakit?></td>
                            <td>
                                <a class="btn btn-warning" href="<?=site_url("Admin/updateNilaiTertulis/".$p->id_perawat)?>">Update</a>
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
                            <th>Pengetahuan umum</th>
                            <th>Nama Penyakit</th>
                            <th>Kode Penyakit</th>
                            <th>Indikator Rumah Sakit</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>