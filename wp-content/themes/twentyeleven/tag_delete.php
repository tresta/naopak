<?php

    $connection = @mysql_connect('localhost', 'root', '');
    $db = @mysql_select_db('bollo_naopak', $connection);
		
	$tabela = $_POST['tabela'];
	$wiersz = $_POST['wiersz'];
	
	echo "tabela: ".$tabela." , wiersz: ".$wiersz;
	
	$sql_tag = @mysql_query("DELETE FROM s_".$tabela." WHERE id = ".$wiersz."");
	/*if($asd == FALSE) 
	{
		mysql_close($connection);
		die('Error in delete.php!');
	}*/
	echo $prom;
	mysql_close($connection);
?>