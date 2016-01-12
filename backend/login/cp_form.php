<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */
 ?>
	<div class="span3 offset2">
			<form method="POST" id="form1" action="login/cp_action.php">
				
				<fieldset>
					<legend>
					Ganti Password
					</legend>
			
					<input type='hidden' name='username' value='<?php echo $_SESSION['username']?>'>
						
				
					<div class="clearfix">
						<label for="input">Password </label>
						<div class="input">
					
					
							<input class="xlarge required" id="xlInput" 
							name="password" size="30" type="password">
							
							
						</div>
					</div>
				
					<div class="span2 offset1">
					
						<input type="submit"  name="aksi" class="btn btn-primary" value='ubah'>
					</div>
				</fieldset>
			</form>
			
			<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS 
if (isset($_GET['status'])) {
	if ($_GET['status'] == 0) {
		echo " <p class='text-success'>Ganti password berhasil</p>";
	} else {
		echo "<p class='text-error'>Ganti password gagal</p>";
	}
}
	?>
</div>


