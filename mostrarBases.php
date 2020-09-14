<?php
$documento = $_GET["documento"];
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
//Para descargarlo
//header("Content-Disposition: attachment; filename=documento.pdf");
readfile("$documento");
?>