<?php 
include ('sidepelanggan.php');
include ('navpelanggan.php');
$sid = session_id();
?>
<style type="text/css">
		.column-title{
			text-align: center;
		}
	</style>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Daftar Menu </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Keranjang Pemesanan </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama </th>
                          <th>Jumlah Pesanan</th>
                          <th>Harga</th>
                          <th>Sub Total</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $sql = mysql_query("SELECT * FROM keranjang k, makanan mak WHERE k.id_session='$sid' AND k.id_prod=mak.id_makanan"); 
                      $no = 1;                          
                      while($d=mysql_fetch_array($sql)){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no; ?></th>
                          <td><?php echo $d['nama_makanan']; ?></td>
                          <td><?php echo $d['jumlah']; ?></td>
                          <td><?php echo $d['harga_makanan']; ?></td>
                          <td><?php  
                          $h = $d['harga_makanan']; $j = $d['jumlah'];
                          $jum = $h*$j;
                          echo $jum;
                          ?>
                          </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        $sqln = mysql_query("SELECT * FROM keranjang k, minuman min WHERE k.id_session='$sid' AND k.id_prod=min.id_minuman"); 
                        while($di=mysql_fetch_array($sqln)){?>
                        <tr>
                          <th scope="row"><?php echo $no; ?></th>
                          <td><?php echo $di['nama_minuman']; ?></td>
                          <td><?php echo $di['jumlah']; ?></td>
                          <td><?php echo $di['harga_minuman']; ?></td>
                          <td><?php  
                          $ha = $di['harga_minuman']; $ju = $di['jumlah'];
                          $juml = $ha*$ju;
                          echo $juml;
                          ?>
                          </td>
                        </tr>
                        <?php
                        $no++;
                        } ?>
                      </tbody>
                            <div class="fa-hover col-md-3 col-sm-4 col-xs-12">
                              <a href="<?php echo $base_url;?>/pelanggan/makanan.php" class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Pesan Lagi"><i class=""></i> Pesan Lagi</a>
                            </div>
                            <div class="fa-hover col-md-3 col-sm-4 col-xs-12">
                              <a href="<?php //echo $base_url.'/pelanggan/pesan.php';?>#" class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Kirim Pesanan"><i class=""></i> Kirim Pesanan</a>
                            </div>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php 
include ('../rangka/footer.php');
?>