<?php

    $connection = @mysql_connect('localhost', 'root', '');
    $db = @mysql_select_db('bollo_naopak', $connection);

	$wiersz = $_POST['wiersz'];
	
	$sql_kat = @mysql_query("DELETE FROM t_subcategory WHERE subID = ".$wiersz."");

	mysql_close($connection);
?>