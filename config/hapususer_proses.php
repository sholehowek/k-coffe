<?php 
$id = $_GET['id'];
if ($_GET['ha']=='HA01') {
    $uurl = 'superadmin';
  }
elseif ($_GET['ha']=='HA02') {
    $uurl = 'admin';
  }
elseif ($_GET['ha']=='HA03') {
    $uurl = 'kasir';
  }
elseif ($_GET['ha']=='HA04') {
    $uurl = 'waiters';
  }
elseif ($_GET['ha']=='HA05') {
    $uurl = 'dapur';
  }
elseif ($_GET['ha']=='HA06') {
    $uurl = 'pelanggan';
  }
include ('koneksi.php');
include ('sistem.php');
session_start();
$pesan = '';
	if ($_SESSION['status']=='SuperAdmin') {
		$url = 'superadmin';
	}
	elseif ($_SESSION['status']=='Admin') {
		$url = 'admin';
	}
	else {
	}
$del = mysql_query("UPDATE `user_hak_akses` SET status=0 where id_user='$id'");
if ($del) {
	$pesan = 'Berhasil menghapus User';	
		echo "<script type='text/javascript'>
		alert('$pesan');
		location.href='$base_url/$url/user.php?nama=$uurl';
		</script>";
}
else {
	$pesan = 'Gagal Hapus User';
		echo "<script type='text/javascript'>
		alert('$pesan');
		location.href='$base_url/$url/user.php?nama=$uurl';
		</script>";
}
 ?>
