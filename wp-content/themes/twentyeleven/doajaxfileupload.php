<?php
	$error = "";	
	$msg = "";
	$filename = $_FILES['Filedata']['name'];	
	$fileElementName = 'Filedata';	
	$limit_size=1048576;
	
	$fileNr = $_POST['file_nr'];
	$prod_id = $_POST['prod_id'];


	$allowed_filetypes = array('.JPG','.jpg','.jpeg','.gif','.bmp','.png');
	$path_to_image_directory = '../../../img/products/'.$prod_id.'/';

	if(!file_exists($path_to_image_directory)) 
	{  
		if(!mkdir($path_to_image_directory, 0777, true)) {  
			die("There was a problem. Please try again!");  
		}
	}
  $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
  //if(!in_array($ext,$allowed_filetypes))
//		die('The file you attempted to upload is not allowed.');
		
	//$filecount = count(glob($path_to_image_directory . "id_prod_normal_*.jpg"));
	
	$file_size = $_FILES['Filedata']['size'];
	if($file_size >= $limit_size)
	{
		$error ="to big file !";
	}
	else
	{
	 // $msg .= " File Name: " . $_FILES['fileToUpload']['name'] . ", ";
	  //$msg .= " File Size: " . @filesize($_FILES['fileToUpload']['tmp_name']);

	  //$folder = $id_count;
	  $SQLfilename = uniqid();
	  $filename = $SQLfilename . '_n';//"id_prod_normal_".$fileNr."_".$id_count.".jpg";
			
	  include('SimpleImage.php');
      $image = new SimpleImage();
	  $image->load($_FILES['Filedata']['tmp_name']);	
	  
	  // check image size
	  if($imgWidth > 600)
	  {
	  	$image->resizeToWidth(600);
	  }

	  $image->save($path_to_image_directory.$filename);
	  
	  // add info to SQL
	   $connection = @mysql_connect('localhost', 'root', '');
   	   $db = @mysql_select_db('bollo_naopak', $connection);
	   
	  $query = "SELECT * FROM s_zdjecia WHERE id_produkt='".$prod_id."' ";
	  $result = mysql_query($query) or die(mysql_error()); 
	   
	    if (mysql_num_rows($result) )
		{
			@mysql_query("UPDATE s_zdjecia SET zdj".$fileNr."='".$wartosc."' WHERE id_produkt=".$prod_id."");
		}
		else
		{
			$sql_subcat = mysql_query("INSERT INTO s_zdjecia (id_produkt, zdj".$fileNr.") VALUES ('".$prod_id."', ".$SQLfilename.")");
		}
	   mysql_close($connection);   
	  
	}
	
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"filezise: '" . $file_size . "',\n";
	echo				"folder: '" . $folder . "',\n";
	echo				"filename: '" . $SQLfilename . "'\n";
	echo "}";
?>