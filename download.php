<?php
$name = $_GET['nama'];

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($name) . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($name));
flush(); // Flush system output buffer
readfile($name);
$status=unlink("C:/xampp/htdocs/Internship/files_to_be_converted/".basename($name).""); 

die();

?>