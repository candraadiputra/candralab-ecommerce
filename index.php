<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */?>
 
<?php
session_start();
include('inc/function.php');
include('inc/config.php');
include('inc/header-front.php');

//content 

$pg = '';
/*
 * PHP Code untuk mendapatkan halaman view masing masing tabel
 */

if(!isset($_GET['pg'])) {
		include ('page/produk.php');
	} else {
		$mod=$_GET['mod'];
	$pg = $_GET['pg'];

	include  $mod."/". $pg . ".php";

}

include('inc/footer-front.php');



?>	