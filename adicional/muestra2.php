<?php 

require_once('conexion.php');
include('qrcode/qrlib.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">


	<title>infot</title>
</head>
<body>
<div>


<?php


 //echo $codigo;
 	$semelearning = 'http://sur.unad.edu.co/semelearning/';
 $GLOBALS['data'] = $codigo;

 function qrdata() {
     //include('qrcode/qrconfig.php'); 
   
    // how to save PNG codes to server 
    //$tempDir = images; 
    $codeContents = $GLOBALS['data']; 
    // we need to generate filename somehow,  
    // with md5 or with database ID used to obtains $codeContents... 
    $fileName = '005_file_'.md5($codeContents).'.png'; 
    $pngAbsoluteFilePath = $fileName; 
    $urlRelativeFilePath = $fileName; 
    // generating 
    if (!file_exists($pngAbsoluteFilePath)) { 
        QRcode::png($codeContents, $pngAbsoluteFilePath); 
        } else { 
          } 
    //echo 'Server PNG File: '.$pngAbsoluteFilePath; 
    // displaying 
    echo '<img src="'.$urlRelativeFilePath.'" />'; 
}
?>
<div style="z-index:999; float:left;"><?php qrdata(); ?> 
<img src="http://lorempixel.com/800/400/sports/1/" alt="sport" style="z-index:1; float:left;">
</div>
</body>
</html>
