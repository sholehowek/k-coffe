<?php
session_start();
include "../config/koneksi.php";
$sid = session_id();
// fungsi untuk mendapatkan isi keranjang belanja
function isi_keranjang(){
    $isikeranjang = array();
    $sid = session_id();
    $sql = mysql_query("SELECT * FROM keranjang WHERE id_session='$sid'");
     
    while ($r=mysql_fetch_array($sql)) {
        $isikeranjang[] = $r;
    }
    return $isikeranjang;
}  
 
// mendapatkan nomor orders dari tabel pembelian
$id_orders=mysql_insert_id();
$iuser = $_SESSION['id_user'];
$nmeja = $_SESSION['nama'];
 
// panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
$isikeranjang = isi_keranjang();
$jml          = count($isikeranjang);

// simpan data detail pemesanan  
function simpan_keranjang(){
  global $jml, $id_orders, $isikeranjang;
  for ($i = 0; $i < $jml; $i++){
    mysql_query("INSERT INTO detail_pemesanan(id_pemesanan, id_makanan, jumlah) VALUES('$id_orders',{$isikeranjang[$i]['id_prod']}, {$isikeranjang[$i]['jumlah']})");
  }
}
if (simpan_keranjang()) {
  echo 'berhasil';
}
else {
  echo 'gagal';
}
 
echo"Nomor Order: <b>$id_orders</b><br/><br/>";
 
echo"<h1>Rincian Belanja</h1>
          <table border=1>
          <tr>
                <th>Nama Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Sub Total</th>
          </tr>
          ";    
$r=mysql_query("SELECT * FROM detail_pemesanan, makanan, minuman WHERE detail_pemesanan.id_makanan=makanan.id_makanan AND detail_pemesanan.id_makanan=minuman.id_minuman AND detail_pemesanan.id_pemesanan='$id_orders'");
   
while($d=mysql_fetch_array($r)){
        $subtotal    = $d[harga]*$d[jumlah];
        $total       = $total + $subtotal;
        echo"<tr><td>$d[nama_produk]</td>
            <td>$d[jumlah]</td>
            <td>$d[harga]</td>
            <td>$subtotal</td></tr>";
}
echo"</table>
<h2>Total Belanja : <b>$total</b></h2>";

// simpan data pemesanan 
mysql_query("INSERT INTO `pemesanan`(`id_pesan`, `id_konsumen`, `id_pelayan`, `jumlah` `status`, `no_meja`) VALUES ('$id_orders', '$iuser', '$total', 'WT1', 0, '$nmeja')");

// setelah data pemesanan tersimpan, hapus data pemesanan di tabel keranjang
mysql_query("DELETE FROM keranjang WHERE id_session ='$sid'");
?>