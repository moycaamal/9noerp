<?php 

    include("db.php");

    $id = $_GET['id'];

    $eliminar="DELETE FROM categoria WHERE id = '$id'";
    $resultado=mysqli_query($conectar, $eliminar);
    
    header('location: ../tabla-categoria.php');
    ?>