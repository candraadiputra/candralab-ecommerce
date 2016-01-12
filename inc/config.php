<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */?>
 
<?php	
	define('db_host','localhost');
	define('db_user','root');
	define('db_pass','');
	define('db_name','candralabcommercedb');
	
	mysql_connect(db_host,db_user,db_pass);
	mysql_select_db(db_name);
	
?>
