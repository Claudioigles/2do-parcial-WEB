<?php
        //Creo variable conexion
        $conexion=mysqli_connect('localhost','root','');               
        //Pregunta si esta creada la BD sino la crea:
        if(!mysqli_select_db($conexion,'Instituto_Bicentenario1' )){
              if (mysqli_query($conexion,'CREATE DATABASE Instituto_Bicentenario1')){ 
                echo 'La base se ha creado correctamente! <br>';
              }else{
                    echo 'No se ha creado la base por: '.mysqli_error();
              }
        }else{
          //Si ya fue creada me redirecciona al formulario de inscripcion 
                echo 'La base Agenda ya ha sido creada con anterioridad!';
                header("location:http://localhost/2parcial/pages/inscripcion.html");
        }
       
        //Selecciono Base de datos
        mysqli_select_db($conexion,'Instituto_Bicentenario1');                
        //Creo tabla en mi base de datos
        $sql='CREATE TABLE Inscripcion(          
          Tipo_DNI varchar (5),
          DNI_ID int NOT NULL,
           PRIMARY KEY(DNI_ID),
          Legajo int,
          Nombre_Apellido varchar(40),
          Sexo varchar(10),
          Fecha_Nacimiento date,
          Tel int,
          Lugar_Nacimiento varchar(40),
          Nacionalidad varchar(40),
          Domicilio varchar(40),
          Altura int,
          CP int,
          Piso varchar(5),
          Torre varchar(5),
          Dpto varchar(5),
          Email varchar(40),
          Nombre_Padres varchar(40),
          Sexo_Padres varchar(10),
          Tipo_Padres varchar(5),
          DNI_Padres int,
          Nacimiento_Padres varchar(40)
        )';
        mysqli_query($conexion,$sql);
        //Redirecciono al formulario para completarlo
        header("location:http://localhost/2parcial/pages/inscripcion.html");
               
        
      ?>
      