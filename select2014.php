<?php
session_start(); ob_start(); require_once('conexion.php'); ?><?php $idnum = $_SESSION['identificacion']; $consulta = "SELECT `principal`.`pnombre`, `principal`.`papellido`, `principal`.`papellido2` FROM principal WHERE (`principal`.`idcedula` = '$idnum')" or die("Error in the consulta.." . mysqli_error($link)); $result = mysqli_query($link, $consulta); while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)) {$nombre = $row["pnombre"]; $apellido = $row["papellido"]; $apellido2 = $row["papellido2"]; $tname = $nombre." ".$apellido." ".$apellido2; $nombretit = ucwords(strtolower($tname)); /*echo $nombretit." ".$idnum;*/ } $_SESSION['nombre'] = $nombretit; $codigocon = "SELECT principal.idcedula, cantidad_anio.codigo, imgreg.idimgreg FROM principal , cantidad_anio , imgreg WHERE principal.idcedula = '$idnum' AND cantidad_anio.principal_idprincipal = principal.idcedula AND imgreg.idimgreg = cantidad_anio.imgreg_idimgreg ORDER BY imgreg.imganio ASC" or die("Error in the consulta.." . mysqli_error($link)); $resulta = mysqli_query($link, $codigocon); while($row = mysqli_fetch_array($resulta , MYSQLI_ASSOC)) {$codigo = $row["codigo"]; /*echo $codigo;*/ } $_SESSION['code'] = $codigo; /*var_dump($_SESSION['nombre']); var_dump($_SESSION['code']);*/ $registro = date("d-m-Y H:i:s"); $totreg = $registro." ".$codigo; $reg = "INSERT INTO `wsorpren_ecbti`.`registro` (`idregistro`, `nregistro`, `principal_idprincipal`) VALUES (NULL, '$totreg', '$idnum');"; mysqli_query($link, $reg); if (mysqli_query($link, $reg)) {echo "<script>location.href='2014.php'</script>"; } else {echo "Error: " . $reg . "<br>" . mysqli_error($link); } /*var_dump($reg);*/ ?>