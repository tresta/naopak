<?php

    $connection = @mysql_connect('localhost', 'root', '');
    $db = @mysql_select_db('bollo_naopak', $connection);
		
	$tabela = $_POST['tabela'];
	$wiersz = $_POST['wiersz'];
	$wartosc = $_POST['nowa_wartosc'];
	
	
	
	$sql_tag = @mysql_query("UPDATE s_".$tabela." SET nazwa='".$wartosc."' WHERE id=".$wiersz."");

	echo $tabela.$wiersz.$wartosc;
	
	mysql_close($connection);
?>