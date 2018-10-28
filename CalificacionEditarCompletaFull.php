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
       $cal=$_GET['calificacion'];
       $modulo=$_GET['modulo'];
       
       
       
        $conexion=mysql_connect("localhost","root","gday") or die("Problemas en la conexion");
        mysql_select_db("escuela",$conexion) or die("Problemas en la seleccion de la base de datos");
        $registros=mysql_query("select loggin,pass from Administrador where loggin='$user' and pass='$pass'",$conexion) or die("Problemas en el select:".mysql_error());
        if ($reg=mysql_fetch_array($registros)){
           ?>   
                <section id="seccion">
                <article>
                        <header>
                        Actualizar Calificacion Del Alumno
                        </header>
                       <?php
                                $registros1=mysql_query("select ID_Modulo,Modulo from Modulos where Modulo=$modulo",$conexion) or die("Problemas en el select modulos:".mysql_error());
                                 if ($reg1=mysql_fetch_array($registros1)){ 
                                                              $id_modulo_=$reg1['ID_Modulo'];
                                                              $modulo_=$reg1['Modulo'];
                                                              
                                                               $registros2=mysql_query("select ID_Modulo_T from Toma where CURP_T='$CURP'",$conexion) or die("Problemas en el select modulos:".mysql_error());
                                                               if ($reg2=mysql_fetch_array($registros2)){ 
                                                                         $id_modulo_t=$reg2['ID_Modulo_T'];
                                                                        if($id_modulo_t==$id_modulo_){
                                                                    
                                                                                if($cal==0){
                                                                                 echo '<p>Ingresa una calificacion mayor a 0 o este alumno reprovara</p>';
                                                                                 ?>
                                                                                  <div>
                                                         
                                                                 <form action="CalificacionEditarCompletaFull.php" method="get" class ="contact_form">
                                                                         <ul>  
                                                                         <p>Ingresa calificacion correcta</p>   
                                                                         <input type="hidden" name="CURP" value="<?php echo $CURP; ?>">
                                                                         <li><label for="name">Modulo</label><input type="text" name="modulo"></li>
                                                                         <li><label for="name">Calificacion</label><input type="text" name="calificacion"></li>
                                                                
                                                                         <input type="hidden" name="variable1" value="admin">
                                                                         <input type="hidden" name="variable2" value="tolucainea2014">           
                                                                         <li><button class="submit" type="submit">Actualizar Calificacion</button></li>
                                                                         </ul>
                                                                </form>
                                                       </div>
                                                                                 
                                                                                 
                                                                                 <?php
                                                                        }
                                                                    else{
                                                                       mysql_query("UPDATE Toma SET calificacion=$cal WHERE CURP_T='$CURP'",$conexion) or die("Problemas en el select Alumnos".mysql_error());
                                                                       echo '<p>Alumno Actualizado</p>';
                                                                        }
                                                                        }
                                                                        else{
                                                                        $registros3=mysql_query("select Modulo from Modulos where ID_modulo='$id_modulo_t'",$conexion) or die("Problemas en el select modulos:".mysql_error());
                                                                        if ($reg3=mysql_fetch_array($registros3)){
                                                                        $modulo_e=$reg3['Modulo'];
                                                                        $comprovar=$modulo_e+1;
                                                                        
                                                                         if($comprovar==$modulo){
                                                                                
                                                                              echo 'Alumno Actualizado<br>';
                                         
                                           mysql_query("insert into Historial(CURP_H,ID_Modulo_H,Calificacion_H) values ('$CURP',$id_modulo_t,$cal)", $conexion) or die("Problemas en el select Modulos".mysql_error());
                                            mysql_query("delete from Toma where CURP_T='$CURP'",$conexion) or die("Problemas en el select:".mysql_error());
                                           mysql_query("insert into Toma(CURP_T,ID_Modulo_T,Calificacion) values ('$CURP',$id_modulo_,$cal)", $conexion) or die("Problemas en el select Modulos".mysql_error());
                                           
                                           
                                                                         }
                                                                         else if($comprovar<$modulo){
                                                                             echo 'No puedes cursar el modulo:'.' '.$modulo.'sin antes haber cursado el modulo: '.$comprovar;
                                                                             ?>
                                                       <div>
                                                         
                                                                 <form action="CalificacionEditarCompletaFull.php" method="get" class ="contact_form">
                                                                         <ul>  
                                                                         <p>Ingresa el modulo que corresponde</p>   
                                                                         <input type="hidden" name="CURP" value="<?php echo $CURP; ?>">
                                                                         <li><label for="name">Modulo</label><input type="text" name="modulo"></li>
                                                                         <li><label for="name">Calificacion</label><input type="text" name="calificacion"></li>
                                                                
                                                                         <input type="hidden" name="variable1" value="admin">
                                                                         <input type="hidden" name="variable2" value="tolucainea2014">           
                                                                         <li><button class="submit" type="submit">Actualizar Calificacion</button></li>
                                                                         </ul>
                                                                </form>
                                                       </div>
                                                                             
                                                                         <?php
                                                                         }
                                                                         else if($modulo<$comprovar){
                                                                         echo 'No puedes volver a cursar el modulo:'.' '.$modulo;
                                                                         ?>
                                                                          <div>
                                                         
                                                                 <form action="CalificacionEditarCompletaFull.php" method="get" class ="contact_form">
                                                                         <ul>  
                                                                         <p>Ingresa el modulo que corresponde</p>   
                                                                         <input type="hidden" name="CURP" value="<?php echo $CURP; ?>">
                                                                         <li><label for="name">Modulo</label><input type="text" name="modulo"></li>
                                                                         <li><label for="name">Calificacion</label><input type="text" name="calificacion"></li>
                                                                
                                                                         <input type="hidden" name="variable1" value="admin">
                                                                         <input type="hidden" name="variable2" value="tolucainea2014">           
                                                                         <li><button class="submit" type="submit">Actualizar Calificacion</button></li>
                                                                         </ul>
                                                                </form>
                                                       </div>
                                                                 
                                                                         
                                                                         <?php
                                                                         }
                                                                         
                                                                        
                                                                        }
                                                                 
                                                                  }
                                                                        
                                                          
                                                             }
                                                                 
                                                               
                                                                 
                                                                 }
                                                              else{
                                                              ?>
                                                             <div>
                                                         
                                                         <form action="CalificacionEditarCompletaFull.php" method="get" class ="contact_form">
                                                                 <ul>     <input type="hidden" name="CURP" value="<?php echo $id_a; ?>">
                                                                        
                                                                         <p>No existe ese modulo en la base</p>
                                                                          <li><label for="name">Modulo</label><input type="text" name="modulo"></li>
                                                                          <li><label for="name">Calificacion</label><input type="text" name="calificacion"></li>
                                                                
                                                                          <input type="hidden" name="variable1" value="admin">
                                                                          <input type="hidden" name="variable2" value="tolucainea2014">           
                                                                          <li><button class="submit" type="submit">Actualizar Calificacion</button></li>
                                                                          
                                                                 </ul>
                                                       </form>
                                                       </div>
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
