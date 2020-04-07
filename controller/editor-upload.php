<?php
    function compressImage($source, $destination, $quality) { 
        // Get image info 
        $imgInfo = getimagesize($source);
        $mime = $imgInfo['mime']; 
        // Create a new image from file 
        switch($mime){ 
            case 'image/jpeg': 
                $image = imagecreatefromjpeg($source);
                break; 
            case 'image/png': 
                $image = imagecreatefrompng($source);
                break; 
            case 'image/gif': 
                $image = imagecreatefromgif($source);
                break; 
            default: 
                $image = imagecreatefromjpeg($source);
        } 
        // Save image 
        imagejpeg($image, $destination, $quality); 
        
        // Return compressed image 
        return $destination; 
    }
    if(empty($_FILES['file']))
    {
        exit();
    }
    $errorImgFile = "../images/img_upload_error.jpg";
    $temp = explode(".", $_FILES["file"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $destinationFilePath = '../images/articles/'.$newfilename ;
    //compressImage($_FILES['file']['tmp_name'], $destinationFilePath, 50);
    if(!compressImage($_FILES['file']['tmp_name'], $destinationFilePath, 50)){
        echo $errorImgFile;
    }
    else{
        echo $destinationFilePath;
    }
    
?>


