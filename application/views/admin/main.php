<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data User</h2>
                </div>
                
                <div class="col-lg-2">
                <br>
                    <a class="btn btn-success" href="<?=site_url('Admin/addUser')?>">+ Add User</a>
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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        foreach($user as $p){
                    ?>
                        <tr class="gradeX">
                            <td><?=$i++?></td>
                            <td><?=$p->nama?></td>
                            <td><?=$p->username?></td>
                            <td><?=$p->email?></td>
                            <td>
                                <?php
                                    if($p->role == 1){
                                        echo "Admin";
                                    }else if($p->role == 2){
                                        echo "Direktur";
                                    }else if($p->role == 3){
                                        echo "Pewancara";
                                    }else if($p->role == 4){
                                        echo "Perawat non valid";
                                    }else if($p->role == 5){
                                        echo "Perawat valid";
                                    }
                                ?>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="<?=site_url('Admin/editUser/'.$p->id)?>">Edit</a>
                                <a class="btn btn-danger" href="<?=site_url('Admin/deleteUser/'.$p->id)?>">Delete</a>
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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
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