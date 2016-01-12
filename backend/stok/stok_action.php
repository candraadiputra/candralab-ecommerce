<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */
 
include ('../../inc/config.php');
include ('../../inc/function.php');
//data dari stok
if(isset($_POST)){
$idproduk = $_POST['idproduk'];
$harga_jual = $_POST['harga_jual'];
$jumlah = $_POST['jumlah'];

$harga_beli = $_POST['harga_beli'];

$aksi = $_POST['aksi'];
$id = $_POST['id'];

$sql = null;

if ($aksi == 'tambah') {
	$sql = "INSERT INTO stok(idproduk,harga_jual,
	harga_beli,jumlah)
		VALUES('$idproduk',
		'$harga_jual','$harga_beli','$jumlah')";
} else if ($aksi == 'edit') {

	$sql = "update stok set idproduk='$idproduk',
	harga_beli='$harga_beli',jumlah='$jumlah',harga_jual='$harga_jual'
	where idstok='$id'";

}

$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if ($result) {
	header('location:../index.php?mod=stok&pg=stok_view&status=0');
} else {
	header('location:../index.php?mod=stok&pg=stok_view&status=1');
}
}
?>
