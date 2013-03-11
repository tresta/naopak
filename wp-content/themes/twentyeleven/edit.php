<?php

    $connection = @mysql_connect('localhost', 'root', '');
    $db = @mysql_select_db('bollo_naopak', $connection);
		
	$tabela = $_POST['tabela'];
	$wiersz = $_POST['wiersz'];
	$wartosc = $_POST['nowa_wartosc'];
	
	
	
	$sql_kat = @mysql_query("UPDATE t_subcategory SET nazwa='".$wartosc."' WHERE subID=".$wiersz."");

	echo $tabela.$wiersz.$wartosc;
	
	mysql_close($connection);
?>