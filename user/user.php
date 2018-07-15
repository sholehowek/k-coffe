        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User</h3>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" id="admin">
                    <h2> <?php echo $jeneng ?> <small>users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                   <?php if ($_SESSION['status']=='SuperAdmin' or $ha!=='HA01') { ?>
                    <form method="POST" action="tambah.php">
                      <input type="hidden" name="id" value="<?php echo $ha; ?>">
                      <button class="btn btn-sm btn-primary" type="submit" name="tambah"><i class="fa fa-plus-square"></i> Tambah </button>
                    </form>
                    <?php } ?>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">ID</th>
                            <th class="column-title">Nama</th>
                            <th class="column-title">Alamat </th>
                            <th class="column-title">No HP </th>
                            <th class="column-title">Jenis Kelamin</th>
                            <?php if ($_SESSION['status']=='SuperAdmin') { ?>
                            <th class="column-title">Password </th><?php } ?>
                            <?php if ($_SESSION['status']=='SuperAdmin' or $ha!=='HA01') { ?>
                            <th class="column-title no-link last"><span class="nobr">Action</span><?php } ?>
                            </th>
                          </tr>
                        </thead>
                         
                        <tbody>
                        <?php 
                          $q = mysql_query("select * from user u, user_hak_akses uha where uha.id_hak_akses='$ha' and u.id_user=uha.id_user and uha.status=1");
                          while ($da = mysql_fetch_array($q)) {
                          ?>
                          <tr class="even pointer">
                            <td class=" "><center><?php echo $da['id_user']; ?></center></td>
                            <td class=" "><center><?php echo $da['nama']; ?></center></td>
                            <td class=" "><center><?php echo $da['alamat']; ?></center></td>
                            <td class=" "><center><?php echo $da['no_hp']; ?></center></td>
                            <td class=" "><center><?php echo $da['jk']; ?></center></td>
                            <?php if ($_SESSION['status']=='SuperAdmin') { ?>
                            <td class=" "><center><?php echo $da['password']; ?></center></td><?php } ?>
                            <?php if ($_SESSION['status']=='SuperAdmin' or $ha!=='HA01') { ?>
                            <td class=" ">
                              <center>
                                <input type="hidden" name="id" value="<?php echo $da['id_user']; ?>">
                                <input type="hidden" name="id" value="<?php echo $ha; ?>">
                                <a href="updateuser.php?id=<?php echo $da['id_user']; ?>&ha=<?php echo $ha; ?>" type="submit" class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Edit" name="edit"><i class="fa fa-pencil"></i> Edit</a>
                                <!-- Small modal -->
                                <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target=".bs-example-modal-sm#<?php echo $da['id_user']; ?>"><i class="fa fa-trash"></i> Hapus</button>

                                <div class="modal fade bs-example-modal-sm" id="<?php echo $da['id_user']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                  <div class="modal-dialog modal-sm">
                                    <div class="modal-content">

                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">Hapus</h4>
                                      </div>
                                      <div class="modal-body">
                                        <h4>Yakin Ingin Menghapus <br> <?php echo $da['nama']; ?>?</h4>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <a href="../config/hapususer_proses.php?id=<?php echo $da['id_user']; ?>&ha=<?php echo $ha; ?>" type="button" class="btn btn-primary">Hapus</a>
                                      </div>
                                      <?php } ?>
                                    </div>
                                  </div>
                                </div>
                              </center>
                            </td>
                          </tr><?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
<!-- /page content -->
<style type="text/css">
  .column-title{
    text-align: center;
  }
</style>