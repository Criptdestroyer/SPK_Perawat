<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Update Perawat</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <form method="post" action="<?=site_url('perawat/updatePerawat')?>" accept-charset="utf-8" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?=$perawat->id_perawat?>">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10"><input type="text" name="nama" value="<?=$perawat->nama?>" placeholder="Nama" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10"><input type="date" name="tanggal_lahir" value="<?=$perawat->tanggal_lahir?>" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10"><input type="text" name="alamat" value="<?=$perawat->alamat?>" placeholder="Alamat" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No HP</label>
                                    <div class="col-sm-10"><input type="text" name="no_hp" value="<?=$perawat->no_hp?>" placeholder="No HP" class="form-control"></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b" name="jenis_kelamin">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki" <?php if($perawat->jenis_kelamin == "Laki-laki") echo "selected=selected"?>>Laki-laki</option>
                                            <option value="Perempuan" <?php if($perawat->jenis_kelamin == "Perempuan") echo "selected=selected"?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Ijazah</label>
                                    <?php
                                        if($perawat->ijazah != null){
                                            ?>
                                                <div class="col-sm-10"><a href="<?=base_url("assets/Admin/img/".$perawat->ijazah)?>"><?=$perawat->ijazah?></a></div>
                                            <?php
                                        }else{
                                            ?>
                                                <div class="col-sm-10">Ijazah belum diupload</div>
                                            <?php
                                        }
                                    ?>
                                    
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Update Ijazah</label>
                                    <div class="col-sm-10"><input type="file" id="file" class="form-control" name="ijazah"></div>
                                    <input type="hidden" name="temp_ijazah" value="<?=$perawat->ijazah?>">
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