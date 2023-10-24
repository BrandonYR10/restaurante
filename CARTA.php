
<?php
  session_start();

  require 'config.php';

  if (isset($_SESSION['user_id'])) {
    $records = $connection->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta Principal</title>
    <!-- Invoca iconos de la web-->
    <script src="https://kit.fontawesome.com/f368768ce7.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="CSS/Pestañas.css">
     <link rel="stylesheet" href="CSS/Footer.css">
     <link rel="stylesheet" href="CSS/Body.css">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/Estilos.css">
     <script src="js/popper.min.js"></script>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
     <link rel="stylesheet" href="css/sweetalert2.min.css"> 
     <!-- fin de la invocación -->
</head>
<body style="background: linear-gradient(to right, #ff6a00, #e2df2b);">
<!-- CABECERA -->
<header >
    <table style="width: 100%; text-align: center; margin: auto;">
        <tr>
            <td>
                <img src="img/logo.png" align="center" width="200px" > 
            </td>
        </tr>         
    </table>
</header>
<nav class="navbar navbar-expand-md navbar-dark " style="background: #e6b20a;"> 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto" style=" width: 100%;">
                    <li class="nav-item dropdown">
                        <a class="inicio" href="inicioLogeado.php">INICIO</a>&nbsp;
                    </li>     
                    <li class="nav-item dropdown">
                        <a class="inicio" href="CARTA.php">CARTA</a>&nbsp;
                    </li>
                    <li class="nav-item dropdown">
                        <a class="inicio" href="PROMOCIONES.php">PROMOCIONES</a>&nbsp;
                    </li>
                    <li class="nav-item dropdown">
                        <a class="inicio" href="SERVICIOS.php">SERVICIOS</a>&nbsp;
                    </li>
                    <li class="nav-item dropdown">
                        <a class="inicio" href="RESTAURANTES.php">RESTAURANTES</a>&nbsp;
                    </li> 
                    <li class="nav-item dropdown">
                        <a class="inicio" href="CONTACTANOS.php">CONTACTANOS</a>&nbsp;
                    </li>
                </ul>
            </div>   
            <!--gggggggggggggggggggg  -->  
        <div style="height: 40px">
        <?php if(!empty($user)): ?>
            <a href="" style="text-align: center;"><i class="fas fa-user-circle" ><br> <?= $user['email']; ?> 
        </i><br>
                <h6 style="text-align: center;"><a href="salir.php" >
                Salir de la sesión
                </a></h6>
                <?php else: ?>  
                    <a href="INICIAR-SESION.php"><i class="fas fa-user-circle fa-2x"  height="70px" width="70px" ></i></a>&nbsp;
                <?php endif; ?>
                
            </a> 
        </div>                        
          <!--fgggggggggggggggggggggg  -->
            <img src="img/carrito.jpeg"   height="70px"  data-toggle="dropdown" class="nav-link dropdown-toggle img-fluid"
                            width="70px" href="#" id="dropdown01" aria-haspopup="true"
                            aria-expanded="false"> </img> 
                        <div id="carrito" class="dropdown-menu"  aria-labelledby="navbarCollapse" style="left: 68%; ">
                            <table id="lista-carrito" class="table" >
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block">Vaciar Carrito</a>
                            <a href="#" id="procesar-pedido" class="btn btn-danger btn-block">Procesar Compra</a>
                        </div>
        </nav>
<!-- FIN CABECERA --> 


<br>
<h1 align="center" style="background-color:rgb(104, 221, 9); font-size: 40px;">CARTA PRINCIPAL</h1> 
   
<!-- CUERPO -->
<br>
    <table  align="center" border="10" height="5" style=" border-color: rgb(231, 219, 49);">
        <tr>
            <td>
                <img src="img/fondo-promociones.jpg"  width="650" height="350" align="center" usemap="#promocion">
                <map name="promocion">
                    <area shape="rect" coords="0,0,660,370" 
                    href="PROMOCIONES.php" alt="">
                </map>
            </td>
            <td>
                <img src="img/fondo-pollos.jpg"  width="650" height="350" align="center" usemap="#pollos">
                <map name="pollos">
                    <area shape="rect" coords="0,0,660,370" 
                    href="Pollos-brasa.php" alt="">
                </map>
            </td>
        </tr>
        <tr>
            <td>
                <img src="img/fondo-bebidas.jpg"  width="650" height="350" align="center" usemap="#bebidas">
                <map name="bebidas">
                    <area shape="rect" coords="0,0,660,370" 
                    href="Bebidas.php" alt="">
                </map>
            </td>
            <td>
                <img src="img/fondo-postres.jpg"  width="650" height="350" align="center" usemap="#postres">
                <map name="postres">
                    <area shape="rect" coords="0,0,660,370" 
                    href="Postres.php" alt="">
                </map>
            </td>
        </tr>
    </table>


    <!-- redes sociales 

	<div class="social">
         
		<a href="https://www.facebook.com/pages/category/Restaurant/Las-Tinajas-Chicken-Grill-1667865913264377/"><i class="fab fa-facebook fa-2x" style="color: rgb(18, 142, 214);" ></i></a>
		<a href="#"><i class="fab fa-twitter fa-2x " style="color:rgba(47, 255, 255, 0.938)"></i></a>
        <a href="#"><i class="fab fa-instagram fa-2x" style="color: rgb(165, 22, 221);"></i></a>
	
    </div>-->

<!-- FOOTER -->
<footer>
        <div class="container__footer">
            <div class="box__footer" ><br>
                <h4 align="center" >Mabys<hr width="200px"></h4>
                <a  class="final" href="Historia.php">Nosotros</a>
                <a  class="final" href="Historia.php">Historia</a>
                <a  class="final" href="Historia.php">Misión</a>
                <a  class="final" href="Historia.php">Visión</a>
                <a  class="final" href="Historia.php">Valores</a>
            </div>
            <div class="box__footer"><br>
                <h4 align="center" >Servicios<hr width="200px"></h4>
                <a  class="final" href="SERVICIOS.php">Celebra tu cumpleaños</a>
                <a  class="final" href="SERVICIOS.php">Reservas corporativas</a>
                <a  class="final" href="SERVICIOS.php">Delivery</a>
                <a  class="final" href="Libro-Reclamación.html">Libro de reclamación: </a><br>
                <a  align="center" class="final" href="Libro-Reclamación.html"><i class="fas fa-book-open fa-3x"></i></a>
            </div>

            <div class="box__footer"><br>
                <h4 align="center" >Politicas y terminos<hr style="width: auto;"></h4>
                <a  class="final" href="https://www.pardoschicken.pe/terminos-y-condiciones/">Terminos y Condiciones</a>
                <a  class="final" href="https://www.pardoschicken.pe/politicas-de-privacidad/">Política de privacidad</a>
                <a  class="final" href="Equipo.html">Equipo de programadores</a>            
            </div>

            <div class="box__footer"><br>
                <h4 align="center" >Metodos de Pago<hr style="width: auto;"></h4>
                <br>
                <i align="center" style="color: darkblue;" class="fab fa-cc-visa fa-2x"></i> &nbsp;
                <i align="center" style="color: darkblue;" class="fab fa-cc-mastercard fa-2x"></i>
            </div>

            <div class="box__footer"><br>
                <h4 align="center" >Contactanos<hr width="200px"></h4>
                <a  class="final" href="CONTACTANOS.php">Haz tu reserva</a>
                <a  class="final" href="CONTACTANOS.php">Trabaja con nosotros</a>
                <label style="color: darkblue;">Ubicanos: </label>
                    <select name="" id="">
                        <option value="">ATE</option>
                        <option value="">Cercado de Lima</option>
                    </select>            
            </div>

        </div>

        <div class="box__copyright">
            <hr>
            <p>Todos los derechos reservados © 2021 <b>Grupo 12</b></p>
        </div>
        <br>
    </footer>
<!-- FIN FOOTER --> 
 <!-- invocación del carrito --> 
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sweetalert2.min.js"></script>
<script src="js/carrito.js"></script>
<script src="js/pedido.js"></script>   
<!-- invocación del carrito -->  
</body>
</html>