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
            <?php 
                $kodemak =$_GET['kodemak'];
                $qu = mysql_query("select * from makanan where id_makanan='$kodemak'");
                $hitungid = mysql_num_rows($qu);
                $da = mysql_fetch_array($qu)
              ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>UPDATE <small>Makanan</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../config/editmakmin_proses.php">
                    <input type="hidden" name="id" value="<?php echo $da['id_makanan']; ?>">
                     <input type="hidden" name="kode" value="<?php echo $kodemak; ?>">
                     <input type="hidden" name="menu" value="makanan">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Makanan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nama" value="<?php echo $da['nama_makanan']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name"  required="required" class="form-control col-md-7 col-xs-12" name="harga" value="<?php echo $da['harga_makanan']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Stock</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text"  name="stok" value="<?php echo $da['stok']; ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="menumakanan.php" type="submit" class="btn btn-primary" name="batal">Cancel</a>
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
        </div>
        <!-- /page content -->