<?php

    $connection = @mysql_connect('localhost', 'root', '');
    $db = @mysql_select_db('bollo_naopak', $connection);
		
	$tabela = $_POST['tabela'];
	$nowa_wartosc = $_POST['nowa_wartosc'];
	
	$sql_tag = @mysql_query("INSERT INTO s_".$tabela." (nazwa) VALUES ('".$nowa_wartosc."')");
		
	$last_id_query = @mysql_query("SELECT MAX(id) FROM s_".$tabela."");
	$last_id =  mysql_fetch_row($last_id_query);
	//$data['last_id'] = $last_id;
	echo $last_id[0];

	mysql_close($connection);
?>