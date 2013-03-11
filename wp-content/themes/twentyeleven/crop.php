<?php
require_once('class.upload.php');

  	$pic = '';
	$prod_id = '';
	if((isset($_POST['step']))&&($_POST['step']=='process')){
			
			$pic = $_POST['img_id'];
			$prod_id = $_POST['prod_id'];
			
			//$targetPath = "/img/products/".$prod_id."/";
			$targetPath = $_SERVER['DOCUMENT_ROOT'] ."/img/products/".$prod_id."/";			
			
			$handle = new Upload($targetPath . $pic.'_m.jpg');
			
			if ($handle->uploaded) {

				$handle->file_src_name_body      = $pic; 
				
				//thumb-50
				$handle->file_new_name_body		 = $pic;
				$handle->file_name_body_add      = '_t'; 
				$handle->file_new_name_ext 		 = 'jpg';
				$handle->file_overwrite 		 = false;
				$handle->file_auto_rename 		 = true;
				$handle->image_resize            = true;
				$handle->image_x                 = 55; //size of final picture
				$handle->image_y                 = 55; //size of final picture
				
				$handle->jcrop                   = true;
				$handle->rect_w                  = $_POST['crop_w']; 
				$handle->rect_h                  = $_POST['crop_h']; 
				$handle->posX                    = $_POST['crop_x']; 
				$handle->posY                    = $_POST['crop_y'];
				$handle->jpeg_quality 		 	 = 60;
				$handle->Process($targetPath);
				
				
				//thumb-170
				$handle->file_new_name_body		 = $pic;
				$handle->file_name_body_add      = '_l'; 
				$handle->file_new_name_ext 		 = 'jpg';				
				$handle->file_overwrite 		 = false;
				$handle->file_auto_rename 		 = true;
				$handle->image_resize            = true;
				$handle->image_x                 = 170; //size of final picture
				$handle->image_y                 = 170; //size of final picture
				
				$handle->jcrop                   = true;
				$handle->rect_w                  = $_POST['crop_w']; 
				$handle->rect_h                  = $_POST['crop_h']; 
				$handle->posX                    = $_POST['crop_x']; 
				$handle->posY                    = $_POST['crop_y'];
				$handle->jpeg_quality 		 	 = 70;
				$handle->Process($targetPath);
				
				//thumb-400
				$handle->file_new_name_body		 = $pic;
				$handle->file_name_body_add      = '_b'; 
				$handle->file_new_name_ext 		 = 'jpg';				
				$handle->file_overwrite 		 = false;
				$handle->file_auto_rename 		 = true;
				$handle->image_resize            = true;
				$handle->image_x                 = 400; //size of final picture
				$handle->image_y                 = 400; //size of final picture
				
				$handle->jcrop                   = true;
				$handle->rect_w                  = $_POST['crop_w']; 
				$handle->rect_h                  = $_POST['crop_h']; 
				$handle->posX                    = $_POST['crop_x']; 
				$handle->posY                    = $_POST['crop_y'];
				$handle->jpeg_quality 		 	 = 80;
				$handle->Process($targetPath);
				
				$handle->clean(); 
				
			$img_nr = $_POST['img_nr']+1;
	
			$connection = @mysql_connect('localhost', 'root', '');
			$db = @mysql_select_db('bollo_naopak', $connection);
			
			$query = "SELECT * FROM s_zdjecia WHERE id_produkt='".$_POST['prod_id']."' ";
			$result = mysql_query($query) or die(mysql_error()); 
			   
			if ( mysql_num_rows($result) )
			{
				$querysql = "UPDATE s_zdjecia SET zdj".$img_nr."='".$_POST['img_id']."' WHERE id_produkt='".$_POST['prod_id']."'";
				@mysql_query($querysql);
			}
			else
			{
				$querysql = "INSERT INTO s_zdjecia (id_produkt, zdj".$img_nr.") VALUES ('".$_POST['prod_id']."', '".$_POST['img_id']."')";
				$sql_subcat = mysql_query($querysql);
			}
			
			mysql_close($connection);

				$json = array(
					  "result" 		=>  $querysql, 
	           		  );
				$encoded = json_encode($json);
				echo $encoded;
				unset($encoded);   
			} 
			else {
				$json = array("result" => 0 , "step" => $_POST['step']);
	           	$encoded = json_encode($json);
				echo $encoded;
				unset($encoded);				
			}
	
	}
	else if((isset($_POST['step']))&&($_POST['step']=='cancel'))
	{
		$pic = $_POST['img_id'];
		$prod_id = $_POST['prod_id'];
		
		//$targetPath = "/img/products/".$prod_id."/";
		$targetPath = $_SERVER['DOCUMENT_ROOT'] ."/img/products/".$prod_id."/";
		$file = $targetPath.$pic."_m.jpg";
		unlink($file);
		$file = $targetPath.$pic."_n.jpg";
		unlink($file);

		$filecount = count(glob($targetPath . "*_m.jpg"));
			
		$json = array("result" => $file , "files" => $filecount);
	    $encoded = json_encode($json);
		echo $encoded;
		unset($encoded);
	}

	
	           	

?>