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
	

				$aksi = 'tambah';
				if(isset($_GET['id'])) {
					$aksi = "edit";
					$id = $_GET['id'];
					//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
					$sql = "select * from kategori where idkategori='$id' ";
					$result = mysql_query($sql) or die(mysql_error());
					$baris = mysql_fetch_object($result);

				} else {
					$aksi = "tambah";
				}?>

<form  id="form1" class="form-horizontal" method="POST" 
enctype="multipart/form-data" action="kategori/kategori_action.php">
	<legend>
		kategori
	</legend>
	<input type='hidden' name='id' value="<?=$id?>">
	<div class="control-group">
		<label class="control-label" for="nama">Nama kategori</label>
		<div class="controls">
			<input type="text" name='nama_kategori'
			value=<?=$baris -> nama_kategori;?>
			>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-success" name='aksi'value=<?=$aksi?>>
			<?=$aksi
			?>
			</button>
			</div>
			</div>
			</form>
			