<?php

    $connection = @mysql_connect('localhost', 'root', '');
    $db = @mysql_select_db('bollo_naopak', $connection);
		
	$cat_name = $_POST['new_category'];
	
	@mysql_query("INSERT INTO t_category (nazwa) VALUES ('".$cat_name."')");	
	
    mysql_close($connection);
?>