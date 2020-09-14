<?php
header('Content-Type: application/json');
$pdo=new PDO("mysql:host=localhost;dbname=ViveAmazonas","root","");
$sentencia= $pdo->prepare("SELECT * FROM eventos");
$sentencia->execute();
$resultado= $sentencia->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);
?>