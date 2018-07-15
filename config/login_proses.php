<?php
ob_start();
session_start();
include ('koneksi.php');
include ('sistem.php');
$error=''; // Variabel untuk menyimpan pesan error
if (isset($_POST['login'])) {
	
	if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
			echo $error;
	}
	else
	{
		// Variabel username dan password
		$username=$_POST['username'];
		$password=$_POST['password'];
		// Mencegah MySQL injection 
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);	
		//password dengan encripsi md5
		$pass = md5($password);
		// SQL query untuk memeriksa apakah user terdapat di database?
		$query = mysql_query("select * from user where id_user='$username'AND password='$pass'");
		$que = mysql_query("select * from user where id_user='$username'");
		$data = mysql_fetch_array($query);
		$rows = mysql_num_rows($query);		
		$row = mysql_num_rows($que);	
		if ($row == 1) {
			if ($rows == 1 ) {
				$akses = mysql_query("select ha.nama, uhk.id_hak_akses, uhk.status from user u, user_hak_akses uhk, hak_akses ha where u.id_user='$username' AND u.id_user=uhk.id_user AND ha.id_hak_akses=uhk.id_hak_akses AND uhk.status=1");
				$hakakses = mysql_fetch_array($akses);
				if ($hakakses['status']==1) {
					if ($hakakses['id_hak_akses']=='HA01') {
						$_SESSION['nama']=$data['nama'];
						$_SESSION['id_user']=$data['id_user'];
						$_SESSION['status']=$hakakses['nama'];
						header("location: $base_url/superadmin"); // Mengarahkan ke halaman SuperAdmin
					}
					elseif ($hakakses['id_hak_akses']=='HA02'){
						$_SESSION['nama']=$data['nama'];
						$_SESSION['id_user']=$data['id_user'];
						$_SESSION['status']=$hakakses['nama'];
						header("location: $base_url/admin"); // Mengarahkan ke halaman Admin
					}
					elseif ($hakakses['id_hak_akses']=='HA03'){
						$_SESSION['nama']=$data['nama'];
						$_SESSION['id_user']=$data['id_user'];
						$_SESSION['status']=$hakakses['nama'];
						header("location: $base_url/kasir"); // Mengarahkan ke halaman Kasir
					}
					elseif ($hakakses['id_hak_akses']=='HA04'){
						$_SESSION['nama']=$data['nama'];
						$_SESSION['id_user']=$data['id_user'];
						$_SESSION['status']=$hakakses['nama'];
						header("location: $base_url/waiters"); // Mengarahkan ke halaman waiters
					}
					elseif ($hakakses['id_hak_akses']=='HA05'){
						$_SESSION['nama']=$data['nama'];
						$_SESSION['id_user']=$data['id_user'];
						$_SESSION['status']=$hakakses['nama'];
						header("location: $base_url/dapur"); // Mengarahkan ke halaman dapur
					}
					else {
						$_SESSION['nama']=$data['nama'];
						$_SESSION['id_user']=$data['id_user'];
						$_SESSION['status']=$hakakses['nama'];
						header("location: $base_url/pelanggan"); // Mengarahkan ke halaman Pelanggan
					}
				}
				else {
					$error = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Login Anda Sudah Tidak Berlaku</strong>
                  </div>';
				}
			}
			else {
				$error = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Password Anda Salah</div>';
			}
		}
		else{
			$error = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Username Tidak Terdaftar</div>';
		}
	}
}
?>