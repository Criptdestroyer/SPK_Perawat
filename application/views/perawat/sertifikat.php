<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Sertifikat</h2>
                </div>
                
                <div class="col-lg-2">
                <br>
                    <a class="btn btn-success" href="<?=site_url('Perawat/addSertifikat')?>">+ Add Sertifikat</a>
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
                            <th>Nama Sertifikat</th>
                            <th>Sertifikat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        foreach($sertifikat as $p){
                    ?>
                        <tr class="gradeX">
                            <td><?=$i++?></td>
                            <td><?=$p->nama?></td>
                            <td><?=$p->nama_sertifikat?></td>
                            <td><a href="<?=base_url('assets/Admin/img/'.$p->sertifikat)?>"><?=$p->sertifikat?></a></td>
                            <td>
                                <a class="btn btn-warning" href="<?=site_url('Perawat/updateSertifikat/'.$p->id_sertifikat)?>">Edit</a>
                                <a class="btn btn-danger" href="<?=site_url('Perawat/deleteSertifikat/'.$p->id_sertifikat)?>">Delete</a>
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
                            <th>Nama Sertifikat</th>
                            <th>Sertifikat</th>
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