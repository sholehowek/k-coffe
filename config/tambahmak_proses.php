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
	$tmak = mysql_query("INSERT INTO `makanan`(`id_makanan`, `nama_makanan`, `harga_makanan`, `stok`) VALUES ('$id', '$nama', '$harga', '$stok')");
	if ($tmak) {
		$pesan = 'Berhasil Menambah Makanan';	
		echo "<script type='text/javascript'>
		alert('$pesan');
		location.href='$base_url/$url/menumakanan.php';
		</script>";
	}
	else {
		$pesan = 'Gagal Menambah Makanan';
		echo "<script type='text/javascript'>
		alert('$pesan');
		location.href='$base_url/$url/menumakanan.php';
		</script>";
	}
}
 ?>