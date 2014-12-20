<?php
session_start(); ob_start(); session_destroy();?><?php require_once('conexion.php'); mysqli_close ($link); echo "<script>location.href='insearch.php'</script>"; ?>