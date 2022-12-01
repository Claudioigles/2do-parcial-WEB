<?php
    //conecto a la base de datos
    $conexion=mysqli_connect('localhost','root','');    
    //Borro base de datos. cierro conexion y redirijo al login
    if (mysqli_query($conexion,'DROP DATABASE Instituto_Bicentenario1')){ 
        echo 'La base se ha borrado correctamente! <br>';
      }else{
            echo 'No se ha borrado la base por: '.mysqli_error();
      }   
    mysqli_close($conexion);   
    header("location:http://localhost/2parcial/");


?>