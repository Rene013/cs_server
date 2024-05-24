<?php
$filename = "eoo.pdf";
header("Content-type: application/pdf");
header("Content-Length: " . filesize($filename));
readfile($filename);
?>