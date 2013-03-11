<?php

function makeThumbs($thumb_w, $thumb_h, $nazwa)
{
	$img_name = $_POST['img_name'];
	$folder = "../../../".$_POST['img_folder'];
	$r_x1=$_POST['x1'];
	$r_y1=$_POST['y1'];
	$r_w=$_POST['w'];
	$r_h=$_POST['h'];
	$r_ws=$_POST['ws'];
	$r_hs=$_POST['hs'];
	//$thumb_w = $_POST['thumb_W'];
	//$thumb_h = $_POST['thumb_H'];
		
	$FileName = $folder.$img_name;
	
	$source_img = imagecreatefromjpeg($FileName);
	 
	$org_w = imagesx($source_img); // 1024
	$org_h = imagesy($source_img); // 768
	
	$skala_H = $org_h / $r_h;
	$skala_W = $org_w / $r_w;
	
	$start_width = $skala_W * $r_x1;
	$start_height = $skala_H * $r_y1;

	$width = $skala_W * $r_ws;
	$height = $skala_H * $r_hs;
	
	$scale_H = $skala_H * $r_hs;
	$scale_W = $skala_W * $r_ws;
	
	$scale2_H = $thumb_h / $width;
	$scale2_W = $thumb_w / $height;
	
	$newImageWidth = $scale2_W * $width;
	$newImageHeight = $scale2_H * $height;
		
	$dest_img = imagecreatetruecolor($newImageWidth,$newImageHeight);
	imagecopyresampled($dest_img, $source_img, 0 , 0, $start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);


	$file_name = str_replace("n", $nazwa, $img_name);

	if(imagejpeg($dest_img, $folder.$file_name,70)) {
	    imagedestroy($dest_img);
	    imagedestroy($source_img);
	} else {
	    echo "could not make thumbnail image";
	    exit(0);
	}
	
	return $file_name;
}

	$thumb_w = $_POST['thumb_W'];	
	$thumb_h = $_POST['thumb_H'];
	$img_nr = $_POST['img_nr'];
	
	makeThumbs(768,768, "b");  // fancybox
	makeThumbs(397,397, "m");  // big_prod + on main site
	makeThumbs(170,170, "g");  // list gallery + main site
    makeThumbs(200,200, "l");  // list
	//makeThumbs(88,88, "i"); // ???
	$filename = makeThumbs(55,55, "s");  // thumb under prod

	//echo $filename;
	
	echo "{ ";
	echo '"img_nr": "' . $img_nr . '",';
	echo '"filename": "' . $filename . '"';
	echo " }";
?>