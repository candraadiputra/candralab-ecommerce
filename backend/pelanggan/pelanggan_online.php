<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */
 if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
?>
<div>
	<h2 id="headings">  pelanggan Yang sedang Online</h2>
	<!--<a href='index.php?mod=pelanggan&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>Nama </b></td><td><b>Email</b></td><td><b>No Telp</b></td></th>
		</thead>
		<tbody>
<?php
$batas='10';
$tabel="pelanggan";
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
$query="SELECT pelanggan.*
 from pelanggan where status='1'
 limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><? echo $posisi+$no
				?></td>
			
				<td><?		echo $rows -> nama;?></td>
			<td><?		echo $rows ->email;?></td>
			<td><?		echo $rows->telp;?></td>
			
			
			</tr>
			<?	$no++;
	}?>

		</tbody>
	</table>


</div>
