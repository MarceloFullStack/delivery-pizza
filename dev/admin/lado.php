<link href="arquivos/main.css" rel="stylesheet" type="text/css" />
  
  <script type="text/javascript">

function UR_Start() 
{
	UR_Nu = new Date;
	UR_Indhold = showFilled(UR_Nu.getHours()) + ":" + showFilled(UR_Nu.getMinutes()) + ":" + showFilled(UR_Nu.getSeconds());
	document.getElementById("ur").innerHTML = UR_Indhold;
	setTimeout("UR_Start()",1000);
}
function showFilled(Value) 
{
	return (Value > 9) ? "" + Value : "0" + Value;
}

</script>
   <style type="text/css">
   
@media only screen and (min-width : 1400px) {
     .font {
     font-size: 20px;
     font-weight:bold;
     color:#666666;
     }
}
@media only screen and (min-width : 1250px) and (max-width : 1400px) {
     .font {
     font-size: 12px;
     font-weight:bold;
     color:#666666;
     }
}

@media only screen and (min-width : 320px) and (max-width : 1250px) {
     .font {
     font-size: 8px;
     font-weight:bold;
     color:#666666;
     }
}

-->
   </style>
   <div class="box_7">
    <div class="box_8">
      <div class="box_48">
        <div class="box_46">
       <?php
       $ped_num=mysql_query("SELECT * FROM store_finalizado group by id_pedido");
       $pedido_numero=mysql_num_rows($ped_num);
	   echo $pedido_numero;
	   ?>
       </div>
        <div class="box_47">Pedidos</div>
      </div>
      <div class="box_9"><span><i></i></span></div>
      <div class="box_48">
        <div class="box_46">
       <?php
       $cli_num=mysql_query("SELECT * FROM usuarios");
       $cli_numero=mysql_num_rows($cli_num);
	   echo  $cli_numero;
	   ?>
        </div>
        <div class="box_47">Clientes</div>
      </div>
      <div class="box_9"><span><i></i></span></div>
    </div>
    <div class="box_8"><img src="arquivos/lado.png" /></div>
    <div class="box_11">
      <div class="box_10">
       <div align="center" style="margin-bottom:10px; margin-top:2px;">Hora certa</div>
          <div align="center"><font class="font" id="ur"></font></div>
      </div>
    </div>
  </div>