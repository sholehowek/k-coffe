<?php 
include ('koneksi.php');
include ('sistem.php');
session_start();
$pesan = '';

if (isset($_POST['simpan'])) {
	$uha = $_POST['ha'];
	$id = $_POST['id'];
	$pass = md5($_POST['password']);
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tlp = $_POST['tlp'];
	$jk = $_POST['jk'];
	$uurl = $_POST['uurl'];
	if ($_SESSION['status']=='SuperAdmin') {
	$url = 'superadmin';
	}
	elseif ($_SESSION['status']=='Admin') {
		$url = 'admin';
	}
	$tuser = mysql_query("INSERT INTO `user`(`id_user`, `password`, `nama`, `alamat`, `no_hp`, `jk`) VALUES ('$id', '$pass', '$nama', '$alamat', '$tlp', '$jk')");
	$tha =mysql_query("INSERT INTO `user_hak_akses`(`id_user`, `id_hak_akses`, `status`) VALUES ('$id', '$uha','1')");	
	if ($tuser and $tha) {
		$pesan = 'Berhasil Menambah User';	
		echo "<script type='text/javascript'>
		alert('$pesan');
		location.href='$base_url/$url/user.php?nama=$uurl';
		</script>";
	}
	else {
		$pesan = 'Gagal Menambah User';
		echo "<script type='text/javascript'>
		alert('$pesan');
		location.href='$base_url/$url/user.php?nama=$uurl';
		</script>";
	}
}
 ?>