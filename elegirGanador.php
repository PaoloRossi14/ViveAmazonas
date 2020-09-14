<?php
session_start();
if (!isset($_SESSION["idUsuario"])){
    session_destroy();
    header("Location:intruso.php");
    exit;
}
else{
    include("inc/clases.php");
    $idUsuario = $_SESSION["idUsuario"];

    $objProyecto = new Proyecto();
    $resultado = $objProyecto-> obtenerProyectosCalificados($idUsuario);
    $registro = mysqli_fetch_row($resultado);
    $idProyecto = $registro[0];
    $idConcurso = $registro[10];

    $enlace = mysqli_connect("localhost","root","","ViveAmazonas");
    $sentencia = "UPDATE proyectos SET estado='Ganador' WHERE idProyecto='$idProyecto';";
    $sentencia2 = "UPDATE concursos SET ganador='$idProyecto' WHERE idConcurso='$idConcurso';";
    mysqli_query($enlace,$sentencia);
    mysqli_query($enlace,$sentencia2);
    header ("Location:principal.php");
}
?>