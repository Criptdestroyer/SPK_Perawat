<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Nilai Wawancara</h2>
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
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Bahasa Inggris</th>
                            <th>Psikotes</th>
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
                            <td><?=$p->b_inggris?></td>
                            <td><?=$p->psikotes?></td>
                            <td>
                                <a class="btn btn-warning" href="<?=site_url('Pewawancara/updateNilaiWawancara/'.$p->id_perawat)?>">Update</a>
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
                            <th>Bahasa Inggris</th>
                            <th>Psikotes</th>
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