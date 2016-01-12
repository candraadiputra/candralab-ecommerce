<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */
 ?>
<div class="span6  offset1 well">
	<form method="POST" id="form1" class='form-horizontal' action="login/login_action.php">
		<legend>
			Login  Pengelola
		
		</legend>
	
		<div class="control-group">
			<label class="control-label" for="nama">username</label>
			<div class="controls">
				<input   type="text" name='username' >
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama">Password</label>
			<div class="controls">
				<input   type="password" name='password'>
			</div>
		</div>
		<a href='../index.php'>Back to web</a>
		<div class="row">
			<div class="span4 offset2">
				
				<input type="submit"  name="login" class="btn btn-primary" value='login'>
			</div>
			
		</div>
	</form>
</div>
