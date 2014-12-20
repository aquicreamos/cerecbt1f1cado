<?php session_start(); ob_start(); require_once('conexion.php'); ?>

<?php  
  $identprincipal = $_SESSION['identificacion']; 

/*UPDATE `certificaciones`.`principal` SET `idcedula` = '12335', `pnombre` = 'Natalia', `papellido` = 'Molina', `papellido2` = 'Vargas', `pcorreo` = 'nataliamolina@unad.edu.co', `ptel` = '31763560053' WHERE `principal`.`idcedula` = $identprincipal;*/

$consultar = "SELECT principal.idcedula, principal.pnombre, principal.papellido, principal.papellido2, principal.pcorreo, principal.ptel FROM principal WHERE principal.idcedula =  '$identprincipal'" or die("Error in the consulta.." . mysqli_error($link)); 

$result = mysqli_query($link, $consultar); 
while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)) { 
 $nombre = $row["pnombre"];
 $apellido = $row["papellido"];
 $apellido2 = $row["papellido2"];
 $mail = $row["pcorreo"];
 $telefono = $row["ptel"];
}
 ?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="En estes espacio podras descargar tu certificación" content="">
    <meta name="UNAD @darwinyusef" content="Certificación Semana Elearning">

    <title>Modificar Datos || Semana Elearning</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/2-col-portfolio.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<img alt="" class="imagenactiva">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container import">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Navegación Principal</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Modificar datos || Jornada de Actualización en Tecnología</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="indexd.php">Regresar</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="close.php">salir</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

           
    <!-- Page Content -->
    <div class="container">

<div class="col-lg-12">
<form class="form-horizontal" role="form" action="cargaruser.php" method="POST">
  <fieldset>
    <legend><h2>Modificar Datos Importantes</h2></legend>
    <legend>Por favor Diligenciar cada una de las Celdas</legend>
     <div class="form-group">
    <label class="col-sm-3 control-label">Número de Identificación</label>
    <div class="col-sm-9">
      <p class="form-control-static" style="font-size:25px;"><?php echo $identprincipal; ?></p>
    </div>
  </div>
  <div class="form-group">
      <label class="col-sm-3 control-label">Nombres</label>  
      <div class="col-lg-9">
        <input type="text" class="form-control" id="inputEmail" value="<?php echo $nombre; ?>" name="nombre">
      </div>
    </div>
        <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label">Primer Apellido</label>
      <div class="col-lg-9">
        <input type="text" class="form-control" id="inputEmail" value="<?php echo $apellido; ?>" name="apellido1">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label">Segundo Apellido</label>
      <div class="col-lg-9">
        <input type="text" class="form-control" id="inputEmail" value="<?php echo $apellido2; ?> " name="apellido2">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label">Email</label>
      <div class="col-lg-9">
        <input type="text" class="form-control" value="<?php echo $mail; ?> " name="email">
      </div>
    </div>
   <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label">Telefono</label>
      <div class="col-lg-9">
        <input type="text" class="form-control" value="<?php echo $telefono; ?> " name="phone">
      </div>
    </div>
     
    <div class="form-group">
      <div class="col-lg-9 col-lg-offset-2">
       
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="button" class="btn btn-success"><a href="indexd.php" style="color:#fff"> Cancelar</a></button>
      </div>
    </div>
  </fieldset>
</form>
</div></div>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
