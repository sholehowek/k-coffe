<?php
include("koneksi.php");
include ('sistem.php');
session_start();
$kode = $_GET['kode'];

$query = "delete from paket where id_paket = '$kode'";
$query2 = "delete from paket_mak_min where id_paket = '$kode'"; 
$result = mysql_query($query);
$result2 = mysql_query($query2);
if ($_SESSION['status']=='SuperAdmin') {
	$url = 'superadmin';
	}
	elseif ($_SESSION['status']=='Admin') {
		$url = 'admin';

	}
if ($result and $result2) {
	echo "<script type='text/javascript'>
			alert('Berhasil menghapus $kode');
			location.href='$base_url/$url/menupaket.php';
			</script>";
}
else {
	echo "<script type='text/javascript'>
			alert('Gagal menghapus $kode');
			location.href='$base_url/$url/menupaket.php';
			</script>";
}

?>