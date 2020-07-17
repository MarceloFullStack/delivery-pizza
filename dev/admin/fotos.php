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
	height: 550px;
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
	width: 104px;
	cursor: pointer;
	height: 104px;
	margin: 6px;
}
.box166n {
	width:500px;
	height:500px;
	float: left;
	padding-right: 15px;
	overflow: auto;
}
-->
</style>
<div class="box34n" id="escolher" style="display:none;">
  <div class="box35n">Selecione uma Imagem</div>
 <div class="box166n">
<?php
		$cat=mysql_query("SELECT * FROM imagens_pizzas");
		while($categ=mysql_fetch_assoc($cat)){
		?>
              <div class="box165n" id="<?php echo $categ['imagem'] ?>"><img src="../fotos_produtos/<?php echo $categ['imagem'] ?>" width="104" height="104" /></div>
        <?php } ?>
 
 </div> 
</div>

