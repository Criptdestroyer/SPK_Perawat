<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Timeline</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <form method="post" action="<?=site_url('Admin/timeline')?>">
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Timeline</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b" name="status">
                                            <option value="0" <?php if($timeline->status == 0) echo "selected=selected"?>>Pendaftaran</option>
                                            <option value="1" <?php if($timeline->status == 1) echo "selected=selected"?>>Seleksi</option>
                                            <option value="2" <?php if($timeline->status == 2) echo "selected=selected"?>>Pengumuman</option>
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