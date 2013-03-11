<?php

    $connection = @mysql_connect('localhost', 'root', '');
    $db = @mysql_select_db('bollo_naopak', $connection);

	$tabela = $_POST['tabela'];
	
	@mysql_query("DELETE FROM t_category WHERE id = ".$tabela);
	@mysql_query("DELETE FROM t_subcategory WHERE catID = ".$tabela);

	mysql_close($connection);
?>