<?php 
session_start();
include "koneksi.php";
include "sistem.php";
$sid = session_id();
$id=$_GET['id'];

if ($_GET['menu']=='makanan') {
    //di cek dulu apakah barang yang di beli sudah ada di tabel keranjang
    $sql = mysql_query("SELECT * FROM keranjang WHERE id_prod='$id' AND id_session='$sid'");
    $ketemu=mysql_num_rows($sql);
    if ($ketemu==0){
        // kalau barang belum ada, maka di jalankan perintah insert
        mysql_query("INSERT INTO keranjang (id_prod, jumlah, id_session)
                VALUES ('$id', 1, '$sid')");        
        mysql_query("UPDATE `makanan` SET `stok`=stok - 1 WHERE id_makanan='$id'");
    }
    else {
        //  kalau barang ada, maka di jalankan perintah update
        mysql_query("UPDATE keranjang
                SET jumlah = jumlah + 1
                WHERE id_session ='$sid' AND id_prod='$id'");
        mysql_query("UPDATE `makanan` SET `stok`=stok - 1 WHERE id_makanan='$id'");       
    }   
    header("Location: $base_url/pelanggan/cart.php");
}
elseif ($_GET['menu']=='minuman') {
    //di cek dulu apakah barang yang di beli sudah ada di tabel keranjang
    $sql = mysql_query("SELECT * FROM keranjang WHERE id_prod='$id' AND id_session='$sid'");
    $ketemu=mysql_num_rows($sql);
    if ($ketemu==0){
        // kalau barang belum ada, maka di jalankan perintah insert
        mysql_query("INSERT INTO keranjang (id_prod, jumlah, id_session)
                VALUES ('$id', 1, '$sid')");        
        mysql_query("UPDATE `minuman` SET `stok`=stok - 1 WHERE id_minuman='$id'");
    }
    else {
        //  kalau barang ada, maka di jalankan perintah update
        mysql_query("UPDATE keranjang
                SET jumlah = jumlah + 1
                WHERE id_session ='$sid' AND id_prod='$id'");
        mysql_query("UPDATE `minuman` SET `stok`=stok - 1 WHERE id_minuman='$id'");       
    }   
    header("Location: $base_url/pelanggan/cart.php");
}
?>