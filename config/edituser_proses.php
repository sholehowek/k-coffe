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
	else {
	}
	if (empty($_POST['password'])) {
		$uuser = mysql_query("UPDATE `user` SET nama='$nama', alamat='$alamat', no_hp='$tlp', jk='$jk' WHERE id_user='$id'");
		if ($uuser) {
			$pesan = 'Berhasil Update User';	
			echo "<script type='text/javascript'>
			alert('$pesan');
			location.href='$base_url/$url/user.php?nama=$uurl';
			</script>";
		}
		else {
			$pesan = 'Gagal Update User';
			echo "<script type='text/javascript'>
			alert('$pesan');
			location.href='$base_url/$url/user.php?nama=$uurl';
			</script>";
		}
	}
	else {
		$uuser = mysql_query("UPDATE `user` SET password='$pass' nama='$nama', alamat='$alamat', no_hp='$tlp', jk='$jk' WHERE id_user='$id'");
		if ($uuser) {
			$pesan = 'Berhasil Update User';	
			echo "<script type='text/javascript'>
			alert('$pesan');
			location.href='$base_url/$url/user.php?nama=$uurl';
			</script>";
		}
		else {
			$pesan = 'Gagal Update User';
			echo "<script type='text/javascript'>
			alert('$pesan');
			location.href='$base_url/$url/user.php?nama=$uurl';
			</script>";
		}
	}
}
 ?>