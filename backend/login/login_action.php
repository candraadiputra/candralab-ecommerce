<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */
 session_start();

include ('../../inc/config.php');
if(isset($_POST)){
$username = $_POST['username'];
$password = md5(trim($_POST['password']));


$sql = "select  * from pengelola
  where username='$username'
  and password='$password' ";

$sql_login = mysql_query($sql) or die(mysql_error());
$hasil = mysql_fetch_object($sql_login);

if(mysql_num_rows($sql_login) == 1) {
	$_SESSION['username'] = $username;

	
	header("Location:../index.php?mod=produk&pg=produk_view");

} else {
	header("Location:../index.php?mod=login&pg=login_form&s=1");
}
}
?>

