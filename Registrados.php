<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="iso-8859-1">
        <meta name="description" content="page by system INEA">
        <meta name="keywords" content="HTML, CSS3, JavaScript">
        <title>Pagina Principal</title>
        <link rel="stylesheet" href="estilos.css">
        <script src=”micodigo.js”></script>
        <link rel="stylesheet" type="text/css" href="style.css">
      
      
            <script>
    function validarSiNumero(numero){
    if (!/^([0-9])*$/.test(nume2ro))
    alert("El valor:" + numero + " no es un nummero de alguna calle");
    }
    function validar(e) {
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==8) return true; //Tecla de retroceso (para poder borrar)
// dejar la línea de patron que se necesite y borrar el resto

patron =/[A-Za-z\s\ñ\Ñ]/;// Sol0o acepta letras
//patron = /\d/; // Solo acepta números
//patron = /\w/; // Acepta números y letras
//patron = /\D/; // No acepta números
//
te = String.fromCharCode(tecla);
return patron.test(te);
} 
    
    
    
    
    
    
    
    
    
    </script>
      
      
</head>
<body id="agrupar">
        <header id="cabecera">
                <span id="titulo">Sistema de control INEA</span>
        </header>
            <?php
       $user=$_GET['variable1'];
       $pass=$_GET['variable2'];
       
       
       
        $conexion=mysql_connect("localhost","root","gday") or die("Problemas en la conexion");
        mysql_select_db("escuela",$conexion) or die("Problemas en la seleccion de la base de datos");
        $registros=mysql_query("select loggin,pass from Administrador where loggin='$user' and pass='$pass'",$conexion) or die("Problemas en el select:".mysql_error());
        if ($reg=mysql_fetch_array($registros)){
           ?>   
        <nav id="menu">
                <ul>
                        
                        <li><a href="home.php">Cerrar sesion</a></li>
                        
                </ul>
        </nav>
    
                <section id="seccion">
                <article>
                        <header>
                        Registrar Alumno
                        </header>
                       <?php

        
        $registros4=mysql_query("select CURP
                       from Alumnos where CURP='$_REQUEST[CURP]'",$conexion) or die("Problemas en el select:".mysql_error());
                       
                       
                      if ($reg4=mysql_fetch_array($registros4)){
                      ?>
                      
                 <div>
                                         <form action="Registrados.php" method="get" class ="contact_form" >
                <ul>
                <h1>Esta curp ya esta siendo usada</h1>
                <h1>Datos Personales</h1>
                        <li><label for="name">CURP</label><input type="text" name="CURP" placeholder ="CURG941121HMCRMS02" required pattern="[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}"></li>
                        <li><label for="name">nombre</label><input type="text" name="Nombre" value="<?php echo $_REQUEST[Nombre]; ?>"required onkeypress="return validar(event)"></li>
                        <li><label for="name">Apellidos</label><input type="text" name="Apellidos" value="<?php echo $_REQUEST[Apellidos]; ?>"required onkeypress="return validar(event)"></li>
                        <li><label for="name">Edad</label><input type="text" name="Edad" value="<?php echo $_REQUEST[Edad]; ?>"required pattern="[0-9]{2}"></li>
                        <li><label for="name">Telefono</label><input type="text" name="Telefono" value="<?php echo $_REQUEST[Telefono]; ?>"required pattern="[0-9]{10}"></li>
                        
                 <h1>Datos Del Domicilio</h1>  
                 
                        <li><label for="name">Calle</label><input type="text" name="Calle" value="<?php echo $_REQUEST[Calle]; ?>"></li>
                        <li><label for="name">Numero</label><input type="text" name="Numero" value="<?php echo $_REQUEST[Numero]; ?>"onChange="validarSiNumero(this.value);"></li>
                        <li><label for="name">Colonia</label><input type="text" name="Colonia" value="<?php echo $_REQUEST[Colonia]; ?>"></li>
                        <li><label for="name">Municipio</label><input type="text" name="Municipio" value="<?php echo $_REQUEST[Municipio]; ?>"required onkeypress="return validar(event)"></li>
                        <li><label for="name">Estado</label><input type="text" name="Estado" value="<?php echo $_REQUEST[Estado]; ?>"required onkeypress="return validar(event)"></li>
                        
                  
                         <input type="hidden" name="variable1" value="admin">
                        <input type="hidden" name="variable2" value="tolucainea2014">       
                         
                        
                        
                        
                        <li><button class="submit" type="submit">Aceptar</button></li>
                        
                        
                
                </ul>
        
        
        
        </form>
        <div>
                      
                      
                      <?php
                      }
                      else {
                      
                       
        
        
        
        $registros=mysql_query("select ID_Municipios
                       from Municipios where Nombre='$_REQUEST[Municipio]'",$conexion) or die("Problemas en el select:".mysql_error());
                       
                       
       if ($reg=mysql_fetch_array($registros)){
               
               $id_m=$reg['ID_Municipios'];
                
                 $registros2=mysql_query("select ID_Estado
                       from Estados where Nombre='$_REQUEST[Estado]'",$conexion) or die("Problemas en el select:".mysql_error());
                        if ($reg2=mysql_fetch_array($registros2)){
                              
                                 $id_e=$reg2['ID_Estado'];
                                       mysql_query("insert into Alumnos(CURP,Nombre,Apellidos,Edad) values ('$_REQUEST[CURP]','$_REQUEST[Nombre]','$_REQUEST[Apellidos]',$_REQUEST[Edad])", 
                                $conexion) or die("Problemas en el select Alumnos".mysql_error());
                               
                      mysql_query("insert into Direccion(Calle,Numero,Colonia,ID_M_D,CURP_D) values ('$_REQUEST[Calle]',$_REQUEST[Numero],'$_REQUEST[Colonia]',$id_m,'$_REQUEST[CURP]')", 
                                $conexion) or die("Problemas en el select Direccion".mysql_error());
                                
                                mysql_query("insert into Telefonos(CURP_TEL,Telefono) values ('$_REQUEST[CURP]','$_REQUEST[Telefono]')", 
                                $conexion) or die("Problemas en el select Teefonos".mysql_error());
                               
                                
                        mysql_query("insert into Toma(CURP_T,ID_Modulo_T,Calificacion) values ('$_REQUEST[CURP]',12311,0)", 
                                $conexion) or die("Problemas en el select Modulos".mysql_error());
                                 
                                       ?> 
                             
                                 <div>
        <h1>Alumno Dado De Alta</h1>
      
                <ul>
                        <li><label for="name">Ha agregado a un alumno nuevo</label></li><br>
                        
                       
                </ul>

        
        </div>
                                                   
                        <?php
                        }
                        else{
                        ?>
                                               <div>
                                         <form action="Registrados.php" method="get" class ="contact_form" >
                <ul>
                <h1>Estado No encontrado en nuestro registro</h1>
                <h1>Datos Personales</h1>
                        <li><label for="name">CURP</label><input type="text" name="CURP" value="<?php echo $_REQUEST[CURP]; ?>"required pattern="[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}"></li>
                        <li><label for="name">nombre</label><input type="text" name="Nombre" value="<?php echo $_REQUEST[Nombre]; ?>"required onkeypress="return validar(event)"></li>
                        <li><label for="name">Apellidos</label><input type="text" name="Apellidos" value="<?php echo $_REQUEST[Apellidos]; ?>"required onkeypress="return validar(event)"></li>
                        <li><label for="name">Edad</label><input type="text" name="Edad" value="<?php echo $_REQUEST[Edad]; ?>"required pattern="[0-9]{2}"></li>
                        <li><label for="name">Telefono</label><input type="text" name="Telefono" value="<?php echo $_REQUEST[Telefono]; ?>required pattern="[0-9]{10}""></li>
                        
                 <h1>Datos Del Domicilio</h1>  
                 
                        <li><label for="name">Calle</label><input type="text" name="Calle" value="<?php echo $_REQUEST[Calle]; ?>"></li>
                        <li><label for="name">Numero</label><input type="text" name="Numero" value="<?php echo $_REQUEST[Numero]; ?>"onChange="validarSiNumero(this.value);"></li>
                        <li><label for="name">Colonia</label><input type="text" name="Colonia" value="<?php echo $_REQUEST[Colonia]; ?>"></li>
                        <li><label for="name">Municipio</label><input type="text" name="Municipio" value="<?php echo $_REQUEST[Municipio]; ?>"required onkeypress="return validar(event)"></li>
                        <li><label for="name">Estado:</label><input type="text" name="Estado" placeholder ="Estado De Mexico" required onkeypress="return validar(event)"></li>
               
                         <input type="hidden" name="variable1" value="admin">
                        <input type="hidden" name="variable2" value="tolucainea2014">       
                         
                        
                        
                        
                        <li><button class="submit" type="submit">Aceptar</button></li>
                        
                        
                
                </ul>
        
        
        
        </form>
        <div>
              
                               
                        
                        
                        <?php
                        }
       }
        else{
        
        ?>
                                                       <div>
                                         <form action="Registrados.php" method="get" class ="contact_form" >
                <ul>
                <h1>Municipio No encontrado en nuestro registro</h1>
                <h1>Datos Personales</h1>
                        <li><label for="name">CURP</label><input type="text" name="CURP" value="<?php echo $_REQUEST[CURP]; ?>"required pattern="[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}"></li>
                        <li><label for="name">nombre</label><input type="text" name="Nombre" value="<?php echo $_REQUEST[Nombre]; ?>"required onkeypress="return validar(event)"></li>
                        <li><label for="name">Apellidos</label><input type="text" name="Apellidos" value="<?php echo $_REQUEST[Apellidos]; ?>"required onkeypress="return validar(event)"></li>
                        <li><label for="name">Edad</label><input type="text" name="Edad" value="<?php echo $_REQUEST[Edad]; ?>"required pattern="[0-9]{2}"></li>
                        <li><label for="name">Telefono</label><input type="text" name="Telefono" value="<?php echo $_REQUEST[Telefono]; ?>"required pattern="[0-9]{10}"></li>
                        
                 <h1>Datos Del Domicilio</h1>  
                 
                        <li><label for="name">Calle</label><input type="text" name="Calle" value="<?php echo $_REQUEST[Calle]; ?>"></li>
                        <li><label for="name">Numero</label><input type="text" name="Numero" value="<?php echo $_REQUEST[Numero]; ?>"onChange="validarSiNumero(this.value);"></li>
                        <li><label for="name">Colonia</label><input type="text" name="Colonia" value="<?php echo $_REQUEST[Colonia]; ?>"></li>
                        <li><label for="name">Municipio</label><input type="text" name="Municipio" placeholder ="Toluca" required onkeypress="return validar(event)"></li>
                        <li><label for="name">Estado</label><input type="text" name="Estado" value="<?php echo $_REQUEST[Estado]; ?>"required onkeypress="return validar(event)"></li>
                       
                
                         <input type="hidden" name="variable1" value="admin">
                        <input type="hidden" name="variable2" value="tolucainea2014">       
                         
                        
                        
                        
                        <li><button class="submit" type="submit">Aceptar</button></li>
                        
                        
                
                </ul>
        
        
        
        </form>
        <div>
       
       <?php
       }
       }
       mysql_close($conexion);
       
       ?>
                       
                </article>
               
        </section>
        <aside id="columna">                 
                <blockquote>
            <div>
       <form  action="BuscadorAlumnos.php" method="get" class ="contact_form" >
                <ul>
                       <label>Buscar</label>
                        <li><label for="name">Nombre:</label><input type="text" name="Nombre" placeholder ="Juan" required></li>
                        <input type="hidden" name="variable1" value="admin">
                        <input type="hidden" name="variable2" value="tolucainea2014">
                        <li><button class="submit" type="submit">Buscar</button></li>
                        
                     <br>
                <h1></h1>
         
                </ul>
        </form>
        <form  action="DatosPersonales.php" method="get" class ="contact_form" >
                <ul>
              
                        <li><label for="name">Agregar Nuevos Alumnos<br></label></li>
                        <input type="hidden" name="variable1" value="admin">
                        <input type="hidden" name="variable2" value="tolucainea2014">
                        
                        <li><button class="submit" type="submit">AGREGAR NUEVO</button></li>
                     <br>
                <h1></h1>
         
                </ul>
        </form>
         <form  action="DatosEliminar.php" method="get" class ="contact_form" >
                <ul>
                
                        <li><label for="name">ELiminar Alumnos<br></label></li>
                        <input type="hidden" name="variable1" value="admin">
                        <input type="hidden" name="variable2" value="tolucainea2014">
                        
                        
                        
                        <li><button class="submit" type="submit">Buscar</button></li>
                        
                     <br>
                <h1></h1>
         
                </ul>
        </form>
         <form  action="DatosMostrar.php" method="get" class ="contact_form" >
                <ul>
                
                        <li><label for="name">Consultar Alumnos<br></label></li>
                        <input type="hidden" name="variable1" value="admin">
                        <input type="hidden" name="variable2" value="tolucainea2014">
                        
                        <li><button class="submit" type="submit">Buscar</button></li>
                        
                     <br>
                <h1></h1>
         
                </ul>
        </form>
         <form  action="DatosEditar.php" method="get" class ="contact_form" >
                <ul>
                
                        <li><label for="name">Actualizar informacion<br></label></li>
                        <input type="hidden" name="variable1" value="admin">
                        <input type="hidden" name="variable2" value="tolucainea2014">
                        
                        <li><button class="submit" type="submit">Actualizar Informacion</button></li>
                        
                     <br>
                <h1></h1>
         
                </ul>
        </form>
        <form  action="CalificaionEditar.php" method="get" class ="contact_form" >
                <ul>
                
                        <li><label for="name">Actualizar Calificaciones<br></label></li>
                        <input type="hidden" name="variable1" value="admin">
                        <input type="hidden" name="variable2" value="tolucainea2014">
                        
                        <li><button class="submit" type="submit">Actualizar Calificaciones</button></li>
                        
                     <br>
                <h1></h1>
         
                </ul>
        </form>
         
        
        </div>

                
               </blockquote>
        </aside>   
             <?php  
        }
        else{
        ?>
          <nav id="menu">
                <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="Administrador.php">Administrador</a></li>
                        <li><a href="Alumnos.php">Alumnos</a></li>
          
                        
                </ul>
        </nav>
                   <section id="seccion">
     <article>
                        <header>
                       Instituto Nacional para la Educacion de los Adultos
                        </header>
                       
                </article>
                
                <article>
                        <header>
                     Alfabetizacion
                        </header>
                        <p>
                        
                        </p>
                        <figure>
                               <img src="gday.png" WIDTH="600" HEIGHT="100" align="center">
                                
                </article>
                <article>
                        <header>
                    Primaria
                        </header>
                        <p>
                        
                        </p>
                        <figure>
                               <img src="gday2.png" WIDTH="600" HEIGHT="100" align="center">
                                
                </article>
                 <article>
                        <header>
                   Secundaria
                        </header>
                        <p>
                        
                        </p>
                        <figure>
                               <img src="gday3.png" WIDTH="600" HEIGHT="100" align="center">
                                
                </article>
                      
            
                       
               
        </section>
        <aside id="columna">                 
                <blockquote>
 
      <div>
        <form  action="RevisarAdministrador.php" method="get" class ="contact_form" >
                <ul>
                        <li><label for="name">Debes iniciar secion primero</label></li><br>
                        <li><label for="name">USUARIO</label><input type="text" name="loggin" required></li> 
                        <li><label for="name">PASSWORD</label><input type="password" name="pass" required></li> 
                        <li><button class="submit" type="submit">Entrar como administrador</button></li>
         
                </ul>
        </form>
   
        
        </div>
        
       </blockquote> 
  
  </aside>
  
       
        <?php
        }
        ?>
        <footer id="pie">
         INEA
        <br>
        <small>Derechos Reservados &copy; 2015</small>
        </footer>
</body>
</html>
