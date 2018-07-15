        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

              <div class="title_right">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update <small>paket</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php 
                  $kode = $_GET['kode'];
                  $mn = 'PKT';
                  $nmn = 'paket'; 
                  $qu = mysql_query("select * from paket where id_paket='$kode'");
                  $hid = mysql_fetch_array($qu);
                      ?>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../config/editpak_proses.php">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="id" readonly="" value="<?php echo $hid['id_paket']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Paket <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nama" value="<?php echo $hid['nama_paket']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <?php $cmakan = mysql_query("select * from makanan m, paket_mak_min p where p.id_paket='$kode' and p.id_makanan=m.id_makanan");
                        $makan = mysql_query("select * from makanan");
                        $chmakan= mysql_fetch_array($cmakan);?>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Makanan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" name="id_makanan" value="adasda">
                            <?php  while ($hmakan = mysql_fetch_array($makan)) {
                            ?>
                            <option value="<?php echo $hmakan['id_makanan'] ?>" <?php if ($hmakan['id_makanan']==$chmakan['id_makanan']){ echo 'selected';} ?>><?php echo $hmakan['nama_makanan'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Minuman</label>
                        <?php $minum = mysql_query("select * from minuman");
                        $cminum = mysql_query("select * from minuman m, paket_mak_min p where p.id_paket='$kode' and p.id_minuman=m.id_minuman");
                        $chminum= mysql_fetch_array($cminum);
                        ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" name="id_minuman">
                            <?php  while ($hminum = mysql_fetch_array($minum)) {
                            ?>
                            <option value="<?php echo $hminum['id_minuman'] ?>" <?php if ($hminum['id_minuman']==$chminum['id_minuman']){ echo 'selected';} ?>><?php echo $hminum['nama_minuman'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" required="required" class="form-control col-md-7 col-xs-12" name="harga" value="<?php echo $hid['harga']; ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <a href="menupaket.php" class="btn btn-primary" name="back">Back</a>
                          <button type="submit" class="btn btn-success" name="simpan">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->