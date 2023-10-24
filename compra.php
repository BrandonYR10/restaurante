<?php
error_reporting(E_ERROR | E_PARSE);
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
    <meta name="viewport"    
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">            
    <link rel="stylesheet" href="css/estilo.css">       
    <title>Carrito Compras en JavaScript</title>   
       <!-- Invoca iconos de la web -->      
    <link rel="stylesheet" href="CSS/Pestañas.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/Body.css">
    <script src="JS/Registro.js"></script>
    <link rel="stylesheet" href="CSS/Estilos.css">    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <!-- fin de la invocacion --> 
</head>
<body background="img/animation.gif" style="background-repeat: no-repeat;
background-attachment: fixed; background-size: 100%; ">
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
                </div style="height: 40px">     
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
                <?php endif; ?>&nbsp;
            </a> 
        </div>                        
          <!--fgggggggggggggggggggggg  -->
                <img src="img/carrito.jpeg"   height="70px"  data-toggle="dropdown" class="nav-link dropdown-toggle img-fluid"
                                width="70px" href="" id="dropdown01" aria-haspopup="true"
                                aria-expanded="false"> </img> 
                                
                            
                        </div>
</nav>



<br>    
    <!-- FIN DE LA CABECERA -->   
<!-- CUERPO -->
    <main>
        <div class="container">
            <div class="row mt-3">
                <div class="col">
                    <h2 class="d-flex justify-content-center mb-3">Realizar Compra</h2>
                    <form id="procesar-pago" action="#" name="register" method="post">
                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Cliente :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="cliente"
                                    placeholder="Ingresa nombre cliente" name="destinatario">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-12 col-md-2 col-form-label h2">Correo :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="correo" placeholder="Ingresa tu correo" name="from_name">
                            </div>
                        </div>

                        <div id="carrito" class="form-group table-responsive" >
                            <table class="table" id="lista-compra" >
                                <thead>
                                    <tr>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>

                                </thead>
                                <tbody >

                                </tbody>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right">SUB TOTAL :</th>
                                    <th scope="col">
                                        <p id="subtotal"></p>
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right">IGV :</th>
                                    <th scope="col">
                                        <p id="igv"></p>
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right">TOTAL :</th>
                                    <th scope="col">
                                        <input id="total" name="monto" class="font-weight-bold border-0" readonly style="background-color: white;"></input>
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>

                            </table>
                        </div>

                        <div class="row justify-content-center" id="loaders">
                            <img id="cargando" src="img/cargando.gif" width="220">
                        </div>

                        <div class="row justify-content-between">
                            <div class="col-md-4 mb-2">
                                <a href="CARTA.php" class="btn btn-info btn-block">Seguir comprando</a>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <button href="#" class="btn btn-success btn-block" id="procesar-compra">Realizar compra</button>
                            </div>
                        </div>
                    </form>

                    <?php 
                    include("registration3.php");
                    ?> 

                </div>


            </div>

        </div>
    </main>
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
            <p>Todos los derechos reservados © 2021 <b>Grupo 12</b></p>
        </div>
        <br>
    </footer>
<!-- FIN FOOTER --> 
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>

     <script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>

    <script type="text/javascript">
    emailjs.init('user_9sOwUzycANjrgBnz0NdYs')
    </script>
    <script src="js/carrito.js"></script>
    <script src="js/compra.js"></script>


</body>

</html>