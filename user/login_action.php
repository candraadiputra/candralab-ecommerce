<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */?>
 
<?php
session_start();
if(isset($_POST)){
include ('../inc/config.php');
include('../inc/function.php');
$email = $_POST['email'];
$password = md5(trim($_POST['password']));

$sql = "select  * from pelanggan
  where email='$email'
  and password='$password' ";

$sql_login = mysql_query($sql) or die(mysql_error());
$hasil = mysql_fetch_object($sql_login);

if (mysql_num_rows($sql_login) == 1) {
	$_SESSION['email'] = $email;
		$_SESSION['nama'] = $hasil->nama;
	$_SESSION['idpelanggan'] = $hasil->idpelanggan;
//memanggil status login 
update_status_login("1",$_SESSION['idpelanggan']);
	header("Location:../index.php?mod=user&pg=profil");

} else {
	header("Location:../index.php?mod=user&pg=register&loginerror=1");
}
}
?>

