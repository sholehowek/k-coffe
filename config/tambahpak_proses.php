<?php 
include ('koneksi.php');
include ('sistem.php');
session_start();
$pesan = '';

if (isset($_POST['simpan'])) {
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$mk = $_POST['id_makanan'];
	$mn = $_POST['id_minuman'];
	if ($_SESSION['status']=='SuperAdmin') {
	$url = 'superadmin';
	}
	elseif ($_SESSION['status']=='Admin') {
		$url = 'admin';
	}
	else {
	}
	$tpak = mysql_query("INSERT INTO `paket`(`id_paket`, `nama_paket`, `harga`) VALUES ('$id', '$nama', '$harga')");
	$tpakmakmin = mysql_query("INSERT INTO `paket_mak_min`(`id_paket`, `id_makanan`, `id_minuman`) VALUES ('$id', '$mk', '$mn')");
	if ($tpak and $tpakmakmin) {
		$pesan = 'Berhasil Menambah Paket';	
		echo "<script type='text/javascript'>
		alert('$pesan');
		location.href='$base_url/$url/menupaket.php';
		</script>";
	}
	else {
		$pesan = 'Gagal Menambah Paket';
		echo "<script type='text/javascript'>
		alert('$pesan');
		location.href='$base_url/$url/menupaket.php';
		</script>";
	}
}
 ?>