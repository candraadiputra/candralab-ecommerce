
<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */
 session_start();
 cek_status_login($_SESSION['username']); 
require_once ('../../inc/config.php');
//data dari berita
if(isset($_POST)){
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$aksi = mysql_real_escape_string($_POST['aksi']);
$id = $_POST['id'];


$berita_file = $_FILES['gambar']['tmp_name'];
$gambar_file = $_FILES['gambar']['name'];
$tipe_file = $_FILES['gambar']['type'];
$ukuran_file = $_FILES['gambar']['size'];
$direktori = "../../upload/berita/$gambar_file";
$sql = null;
$MAX_FILE_SIZE = 1000000;
//100kb
if($ukuran_file > $MAX_FILE_SIZE) {
	header("Location:../index.php?mod=berita&pg=berita_form&status=1");
	exit();
}
$sql = null;
if($ukuran_file > 0) {
	move_uploaded_file($berita_file, $direktori);
}

if($aksi == 'tambah') {
	$sql = "INSERT INTO berita(judul,gambar,tanggal,isi,aktif)
		VALUES('$judul','$gambar_file',now(),'$isi','1')";
}else if($aksi== 'edit') {
	if($ukuran_file > 0){
	$sql = "update berita set judul='$judul',
	gambar='$gambar_file',isi='$isi'
	where idberita='$id'";
	}else{
		$sql = "update berita set judul='$judul',
	isi='$isi'
	where idberita='$id'";
	}
}

$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if ($result) {
	header('location:../index.php?mod=berita&pg=berita_view&status=0');
} else {
	header('location:../index.php?mod=berita&pg=berita_view&status=1');
}
mysql_close();
}
?>
