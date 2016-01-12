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
	$aksi = null;
	if(isset($_GET['id'])) {
		$aksi = "edit";
		$id = $_GET['id'];
		//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
			$sql = "select * from produk where idproduk='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_object($result);

	} else {
		$aksi = "tambah";
	}?>



	<!--kolom kiri-->

		<h2> Form produk</h2>
		
<form  class="form-horizontal" method="POST" id="form1"  enctype="multipart/form-data"
action="produk/produk_action.php">
	
		<?php		$id = $_GET['id'];?>
		<input type='hidden' name='id' value="<?=$id?>">
	<div class="control-group">
			<label class="control-label" for="nama_produk">Nama Produk</label>
			<div class="controls">
				<input type="text" name='nama_produk' value='<?=$data->nama_produk?>'class='required'
				>
			</div>
		</div>
	<div class="control-group">
			<label class="control-label" for="idkategori">kategori</label>
			<div class="controls">
				<select id='idkategori' name='idkategori' class="required " >
						<?php
   
    combo_kategori($data->idkategori);
   	?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="foto">Gambar</label>
			<div class="controls">
				<input type="file" name='foto' 
				>
			</div>
		</div>
		
	
		<div class="control-group">
			<label class="control-label" for="deskripsi">deskripsi</label>
			<div class="controls">
				<textarea name='deskripsi' class="input-xxlarge">
					<? echo trim($data->deskripsi)?>
				</textarea>
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-success" name='aksi'value='<?=$aksi?>'>
				<?=$aksi?>
				</button>
			</div>
		</div>

</form>
</div>