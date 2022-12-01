
<?php  
        /*Inicio conecion a base de datos */ 
        $conexion=mysqli_connect('localhost','root','');
        /*Selecciono base de datos */
        mysqli_select_db($conexion,'Instituto_Bicentenario1');
        /*traigo los valores por el metodo POST*/
               

          $nombre_apellido = $_POST['nombre_apellido'];
          $tipo_dni=$_POST['tipo_dni'];
          $legajo=$_POST['legajo'];
          $dni = $_POST['dni'];
          $sexo= $_POST['sexo'];
          $fecha_nacimiento=$_POST['fecha_nacimiento'];
          $tel= $_POST['tel'];
          $lugar_nacimiento= $_POST['lugar_nacimiento'];
          $nacionalidad= $_POST['nacionalidad'];
          $domicilio= $_POST['domicilio'];
          $altura= $_POST['altura'];
          $cp= $_POST['cp'];
          $piso= $_POST['piso'];
          $torre= $_POST['torre'];
          $dpto= $_POST['dpto'];
          $email= $_POST['email'];

          $nombre_padres=$_POST['nombre_padres'];
          $sexo_padres=$_POST['sexo_padres'];
          $tipo_padres=$_POST['tipo_padres'];
          $dni_padres=$_POST['dni_padres'];
          $nacimiento_padres=$_POST['nacimiento_padres'];

        /*Inserto los valores traidos por el metodo Post en mi tabla inscripcion */
          mysqli_query ($conexion, "INSERT INTO Inscripcion(Tipo_DNI,DNI_ID,Legajo, Nombre_Apellido, Sexo,Fecha_Nacimiento,Tel,Lugar_Nacimiento,
          Nacionalidad,Domicilio,Altura,CP,Piso,Torre,Dpto,Email,Nombre_Padres,Sexo_Padres,Tipo_Padres,DNI_Padres,Nacimiento_Padres) Values
          ('$tipo_dni','$dni','$legajo','$nombre_apellido','$sexo','$fecha_nacimiento','$tel','$lugar_nacimiento','$nacionalidad','$domicilio',' $altura', '$cp','$piso', '$torre',
          '$dpto','$email','$nombre_padres','$sexo_padres','$tipo_padres','$dni_padres','$nacimiento_padres')");

          
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="Volver_cargar.php" method="POST">
    <h1>QUIERE CARGAR OTRO ALUMNO?</h1>
    <input name="SI" type="submit" value="SI"  >    
    <input name="NO" type="submit" value="No">
  </form>  
</body>
</html>

