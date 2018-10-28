<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="iso-8859-1">
        <meta name="description" content="page by system INEA">
        <meta name="keywords" content="HTML, CSS3, JavaScript">
        <title>Pagina Principal</title>
        <link rel="stylesheet" href="estilos.css">
        <script src=”micodigo.js”></script>
      
</head>
<body id="agrupar">
        <header id="cabecera">
                <span id="titulo">Sistema de control INEA</span>
        </header>
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
                        Consultas de alumnos
                        </header>
                        <?php
        $conexion=mysql_connect("localhost","root","gday") or die("Problemas en la conexion");
        mysql_select_db("escuela",$conexion) or die("Problemas en la seleccion de la base de datos");
       
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
                                                         <form action="MostrarHistorial.php" method="get" class ="contact_form">
                                                                 <ul>
                                                                  <h1>Datos Personales</h1>
                                                                          <input type="hidden" name="CURP" value="<?php echo $id_a; ?>">
                                                                          <li><label for="name">Nombre</label><input type="text" name="Nombre" value="<?php echo $nombre; ?>"></li>
                                                                          <li><label for="name">Apellidos</label><input type="text" name="Apellidos" value="<?php echo $apellido; ?>"></li>
                                                                          <li><label for="name">Edad</label><input type="text" name="Edad" value="<?php echo $edad; ?>"></li>
                                                          
                                                                 <h1>Datos Academicos</h1>
                                                                          <li><label for="name">ID Modulo</label><input type="text" name="id_modulo" value="<?php echo $id_modulo; ?>"></li>
                                                                          <li><label for="name">Modulo</label><input type="text" name="modulo" value="<?php echo $modulo; ?>"></li>
                                                                           <input type="hidden" name="mod" value="<?php echo $modulo; ?>">
                                                                          <li><label for="name">Promedio Actual</label><input type="text" name="calificacion" value="<?php echo $calificacion; ?>"></li>
                                                                           <input type="hidden" name="cal" value="<?php echo $calificacion; ?>">
                                                                     
                                                                           <li><button class="submit" type="submit">Mostrar Historial</button></li>
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
                
               <form action="DatosMostrarAlumno.php" method="get" class ="contact_form" >
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
        
         <form action="DatosMostrarAlumno.php" method="get" class ="contact_form" >
                <ul>
                <h1>Alumnos</h1>
                        <li><label for="name">CURP</label><input type="text" name="loggin" required></li> 
                        <li><button class="submit" type="submit">Buscar CURP</button></li>
                </ul>
                
        </form>
                
                
               </blockquote>
                <form action="RevisarAdministrador.php" method="get" class ="contact_form" >
                <ul>
                <h1>Administrador</h1>
                <p>Solo administrador</p>
                      
                        <li><label for="name">USUARIO</label><input type="text" name="loggin" required></li> 
                        <li><label for="name">PASSWORD</label><input type="password" name="pass" required></li> 
                        <li><button class="submit" type="submit">Entrar como administrador</button></li>
                </ul>
        </form>
        
        </aside>
        <footer id="pie">
       INEA
        <br>
        <small>Derechos Reservados &copy; 2015</small>
        </footer>
</body>
</html>
