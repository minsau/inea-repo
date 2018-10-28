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
                   
                        <li><a href="homeAdministrador.php">Home</a></li>
                        
                        <li><a href="home.php">Cerrar sesion</a></li>
                </ul>
        </nav>
       
              <section id="seccion">
                <article>
                        <header>
                        Consultas de alumnos
                        </header>
                        <?php
      
       
        $registros=mysql_query("select CURP,Nombre,Apellidos,Edad
        from Alumnos where CURP='$_REQUEST[CURP]'",$conexion) or die("Problemas en el select:".mysql_error());
        $registros2=mysql_query("select CURP_TEL,Telefono from Telefonos where CURP_TEL='$_REQUEST[CURP]'",$conexion) or die("Problemas en el select:".mysql_error());
        $registros3=mysql_query("select Calle,Numero,Colonia,ID_M_D,CURP_D
        from Direccion where CURP_D='$_REQUEST[CURP]'",$conexion) or die("Problemas en el select:".mysql_error());
        
         if ($reg=mysql_fetch_array($registros)){
                $id_a=$reg['CURP'];
                $nombre=$reg['Nombre'];
                $apellido=$reg['Apellidos'];
                $edad=$reg['Edad'];
                if ($reg2=mysql_fetch_array($registros2)){
                        $tel=$reg2['Telefono'];
                        if ($reg3=mysql_fetch_array($registros3)){
                                $calle=$reg3['Calle'];
                                $numero=$reg3['Numero'];
                                $colonia=$reg3['Colonia'];
                                $id_m=$reg3['ID_M_D'];
                                $registros4=mysql_query("select Nombre,ID_E_M from Municipios where ID_Municipios=$id_m",$conexion) or die("Problemas en el select:".mysql_error());
                                if ($reg4=mysql_fetch_array($registros4)){
                                        $municipio=$reg4['Nombre'];
                                        $id_e=$reg4['ID_E_M'];
                                        $registros5=mysql_query("select Nombre from Estados where ID_Estado=$id_e",$conexion) or die("Problemas en el select:".mysql_error());
                                        if ($reg5=mysql_fetch_array($registros5)){
                                                $estado=$reg5['Nombre'];
                                                $registros6=mysql_query("select ID_Modulo_T,Calificacion from Toma where CURP_T='$_REQUEST[CURP]'",$conexion) or die("Problemas en el select:".mysql_error());
                                                if ($reg6=mysql_fetch_array($registros6)){ 
                                                        $id_modulo=$reg6['ID_Modulo_T'];
                                                        $calificacion=$reg6['Calificacion'];
                                                        
                                                        $registros7=mysql_query("select Modulo from Modulos where ID_Modulo=$id_modulo",$conexion) or die("Problemas en el select:".mysql_error());
                                                                 if ($reg7=mysql_fetch_array($registros7)){ 
                                                                 $modulo=$reg7['Modulo'];
                                                                     
        
        ?>
                                                         <div>
                                                         <h1>REGISTRO ENCONTRADO</h1>
                                                         <form action="DatosMostrarCompletos.php" method="get" class ="contact_form">
                                                                 <ul>
                                                                  <h1>Datos Personales</h1>
                                                                          <li><label for="name">CURP</label><input type="text" name="CURP" value="<?php echo $id_a; ?>"></li>
                                                                          <li><label for="name">Nombre</label><input type="text" name="Nombre" value="<?php echo $nombre; ?>"></li>
                                                                          <li><label for="name">Apellidos</label><input type="text" name="Apellidos" value="<?php echo $apellido; ?>"></li>
                                                                          <li><label for="name">Edad</label><input type="text" name="Edad" value="<?php echo $edad; ?>"></li>
                                                                          <li><label for="name">Telefono</label><input type="text" name="Telefono" value="<?php echo $tel; ?>"></li>
                        
                                                                 <h1>Datos Del Domicilio</h1>
                                                                          <li><label for="name">Calle</label><input type="text" name="Calle" value="<?php echo $calle; ?>"></li>
                                                                          <li><label for="name">Numero</label><input type="text" name="Numero" value="<?php echo $numero; ?>"></li>
                                                                          <li><label for="name">Colonia</label><input type="text" name="Colonia" value="<?php echo $colonia; ?>"></li>
                                                                          <li><label for="name">Municipio</label><input type="text" name="Municipio" value="<?php echo $municipio; ?>"></li>
                                                                          <li><label for="name">Estado</label><input type="text" name="Estado" value="<?php echo $estado; ?>"></li>
                                                                 <h1>Datos Academicos</h1>
                                                                          <li><label for="name">ID Modulo</label><input type="text" name="id_modulo" value="<?php echo $id_modulo; ?>"></li>
                                                                          <li><label for="name">Modulo</label><input type="text" name="modulo" value="<?php echo $modulo; ?>"></li>
                                                                          <li><label for="name">Promedio Actual</label><input type="text" name="calificacion" value="<?php echo $calificacion; ?>"></li>
                                                                          
                                                                 </ul>
                                        
                                                         <?php
                                                         }
                                                }
                                        }
                                }
                        }
                }               
         }
         else{
                ?>
                
               <form action="DatosMostrarCompletos.php" method="get" class ="contact_form" >
                <ul>
                <p>No encontramos ese CURP</p>
                <p>Intenta una vez mas</p>
                        <li><label for="name">CURP:</label><input type="text" name="CURP" placeholder ="CURG941121HMCRMS02" required pattern="[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}"></li> 
                         <input type="hidden" name="variable1" value="admin">
                        <input type="hidden" name="variable2" value="tolucainea2014"> 
                        <li><button class="submit" type="submit">Buscar</button></li>
                </ul>
        </form>
                
                <?php
                  
         }
       ?>
        </form>      
       </div>                  
          
          
                     
                       
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
