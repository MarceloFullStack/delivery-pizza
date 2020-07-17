<?php  
 if(isset($_FILES["image_upload"]["name"]))  
 {  
      $name = $_FILES["image_upload"]["name"];  
      $size = $_FILES["image_upload"]["size"];  
      $ext = end(explode(".", $name));
	  $ext = strtolower($ext);
      $allowed_ext = array("png", "jpg", "jpeg");  
      if(in_array($ext, $allowed_ext))  
      {  
           if($size < (10240 * 10240))  
           {  
                $new_image = '';  
                $new_name = md5(rand()) . '.' . $ext;  
                $path = '../fotos_produtos/' . $new_name;  
                list($width, $height) = getimagesize($_FILES["image_upload"]["tmp_name"]);  
                if($ext == 'png')  
                {  
                     $new_image = imagecreatefrompng($_FILES["image_upload"]["tmp_name"]);  
                }  
                if($ext == 'jpg' || $ext == 'jpeg')  
                {  
                     $new_image = imagecreatefromjpeg($_FILES["image_upload"]["tmp_name"]);  
                }  
                $new_width = 300;  
                $new_height = ($height/$width)*300;  
                $tmp_image = imagecreatetruecolor($new_width, $new_height);  
                imagecopyresampled($tmp_image, $new_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);  
                imagejpeg($tmp_image, $path, 100);  
                imagedestroy($new_image);  
                imagedestroy($tmp_image);  
                echo $new_name;  
           }  
           else  
           {  
                echo 'Image File size must be less than 1 MB';  
           }  
      }  
      else  
      {  
           echo 'Invalid Image File';  
      }  
 }  
 else  
 {  
      echo 'Please Select Image File';  
 }  
 ?>  