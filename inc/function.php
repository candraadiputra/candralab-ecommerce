<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */
 
function query($qry) {
	$result = mysql_query($qry) or die("Gagal melakukan query pada :
	 <br>$qry<br><br>Kode Salah : <br>&nbsp;&nbsp;&nbsp;" . mysql_error() . "!");
	return $result;
}
function fetch_row($qry) {
	$tmp = query($qry);
	list($result) = mysql_fetch_row($tmp);
	return $result;
}
function tglkirim($tgl)	{	
				if(!empty($tgl)){
				return  tampil_tanggal($tgl);
				}else{
					echo "belum dikirim";
				}
			}
function get_status_invoice($id) {

	  if ($id == '0') {
		echo  'belum bayar';
	} else if ($id == '1') {
		echo  'Sudah lunas';
	}
}
function cek_akses_langsung(){
	if(!isset($_GET['pg'])){
		echo "<p style='color:red'>Maaf, akses langsung tidak diperbolehkan</p>";
		exit();
	}
}
function cek_status_login($param){
//	cek_akses_langsung();
	if(empty($param)){
			echo "<p style='color:red'>Maaf, Anda Belum login</p>";
		exit();
		
	}
}
function list_kategori() {
	
		
	$query = query("SELECT idkategori, nama_kategori FROM kategori ");
	while ($row = mysql_fetch_row($query)) {
	
			echo "<li><a href='index.php?mod=page&pg=produk&idkategori=".$row[0]."'>" . ucwords($row[1]) . "</a> </li>";
		
	}
}
function list_news($jumlah) {
	
		
	$query = query("SELECT idberita,judul FROM berita order by tanggal desc limit $jumlah");
	while ($row = mysql_fetch_row($query)) {
	
			echo "<li><a href='index.php?mod=page&pg=berita&idberita=".$row[0]."'>" . ucwords($row[1]) . "</a> </li>";
		
	}
}
function get_status_stok($jumlah) {

	  if ($jumlah == '0') {
		return 'habis';
	} else  {
		return $jumlah;
	}
}
/* fungsi bantu style*/
function get_style($no){
	if($no%2==1){
		echo "odd";
	}else if($no%2==0){
		echo "even";
	}
}
function list_merek() {
	
		echo "	<li class=\"nav-header\">merek </li>";
	$query = query("SELECT idmerek, nama_merek FROM merek");
	while ($row = mysql_fetch_row($query)) {
	
			echo "<li><a href='index.php?mod=katalog*pg=katalog_list&idmerek=".$row[0]."'><i class='icon-list'></i>" . ucwords($row[1]) . "</a> </li>";
		
	}
}

function update_status_login($status,$idpelanggan) {
	
	query("update pelanggan set status='$status' where idpelanggan='$idpelanggan'");
}
function count_stat(){
	if(get_today_stat()<1){
		query("insert counter(tanggal,jumlah) values(curdate(),'1')");
	}else{
		query("update  counter set jumlah=jumlah+1 where tanggal=curdate()");
	}
}
function get_today_stat(){
	$hasil=fetch_row("select jumlah from counter where tanggal=curdate()");
	return $hasil;
}
function get_month_stat(){
	$hasil=fetch_row("select sum(jumlah) from counter where month(tanggal)= month(now()) 
	and year(tanggal)=year(now())");
	return $hasil;
}
function get_total_stat(){
	$hasil=fetch_row("select sum(jumlah) from counter");
	return $hasil;
}

function arrayToObject($array) {
    if(!is_array($array)) {
        return $array;
    }

    $object = new stdClass();
    if (is_array($array) && count($array) > 0) {
      foreach ($array as $name=>$value) {
         $name = strtolower(trim($name));
         if (!empty($name)) {
            $object->$name = arrayToObject($value);
         }
      }
      return $object;
    }
    else {
      return FALSE;
    }
}


function pagination($halaman, $jumlah_halaman, $tabel) {
	$baselink = "index.php?mod=" . $tabel . "&pg=" . $tabel . "_view&halaman=";
	if($halaman > 1) {
		$previous = $halaman - 1;
		echo "<li><a href='" . $baselink . "1'><i class='icon-fast-backward'></i></a></li>";
		echo "<li><a href='" . $baselink . $previous . "'><i class='icon-step-backward'></i></a></li>";
	} else {
		echo "<li><a href=''><i class='icon-fast-backward'></i></a></li><li><a href=''><i class='icon-step-backward'></i></a></li>";
	}
	
	$angka = ($halaman > 3) ? "<li><a href=''>...</a></li>" : " ";
	for($i = $halaman - 2; $i < $halaman; $i++) {
		if($i < 1)
			continue ;
		$angka .= "<li><a href='" . $baselink . $i . "'>" . $i . "</a></li>";
	}
	$angka .= "<li> <a href='' class='btn btn-primary'>".$halaman."</a></li>";
	for($i = $halaman + 1; $i < $halaman + 3; $i++) {
		if($i > $jumlah_halaman)
			break;
		$angka .= "<li><a href='" . $baselink . $i . "'>" . $i . "</a></li>";
	}
	$angka .= ($halaman + 2 < $jumlah_halaman ? "<li><a href=''>...</a></li>
	<li><a href='" . $baselink . $jumlah_halaman . "'>$jumlah_halaman</a></li>" : "");
	echo $angka;
	
	/*
	 for($i = 1; $i <= $jumlah_halaman; $i++) {
	 if($halaman != $i) {
	 echo "<li><a href='" . $baselink . $i . "'>" . $i . "</a></li>";
	 } else {
	 echo "<li><a href='' class='btn btn-primary'><b>$i</b></a></li>";
	 }
	 }
	 *
	 */

	if($halaman < $jumlah_halaman) {
		$next = $halaman + 1;
		echo "<li><a href='" . $baselink . $next . "'><i class='icon-step-forward'></i></a></li>";
		echo "<li><a href='" . $baselink . $jumlah_halaman . "'><i class='icon-fast-forward'></i></a></li>";
	} else {
		echo "<li>	<a href=''><i class='icon-step-forward'></i></a></li><li><a href=''> <i class='icon-fast-forward'></i></a></li>";
	}

}



function combo_kategori($kode) {
	echo "<option value='' selected>- Pilih Kategori -</option>";
	$query = query("SELECT *   FROM kategori");
	while ($row = mysql_fetch_row($query)) {
		if ($kode == "")
			echo "<option value='$row[0]'> " . ucwords($row[1]) . " </option>";
		else
			echo "<option value='$row[0]'" . selected($row[0], $kode) . "> " . ucwords($row[1]) . " </option>";
	}
}
function combo_produk($kode) {
	echo "<option value='' selected>- Pilih Produk -</option>";
	$query = query("SELECT idproduk,nama_produk   FROM produk");
	while ($row = mysql_fetch_row($query)) {
		if ($kode == "")
			echo "<option value='$row[0]'> " . ucwords($row[1]) . " </option>";
		else
			echo "<option value='$row[0]'" . selected($row[0], $kode) . "> " . ucwords($row[1]) . " </option>";
	}
}

function get_today() {
	$today = date("Y-m-d");
	return $today;
}

function format_rupiah($rp) {
	$hasil = "<b>Rp." . number_format($rp, 0, "", ".") . ",00</b>";
	return $hasil;
}

function num_rows($qry) {
	$tmp = query($qry);
	$jum = mysql_num_rows($tmp);
	return $jum;
}

function valid($tmp) {
	return htmlentities(addslashes($tmp));
}

//fungsi untuk meremove koma didepan dan dibelakang
function rm_koma($data) {
	$ret = substr($data, 0, -1);

	return $ret;
}



function combo_hari($kode) {
	echo "<option value='0' selected>-  hari -</option>";
	$hari = array('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu');
	foreach($hari as $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
}

function combo_bulan($kode) {
	echo "<option value='' selected>Bulan</option>";
	$hari = array('Januari', 'Febuari', 'maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	foreach($hari as $key => $value) {
		if($kode == "")
			echo "<option value='$key'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$key'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
}


function combo_tahun($kode) {
	echo "<option value='' selected>Tahun</option>";
	$tahun = array('2011', '2012', '2013');
	foreach($tahun as $key => $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
}


function konversi_bulan($bln) {
	switch($bln) {
		case "1" :

		case "01" :
			$bulan = "Januari";
			break;
		case "2" :

		case "02" :
			$bulan = "Februari";
			break;
		case "3" :

		case "03" :
			$bulan = "Maret";
			break;
		case "4" :

		case "04" :
			$bulan = "April";
			break;
		case "5" :

		case "05" :
			$bulan = "Mei";
			break;
		case "6" :

		case "06" :
			$bulan = "Juni";
			break;
		case "7" :

		case "07" :
			$bulan = "Juli";
			break;
		case "8" :

		case "08" :
			$bulan = "Agustus";
			break;
		case "9" :

		case "09" :
			$bulan = "September";
			break;
		case "10" :
			$bulan = "Oktober";
			break;
		case "11" :
			$bulan = "November";
			break;
		case "12" :
			$bulan = "Desember";
			break;
		default :
			$bulan = "Nooooooot..!!";
	}
	return $bulan;
}

function konversi_tanggal($time) {
	list($thn, $bln, $tgl) = explode('-', $time);
	$tmp = $tgl . " " . konversi_bulan($bln) . " " . $thn;
	return $tmp;
}

function tampil_tanggal($time) {
	list($date, $time) = explode(' ', $time);
	$tmp = konversi_tanggal($date) . " " . $time;
	return $tmp;
}

function selected($t1, $t2) {
	if(trim($t1) == trim($t2))
		return "selected";
	else
		return "";
}

function get_date($tgl = '') {
	if($tgl == "")
		$now = date("d");
	else
		$now = $tgl;
	$jum_hr = date("t");
	for($i = 1; $i <= $jum_hr; $i++) {
		echo "<option value='$i' " . selected($i, $now) . ">$i</option>";
	}
}

function get_month($bln = '') {
	if($bln == "")
		$now = date("m");
	else
		$now = $bln;
	$jum_bl = 12;
	for($i = 1; $i <= $jum_bl; $i++) {
		echo "<option value='$i' " . selected($i, $now) . ">" . konversi_bulan($i) . "</option>";
	}
}

function get_year($thn = '') {
	if($thn == "") {
		$now = date("Y");
		$thn = date("Y");
	} else {
		$now = date("Y");
		$thn = $thn;
	}
	$jum_th = 3;
	for($i = 1; $i <= $jum_th; $i++) {
		echo "<option value='$now' " . selected($thn, $now) . ">" . $now . "</option>";
		$now--;
	}
}?>
