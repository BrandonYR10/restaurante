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
    <title>Recuperar Cuenta</title>

    <!-- Invoca iconos de la web -->
    <script src="https://kit.fontawesome.com/f368768ce7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/Pestañas.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/Body.css">
    <link rel="stylesheet" href="CSS/Slider.css">
    <link rel="stylesheet" href="CSS/Estilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <!-- fin de la invocacion -->
</head>
<body>
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
            <a href="INICIAR-SESION.php"><i class="fas fa-user-circle fa-2x"  height="70px" width="70px" ></i></a>&nbsp;
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
    <!-- Codigo para recuperar cuenta -->
        <form action="">
            <h1>¿Olvidastes tu contraseña?</h1>
            <p>Ingrese su direccion de correo electronico a continuación y le enviaremos un correo electronico</p>
            <p>que le indicara qué hacer a continuación</p>
            <br><br>
            <input type="email" placeholder="correo electronico" class="sub"><br><br><br>
            <input type="submit" value="ENVIAR" class="subir">
        </form>
        <br><br><br>
 <!-- FOOTER -->
<footer>
    <div class="container__footer">
        <div class="box__footer" ><br>
            <h3 align="center" >Mabys<hr width="200px"></h3>
            <a  class="final" href="Historia.php">Nosotros</a>
            <a  class="final" href="Historia.php">Historia</a>
            <a  class="final" href="Historia.php">Misión</a>
            <a  class="final" href="Historia.php">Visión</a>
            <a  class="final" href="Historia.php">Valores</a>
        </div>
        <div class="box__footer"><br>
            <h3 align="center" >Servicios<hr width="200px"></h3>
            <a  class="final" href="SERVICIOS.php">Celebra tu cumpleaños</a>
            <a  class="final" href="SERVICIOS.php">Reservas corporativas</a>
            <a  class="final" href="SERVICIOS.php">Delivery</a>
            <a  class="final" href="Libro-Reclamación.html">Libro de reclamación: </a><br>
            <a  align="center" class="final" href="Libro-Reclamación.html"><i class="fas fa-book-open fa-3x"></i></a>
        </div>

        <div class="box__footer"><br>
            <h3 align="center" >Politicas y terminos<hr style="width: auto;"></h3>
            <a  class="final" href="https://www.pardoschicken.pe/terminos-y-condiciones/">Terminos y Condiciones</a>
            <a  class="final" href="https://www.pardoschicken.pe/politicas-de-privacidad/">Política de privacidad</a>
            <a  class="final" href="Equipo.html">Equipo de programadores</a>            
        </div>

        <div class="box__footer"><br>
            <h3 align="center" >Metodos de Pago<hr style="width: auto;"></h3>
            <br>
            <i align="center" style="color: darkblue;" class="fab fa-cc-visa fa-2x"></i> &nbsp;
            <i align="center" style="color: darkblue;" class="fab fa-cc-mastercard fa-2x"></i>
        </div>

        <div class="box__footer"><br>
            <h3 align="center" >Contactanos<hr width="200px"></h3>
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
        <p>Todos los derechos reservados © 2021 <b>COBRA-KAI</b></p>
    </div>
</footer>
<!-- FIN FOOTER --> 
<!-- invocación del carrito --> 
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sweetalert2.min.js"></script>
<script src="js/carrito.js"></script>
<script src="js/pedido.js"></script>   
        
    
</body>
</html>