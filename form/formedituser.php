<?php 
$id = $_GET['id'];
$ha = $_GET['ha'];
if ($_GET['ha']=='HA01') {
    $new = 'SA';
    $nuser = 'SuperAdmin';
    $uurl = 'superadmin';
  }
elseif ($_GET['ha']=='HA02') {
    $new = 'AD';
    $nuser = 'Admin';
    $uurl = 'admin';
  }
elseif ($_GET['ha']=='HA03') {
    $new = 'KS';
    $nuser = 'Kasir';
    $uurl = 'kasir';
  }
elseif ($_GET['ha']=='HA04') {
    $new = 'WT';
    $nuser = 'Waiters';
    $uurl = 'waiters';
  }
elseif ($_GET['ha']=='HA05') {
    $new = 'DP';
    $nuser = 'Dapur';
    $uurl = 'dapur';
  }
elseif ($_GET['ha']=='HA06') {
    $new = 'PL';
    $nuser = 'Pelanggan';
    $uurl = 'pelanggan';
  }
$qu = mysql_query("select * from user where id_user='$id'");
$hsl = mysql_fetch_array($qu);
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
                    <h2>Update <?php echo $nuser; ?> <small>User</small></h2>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../config/edituser_proses.php">
                      <input type="hidden" name="uurl" value="<?php echo $uurl; ?>">
                      <input type="hidden" name="ha" value="<?php echo $ha; ?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="id" readonly="" value="<?php echo $hsl['id_user']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="password" placeholder="Password tetap">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nama" value="<?php echo $hsl['nama']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" required="required" class="form-control col-md-7 col-xs-12" name="alamat" value="<?php echo $hsl['alamat']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No HP/Telp</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="number" name="tlp" value="<?php echo $hsl['no_hp']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamain</label>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default<?php if ($hsl['jk']=='Laki-Laki') {echo ' active';} else {}?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Laki-Laki" <?php if ($hsl['jk']=='Laki-Laki') {echo 'checked=""';} else {}?>> &nbsp; Laki-Laki &nbsp;
                            </label>
                            <label class="btn btn-default<?php if ($hsl['jk']=='Perempuan') {echo ' active';} else {}?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jk" value="Perempuan" <?php if ($hsl['jk']=='Perempuan') {echo 'checked=""';} else {}?>> Perempuan
                            </label>
                          </div>
                        </div>
                      </div>                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="user.php?nama=<?php echo $uurl; ?>" class="btn btn-primary" name="back">Kembali</a>
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