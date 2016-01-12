<?php
//cek_akses_langsung();
?>
<section class="main-content">

	<div class="row">
		<div class="span9">
			<ul class="thumbnails listing-products">
				
				<?php 
				$query = " SELECT produk.*,stok.* from produk,stok
				where produk.idproduk=stok.idproduk
				 ";
				$id = $_GET['idkategori'];
if(!empty($id)){				
$query = " SELECT produk.*,stok.*
 from produk,stok
  where produk.idkategori='$id'
  and produk.idproduk=stok.idproduk";
}
$result = mysql_query($query) or die(mysql_error());
$no = 1;
//proses menampilkan data
while($rows = mysql_fetch_object($result)) {
?>
				
				<li class="span3">
					<div class="product-box" >
						<span class="sale_tag"></span>
						<a href="#">    <?php
						if (!empty($rows -> foto)) {
							echo "<img src='upload/produk/" . $rows -> foto . "' />";
						}
					?>	</a>
						<br/>
						<a href="#" class="title"><?=$rows->nama_produk?></a>
						<br/>
						<a href="#" class="category"><?=$rows->deskripsi?></a>
						<p class="price">
							<?=format_rupiah($rows->harga_jual)?>
						</p>
						<p>
							<span class="label label-warning">Stok <?php echo   get_status_stok($rows->jumlah)?></span>
						</p>
						<?php
						if(!empty($_SESSION['idpelanggan']) && ($rows->jumlah>0)){ ?>
						<a href='index.php?mod=chart&pg=chart&action=add&id=<?=$rows->idproduk?>' class='btn btn-warning'><i class='icon-shopping-cart icon-white'></i>Beli</a>
						<?php } ?>
					</div>
				</li>
		<?php } ?>
			<div class='clearfix'></div>
		
		</div>
<?php
include ('inc/sidebar-front.php');
?>
	</div>
</section>
