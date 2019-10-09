            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Add User</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <form method="post" action="<?=site_url('Admin/addUser')?>">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10"><input type="text" name="nama" placeholder="Nama" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10"><input type="text" name="username" placeholder="Username" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10"><input type="text" name="email" placeholder="Email" class="form-control"></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10"><input type="password" placeholder="Password"  class="form-control" name="password"></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b" name="role">
                                            <option value="1">Admin</option>
                                            <option value="2">Direktur</option>
                                            <option value="3">Pewancara</option>
                                            <option value="4">Perawat non valid</option>
                                            <option value="5">Perawat valid</option>
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