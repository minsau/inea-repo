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
      
</head>
<body id="agrupar">
        <header id="cabecera">
                <span id="titulo">Sistema de control INEA</span>
        </header>
        <nav id="menu">
                <ul>
                 
                        <li><a href="homeAdministrador.php">Home</a></li>
                        
                        <li><a href="home.php">Cerrar sesion</a></li>
                        
                </ul>
        </nav>
        <?php
       $user=$_GET['variable1'];
       $pass=$_GET['variable2'];
       $CURP=$_GET['CURP'];
       
       
       
        $conexion=mysql_connect("localhost","root","gday") or die("Problemas en la conexion");
        mysql_select_db("escuela",$conexion) or die("Problemas en la seleccion de la base de datos");
        $registros=mysql_query("select loggin,pass from Administrador where loggin='$user' and pass='$pass'",$conexion) or die("Problemas en el select:".mysql_error());
        if ($reg=mysql_fetch_array($registros)){
           ?>   
                <section id="seccion">
                <article>
                        <header>
                       Datos actualizados
                        </header>
                       <?php
         $registros3=mysql_query("select ID_Municipios
                       from Municipios where Nombre='$_REQUEST[Municipio]'",$conexion) or die("Problemas en el select:".mysql_error());
        if ($reg3=mysql_fetch_array($registros3)){
        $id_m=$reg3['ID_Municipios'];
        
        
                 $registros2=mysql_query("select ID_Estado
                       from Estados where Nombre='$_REQUEST[Estado]'",$conexion) or die("Problemas en el select:".mysql_error());
                        if ($reg2=mysql_fetch_array($registros2)){
                        $id_e=$reg2['ID_Estado'];
                        
                        
                                
                              
                                mysql_query("UPDATE Alumnos SET Edad=$_REQUEST[Edad] WHERE CURP='$CURP'", 
                                $conexion) or die("Problemas en el select Alumnos".mysql_error());
                               
                                
                                
                                mysql_query("UPDATE Direccion SET Calle='$_REQUEST[Calle]',Numero=$_REQUEST[Numero],Colonia='$_REQUEST[Colonia]',ID_M_D=$id_m WHERE CURP_D='$CURP'", 
                                $conexion) or die("Problemas en el select Direccion".mysql_error());
                                
                                
                                 mysql_query("UPDATE Telefonos SET Telefono='$_REQUEST[Telefono]' WHERE CURP_TEL='$CURP'", 
                                $conexion) or die("Problemas en el select Teefonos".mysql_error());
                                
                                
                                
                                
                                
                              
                        }
                        else{
                        ?>
                           <div>
                                         <form action="DatosEditarCompletosFull.php" method="get" class ="contact_form" >
                <ul>
                <h1>Estado No encontrado en nuestro registro</h1>
                <h1>Datos Personales</h1>
                        <li><label for="name">Edad</label><input type="text" name="Edad" value="<?php echo $_REQUEST[Edad]; ?>"></li>
                        <li><label for="name">Telefono</label><input type="text" name="Telefono" value="<?php echo $_REQUEST[Telefono]; ?>"></li>
                        
                 <h1>Datos Del Domicilio</h1>  
                 
                        <li><label for="name">Calle</label><input type="text" name="Calle" value="<?php echo $_REQUEST[Calle]; ?>"></li>
                        <li><label for="name">Numero</label><input type="text" name="Numero" value="<?php echo $_REQUEST[Numero]; ?>"></li>
                        <li><label for="name">Colonia</label><input type="text" name="Colonia" value="<?php echo $_REQUEST[Colonia]; ?>"></li>
                        <li><label for="name">Municipio</label><input type="text" name="Municipio" value="<?php echo $_REQUEST[Municipio]; ?>"></li>
                        <li><label for="name">Estado:</label><input type="text" name="Estado" placeholder ="Estado De Mexico" required></li>
                 
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
                                         <form action="DatosEditarCompletosFull.php" method="get" class ="contact_form" >
                <ul>
                <h1>Municipio No encontrado en nuestro registro</h1>
                <h1>Datos Personales</h1>
                      
                        <li><label for="name">Edad</label><input type="text" name="Edad" value="<?php echo $_REQUEST[Edad]; ?>"></li>
                        <li><label for="name">Telefono</label><input type="text" name="Telefono" value="<?php echo $_REQUEST[Telefono]; ?>"></li>
                        
                 <h1>Datos Del Domicilio</h1>  
                 
                        <li><label for="name">Calle</label><input type="text" name="Calle" value="<?php echo $_REQUEST[Calle]; ?>"></li>
                        <li><label for="name">Numero</label><input type="text" name="Numero" value="<?php echo $_REQUEST[Numero]; ?>"></li>
                        <li><label for="name">Colonia</label><input type="text" name="Colonia" value="<?php echo $_REQUEST[Colonia]; ?>"></li>
                        <li><label for="name">Municipio</label><input type="text" name="Municipio" placeholder ="Toluca" required></li>
                        <li><label for="name">Estado</label><input type="text" name="Estado" value="<?php echo $_REQUEST[Estado]; ?>"></li>
              
                         <input type="hidden" name="variable1" value="admin">
                        <input type="hidden" name="variable2" value="tolucainea2014">       
                         
                        
                        
                        
                        <li><button class="submit" type="submit">Aceptar</button></li>
                        
                        
                
                </ul>
        
        
        
        </form>
        <div>
        <?php
        }
        
                       
                           
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
