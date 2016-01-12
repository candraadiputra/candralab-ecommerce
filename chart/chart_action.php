<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */?>

<?php
session_start();

require_once ('../inc/config.php');
require_once ('../inc/function.php');
require_once ('../chart/chart.inc.php');
$idpelanggan=$_SESSION['idpelanggan'];

	/* menambahkan kode pesan dan detail pesan kedalam database*/
	$kd_transaksi = kd_transaksi();

	$total_bayar = $_SESSION['totalbayar'];

	insertToDB($kd_transaksi,$idpelanggan,$total_bayar);
 unset($_SESSION['chart']); 
	//check if query successful

$link="location:../index.php?mod=chart&pg=finish&total_bayar=$total_bayar&kd_transaksi=$kd_transaksi";
		header($link);

?>
