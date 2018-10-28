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
                        Administrador
                        </header>
                        <p>En General el administrador es la persona encargada de administrar el sistema.<br>Al tener privilegios de administrador podras:</p>
                        <ul>
                        <li>Dar de alta alumnos.</li>
                        <li>Modificar alumnos.</li>
                        <li>Dar de baja alumnos.</li>
                        <li>Consultar alumnos en general.<li>
                        </ul>
                        <p>Necesitaras:</p>
                        <ul>
                        <li>Usuario</li>
                        <li>Password</li>
                        <ul>
                        <p>Estos seran entregados a personal responadable por la institucion, al tenerlos iras al apartado de la izquuierda en la marca Administrado,donde podras ingresar como administrador</p>
                       
                        <footer>
                                <p>Suerte</p>
                        </footer>
                </article>
                
        </section>
        <aside id="columna">                 
                <blockquote>
        
         <form action="DatosMostrarAlumno.php" method="get" class ="contact_form" >
                <ul>
                <h1>Alumnos</h1>
                        <li><label for="name">CURP<br></label><input type="text" name="loggin" required pattern="[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}"></li> 
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
