<?php
include ('../config/koneksi.php');
include ('../config/sistem.php');
session_start();
if(session_destroy()) // Menghapus Sessions
{
header("Location: $base_url"); // Langsung mengarah ke Home index.php
}
?>