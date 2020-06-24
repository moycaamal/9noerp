<?php 

    include("db.php");

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $des = $_POST['descripcion'];
    $fechap = $_POST['fechaP'];
    $telefono = $_POST['telefono'];
    $horario = $_POST['horario'];
    $cat = $_POST['id_categoria'];
    $prov = $_POST['id_provedor'];
    $img1 = $_POST['img1'];
    $img2 = $_POST['img2'];
    $img3 = $_POST['img3'];

    
            $consulta="UPDATE productos SET nombre_prod ='$nombre', precio_prod='$precio', des_prod = '$des',
             fech_prod = '$fechap', img_prod ='$img1', tel_prod ='$telefono', horario ='$horario', id_cat_prod ='$cat', 
             id_prov='$prov', img_prod_2 = '$img2', img_prod_3 = '$img3' WHERE id_prod = '$id'";
            $resul=mysqli_query($conectar, $consulta);
        
            header('location: ../Tproductos.php');
    
    ?>