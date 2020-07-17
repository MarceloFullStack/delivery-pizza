<?php session_start(); ?>
<?php 
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; } ?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link href="arquivos/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>


<script>

jQuery(document).ready(function(){
	
	// dropdown in leftmenu
	jQuery('.box_2 .dropdown > a').click(function(){
		if(!jQuery(this).next().is(':visible'))
			jQuery(this).next().slideDown('fast');
		else
			jQuery(this).next().slideUp('fast');	
		return false;
	});
	
	if(jQuery.uniform) 
	   jQuery('input:checkbox, input:radio, .uniform-file').uniform();
		
	if(jQuery('.widgettitle .close').length > 0) {
		  jQuery('.widgettitle .close').click(function(){
					 jQuery(this).parents('.widgetbox').fadeOut(function(){
								jQuery(this).remove();
					 });
		  });
	}
	
	});
</script>
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
<link rel="stylesheet" type="text/css" href="css/flexigrid.css" />
<script type="text/javascript" src="jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="flexigrid.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	$("#flex1").flexigrid
			(
			{
		
			url: 'produtos_ajax.php',
			dataType: 'json',
			colModel : [
				{display: 'ID', name : 'id', width : 30, sortable : true, align: 'center'},
				{display: 'Nome', name : 'nome_casal', width : 465, sortable : true, align: 'left'},
				{display: 'Valor', name : 'data_casamento', width : 150, sortable : true, align: 'center'},
				{display: 'Categoria', name : 'id_us', width : 100, sortable : true, align: 'left'},
				{display: 'Editar', name : 'id_us', width : 55, sortable : true, align: 'center', process: procMe},
				{display: 'Remover', name : 'id_us', width : 55, sortable : true, align: 'center', process: procDel}
				],
			buttons : [
				
				{separator: true},
				{name: 'A', onpress: sortAlpha},
                {name: 'B', onpress: sortAlpha},
				{name: 'C', onpress: sortAlpha},
				{name: 'D', onpress: sortAlpha},
				{name: 'E', onpress: sortAlpha},
				{name: 'F', onpress: sortAlpha},
				{name: 'G', onpress: sortAlpha},
				{name: 'H', onpress: sortAlpha},
				{name: 'I', onpress: sortAlpha},
				{name: 'J', onpress: sortAlpha},
				{name: 'K', onpress: sortAlpha},
				{name: 'L', onpress: sortAlpha},
				{name: 'M', onpress: sortAlpha},
				{name: 'N', onpress: sortAlpha},
				{name: 'O', onpress: sortAlpha},
				{name: 'P', onpress: sortAlpha},
				{name: 'Q', onpress: sortAlpha},
				{name: 'R', onpress: sortAlpha},
				{name: 'S', onpress: sortAlpha},
				{name: 'T', onpress: sortAlpha},
				{name: 'U', onpress: sortAlpha},
				{name: 'V', onpress: sortAlpha},
				{name: 'W', onpress: sortAlpha},
				{name: 'X', onpress: sortAlpha},
				{name: 'Y', onpress: sortAlpha},
				{name: 'Z', onpress: sortAlpha},
				{name: '#', onpress: sortAlpha}

				],
			searchitems : [
				{display: 'id', name : 'id'},
				{display: 'Nome', name : 'nome', isdefault: true}
				],
			sortname: "id",
			sortorder: "asc",
			usepager: true,
			title: false,
			useRp: true,
			rp: 40,
			
			
			singleSelect: 1,
			width: 930,
			height: 500
			}
			);   
	
});
function sortAlpha(com)
			{ 
			jQuery('#flex1').flexOptions({newp:1, params:[{name:'letter_pressed', value: com},{name:'qtype',value:$('select[nome=qtype]').val()}]});
			jQuery("#flex1").flexReload(); 
			}
			
function procMe( celDiv, id ) {
    $( celDiv ).click( function() {
       window.location='editar_pizza.php?id='+id;	
    });
}

function procVer( celDiv, id ) {
    $( celDiv ).click( function() {
       window.location='redireciona.php?id='+id;	
    });
}

function procImp( celDiv, id ) {
    $( celDiv ).click( function() {
       window.location='imprimir.php?id='+id;	
    });
}

function procDel( celDiv, id ) {
    $( celDiv ).click( function() {
		if(confirm("Tem certeza que deseja apagar este produto?"))
{

$.post('delete_produto.php', {id: id}, function(resposta) {
	
		window.location='produtos.php';	
		});  

}
    });
}

function test(com,grid)
{
    if (com=='Delete')
        {
           if($('.trSelected',grid).length>0){
		   if(confirm('Delete ' + $('.trSelected',grid).length + ' items?')){
            var items = $('.trSelected',grid);
            var itemlist ='';
        	for(i=0;i<items.length;i++){
				itemlist+= items[i].id.substr(3)+",";
			}
			$.ajax({
			   type: "POST",
			   dataType: "json",
			   url: "delete.php",
			   data: "items="+itemlist,
			   success: function(data){
			   	alert("Query: "+data.query+" - Total affected rows: "+data.total);
			   $("#flex1").flexReload();
			   }
			 });
			}
			} else {
				return false;
			} 
        }
    else if (com=='edit')
        {
            alert('Botão editar bloqueado para demonstração');
           
        }            
} 
</script>

</head>

<body onLoad="UR_Start()">
<div class="box_1">
  <div class="box_2">
  <?php include('top_admin.php'); ?>
  
  <?php include('menu.php'); ?>
   <?php include('lado.php'); ?>        
  
  </div>
  <div class="box_3">
  <div class="box_21">
      <div class="box_12">
        <div class="box_87"> <a href="sair.php">
          <div class="box_88">Sair</div>
        </a></div>
      </div>
      <div class="box_13"></div>
      <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
          <h5>Produtos Cadastrados</h5>
      </div>
      <div class="box_15"><table id="flex1" style="display:none">
          </table></div>
      </div>
  </div>
</div>
</body>
</html>
