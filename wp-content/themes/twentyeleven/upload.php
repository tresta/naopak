<?php
require_once('class.upload.php');

if (!empty($_FILES)) {
		//$targetPath = 'naopak.com.pl'. '/img/products/'. $_POST['prod_id'];
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $_POST['prod_id'];		
		$pic_temp = uniqid();
		
		$handle = new Upload($_FILES['Filedata']);
		
		if($handle->image_src_x < 400)
		{
			$json = array("result" 		=> 2, 
	           					  "file" 		=>  $targetPath.'/'.$handle->file_dst_name.'?'.time(),
	           					  "imagewidth" 	=> $handle->image_dst_x,
	           					  "imageheight"	=> $handle->image_dst_y,
								  "img_id"      => $pic_temp,
	           					 );
	           	
	           	$encoded = json_encode($json);
				echo $encoded;
		}
		else
		{
		
			if ($handle->uploaded) {
				$handle->file_src_name_body      = $pic_temp.'_n'; // hard name
				$handle->file_new_name_ext 		 = 'jpg';
				$handle->file_overwrite 		 = true;
				$handle->file_auto_rename 		 = false;
				$handle->image_resize            = false;
				$handle->image_ratio_y           = true;
				$handle->image_x                 = $handle->image_src_x;
				$handle->file_max_size 			 = '1048576'; // max size
				$handle->Process($targetPath.'/');


				$handle->file_src_name_body      = $pic_temp.'_m'; // hard name
				$handle->file_new_name_ext 		 = 'jpg';				
				$handle->file_overwrite 		 = true;
				$handle->file_auto_rename 		 = false;
				$handle->image_resize            = true;
				$handle->image_ratio_y           = true;
				$handle->image_x                 = ($handle->image_src_x < 400)?$handle->image_src_x:400;
				$handle->file_max_size 			 = '1048576'; // 1048576 max size
				$handle->Process($targetPath.'/');
				
				$handle->clean(); 		
							
				if ($handle->processed)
	           		$json = array("result" 		=> 1, 
	           					  "file" 		=>  $targetPath.'/'.$handle->file_dst_name.'?'.time(),
	           					  "imagewidth" 	=> $handle->image_dst_x,
	           					  "imageheight"	=> $handle->image_dst_y,
								  "img_id"      => $pic_temp,
	           					 );
	       		else
	           		//$json = array("result" => 0);
					$json = array("result" 		=> 0, 
	           					  "file" 		=>  $targetPath.'/'.$handle->file_dst_name.'?'.time(),
	           					  "imagewidth" 	=> $handle->image_dst_x,
	           					  "imageheight"	=> $handle->image_dst_y,
								  "img_id"      => $pic_temp,
	           					 );
	           	
	           	$encoded = json_encode($json);
				echo $encoded;
				unset($encoded);	
			} 
			else { 
				$json = array("result" => 2);
	           	$encoded = json_encode($json);
				echo $encoded;
				unset($encoded);
			}
		}
}
?>