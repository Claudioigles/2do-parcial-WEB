<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./menu.css">
    <link rel="icon" type="icono.png" href="../img/7793739352_0a5de1be-e5a6-4609-88bd-dc3425eef266.png" ><!--Pongo el inoco en la solapa de navegacion-->
    <title>Buscar Alumno</title>
</head>
<body>
            <header>
                <nav class="navbar navbar-expand-lg color-nav w-100">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="index.html">
                        <img src="../img/7793739352_0a5de1be-e5a6-4609-88bd-dc3425eef266.png" width="200" alt="Logo">
                      </a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                          <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="menu.html"">Inscripciones</a>
                          </li>                          
                          <li class="nav-item">
                            <a class="nav-link" href="../pages/consulta.php">Buscar Alumno</a>
                          </li>
                          <li class ="nav-item">
                              <a class="nav-link" href="../pages/exit.php">EXIT</a>
                          </li>                     
                        </ul>
                      </div>
                    </div>
                  </nav>
            </header>

    <center>
        <!--Creo el formulario con los datos requeridos para la busqueda -->                          
            <div id="table">
                <form action="consulta.php" method="POST">
                  <table>         
                    <tr><td colspan="2"><label for="">Buscar Por Alumno</label></td></tr>                     
                    <td><label for="">Nombre y Apellido </label></td>
                    <tr><td><input type="text" name="nombreApe" id=""></td></tr>
                    <td><label for="">Numero de Documento</label></td>
                    <tr><td><input type="number" name="dni" id=""></td></tr>                 
                    <tr><td><input class="" type="submit" name="consultar_form" value="Consultar" id=""><input class="" type="submit"  name="eliminar"  value="Eliminar" id=""><input class="" type="submit" name="actualizar" value="Actualizar" id=""><input class="" type="submit" name="" value="Borrar" id=""><input class="" type="submit" name="List" value="Lista Completa" id=""></td></tr>
                  </table>
                </form>
            </div>                    
    </center>
    
 <?php
  // PARA CONSULTAR ALUMNOS
    //Cuando apreto el boton consultar cambia isset a un valor diferente al null. Si consultar no esta vacio....tanto
    if (isset($_POST['consultar_form'])){
        //Creo variable conexion
        $conexion=mysqli_connect('localhost','root','');
        //Selecciono Base de datos
        mysqli_select_db($conexion,'Instituto_Bicentenario1');
        //Pido que me traiga los valores por el metodo POST del formulario
        $nombreApe=$_POST['nombreApe'];        
        $dni=$_POST['dni'];
        if ($nombreApe!=NULL){
          //Aca la variable consulta va a conetener todos los datos que se encuentran en la tabla inscripcion Donde el Campo1= Nombre_Apellido BD sea = al Nombre y apellido ingresado en el imput del formulario
             $consulta= mysqli_query($conexion, "SELECT * FROM Inscripcion WHERE Nombre_Apellido='$nombreApe' ");       
         //Creo una variable fila para que me contenga todos los resultados de la BD. mysqli_fetch_array recorrer todo el array $consulta
             while ($fila = mysqli_fetch_array($consulta)){
            //Creo una tabla
             echo
             "
             <table width=100%; border=2;>                
                      <th><b><center>Nombre y Apellido</center></b></th>
                      <th><b><center>DNI</center></b></th>  
                      <th><b><center>Legajo</center></b></th>
                                                         
                 <tr>
                        <td><center>".$fila['Nombre_Apellido']."</center></td>
                        <td><center>".$fila['DNI_ID']."</center></td>  
                        <td><center>".$fila['Legajo']."</center></td>                          

                 </tr>
             </table>
            ";
        
           
          }      
        }else {
            //Aca la variable consulta va a conetener todos los datos que se encuentran en la tabla inscripcion Donde el Campo1= Nombre_Apellido BD sea = al Nombre y apellido ingresado en el imput del formulario
             $consulta= mysqli_query($conexion, "SELECT * FROM Inscripcion WHERE DNI_ID='$dni' ");      
            //Creo una variable fila para que me contenga todos los resultados de la BD. mysqli_fetch_array recorrer todo el array $consulta
             while ($fila = mysqli_fetch_array($consulta)){
                //Creo una tabla
               echo
              "
               <table width=\"100%\" border=\"1\">
                 <tr>
                     <td><b><center>Nombre y Apellido</center></b></td>
                     <td><b><center>DNI</center></b></td>  
                     <th><b><center>Legajo</center></b></th>                  
                 </tr>
                 <tr>
                    <td><center>".$fila['Nombre_Apellido']."</center></td>
                    <td><center>".$fila['DNI_ID']."</center></td>  
                    <td><center>".$fila['Legajo']."</center></td>                      
                 </tr>
              </table>
              ";
       
              echo "<br>";
             } 
         }
  }   
  // PARA ELIMINAR ALUMNO
      //CUANDO PRESIONO EL BOTON ELIMINAR
  if (isset($_POST['eliminar'])){
    //Creo variable conexion
    $conexion=mysqli_connect('localhost','root','');
    //Selecciono Base de datos
    mysqli_select_db($conexion,'Instituto_Bicentenario1');
    //Pido que me traiga los valores por el metodo POST del formulario
    $nombreApe=$_POST['nombreApe'];
    
    $dni=$_POST['dni'];
    //CUANDO ELIMINO POR NOMBREYAPELLIDO
    if ($nombreApe!=NULL){
      //Aca la variable consulta va a conetener todos los datos que se encuentran en la tabla carrera Donde el Campo1= Nombre_Apellido BD sea = al Nombre y apellido ingresado en el imput del formulario
         $consulta= mysqli_query($conexion, "DELETE FROM Inscripcion WHERE Nombre_Apellido='$nombreApe' ");             
         echo
         "
          El alumno $nombreApe fue eliminado correctamente de la tabla Inscripcion
        ";
    
        echo "<br>";
      }else {
        //Aca la variable consulta va a conetener todos los datos que se encuentran en la tabla inscripcion Donde el Campo1= Nombre_Apellido BD sea = al Nombre y apellido ingresado en el imput del formulario
        $consulta= mysqli_query($conexion, "DELETE FROM Inscripcion WHERE DNI_ID='$dni' ");        
            //Creo una tabla
           echo
          "
          El alumno con DNI $dni fue eliminado correctamente de la tabla Inscripcion
          ";   
          echo "<br>";
         }
  }
  
  // PARA Actualizar ALUMNO
      //CUANDO PRESIONO EL BOTON actualizar
      if (isset($_POST['actualizar'])){
        //Creo variable conexion
        $conexion=mysqli_connect('localhost','root','');
        //Selecciono Base de datos
        mysqli_select_db($conexion,'Instituto_Bicentenario1');
        //Pido que me traiga los valores por el metodo POST del formulario
        $nombreApe=$_POST['nombreApe'];       
        $dni=$_POST['dni'];
        //CUANDO ELIMINO POR NOMBREYAPELLIDO
        if ($nombreApe!=NULL){
          //Aca la variable consulta va a conetener todos los datos que se encuentran en la tabla carrera Donde el Campo1= Nombre_Apellido BD sea = al Nombre y apellido ingresado en el imput del formulario
             $consulta= mysqli_query($conexion, "UPDATE Inscripcion SET Nombre_Apellido='Pedro' WHERE Nombre_Apellido='Claudio Iglesias' ");                         
             echo
             "
              El nombre $nombreApe fue cambiado a Pedro correctamente
            ";
        
            echo "<br>";
          }else {
            //Aca la variable consulta va a conetener todos los datos que se encuentran en la tabla inscripcion Donde el Campo1= Nombre_Apellido BD sea = al Nombre y apellido ingresado en el imput del formulario
            $consulta= mysqli_query($conexion, "UPDATE Inscripcion SET DNI_ID='35458847' WHERE DNI_ID='3548878' ");                     
                //Creo una tabla
               echo
              "
              El alumno con DNI $dni cambiado por DNI 35458878
    
              ";
       
              echo "<br>";
             }         
      }
    //Lista completa
    if (isset($_POST['List'])){
      //Creo variable conexion
      $conexion=mysqli_connect('localhost','root','');
      //Selecciono Base de datos
      mysqli_select_db($conexion,'Instituto_Bicentenario1');
      //Pido que me traiga los valores por el metodo POST del formulario     
           $consulta= mysqli_query($conexion, "SELECT * FROM Inscripcion ");   
       //Creo una variable fila para que me contenga todos los resultados de la BD. mysqli_fetch_array recorrer todo el array $consulta
           while ($fila = mysqli_fetch_array($consulta)){
          //Creo una tabla
           echo
           "
           <table width=100%; border=2;>
               
                   <th><b><center>Nombre y Apellido</center></b></th>
                   <th><b><center>DNI</center></b></th>
                   <th><b><center>Legajo</center></b></th>                                   
               <tr>
                      <td><center>".$fila['Nombre_Apellido']."</center></td>
                      <td><center>".$fila['DNI_ID']."</center></td>
                      <td><center>".$fila['Legajo']."</center></td>                  

               </tr>
           </table>
          ";              
        }    
      }            
?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

 </body>
</html>