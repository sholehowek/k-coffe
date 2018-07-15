<?php 
include ('koneksi.php');
include ('sistem.php');
session_start();
$pesan = '';

if (isset($_POST['simpan'])) {
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	if ($_SESSION['status']=='SuperAdmin') {
	$url = 'superadmin';
	}
	elseif ($_SESSION['status']=='Admin') {
		$url = 'admin';
	}
	else {
	}
	$tmak = mysql_query("INSERT INTO `minuman`(`id_minuman`, `nama_minuman`, `harga_minuman`, `stok`) VALUES ('$id', '$nama', '$harga', '$stok')");
	if ($tmak) {
		$pesan = 'Berhasil Menambah Makanan';	
		echo "<script type='text/javascript'>
		alert('$pesan');
		location.href='$base_url/$url/menuminuman.php';
		</script>";
	}
	else {
		$pesan = 'Gagal Menambah Makanan';
		echo "<script type='text/javascript'>
		alert('$pesan');
		location.href='$base_url/$url/menuminuman.php';
		</script>";
	}
}
 ?>