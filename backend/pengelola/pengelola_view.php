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
					$sql = "delete from pengelola where idpengelola='$id' ";
					mysql_query($sql) or die(mysql_error());

				}
?>

	<h2 id="headings"> Data pengelola</h2>
	<table  class="table table-condensed table-striped table-hover">
		<thead>
		<th class='info'><td><b>Nama </b></td><td><b>username</b></td><td><b>Aksi</b></td></th>
		</thead>
		<tbody>
		<?php
$query="SELECT * from pengelola ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

		?>
		<tr>
			<td><? echo $no
			?></td>
			<td><b><?		echo $rows ->nama;?><b></td>
				
						<td><?		echo $rows ->username;?></td>
			<td><a href="index.php?mod=pengelola&pg=pengelola_form&id=
				<?=	$rows -> idpengelola;?>" class='btn btn-warning'><i class="icon-pencil"></i></a><a href="index.php?mod=pengelola&pg=pengelola_view&act=del&id=<?=	$rows -> idpengelola;?>"
			onclick="return confirm('Yakin data akan dihapus?') ";
			class='btn btn-danger'> <i class="icon-trash"></i></a></td>
		</tr>
		<?
	$no++;
	}?>

		<tr>
			<td colspan=3 ></td><td><a href="index.php?mod=pengelola&pg=pengelola_form"
			class='btn btn-primary'	><i class="icon-plus"></i></a></td>
		</tr>
		</tbody>
	</table>
	<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if(isset($_GET['status'])) {
	if($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}

mysql_close();
//close database	?>


