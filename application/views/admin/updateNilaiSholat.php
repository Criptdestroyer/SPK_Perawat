<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Update Nilai Praktek Sholat</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <form method="post" action="<?=site_url('Admin/updateNilaiSholat/'.$perawat->id_perawat)?>">
                                <input type="hidden" name="id" value="<?=$perawat->id_perawat?>">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10"><input type="text" name="nama" value="<?=$perawat->nama?>" placeholder="Nama" class="form-control" readonly="readonly"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Niat</label>
                                    <div class="col-sm-10"><input type="text" name="niat" value="<?=$perawat->niat?>" placeholder="niat" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Bacaan Surat</label>
                                    <div class="col-sm-10"><input type="text" name="bacaan_surat" value="<?=$perawat->bacaan_surat?>" placeholder="Bacaan Surat" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gerakan</label>
                                    <div class="col-sm-10"><input type="text" name="gerakan" value="<?=$perawat->gerakan?>" placeholder="Gerakan" class="form-control"></div>
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