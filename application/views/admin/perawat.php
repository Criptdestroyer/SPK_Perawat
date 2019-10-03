<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Perawat</h2>
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
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Jenis Kelamin</th>
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
                            <td><?=$p->tanggal_lahir?></td>
                            <td><?=$p->alamat?></td>
                            <td><?=$p->no_hp?></td>
                            <td><?=$p->jenis_kelamin?></td>
                            <td>
                                <button class="btn btn-warning" href="Admin/editPerawat/<?=$p->id_perawat?>">Edit</button>
                                <button class="btn btn-danger" href="Admin/deletePerawat/<?=$p->id_perawat?>">Delete</button>
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
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Jenis Kelamin</th>
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