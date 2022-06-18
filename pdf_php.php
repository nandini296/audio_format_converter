<?php


if (isset($_FILES)) {

  $dir = 'files_to_be_converted/';

  $convert_into_format = $_POST['converted_into'];


  $audio_path = $dir . basename($_FILES['audioFile']['name']);

  if (move_uploaded_file($_FILES['audioFile']['tmp_name'], $audio_path)) {
    convertFile($audio_path, $convert_into_format);

    $status=unlink("C:/xampp/htdocs/Internship/files_to_be_converted/".basename($_FILES['audioFile']['name']).""); 
  }
}



 

function convertFile($file_name, $convert_into_format)
{


$dir = "C:/xampp/htdocs/Internship/files";
 
// Initialize the counter variable to 0
$i = 0;
 
if( $handle = opendir($dir) ) {
     
    while( ($file = readdir($handle)) !== false ) {
        if( !in_array($file, array('.', '..')) && !is_dir($dir.$file))
            $i++;
    }
}



$upload_path = "C:/xampp/htdocs/Internship/files";

// require_once 'vendor/autoload.php';
  $file_format = pathinfo($file_name, PATHINFO_EXTENSION);
  $start = microtime(true);
  
  $file = "$upload_path/converted_file00$i.$convert_into_format";
  
  $format = exec("ffmpeg -i $file_name $file");

  echo "<p style ='color: darkgrey; font-size:20px; top:65%; left:40%; text-align:center; position: absolute;'> File Converted Successfully</p>";
  echo "<a style='color: white; font-size:25px; position: absolute; top:80%; left:40%;' href='download.php?nama=" . $file . "'> Download</a> ";
}

?>