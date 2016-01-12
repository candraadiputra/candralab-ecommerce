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
	<h2 id="headings"> Profile</h2>
	<!--<a href='index.php?mod=pelanggan&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table  class="table table-striped table-condensed">
		
		<tbody>
<?php
$id=$_SESSION['idpelanggan'];
$query="SELECT pelanggan.*
 from pelanggan
 where idpelanggan='$id'";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

			?>
		
			
				<tr><td>Nama </td><td><?php echo $rows -> nama; ?></td></td></tr>
			
			<tr><td>Email </td><td><?php echo $rows -> email; ?></td></td></tr>
				<tr><td>Telepon </td><td><?php echo $rows -> telp; ?></td></td></tr>
					<tr><td>Alamat </td><td><?php echo $rows -> alamat; ?></td></td></tr>
						<tr><td>Kota </td><td><?php echo $rows -> kota; ?></td></td></tr>
							<tr><td>Kode Post </td><td><?php echo $rows -> kodepos; ?></td></td></tr>
								<tr><td> Tanggal Daftar</td><td><?php echo tampil_tanggal($rows -> tanggal_daftar); ?></td></td></tr>
			
			
			
			</tr>
			<?php	$no++;
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