<?php 
$id = $_POST['id'];
if ($_POST['id']=='HA01') {
    $new = 'SA';
    $nuser = 'SuperAdmin';
    $uurl = 'superadmin';
  }
elseif ($_POST['id']=='HA02') {
    $new = 'AD';
    $nuser = 'Admin';
    $uurl = 'admin';
  }
elseif ($_POST['id']=='HA03') {
    $new = 'KS';
    $nuser = 'Kasir';
    $uurl = 'kasir';
  }
elseif ($_POST['id']=='HA04') {
    $new = 'WT';
    $nuser = 'Waiters';
    $uurl = 'waiters';
  }
elseif ($_POST['id']=='HA05') {
    $new = 'DP';
    $nuser = 'Dapur';
    $uurl = 'dapur';
  }
elseif ($_POST['id']=='HA06') {
    $new = 'PL';
    $nuser = 'Pelanggan';
    $uurl = 'pelanggan';
  }
$qu = mysql_query("select * from user u, user_hak_akses uha where uha.id_hak_akses='$id' AND u.id_user=uha.id_user");
$hitungid = mysql_num_rows($qu);
$newid = $hitungid+1;
 ?>
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
                    <h2>Tambah <?php echo $nuser; ?><small>User</small></h2>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../config/tambahuser_proses.php">
                      <input type="hidden" name="uurl" value="<?php echo $uurl; ?>">
                      <input type="hidden" name="ha" value="<?php echo $id; ?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="id" readonly="" value="<?php echo $new.$newid; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nama">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" required="required" class="form-control col-md-7 col-xs-12" name="alamat">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No HP/Telp</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="number" name="tlp">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamain</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Laki-Laki"> &nbsp; Laki-Laki &nbsp;
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Perempuan"> Perempuan
                            </label>
                          </div>
                        </div>
                      </div>                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="user.php?nama=<?php echo $uurl; ?>" class="btn btn-primary" name="back">Kembali</a>
                          <button type="reset" class="btn btn-primary" name="batal">Reset</button>
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