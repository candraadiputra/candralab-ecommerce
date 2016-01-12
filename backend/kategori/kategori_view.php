

<?php /* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
//===========CODE DELETE RECORD ================

if (isset($_GET['act'])) {
	$id = $_GET['id'];
	$sql = "delete from kategori where idkategori='$id' ";
	mysql_query($sql) or die(mysql_error());

}
//==========================================
?>

	<h2 id="headings"> Data kategori</h2>

	<table  class="table table-striped table-bordered table-condensed">
		<thead>
		<th><td><h4>Nama kategori </h4></td><td><h4>Aksi</h4></td></th>
		</thead>
		<tbody>
		<?php
						//bata paging 
	$batas=5;
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
	$posisi=0;
	$halaman=1;
}else{
	$posisi=($halaman-1)* $batas;
}
$query="SELECT * from kategori limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

		?>
		<tr>
			<td><? echo $posisi+$no
			?></td>
			<td><? echo $rows -> nama_kategori; ?></td>
			
			
			
			<td><a href="index.php?mod=kategori&pg=kategori_form&id=<?= $rows -> idkategori; ?>"
				 class='btn btn-warning'><i class="icon-pencil"></i></a><a href="index.php?mod=kategori&pg=kategori_view&act=del&id=<?= $rows -> idkategori; ?>"
			onclick="return confirm('Yakin data akan dihapus?') ";
			class='btn btn-danger'> <i class="icon-trash"></i></a></td>
		</tr>
		<? $no++;
		}
	?>

		<tr>
			<td colspan='2' ></td><td><a href="index.php?mod=kategori&pg=kategori_form"
			class='btn btn-primary'	><i class="icon-plus"></i></a></td>
		</tr>
		</tbody>
	</table>
<?php //=============CUT HERE for paging====================================
		$tampil2 = mysql_query("select idkategori from kategori");
		$jmldata = mysql_num_rows($tampil2);
		$jumlah_halaman = ceil($jmldata / $batas);

		echo "<div class='pagination'> <ul>";
		for ($i = 1; $i <= $jumlah_halaman; $i++)

			echo "<li><a href='index.php?mod=kategori&pg=kategori_view&halaman=$i'>$i</a></li>";

		mysql_close();
	?>
</ul>
</div>
<br>Jumlah data :<?= $jmldata; ?>

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


