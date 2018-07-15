<?php 
if (isset($_GET['nama'])) {
  $user = $_GET['nama'];
  if ($user == 'superadmin') {
    $jeneng = 'SuperAdmin';
    $ha = 'HA01';
  }
  elseif ($user == 'admin') {
    $jeneng = 'Admin';
    $ha = 'HA02';
  }
  elseif ($user == 'kasir') {
    $jeneng = 'Kasir';
    $ha = 'HA03';
  }
  elseif ($user == 'waiters') {
    $jeneng = 'Waiters';
    $ha = 'HA04';
  }
  elseif ($user == 'dapur') {
    $jeneng = 'Dapur';
    $ha = 'HA05';
  }
  elseif ($user == 'pelanggan') {
    $jeneng = 'Pelanggan';
    $ha = 'HA06';
  }
  include ('../rangka/sidebar.php');
  include ('../rangka/navigasi.php');
  include ('../user/user.php');
  include ('../rangka/footer.php');
}
?>