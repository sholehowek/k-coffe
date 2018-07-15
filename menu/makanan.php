        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Menu Makanan</h3>
              </div>
            </div>

            <div class="clearfix"></div>
             <?php 
            $q = mysql_query("select * from makanan");
            $da = mysql_fetch_array($q);
             ?> 

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <ul class="pagination pagination-split">
                          <li><a href="tambahmak.php" class="btn btn-sm btn-primary" type="button"><i class="fa fa-plus-square"></i> Tambah Makanan </a></li>                          
                        </ul>
                      </div>

                      <div class="clearfix"></div>
                      <?php 
                          $q = mysql_query("select * from makanan order by nama_makanan ASC");
                          while ($da = mysql_fetch_array($q)) {
                          ?>
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>MAKANAN</i></h4>
                            <div class="left col-xs-7">
                              <h2><?php echo $da['nama_makanan']; ?></h2>         
                              <ul class="list-unstyled">

                                <li><i class="glyphicon glyphicon-shopping-cart"></i> Harga </li>
                                <li>Rp <?php echo $da['harga_makanan']; ?></li>
                                <li> <hr></li>
                                <li><i class="glyphicon glyphicon-tag"></i> Stok </li>
                                <li><?php echo $da['stok']; ?></li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/img.jpg" alt="" class=" img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <a href="updatemak.php?kodemak=<?php echo $da['id_makanan']; ?>" class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                              <a href="../config/hapusmakmin_proses.php?kode=<?php echo $da['id_makanan']; ?>&menu=makanan" class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Hapus"><i class="fa fa-trash-o"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->