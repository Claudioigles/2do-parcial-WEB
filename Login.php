<?php

   

    session_start();//Creo una sesion
    //Declaro las variables y almaceno lo que puso el usuario a traves del metodo POST
        $usuario = $_POST['usuario'];
        $contra= $_POST['contra'];
          
        $_SESSION['usuario'] = $usuario;
        //Creo una cookie con el nombre de usuario
       
        if (isset($_POST['usuario'])&& ($_POST['contra'])){                               
            //con este otro if valido al usuario y la contraseña
            if($usuario==$usuario && $contra=='1234')
            {                
                //Creo la Conexion a base de datos y la base de datos
                        $conexion = mysqli_connect('localhost','root','');
                if(!$conexion){
                  die('No se puede conectar a la base de datos por: '.mysqli_error());       
                 }else{
                    echo 'Se ha establecido la conexion al servidor';
                    //Creo variable conexion
                    if(mysqli_query($conexion,'Create database Instituto_Bicentenario1 ')){
                        echo'Se ha creado la base de datos correctamente';                                
                    }else{
                     
                      echo'No se ha creado la base de datos por: '.mysqli_error();                      
                    }                       
                }               
              header("location:http://localhost/2parcial/pages/menu.html");
            }else{
                //Con este else redirijo para que vuelva a cargar y pida la contraseña nuevamente ya que es incorrecta
                header("location:http://localhost/2parcial/index.html");
            }

        }else{
             header("location:http://localhost/2parcial/index.html");
        }               

?>