<?php
      $rta_si = $_POST['SI'];
      $rta_no= $_POST['NO'];                              
          //con este otro if valido al usuario y la contraseña
          if($rta_si)
          {
            header("location:http://localhost/2parcial/pages/inscripcion.html");                       
          }else{  
          header("location:http://localhost/2parcial/pages/menu.html");            
          }   

          


?>
