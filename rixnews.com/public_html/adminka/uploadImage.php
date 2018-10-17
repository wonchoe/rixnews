<?
date_default_timezone_set('America/New_York');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include $_SERVER['DOCUMENT_ROOT'].'/adminka/ImageResize.php';

use \Gumlet\ImageResize;

function png2jpg($originalFile, $outputFile, $quality) {
    $image = imagecreatefrompng($originalFile);
    imagejpeg($image, $outputFile, $quality);
    imagedestroy($image);
}

function calculateDimensions($width,$height,$maxwidth,$maxheight)
{

        if($width != $height)
        {
            if($width > $height)
            {
                $t_width = $maxwidth;
                $t_height = (($t_width * $height)/$width);
                //fix height
                if($t_height > $maxheight)
                {
                    $t_height = $maxheight;
                    $t_width = (($width * $t_height)/$height);
                }
            }
            else
            {
                $t_height = $maxheight;
                $t_width = (($width * $t_height)/$height);
                //fix width
                if($t_width > $maxwidth)
                {
                    $t_width = $maxwidth;
                    $t_height = (($t_width * $height)/$width);
                }
            }
        }
        else
            $t_width = $t_height = min($maxheight,$maxwidth);

        return array('height'=>(int)$t_height,'width'=>(int)$t_width);
    }
    
$dateYear = date('Y');
$dateMonth = date('M');
$dateDay = date('d');
$dr = $_SERVER['DOCUMENT_ROOT'];
if (!is_dir($dr."/upload/$dateYear/")) {
    mkdir($dr."/upload/$dateYear/");         
}
if (!is_dir($dr."/upload/$dateYear/$dateMonth/")) {
    mkdir($dr."/upload/$dateYear/$dateMonth/");         
}
if (!is_dir($dr."/upload/$dateYear/$dateMonth/$dateDay/")) {
    mkdir($dr."/upload/$dateYear/$dateMonth/$dateDay/");         
}

$date = date_create();

$target_dir = $dr."/upload/$dateYear/$dateMonth/$dateDay/";

$target_file = $target_dir . date_timestamp_get($date).'.'.strtolower(pathinfo(basename($_FILES["image_param"]["name"]),PATHINFO_EXTENSION));
$target_from_png = $target_dir . date_timestamp_get($date).'.jpg';
$basename = "/upload/$dateYear/$dateMonth/$dateDay/".basename($target_file);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image_param"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image_param"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	
	/*
      if ($_FILES["image_param"]["type"] == "image/png" )
      {
       imagejpeg(imagecreatefromstring(file_get_contents($_FILES["photoimg"]["tmp_name"])), "converted.jpg");
       $curfile = "converted.jpg";
       move_uploaded_file(, $target_file);
      }	
      */
	
	
	
    if (move_uploaded_file($_FILES["image_param"]["tmp_name"], $target_file)) {
    	list($w, $h) = getimagesize($target_file);
		$arr = calculateDimensions(260,169,$w,$h);
		
    	if ($_FILES["image_param"]["type"] == "image/png" )
    	{
    	png2jpg($target_file,$target_from_png,80);
    	$basename = "/upload/$dateYear/$dateMonth/$dateDay/".basename($target_from_png);
    	unlink($target_file);  
    	$target_file = $target_from_png;  	
    	}
    	
    	
		$image = new ImageResize($target_file);		
		$image->crop($arr['width'], $arr['height']);
		$image->resizeToBestFit(260, 169);
		$image->save($target_dir . date_timestamp_get($date).'_sm.jpg');
		
		if ($w>730)
		{
		$image->resizeToBestFit(730, 487);
		$image->save($target_file);		
		}
		
 		$pn = pathinfo($target_file);
 		rename($target_file, $pn['dirname'].'/'.$pn['filename'].'.jpg');
 		$target_file = $pn['dirname'].'/'.$pn['filename'].'.jpg';
		$basename = "/upload/$dateYear/$dateMonth/$dateDay/".basename($target_file);
 		    
 		echo '{ "link": "'.$basename.'" }';   	
    			
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>