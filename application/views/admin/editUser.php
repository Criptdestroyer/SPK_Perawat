<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Edit User</h2>
                </div>
                <div class="col-lg-2">
                    
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <form method="post" action="<?=site_url('Admin/editUser/'.$user->id)?>">
                                <input type="hidden" name="id" value="<?=$user->id?>">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10"><input type="text" name="nama" value="<?=$user->nama?>" placeholder="Nama" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10"><input type="text" name="username" value="<?=$user->username?>" placeholder="Username" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10"><input type="text" name="email" value="<?=$user->email?>" placeholder="Email" class="form-control"></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b" name="role">
                                            <option value="1" <?php if($user->role == 1) echo "selected=selected"?>>Admin</option>
                                            <option value="2" <?php if($user->role == 2) echo "selected=selected"?>>Direktur</option>
                                            <option value="3" <?php if($user->role == 3) echo "selected=selected"?>>Pewancara</option>
                                            <option value="4" <?php if($user->role == 4) echo "selected=selected"?>>Perawat non valid</option>
                                            <option value="5" <?php if($user->role == 5) echo "selected=selected"?>>Perawat valid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white btn-sm" type="reset">Cancel</button>
                                        <button class="btn btn-primary btn-sm" type="submit" name="submit" value="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>