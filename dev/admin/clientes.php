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
<link href="/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />

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



</head>

<body onLoad="UR_Start()">
<div class="box_1">
  <div class="box_2"><?php include('top_admin.php'); ?>
  
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
      <div class="box_14a"><img src="arquivos/Desktop.png" width="32" height="32" />
          <h5>Clientes Cadastrados</h5>
          
          <a href="cadastrar_cliente.php"><div class="box_295">Adicionar Cliente</div></a>
      </div>
      <div class="box_15">
      
      <table id="datatable-buttons" class="table table-striped table-bordered bulk_action">
                     
                     <thead>
                        <tr>
                          <th></th>
                          <th>Nome</th>
                          <th>E-mail</th>
                          <th>Telefone</th>
                          <th>Celular</th>
                          <th>Editar</th>
                        </tr>
                      </thead>


                      <tbody>
                      
                      <?php
					  $dado=mysql_query("SELECT * FROM usuarios order by id_u asc"); while($dados=mysql_fetch_assoc($dado)){
					  ?>
                        <tr>
                          <td><input name="id[]" type="checkbox" class="flat cinput" value="<?php echo $dados['id_u'] ?>"></td>

                          <td><div align="left"><?php echo $dados['nome'] ?></div></td>
                          <td><div align="left"><?php echo $dados['email'] ?></div></td>
                          <td><div align="left"><?php echo $dados['telefone'] ?></div></td>
                          <td><div align="left"><?php echo $dados['celular'] ?></div></td>
                          <td><div align="center"><a href="editar_clientes.php?id=<?php echo $dados['id_u'] ?>"><img src="editar.png" border="0" /></a></div></td>
                        </tr>
                       <?php } ?>
                      </tbody>
                    </table>
                    
                    </div>
      </div>
  </div>
</div>

    <link href="vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendors/iCheck/icheck.min.js"></script>
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="build/js/custom.min.js"></script>


    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm",
				  text: 'Copiar',
                },
                
                {
                  extend: "excel",
                  className: "btn-sm",
				  text: 'Excel',
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm",
				  text: 'Imprimir',
                },
				
				 {
                  className: "btn-sm",
				  text: 'Deletar',
				  action: function ( e, dt, node, config ) {
					var files = '';
					$(".cinput:checked").each(function(){
					files = files + ',' + this.value;
					});
                    
					
					$.post('delete_usuarios.php', {files: files}, function(resposta) {
		            window.location='clientes.php';
                    });	
		
		
                   }
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');


        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    
    <div id="destino"></div>
</body>
</html>
