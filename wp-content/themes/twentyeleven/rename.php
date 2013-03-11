<?
/*
function renamefile($name, $file_id, $z, $na)
{
	$path_to_image_directory = '../../../img/products/'.$file_id.'/';

	if(!file_exists($path_to_image_directory)) 
	{   
		die("There was a problem. Please try again!");  
		
	}


	$old = $z."_".$name.".jpg";
	$new = $na."_".$name.".jpg";
	$tmp = "dok_tmp";

	rename($path_to_image_directory.$old, $path_to_image_directory.$tmp);
	rename($path_to_image_directory.$new, $path_to_image_directory.$old);
	rename($path_to_image_directory.$tmp, $path_to_image_directory.$new); 

}

	$file_id = $_POST['id'];
	$z = $_POST['z'];
	$na = $_POST['na'];

	renamefile("_e", $file_id, $z, $na);
	renamefile("_m", $file_id, $z, $na);
	renamefile("_n", $file_id, $z, $na);
    renamefile("_t", $file_id, $z, $na);
	
	
	
	ONLY SQL RENAME !@!@!@!@!@
	*/
	
	
/*	
	echo '{';
	echo				'"file_id": ' . $file_id . ',';
	echo				'"z": ' . $z . ',';
	echo				'"na": ' . $na;
	echo '}';
*/


    $connection = @mysql_connect('localhost', 'root', '');
    $db = @mysql_select_db('bollo_naopak', $connection);
		
	$sql = "UPDATE s_zdjecia SET ";
	$sql .= "zdj".($_POST['file_number1']+1)." = '".$_POST['img_to']."', ";
	$sql .= "zdj".($_POST['file_number2']+1)." = '".$_POST['img_from']."'";
	$sql .= " WHERE id_produkt = '".$_POST['prod_id']."'";
	
	echo $sql;
	
	mysql_query($sql);
	//$img_names =  mysql_fetch_row($result);

	mysql_close($connection);
?>