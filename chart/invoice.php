
<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */
cek_status_login($_SESSION['idpelanggan']);
?>
<section class="main-content">

	<div class="row">
		<div class="span9">

	


	<h4 id="headings"> Data invoice</h4>
	<!--<a href='index.php?mod=invoice&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>Nama </b></td><td><b>Kd Invoice</b></td><td><b>Tanggal Transaksi</b></td><td><b>Total Transaksi</b></td><td><b>Pembayaran</b></td><td><b>Tgl Kirim</b></td></th>
		</thead>
		<tbody>
<?php

$id=$_SESSION['idpelanggan'];
$query="SELECT invoice.*,pelanggan.nama
 from invoice,pelanggan
 where invoice.idpelanggan=pelanggan.idpelanggan
 and pelanggan.idpelanggan='$id'
";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><? echo $posisi+$no
				?></td>
			
				<td><? echo $rows -> nama; ?></td>
			<td><a href='index.php?mod=chart&pg=invoice_detail&id=<? echo $rows -> noinvoice; ?>'><? echo $rows -> noinvoice; ?></a></td>
			<td><? echo $rows -> tanggal; ?></td>
				<td><? echo format_rupiah($rows ->totalbayar); ?></td>
		
			<td><? echo get_status_invoice($rows -> transfer); ?></td>
			<td><? echo tglkirim($rows -> tglkirim); ?>
				
				</td>
			
				
			</tr>
			<? $no++;
				}
			?>

			
		</tbody>
	</table>


</div>
	
		
<?php
include('inc/sidebar-front.php');
?>
	</div>
</section>	
