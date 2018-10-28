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
                <?php
                $mod=$_GET['mod'];
                $cal=$_REQUEST['cal'];
                $curp=$_GET['CURP'];
                echo 'modulo'.$mod;
                
             
   $conexion=mysql_connect("localhost","root","gday") or die("Problemas en la conexion");
        mysql_select_db("escuela",$conexion) or die("Problemas en la seleccion de la base de datos");
        $registros=mysql_query("select CURP_H,ID_Modulo_H,Calificacion_H
        from Historial where CURP_H='$_REQUEST[CURP]'",$conexion) or die("Problemas en el select:".mysql_error());
        $id_mod=$reg['ID_Modulo_H'];
        $contador=mysql_num_rows($registros);
       if($contador==0){
                        ?>
                        <p> No se han econtrado calificaciones</p>
          
          <?php
                       }
       else{
         ?>
        
                <div>
                <h1>REGISTROS ENCONTRADOS</h1>
                <form action="DescargarPDF.php" method="post">
                  
                        <table width="270" border="0" cellspacing="4" cellpadding="0" class="mitabla">
                        <tr><td width="266">CURP<td><td>Modulo</td><td>Calificacion</td><tr>
                        
        
        <?php
         $cont=1;
        while($reg=mysql_fetch_assoc($registros)){
                   



           ?>
           
                        <tr><td width="266"><?php echo $reg['CURP_H'];?><td><td><?php echo $cont;?></td><td><?php echo $reg['Calificacion_H'];?></td><tr>
                         
                        
                        
           
           
          
           <?php
           
           
           
           $cont=$cont+1;
           
        }
        ?>
          <tr><td width="266"><?php echo $curp;?><td><td><?php echo $mod;?></td><td><?php echo $cal;?></td><tr>
          <input type="hidden" name ="CURP"value="<?php echo $curp; ?>">
          <input type="hidden" name ="modulo"value="<?php echo $mod; ?>">
          <input type="hidden" name ="cal"value="<?php echo $cal; ?>">
         
         </table>
                         
              
                         
             <li><button class="submit" type="submit">Descargar Boleta</button></li>            
              </form>    
              </div>
        
        
        <?php
        }

       ?>
                
    
               </article>
        </section>
      <aside id="columna">                 
                <blockquote>
        
         <form action="DatosMostrarAlumno.php" method="get" class ="contact_form" >
                <ul>
                <h1>Alumnos</h1>
                        <li><label for="name">CURP</label><input type="text" name="CURP" required></li> 
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
