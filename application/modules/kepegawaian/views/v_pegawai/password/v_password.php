<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>kepegawaian/Password">
            <i class="fa fa-key"></i>Password</a>
    </li>
    <li class="active">
        <strong>Ganti Password</strong>
    </li>
</ol>

<h3>Ganti Passwordl</h3>
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">
            Update
        </div>

        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <form role="form" class="form-horizontal validate" action="<?php echo base_url() ?>kepegawaian/password" method="post" e id="form">

            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">

            <?php pesan_get('msg',"Berhasil Mengganti Password","Gagal Mengganti Password") ?>

                <?php if (isset($error)) { pesanvar(0,"","Gagal Mengganti Password"); } ?>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-lg-4 control-label">Password</label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" name="password" id="password" />
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-lg-4 control-label">Konfirmasi Password</label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" name="konfirmasipassword"  id="konfirmasipassword" />
                                </div>
                            </div>
                         

                        </div>

                        <div class="col-md-6">

                    </div>
    </div>
	</div>
    <footer class="panel-footer text-right bg-light lter">
        <button type="submit" class="btn btn-primary btn-s-xs">
            <i class="fa fa-save"></i> Simpan</button>
        &nbsp
        
    </footer>
    </form>

</div>