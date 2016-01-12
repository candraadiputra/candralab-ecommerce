<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */
cek_status_login($_SESSION['username']); 
	$aksi = null;
	if(isset($_GET['id'])) {
		$aksi = "edit";
		$id = $_GET['id'];
		//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
		$sql = "select * from berita where idberita='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$baris = mysql_fetch_object($result);

	} else {
		$aksi = "tambah";
	}?>
	<script type="text/javascript" src="../assets/bootstrap/js/tinymce/tiny_mce.js"></script>
<script type="text/javascript" src='../assets/bootstrap/js/editor.js'></script> 

<form  class="form-horizontal" method="POST" id="form1" action="berita/berita_action.php" enctype="multipart/form-data">
 <legend>  berita</legend>
	<input type='hidden' name='id' value="<?=$id?>">
  <div class="control-group">
    <label class="control-label" for="judul">judul</label>
    <div class="controls">
      <input type="text" name='judul' id="judul" class='input-xxlarge'
      value='<?=$baris->judul;?>' >
    </div>
   </div>
    
  <div class="control-group">
    <label class="control-label" for="gambar">Gambar</label>
    <div class="controls">
      <input type="file" name='gambar' id="gambar"
       >
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="isi">isi</label>
    <div class="controls">
      <textarea name='isi'  rows="20" class='input-xxlarge'><?=$baris->isi;?> </textarea>
     
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
     
      <button type="submit" class="btn btn-success" name='aksi'value=<?=$aksi?> ><?=$aksi?></button>
    </div>
  </div>
</form>

<div id="form1_errorloc"  class="text-error"></div>
