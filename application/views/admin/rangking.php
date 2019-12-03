<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Hasil Rangking</h2>
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
                            <th>Leaving Flow</th>
                            <th>Entering Flow</th>
                            <th>Net Flow</th>
                            <th>Status</th>
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
                            <td><?=$p->leaving_flow?></td>
                            <td><?=$p->entering_flow?></td>
                            <td><?=$p->net_flow?></td>
                            <td>
                                <?php
                                    if($p->net_flow >= 0){
                                        echo "LULUS";
                                    }else{
                                        echo "TIDAK LULUS";
                                    }
                                ?>
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
                            <th>Leaving Flow</th>
                            <th>Entering Flow</th>
                            <th>Net Flow</th>
                            <th>Status</th>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>