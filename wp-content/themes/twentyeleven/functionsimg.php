<?php
if(isset($_GET['upload_user_image'])){
    upload_user_image();
}
if(isset($_GET['save_upload'])){
    save_upload();
}
function resizeImage($image, $width, $height, $scale) {
    $image_data 	= getimagesize($image);
    $imageType 		= image_type_to_mime_type($image_data[2]);
    $newImageWidth 	= ceil($width * $scale);
    $newImageHeight = ceil($height * $scale);
    $newImage 		= imagecreatetruecolor($newImageWidth,$newImageHeight);
    
    switch($imageType) {
        case "image/gif":
            $source = imagecreatefromgif($image); 
            break;
        case "image/pjpeg":
        case "image/jpeg":
        case "image/jpg":
            $source = imagecreatefromjpeg($image); 
            break;
        case "image/png":
        case "image/x-png":
            $source = imagecreatefrompng($image); 
            break;
    }
    imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
    
    switch($imageType) {
        case "image/gif":
            imagegif($newImage,$image); 
            break;
        case "image/pjpeg":
        case "image/jpeg":
        case "image/jpg":
            imagejpeg($newImage,$image,90); 
            break;
        case "image/png":
        case "image/x-png":
            imagepng($newImage,$image);  
            break;
    }
    chmod($image, 0777);
    
    return $image;
}

function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
    list($imagewidth, $imageheight, $imageType) = getimagesize($image);
    $imageType 									= image_type_to_mime_type($imageType);
    
    $newImageWidth 	= ceil($width * $scale);
    $newImageHeight = ceil($height * $scale);
    $newImage 		= imagecreatetruecolor($newImageWidth,$newImageHeight);
   
    switch($imageType) {
        case "image/gif":
            $source = imagecreatefromgif($image); 
            break;
        case "image/pjpeg":
        case "image/jpeg":
        case "image/jpg":
            $source = imagecreatefromjpeg($image); 
            break;
        case "image/png":
        case "image/x-png":
            $source = imagecreatefrompng($image); 
            break;
    }
    imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
    switch($imageType) {
        case "image/gif":
            imagegif($newImage,$thumb_image_name); 
            break;
        case "image/pjpeg":
        case "image/jpeg":
        case "image/jpg":
            imagejpeg($newImage,$thumb_image_name,90); 
            break;
        case "image/png":
        case "image/x-png":
            imagepng($newImage,$thumb_image_name);  
            break;
    }
    chmod($thumb_image_name, 0777);
    
    return $thumb_image_name;
}

function getHeight($image) {
    $sizes = getimagesize($image);
    $height= $sizes[1];
    
    return $height;
}

function getWidth($image) {
    $sizes = getimagesize($image);
    $width = $sizes[0];
    
    return $width;
}

function upload_user_image(){
    $return	= array();

    if(!empty($_FILES['uploaded_image'])){
        $uploadDir 	= 'save/';// $_SERVER['DOCUMENT_ROOT'].'save/';
        $uploadFile	= $uploadDir.basename(str_replace(" ", "_", $_FILES['uploaded_image']['name']));
        $hasErrors	= false;

        //file extension check
        $extension 	    = substr($_FILES['uploaded_image']['name'], strpos(str_replace(" ", "_", $_FILES['uploaded_image']['name']), '.') + 1);
        $allowedTypes   = implode('|', array('jpg', 'jpeg' , 'gif' , 'png')); //this should go in a config file in MVC structure

        $extensionPattern 	= '/^('.$allowedTypes.')$/i';
        if(!preg_match($extensionPattern, $extension)){
            $hasErrors 			= true;
            $return['message_type'] = "error";
            $return['message']		= "This file extension is not in the allowed ones!";
        }
        
        //file size check
        $allowedSize = 1024; //this should go in a config file in MVC structure
        if((filesize($_FILES['uploaded_image']['tmp_name'])/1024/1024) > $allowedSize){//1MB
            $hasErrors 			= true;
            $return['message_type'] = "error";
            $return['message']		= "This file size is greater than the requested one!";
        }
        
        if($hasErrors == false){
            if(move_uploaded_file($_FILES['uploaded_image']['tmp_name'], $uploadFile)){
                @chmod($uploadFile, 0777);
                $return['message_type'] = "success";
                $return['file_name']	= basename(str_replace(" ", "_", $_FILES['uploaded_image']['name']));
                $imageInfo 				= getimagesize('http://naopak.com.pl/save/'.$return['file_name']);
                $return['file_width']	= !empty($imageInfo)?$imageInfo[0]:500;
                $return['file_height']	= !empty($imageInfo)?$imageInfo[1]:375;
            }
            else{
                $return['message_type'] = "error";
                $return['message'] 		= "The file could not be uploaded!";
            }
        }
    }
    else{
        $return['message_type'] = "error";
        $return['message'] 		= "No file aded!";
    }
    
    echo json_encode($return);
}

function save_upload(){
    $result         = array();
    $result['error']= 0;
    $fileName 	    = !empty($_POST['file_name']) && $_POST['file_name'] != 'undefined'?$_POST['file_name']:'';
    
    //for CROP
    $x1			= !empty($_POST['x1'])?$_POST['x1']:0;
    $y1			= !empty($_POST['y1'])?$_POST['y1']:0;
    $x2			= !empty($_POST['x2'])?$_POST['x2']:0;
    $y2			= !empty($_POST['y2'])?$_POST['y2']:0;
    $w 			= !empty($_POST['w'])?$_POST['w']:0;
    $h 			= !empty($_POST['h'])?$_POST['h']:0;
    
    if(!empty($fileName)){
        $uploadDir = 'save/'; // $_SERVER['DOCUMENT_ROOT'].'img/';
        if(!empty($x1) && !empty($y1) && !empty($x2) && !empty($y2) && !empty($w) && !empty($h)){
            //CROP the file
            $thumb_width 			= 100;
            $thumb_image_location 	= $large_image_location = $uploadDir.$fileName;
            $scale 					= $thumb_width/$w;
            $cropped				= resizeThumbnailImage($thumb_image_location, $large_image_location, $w, $h, $x1, $y1, $scale);
        }
        //SAVE the image to DB
        //-------------
        if(!empty($result) && $result['error'] == 0){
            echo json_encode(array('response'	=>'ok',
                                    'file_name'	=>$_POST['file_name']
                                    ));
        }
        else{
            echo json_encode(array('response'=>'error_save'));
        }
    }
    else{
        echo json_encode(array('response'=>'error_dates'));
    }
}
?>