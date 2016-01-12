<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */

include ('../../inc/config.php');
//data dari pengelola

if (isset($_POST)) {
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = md5(trim($_POST['password']));
	$aksi = $_POST['aksi'];
	$id = $_POST['id'];

	//echo $password;
	//exit;
	$sql = null;
	if ($aksi == 'tambah') {
		$sql = "INSERT INTO pengelola(nama,username,password)
		VALUES('$nama','$username', '$password')";
	} else if ($aksi == 'edit') {
		$sql = "update pengelola set username='$username', nama='$nama',
			password='$password' where idpengelola='$id'";

	}

	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:../index.php?mod=pengelola&pg=pengelola_view&level=0');
	} else {
		header('location:../index.php?mod=pengelola&pg=pengelola_view&level=1');
	}
}
?>
