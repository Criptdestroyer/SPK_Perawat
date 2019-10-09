<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Add Sertifikat</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <form method="post" action="<?=site_url('Perawat/addSertifikat')?>" accept-charset="utf-8" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Sertifikat</label>
                                    <div class="col-sm-10"><input type="text" name="nama_sertifikat" placeholder="Nama Sertifikat" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Upload Sertifikat</label>
                                    <div class="col-sm-10"><input type="file" id="file" class="form-control" name="sertifikat" required></div>
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