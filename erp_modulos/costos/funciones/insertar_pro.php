<?php 

    include("db.php");

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

    
            $consulta="INSERT INTO productos(nombre_prod, precio_prod, des_prod, fech_prod, img_prod, tel_prod, horario, id_cat_prod, id_provedor, img_prod_2, img_prod_3)
            VALUES ('$nombre', '$precio','$des', '$fechap', '$img1', '$telefono', '$horario', '$cat', '$prov', '$img2', '$img3')";
            $resul=mysqli_query($conectar, $consulta);
        
            header('location: ../Tproductos.php');
    
    ?>