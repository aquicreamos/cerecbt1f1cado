<?php session_start(); ob_start(); ?><?php $idnum  = $_SESSION['identificacion'];
 $codigot = $_SESSION['code'];
    // get the HTML
    $num = $codigot;
    $nom = 'http://sur.unad.edu.co/actualizaciontecnologia';
    $date = date('ymd');
?>
<page format="326x232" orientation="L" backcolor="#fff" style="font: arial;">
 
<table style="display: inline-table;" width="1228">
  <tr>
   <td colspan="5">
   <img name="n1_r1_c1" src="img/2014/1_r1_c1.jpg" width="1228" height="302" id="n1_r1_c1" alt=""/>
   </td>
   </tr>
  <tr>
   <td rowspan="2" colspan="2" ><img name="n1_r2_c1" src="img/2014/1_r2_c1.jpg" width="102" height="328" id="n1_r2_c1" alt="" style="margin-top:-10px; margin-left:-16px; margin-bottom: -20px;"/></td>
   <td colspan="2">
  <h2 style="font-size:12mm; line-height:15px; text-align:center; margin-top:1px;"><?php echo $_SESSION['nombre']; ?></h2><h4 style="font-size:6mm; text-align:center;">C.C. <?php echo $idnum;?></h4>
   </td>
   <td rowspan="4"><img name="n1_r2_c5" src="img/2014/1_r2_c5.jpg" width="156" height="547" id="n1_r2_c5" alt="" style="margin-top:-3px; margin-left:-15px; display:block;"  /></td>
   <td><img src="img/2014/spacer.gif" width="1" height="98" alt="" /></td>
  </tr>
  <tr>
   <td colspan="2"><img name="n1_r3_c3" src="img/2014/1_r3_c3.jpg" width="970" height="230" id="n1_r3_c3" alt="" style="margin-top:-12px; margin-left:-8px;" /></td>
   <td><img src="img/2014/spacer.gif" width="1" height="230" alt="" /></td>
  </tr>
  <tr>
   <td><img name="n1_r4_c1" src="img/2014/1_r4_c1.jpg" width="34" height="177" id="n1_r4_c1" alt="" /></td>
   <td colspan="2"> <div width="203" height="177">
       <div class="zone" style="height: 40mm;vertical-align: middle;text-align: center;">
      <qrcode value="<?php echo $num.$date."\n".$nom; ?>" ec="Q" style="width: 37mm; border: none;" ></qrcode>
      <p style="margin-top:0px;"><?php echo $num.$date;?></p>
                </div>
      </div>

   </td>
   <td><img name="n1_r4_c4" src="img/2014/1_r4_c4.jpg" width="835" height="177" id="n1_r4_c4" alt="" style="margin-top:-30px; margin-left:-12px;" /></td>
   <td><img src="img/2014/spacer.gif" width="1" height="177" alt="" /></td>
  </tr>
  <tr>
   <td colspan="4"><img name="n1_r5_c1" src="img/2014/1_r5_c1.jpg" width="1072" height="42" id="n1_r5_c1" alt=""style="margin-top:-15px;"  /></td>
   <td><img src="img/2014/spacer.gif" width="1" height="42" alt="" /></td>
  </tr>
  <tr>
   <td><img src="img/2014/spacer.gif" width="34" height="1" alt="" /></td>
   <td><img src="img/2014/spacer.gif" width="68" height="1" alt="" /></td>
   <td><img src="img/2014/spacer.gif" width="135" height="1" alt="" /></td>
   <td><img src="img/2014/spacer.gif" width="835" height="1" alt="" /></td>
   <td><img src="img/2014/spacer.gif" width="156" height="1" alt="" /></td>
   <td><img src="img/2014/spacer.gif" width="1" height="1" alt="" /></td>
  </tr>
</table>

 
		
	
    
</page>

<?php $content = ob_get_clean(); require_once(dirname(__FILE__).'/libpdf/html2pdf.class.php'); 
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

