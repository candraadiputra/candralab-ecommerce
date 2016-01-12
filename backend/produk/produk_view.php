<?php //===========CODE DELETE RECORD ================
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}

if (isset($_GET['act'])) {
	$id = $_GET['id'];
	$sql = "delete from produk where idproduk='$id' ";
	mysql_query($sql) or die(mysql_error());

}
					?>

<div>
	<h2 id="headings"> Data produk</h2>
	<!--<a href='index.php?mod=produk&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>Nama </b></td><td><b>Deskripsi</b></td><td><b>Kategori</b></td><td style='min-width: 100px'><b>Aksi</b></td></th>
		</thead>
		<tbody>
<?php
$batas='10';
$tabel="produk";
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
$query="SELECT produk.*, kategori.nama_kategori
 from produk,kategori
 where produk.idkategori=kategori.idkategori
 limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><?php echo $posisi+$no
				?></td>
			
				<td><?php echo $rows -> nama_produk; ?></td>
				<td><?php echo $rows ->deskripsi; ?></td>
			
		
			<td><?php echo $rows -> nama_kategori; ?></td>
			
				<td>	
					
					<a href="index.php?mod=produk&pg=produk_form&id=<?= $rows -> idproduk; ?>"

				class='btn btn-warning'> <i class="icon-pencil"></i></a><a href="index.php?mod=produk&pg=produk_view&act=del&id=<?= $rows -> idproduk; ?>"
				onclick="return confirm('Yakin data akan dihapus?') ";
				class='btn btn-danger'> <i class="icon-trash"></i></a></td>
			</tr>
			<?php $no++;
				}
			?>

			<tr>
				<td colspan='4' ></td><td><a href="index.php?mod=produk&pg=produk_form"
				class='btn btn-primary'	><i class="icon-plus"></i></a></td>
			</tr>
		</tbody>
	</table>
	<?php //=============CUT HERE for paging====================================
	$tampil2 = mysql_query("SELECT idproduk from produk");

	$jmldata = mysql_num_rows($tampil2);
	$jumlah_halaman = ceil($jmldata / $batas);
?>
<div class='pagination'> 
	<ul>
<?php pagination($halaman, $jumlah_halaman, "produk"); ?>
	</ul>
</div>
<div class='well'>Jumlah data :<strong><?= $jmldata; ?> </strong></div>
<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if (isset($_GET['status'])) {
	if ($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}

//close database
?>

</div>
