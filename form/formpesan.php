<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pemesanan</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pemesanan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php 
                  $cr = mysql_query("SELECT * FROM pemesanan WHERE status=0||status=1");
                  $enek = mysql_num_rows($cr);
                  if ($enek==0) {
                    echo "<h3> Belum Ada Pesanan";
                  }
                  else {
                   ?>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><center>Meja</center></th>
                          <th><center>Waiter</center></th>
                          <th><center>Waktu & Tanggal</center></th>
                          <th><center>Jumlah</center></th>
                          <th><center>Status</center></th>
                        </tr>
                        </center>
                      </thead>
                      <tbody>
                        <?php 
                        while ($hs = mysql_fetch_array($cr)){
                         ?>
                        <tr>
                          <td><?php echo $hs['no_meja'] ; ?></td>
                          <td><?php echo $hs['id_pelayan'] ; ?></td>
                          <td><?php echo $hs['waktu_tanggal'] ; ?></td>
                          <td><?php echo $hs['jumlah'] ; ?></td>
                          <td class=" "><center>
                            <a href="#" class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="bayar"><i class="fa fa-dollar"></i></a>
                            <a href="#" class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="konfirmasi"><i class="fa fa-check-square"></i></a>
                            </center></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <?php } ?>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->