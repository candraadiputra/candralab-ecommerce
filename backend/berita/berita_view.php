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
		//===========CODE DELETE RECORD ================
			
				if(isset($_GET['act'])) {
					$id = $_GET['id'];
					$sql = "delete from berita where idberita='$id' ";
					mysql_query($sql) or die(mysql_error());

				}
				//==========================================?>
<div class='bs-docs-example'>
	<h2 id="headings"> Data berita</h2>
	<table  class="table table-striped table-condensed">
		<thead>
		<th><td><h4>Judul berita </h4></td><td><h4>Aksi</h4></td></th>
		</thead>
		<tbody>
		<?php
				//bata paging 
$batas='10';
$tabel="berita";
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
		
$query="SELECT * from berita order by tanggal desc limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

		?>
		<tr>
			<td><? echo $posisi+$no
			?></td>
			<td><?		echo $rows -> judul;?></td>
			<td><a href="index.php?mod=berita&pg=berita_form&id=<?=	$rows -> idberita;?>" 
				class='btn btn-warning'><i class="icon-pencil"></i></a><a href="index.php?mod=berita&pg=berita_view&act=del&id=<?=	$rows -> idberita;?>"
			onclick="return confirm('Yakin data akan dihapus?') ";
			class='btn btn-danger'> <i class="icon-trash"></i></a></td>
		</tr>
		<?
	$no++;
	}?>

		<tr>
			<td colspan='2' ></td><td><a href="index.php?mod=berita&pg=berita_form"
			class='btn btn-success'	><i class="icon-plus"></i></a></td>
		</tr>
		</tbody>
	</table>
<?php	
//=============CUT HERE for paging====================================
$tampil2=mysql_query("select idberita from berita");
$jmldata=mysql_num_rows($tampil2);
$jumlah_halaman=ceil($jmldata/$batas);


echo "<div class='pagination'> <ul>";
for($i=1;$i<=$jumlah_halaman;$i++) 

echo "<li><a href='index.php?mod=berita&pg=berita_view&halaman=$i'>$i</a></li>";

mysql_close();
?>
</ul>
</div>
<br>Jumlah data :<?=$jmldata;?>
	<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if(isset($_GET['status'])) {
	if($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}

//close database	?>

</div>
