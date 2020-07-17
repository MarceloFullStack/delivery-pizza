<script type="text/javascript">
$(function($) {
$(".box165n").click(function() {
  var imagem = $(this).attr("id");
  $("#img_pizza").html(imagem);
  $("#imagem_pizza").html("<img src='../fotos_produtos/"+imagem+"' width='47' height='47'/>");
  $.modal.close();
 });
});
</script>
<style type="text/css">
<!--
.box34n {
	float: left;
	height: 600px;
	width: 500px;
	background-color: #FFFFFF;
	boredr-radius:5px;
}
.box35n {
	float: left;
	width: 500px;
	background-color: #43804A;
	font-weight: bold;
	font-size: 18px;
	color: #FFFFFF;
	padding-left: 10px;
	padding-bottom: 10px;
	padding-top: 10px;
	-webkit-border-top-left-radius: 5px;
	-webkit-border-top-right-radius: 5px;
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-topright: 5px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
}
.box165n {
	float: left;
	width: 20%;
	height: 100px;
	padding:5px;
}
.box165nn {
	float: left;
	width: 100%;
	height: 100px;
	background-image: url(/arquivos/bg_pizza_1.png);
	background-repeat:no-repeat;
	background-size: 100%;
	padding:5px;
}
.box165nn img {
	float: left;
	width: 100%;
	border-radius:50%;
	height:73px;
	cursor:pointer;
}
.box166n {
	width:500px;
	height:320px;
	float: left;
	padding-right: 18px;
	padding-left:5px;
	overflow: auto;
}
-->
</style>
<div class="box34n" id="escolher" style="display:none">
  <div class="box35n">Selecione uma Imagem</div>
  
  <div class="box208">Buscar Imagem</div>
  <div class="box209">
    <div class="box210">
      <div class="box211"></div>
    </div>
  </div>
  <div class="box208">Usar imagens modelo</div>
 <div class="box166n">
<?php
		$cat=mysql_query("SELECT * FROM imagens_pizzas WHERE categoria='pizzas'");
		while($categ=mysql_fetch_assoc($cat)){
		?>
              <div class="box165n" id="<?php echo $categ['imagem'] ?>"><div class="box165nn"><img src="../fotos_produtos/<?php echo $categ['imagem'] ?>" width="104" height="104" /></div></div>
        <?php } ?>
 
 </div> 
</div>

