<?php
include("koneksi.php");
include ('sistem.php');
session_start();
$kode = $_GET['kode'];
$menu = $_GET['menu'];
if ($menu=='makanan') {
	$idn = 'id_makanan';
	$asal ='menumakanan';
}
elseif ($menu=='minuman') {
	$idn = 'id_minuman';
	$asal ='menuminuman';
}

$query = "delete from $menu where $idn = '$kode'";
$result = mysql_query($query);
if ($_SESSION['status']=='SuperAdmin') {
	$url = 'superadmin';
	}
	elseif ($_SESSION['status']=='Admin') {
		$url = 'admin';

	}
if ($result) {
	echo "<script type='text/javascript'>
			alert('Berhasil menghapus $kode');
			location.href='$base_url/$url/$asal.php';
			</script>";
}
else {
	echo "<script type='text/javascript'>
			alert('Gagal menghapus $kode');
			location.href='$base_url/$url/$asal.php';
			</script>";
}

?>