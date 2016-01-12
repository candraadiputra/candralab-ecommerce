<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */?>
<section class="main-content">

	<div class="row">
		<div class="span9">
<div class='span8 offset1'>	
<?php
$kd_transaksi = $_GET['kd_transaksi'];
$totalBayar = $_GET['total_bayar'];?>

<h3> Selamat,Transaksi sukses di lakukan</h2>
<h3> Kode Pesan :<?=$kd_transaksi;?></h2>
<h3>Total Harga :<?=format_rupiah($totalBayar);?></h2>


</h2>
<p>
	Silahkan transfer uang ke
</p>
<blockquote>
	Candra Adi Putra
	<br>
	BNI Syariah Yogyakarta
	<br>
	No Rek 978934234343
	<br>
</blockquote>
<hr>
<p>
	Langkah selanjutnya :
	<ol>
	<li>Silahkan transfer sesuai dengan uang jumlah total transaksi</li> 
	<li>Konfirmasi lewat SMS /Telp ke no 0274 123 123 </li>
	<li>Cek status pembayaran dan pengiriman barang di halaman invoice </li>
	</ol>
</p>
</div>		
		</div>
<?php
include('inc/sidebar-front.php');
?>
	</div>
</section>		
