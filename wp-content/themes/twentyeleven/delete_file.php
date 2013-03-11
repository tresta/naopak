<?php

$prod_id = $_POST['prod_id'];
$file_nr = $_POST['file_number'];
$file_to_del = $_POST['file_to_del'];
//$next_file = $_GET['next_file'];

//echo 'prod id: '.$prod_id."<br />";
//echo 'file nr: '.$file_nr."<br />";
//echo 'file name: '.$file_to_del."<br />";
//echo 'next file: '.$next_file."<br />";



function renamefile($name, $file_to_del, $z, $na)  //************************** renamefile
{
	$dirname = '../../../img/products/'.$_POST['prod_id'].'/';

	if(!file_exists($dirname)) 
	{   
		die("There was a problem. Please try again!");  
	}

	$old = "id_prod_".$name."_".$z."_".$file_id.".jpg";
	$new = "id_prod_".$name."_".$na."_".$file_id.".jpg";

	rename($dirname.$old, $dirname.$new);  // z old na new
}

function delete($dirname, $file_nr )//************************** delete
{
	if (!file_exists($dirname)) {
	  return false;
	}
	//echo '     deleteing     '.$dirname;
	foreach(glob($dirname.$file_nr."_*.jpg") as $file){
		//echo 'deleteing file: '.$dirname.$file_nr."_*.jpg <br />";
		unlink($file);
	}
}
//***********
//***********

	$dirname = '../../../img/products/'.$prod_id.'/';	
	//$filecount = count(glob($dirname . "*_n.jpg"));
	delete($dirname, $file_to_del);

    $connection = @mysql_connect('localhost', 'root', '');
    $db = @mysql_select_db('bollo_naopak', $connection);
	
	$zdjecia = array();	
	
	$result = mysql_query("SELECT * FROM s_zdjecia WHERE id_produkt = '".$prod_id."'");
	$img_names =  mysql_fetch_row($result);
	
	/*
	echo "<br /><br /><br />";
	echo "<h3>img_names: <br />";
	*/
	//print_r($img_names);
	/*
	echo "</h3>";
	echo "<br /><br /><br />";
	*/
	
	$i = 0;

	for($i ; $i < 7 ; $i++)
	{			
		if(($img_names[$i+2] != $file_to_del) & ($img_names[$i+2] != ''))
		{
			array_push($zdjecia ,$img_names[$i+2]);
		}
	}

	//echo "<br /><br /><br />";
	//echo "<h3>zdjecia: <br />";
	//print_r($zdjecia);
	//echo "</h3>";
	//echo "<br /><br /><br />";
	
	

	//$filecount =  $filecount; //count($zdjecia);
	$filecount = count($zdjecia);
	echo "filecount= $filecount<br />";
	echo "filecount= ".count($zdjecia)."<br />";
	$i=0;
	if($filecount==0)
	{
		$sql_query = "DELETE FROM s_zdjecia WHERE id_produkt = '".$prod_id."'";
	}
	else
	{
		$sql_query = "UPDATE s_zdjecia SET ";
		
		for($i ; $i <= $filecount ; $i++)
		{
			if($i > 0 )
			{
				if($filecount == $i)
					$sql_query .= ' ,zdj'.($i+1)." = ''";
				else
					$sql_query .= ' ,zdj'.($i+1)." = '".$zdjecia[$i]."'";	
			}
			else
			{
				if($filecount == $i)
					$sql_query .= ' zdj'.($i+1)." = ''";
				else
					$sql_query .= ' zdj'.($i+1)." = '".$zdjecia[$i]."'";	
			}
		}
		$sql_query .= " WHERE id_produkt = '".$prod_id."'";
	}
	mysql_query($sql_query);
	echo $sql_query;
	
	mysql_close($connection);
	

?>
