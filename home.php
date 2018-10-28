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
        
         <form action="DatosMostrarAlumno.php" method="get" class ="contact_form" >
                <ul>
                <h1>Alumnos</h1>
                        <li><label for="name">CURP<br></label><input type="text" name="CURP" required pattern="[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}"></li> 
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
