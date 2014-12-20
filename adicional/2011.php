<?php
    // get the HTML
    ob_start();
    $num = '123456789-'.date('ymd');
    $nom = 'http://unad.edu.co/semelearning';
    $date = date('ymd');
?>
   
<page format="320x230" orientation="L" backcolor="#eaeaea" style="font: arial;">
  <table id="Tabla_01" width="1200" height="849" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="5">
			<img src="img/2011/2011s_01.jpg" width="1200" height="309" alt=""></td>
	</tr>
	<tr>
		<td colspan="3" rowspan="2">
			<img src="img/2011/2011s_02.jpg" width="423" height="204" alt=""></td>
		<td>
			<img src="img/2011/2011s_03.jpg" width="718" height="1" alt=""></td>
		<td rowspan="2">
			<img src="img/2011/2011s_04.jpg" width="59" height="204" alt=""></td>
	</tr>
	<tr>
		<td width="718" height="203" align="center">
			<h1 style="font-size:13mm; line-height:20px;">Darwin Yusef Gonzalez Triana</h1><h3 style="font-size:9mm">C.C. 14297510</h3></td>
	</tr>
	<tr>
		<td colspan="5">
			<img src="img/2011/2011s_06.jpg" width="1200" height="98" alt="" style="margin-top:-3;"></td>
	</tr>
	<tr>
		<td>
			<img src="img/2011/2011s_07.jpg" width="205" height="62" alt="" style="margin-top:-3px; margin-left:1px;"></td>
		<td rowspan="2">
			<img src="img/2011/2011s_08.jpg" width="182" height="239" alt="" style="margin-top:-5; margin-left:-2px;"></td>
		<td colspan="3" rowspan="2">
			<img src="img/2011/2011s_09.jpg" width="818" height="239" alt="" style="margin-left:-2px;">></td>
	</tr>
	<tr>
		<td width="203" height="177">
			 <div class="zone" style="height: 40mm;vertical-align: middle;text-align: center;">
			<qrcode value="<?php echo $num."\n".$nom."\n".$date; ?>" ec="Q" style="width: 37mm; border: none;" ></qrcode>
                </div>
			</td>
	</tr>
	<tr>
		<td>
			<img src="img/2011/espacio.gif" width="203" height="1" alt=""></td>
		<td>
			<img src="img/2011/espacio.gif" width="179" height="1" alt=""></td>
		<td>
			<img src="img/2011/espacio.gif" width="41" height="1" alt=""></td>
		<td>
			<img src="img/2011/espacio.gif" width="718" height="1" alt=""></td>
		<td>
			<img src="img/2011/espacio.gif" width="59" height="1" alt=""></td>
	</tr>
</table>
    
</page>
<?php
     $content = ob_get_clean();

    // convert
    require_once(dirname(__FILE__).'\libpdf\html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 0);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('informacion.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }?>

