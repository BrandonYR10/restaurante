<?php

include('config.php');
session_start();

if (isset($_POST['login'])) {

    $email= $_POST['email'];
    $password = $_POST['password'];

    $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo '<p class="error">¡La combinación de nombre de usuario y contraseña es incorrecta!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            echo '<p class="success">¡Felicitaciones, ha iniciado sesión!</p>';
           //OBSERVA ESTE CODIGO MAÑANA
            header('Location: inicioLogeado.php');
        } else {
            echo '<p class="error">¡La combinación de nombre de usuario y contraseña es incorrecta!</p>';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polleria las Tinajas</title> 
    <!-- Invoca iconos de la web -->
    <script src="https://kit.fontawesome.com/f368768ce7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/Pestañas.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/Body.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="CSS/Estilos.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="CSS/Slider.css">
    <link rel="stylesheet" href="CSS/Cuentas.css">
    <!-- fin de invocación -->


</head>

<body background="img/fondo-sesion.jpg">

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
 <!-- Aqui se digitan los comandos para Iniciar Seion -->      
 <form action="" method="post" id="forma" class="formulario" name="signin-form">
        <div class="form">
        <H1 >INICIA SESIÓN</H1>  <br>
        <p>¿No tienes una cuenta? <a href="Unete-Ahora.php" ><strong>UNETE AHORA</strong></a></p><br>
       <!--  <div class="grupo">
            <input type="text" name="" id="name" required class="entrar"><span class="barra"></span>
            <label for="" class="entrarr">Nombre</label>
        </div> -->
        <div class="grupo">
        
             <input type="email" name="email" id="email" required class="entrar"><span class="barra"></span>
            <label for=""  class="entrarr">Email</label> 
         
       
        </div>
        <div class="grupo">
            <input type="password" name="password" id="password" required class="entrar"><span class="barra"></span>
            <label for=""  class="entrarr">Contraseña</label>
        </div>

        <button type="submit" name="login" class="IniciarSesion" value="login">Iniciar Sesión</button>
    </div>
</form>

<!-- RED SOCIAL -->

    <!-- redes sociales 
	<div class="social">
		<a href="https://www.facebook.com/pages/category/Restaurant/Las-Tinajas-Chicken-Grill-1667865913264377/"><i class="fab fa-facebook fa-2x" style="color: rgb(18, 142, 214);" ></i></a>
		<a href="#"><i class="fab fa-twitter fa-2x " style="color:rgba(47, 255, 255, 0.938)"></i></a>
        <a href="#"><i class="fab fa-instagram fa-2x" style="color: rgb(165, 22, 221);"></i></a>
	</div>-->
<!-- FIN RED SOCIAL -->

<!-- FOOTER -->
<footer bgcolor="#e6b20a" style="padding: 0px 0px;">
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
<!-- invocación del carrito -->      
</body>
</html>
