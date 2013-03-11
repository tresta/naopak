<?php // add subcategory

    $connection = @mysql_connect('localhost', 'root', '');
    $db = @mysql_select_db('bollo_naopak', $connection);
		
	$sub_nazwa = $_POST['sub_nazwa'];
	$parent_id = $_POST['id_rodzic'];

	$sql_subcat = mysql_query("INSERT INTO t_subcategory (nazwa, catID) VALUES ('".$sub_nazwa."', ".$parent_id.")");
	
	$last_id_query = mysql_query("SELECT MAX(subID) FROM t_subcategory");
	$last_id =  mysql_fetch_row($last_id_query);
	echo trim($last_id[0]);
		
	mysql_close($connection);
?>

