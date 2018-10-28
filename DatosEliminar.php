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
                        Bajas de alumnos
                        </header>
                                 <form action="DatosEliminarCompletos.php" method="get" class ="contact_form" >
                <ul>
                
                        
                        <li><label for="name">CURP:</label><input type="text" name="CURP" placeholder ="CURG941121HMCRMS02" required pattern="[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}"></li> 
                        <input type="hidden" name="variable1" value="admin">
                        <input type="hidden" name="variable2" value="tolucainea2014"> 
                        <li><button class="submit" type="submit">Buscar</button></li>
                </ul>
        </form>
                       
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
