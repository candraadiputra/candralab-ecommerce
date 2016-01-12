<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */?>
<?php 
session_start();
include('../inc/config.php');
include('../inc/function.php');
//memanggil status login 
update_status_login("0",$_SESSION['idpelanggan']);

session_destroy();
header("location:../index.php");
?>