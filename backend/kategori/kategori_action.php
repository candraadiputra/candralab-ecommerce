<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */
 
include ('../../inc/config.php');

if(isset($_POST)){
$nama_kategori= $_POST['nama_kategori'];
$id=$_POST['id'];
$aksi=$_POST['aksi'];
$sql = null;
if($aksi == 'tambah') {
	
		$sql = "INSERT INTO kategori(nama_kategori)
		VALUES('$nama_kategori')";
	
}else if($aksi=='edit'){
	$sql="update kategori set nama_kategori='$nama_kategori'
	where idkategori='$id'";
}

$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if($result) {
	header('location:../index.php?mod=kategori&pg=kategori_view&status=0');
} else {
	header('location:../index.php?mod=kategori&pg=kategori_form&status=1');
}
}
?>
