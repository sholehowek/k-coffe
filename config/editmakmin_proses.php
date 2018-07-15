<?php 
include ('koneksi.php');
include ('sistem.php');
session_start();
$pesan = '';

$kode = $_POST['kode'];
$menu = $_POST['menu'];
if ($menu=='makanan') {
	$idn = 'id_makanan';
	$nm = 'nama_makanan';
	$hr = 'harga_makanan';
	$stk = 'stok';
	$asal ='menumakanan';
}
elseif ($menu=='minuman') {
	$idn = 'id_minuman';
	$nm = 'nama_minuman';
	$hr = 'harga_minuman';
	$stk = 'stok';
	$asal ='menuminuman';
}

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
	$tmak = mysql_query("UPDATE `$menu` SET $nm='$nama', $hr='$harga', $stk='$stok' WHERE $idn='$id'");
	if ($tmak) {
		echo "<script type='text/javascript'>
				alert('Berhasil Update $kode');
				location.href='$base_url/$url/$asal.php'
				</script>
				";
	}
	else {
		echo "<script type='text/javascript'>
				alert('Gagal Upadate $kode');
				location.href='$base_url/$url/$asal.php'
				</script>
				";
	}
}
 ?>