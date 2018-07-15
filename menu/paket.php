        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Menu Makanan</h3>
              </div>
            </div>

            <div class="clearfix"></div>
           
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <ul class="pagination pagination-split">
                          <li><a href="tambahpak.php" class="btn btn-sm btn-primary" type="button"><i class="fa fa-plus-square"></i> Tambah Paket </a></li>                          
                        </ul>
                      </div>

                      <div class="clearfix"></div>
                       <?php
                        $q = mysql_query("SELECT * FROM paket order by nama_paket ASC");
                        while ($da = mysql_fetch_array($q)){
                         ?>
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i><h2><?php echo $da['nama_paket']; ?></i></h4>
                            <div class="left col-xs-7">
                              <?php  
                              $idp = $da['id_paket'];
                                $mn = mysql_query("SELECT * FROM paket p, makanan mk, minuman mn, paket_mak_min pmm where p.id_paket='$idp' and p.id_paket=pmm.id_paket and mk.id_makanan=pmm.id_makanan and mn.id_minuman=pmm.id_minuman");
                                $dat = mysql_fetch_array($mn);
                              ?> 
                              <h2><?php echo $dat['nama_makanan']; ?></h2>
                              <h2><?php echo $dat['nama_minuman']; ?></h2>          
                              <ul class="list-unstyled">
                                <li><i class="glyphicon glyphicon-shopping-cart"></i> Harga </li>
                                <li><?php echo $da['harga']; ?></li>
                                <li> <hr></li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/img.jpg" alt="" class=" img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <a href="updatepak.php?kode=<?php echo $idp; ?>" class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                              <a href="../config/hapuspak_proses.php?kode=<?php echo $idp; ?>" class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Hapus"><i class="fa fa-trash-o"></i></a>
                            </div>
                          </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->