<?php 
try
	{
	$base = new PDO('mysql:host=localhost;dbname=test;charset=utf8','','');
}
catch(Exeption $e)
	{
		die('Erreur '.$e->getMessage());
}
 ?>