$(document).ready(function() {	

$('body').on('click', '.sabores', function(){
	var ativo = $(".areapizza").attr("data-montar");
	});


$('#escolher_tamanho').click(function(event) {
	$('.boxb').toggle();
	});



$('body').on('click', '#escolher_sabores', function(){
	$('.box').toggle();
	});
	
	$('body').on('click', '.box ul li', function(){
	var tamanho      =  $(this).data("tamanho");
	var fatias       =  $(this).data("fatias");
	$('#escolher_sabores #escolher label').html(tamanho);
	$('#escolher_sabores #escolher small').html(fatias);
	$('.pztop-abs').addClass("sabores");
	$('.box63').addClass("maispizza");
	});
	
	$('#manual-onde').click(function(event) {
      event.preventDefault();
      $.get(this.href, function(html) {
        $(html).appendTo('#destino').modal();
      });
    });

$('#manual-onde3').click(function(event) {
      event.preventDefault();
      $.get(this.href, function(html) {
        $(html).appendTo('#destino').modal();
      });
    });


	$("#cadastrar").click(function() {
        var nome         = $("#nome").val();
		var email        = $("#email").val();
        var senha        = $("#senha").val();
		var csenha       = $("#csenha").val();
		var telefone     = $("#telefone").val();
		var celular      = $("#celular").val();
		var cpf          = $("#cpf").val();
		var cidade       = $("#cidade").val();
		var endereco     = $("#endereco").val();
		var numero       = $("#numero").val();
        var bairro       = $("#bairro").val();
        var complemento  = $("#complemento").val();	
		
	$.post('/envia_cadastro.php', {nome: nome, email: email, senha: senha, csenha: csenha, telefone: telefone, celular: celular, cpf: cpf, cidade: cidade, endereco: endereco, numero: numero, bairro: bairro, complemento: complemento}, function(resposta) {
		
	$("#erro_cadastro").slideDown();
			if (resposta != false) {
				$("#erro_cadastro").html(resposta);
			}
			
		setTimeout(function() {
		$('#erro_cadastro').slideUp();}, 5000);
		
		});
		});	
	

		$("#enviar").click(function() {
			var lemail        = $("#lemail").val();
			var lsenha        = $("#lsenha").val();
			
			$.post('/envia_login.php', {lemail: lemail, lsenha: lsenha}, function(resposta) {
			
			$("#erro_login").slideDown();
			if (resposta != false) {
			$("#erro_login").html(resposta);
			}
			
			setTimeout(function() {
			$('#erro_login').slideUp();}, 5000);
			
			});
		});	
	
	
$('body').on('click', '.boxb ul li', function(){
	var tamanho    =  $(this).data("tamanho");
	var fatias     =  $(this).data("fatias");
	var tamanhoID  =  $(this).data("tamanhoid");
	$('.areapizza').attr("data-montar", "true");
	$('#escolher_tamanho #escolher label').html(tamanho);
	$('#escolher_tamanho #escolher small').html(fatias);
	$('#escolher_tamanho #escolher span').html(tamanhoID);
	  $.post('/quantidade_sabores.php', {tamanho: tamanho}, function(resposta) {
	  $('#box201').html(resposta);
	  });
	  
	  $.post('/quantidade_sabores_mostrar.php', {tamanho: tamanho}, function(resposta) {
	    if(resposta == 1){
		  $('.box12').css({"width":"100%"});
		  $('#box-2').hide();
		  $('#box-3').hide();
		  $('#box-4').hide();
		  $('.areapizza').attr("data-fatias","2");
		  
		  $('.box8a').removeClass("box8a").addClass("box8b");
	      $('.box8').removeClass("box8").addClass("box8b");
	      $('.box8b').removeClass("box8b").addClass("box8b");
	      $('.box8c').removeClass("box8c").addClass("box8b");
	    }
		
		if(resposta == 2){
	      $('.box12').css({"width":"50%"});
		  $('#box-2').show();
		  $('#box-3').hide();
		  $('#box-4').hide();
		  $('.areapizza').attr("data-fatias","2");
		  
		  $('.box8a').removeClass("box8a").addClass("box8a");
	      $('.box8').removeClass("box8").addClass("box8a");
	      $('.box8b').removeClass("box8b").addClass("box8a");
	      $('.box8c').removeClass("box8c").addClass("box8a");
	    }
		if(resposta == 3){
	      $('.box12').css({"width":"33.33333333333333%"});
		  $('#box-2').show();
		  $('#box-3').show();
		  $('#box-4').hide();
		  $('.areapizza').attr("data-fatias","3");
		  
		  $('.box8a').removeClass("box8a").addClass("box8c");
	      $('.box8').removeClass("box8").addClass("box8c");
	      $('.box8b').removeClass("box8b").addClass("box8c");
	      $('.box8c').removeClass("box8c").addClass("box8c");
	    }
		
		if(resposta == 4){
	     $('.box12').css({"width":"25%"});
		 $('#box-2').show();
		 $('#box-3').show();
		 $('#box-4').show();
		 $('.areapizza').attr("data-fatias","4");
		 
		 $('.box8a').removeClass("box8a").addClass("box8");
	     $('.box8').removeClass("box8").addClass("box8");
	     $('.box8b').removeClass("box8b").addClass("box8");
	     $('.box8c').removeClass("box8c").addClass("box8");
	    }
		
	  });
	  
	});


    $('body').on('click', '#1sabor', function(){
	  $('.box12').css({"width":"100%"});
      $('#box-2').hide();
	  $('#box-3').hide();
	  $('#box-4').hide();
	  
	  $('.box8a').removeClass("box8a").addClass("box8b");
	  $('.box8').removeClass("box8").addClass("box8b");
	  $('.box8b').removeClass("box8b").addClass("box8b");
	  $('.box8c').removeClass("box8c").addClass("box8b");
	
	  $('.areapizza').attr("data-fatias","1");
	});
	
	
	$('#manual-ajax').click(function(event) {
      event.preventDefault();
      $.get(this.href, function(html) {
        $(html).appendTo('#destino').modal();
      });
    });
	
	
	$('body').on('click', '#2sabor', function(){
	  if (window.matchMedia('(max-width: 640px)').matches) {
      $('.box12').css({"width":"100%"});
      } else {
      $('.box12').css({"width":"50%"});
      }
	  
      $('#box-2').show();
	  $('#box-3').hide();
	  $('#box-4').hide();
	  
	  $('.box8a').removeClass("box8a").addClass("box8a");
	  $('.box8').removeClass("box8").addClass("box8a");
	  $('.box8b').removeClass("box8b").addClass("box8a");
	  $('.box8c').removeClass("box8c").addClass("box8a");
	
	  $('.areapizza').attr("data-fatias","2");
	});
	
	
	$('body').on('click', '#3sabor', function(){
	  if (window.matchMedia('(max-width: 640px)').matches) {
	  $('.box12').css({"width":"100%"});  
	  }else{
	  $('.box12').css({"width":"33.33333333333333%"});
	  }
      $('#box-2').show();
	  $('#box-3').show();
	  $('#box-4').hide();
	  
	  $('.box8a').removeClass("box8a").addClass("box8c");
	  $('.box8').removeClass("box8").addClass("box8c");
	  $('.box8b').removeClass("box8b").addClass("box8c");
	  $('.box8c').removeClass("box8c").addClass("box8c");
	
	  $('.areapizza').attr("data-fatias","3");
	});
	
	$('body').on('click', '#4sabor', function(){
	  if (window.matchMedia('(max-width: 640px)').matches) {
	  $('.box12').css({"width":"100%"});  
	  }else{
	  $('.box12').css({"width":"25%"});
	  }
      $('#box-2').show();
	  $('#box-3').show();
	  $('#box-4').show();
	  
	  $('.box8a').removeClass("box8a").addClass("box8");
	  $('.box8').removeClass("box8").addClass("box8");
	  $('.box8b').removeClass("box8b").addClass("box8");
	  $('.box8c').removeClass("box8c").addClass("box8");
	
	  $('.areapizza').attr("data-fatias","4");
	});
	
	
	
	$('body').on('click', '.sabores', function(){
	var tamanho   = $(".tamanho").text();
	var tamanhos  = $("#tamanhos").text();
	/* ---> remove tag anterior $('#'+idlinkText).contents().unwrap();  */
	$('#maozinha').hide();
	$('#sabores'+tamanho).modal({
	fadeDelay: 0.50
	});
	var parte     = $(this).data("pedacos");
	$('.box37').attr('id', parte);
	$('.box36').html(tamanhos);
	});

	
	$('body').unbind('change').on('click', '.opcionais', function(e){
	  e.preventDefault();
	  
	  var sabor = $(this).attr("id");
	  
	  var opcionais    = $('#boxingredientes-'+sabor+' input:checkbox[name="opcionais-'+sabor+'[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");
					   
					   
	  var id    = $('#boxTsabor-'+sabor).attr('data-idproduto');
      $.post('/opcionais.php', {id: id, sabor: sabor, opcionais: opcionais}, function(html) {
        $(html).appendTo('#destino').modal({fadeDelay: 0.50});
      });
    });
	
	
	
	$('body').on('click', '.box37', function(){
				var fatiass        = $('.areapizza').attr("data-fatias");
                var pdcp           = $(this).attr("id");
				var sabor          = $(this).data("sabor");
				var idproduto      = $(this).data("idproduto");
				var ingredientes   = $(this).data("ingredientes");
				var valor          = $(this).data("valor");
				var valor2         = $('#valor_pizza').text();

				$('#ids_produto').prepend(idproduto+'-');
				if(pdcp  == 1){
				var classe = 'quarto_esq_cima';	
				}
				if(pdcp  == 2){
				var classe = 'quarto_dir_cima';	
				}
				if(pdcp  == 3){
				var classe = 'quarto_esq_baixo';	
				}
				if(pdcp  == 4){
				var classe = 'quarto_dir_baixo';	
				}
				$('#'+classe).css({"background-image":"url(arquivos/pizza-ilustrativa2.jpg)"}); 
				$('#boxBsabor-'+pdcp).hide();
				$('#boxTsabor-'+pdcp).html('<span>'+sabor+'</span><i data-fechar="'+pdcp+'" data-fecharp="'+pdcp+'"></i>');
				$('#boxTsabor-'+pdcp).attr('data-valor', valor);
				$('#boxTsabor-'+pdcp).attr('data-idproduto', idproduto);
				$('#boxsabor-'+pdcp).show();
				
                $('#boxingredientes-'+pdcp).empty();
				var TableOfContentsSplit = ingredientes.split(',');
				$.each(TableOfContentsSplit,function(number){
				$('#boxingredientes-'+pdcp).append('<li>'+TableOfContentsSplit[number]+'<label class="switch"><input type="checkbox" id="permitir_comentarios" checked="checked" name="ing-'+fatiass+'[]" value="'+TableOfContentsSplit[number]+'" class="switch-input" /><span class="switch-label" data-on="Sim" data-off="N&atilde;o"></span> <span class="switch-handle"></span></label></li>');
				});	
				
				var valor01 = $('#boxTsabor-1').attr('data-valor');
				var valor02 = $('#boxTsabor-2').attr('data-valor');
				var valor03 = $('#boxTsabor-3').attr('data-valor');
				var valor04 = $('#boxTsabor-4').attr('data-valor');
				var valorbo = $('#escolher_borda').attr('data-borda');
				
				$.post('/sessao_valor_total.php', {valor1: valor01, valor2: valor02, valor3: valor03, valor4: valor04, valorborda: valorbo}, function(resposta) {
	            $('#valor_pizza').html(resposta);
	            });
				
	      $('.boxextra-'+pdcp).show();
			
			$.modal.close();
            });
	
	
	$(document).on("click",".box13 i",function(e){
			var fechar   = $(this).data("fechar");
			var fecharp  = $(this).data("fecharp");
			$('#boxsabor-'+fechar).hide();
			$('#boxBsabor-'+fechar).show();
			$('#boxTsabor-'+fechar).html('<span>1-Ingredientes</span>');
			$('.areapizza'+fecharp).css({"background-image":""});
			$('.boxextra-'+fechar).hide();
			$('#boxTsabor-'+fechar).attr('data-valor', '0');
			
			var valor01 = $('#boxTsabor-1').attr('data-valor');
		    var valor02 = $('#boxTsabor-2').attr('data-valor');
			var valor03 = $('#boxTsabor-3').attr('data-valor');
			var valor04 = $('#boxTsabor-4').attr('data-valor');
			var valorbo = $('#escolher_borda').attr('data-borda');
				
			$.post('/sessao_valor_total.php', {valor1: valor01, valor2: valor02, valor3: valor03, valor4: valor04, valorborda: valorbo}, function(resposta) {
	            $('#valor_pizza').html(resposta);
	            });
			
			});	
	
	
	$('body').on('click', '.boxc ul li', function(){
		var borda    =  $(this).data("borda");
		var taxa     =  $(this).data("taxa");
		$('#escolher_borda #escolher label').html("Borda Recheada");
		$('#escolher_borda').attr("data-borda", taxa);
		$('#escolher_borda #escolher small').html(borda+" + R$ "+taxa);	

		var valor01 = $('#boxTsabor-1').attr('data-valor');
		var valor02 = $('#boxTsabor-2').attr('data-valor');
		var valor03 = $('#boxTsabor-3').attr('data-valor');
		var valor04 = $('#boxTsabor-4').attr('data-valor');
		var valorbo = $('#escolher_borda').attr('data-borda');
		
		$.post('/sessao_valor_total.php', {valor1: valor01, valor2: valor02, valor3: valor03, valor4: valor04, valorborda: valorbo}, function(resposta) {
		$('#valor_pizza').html(resposta);
		});
	
	    $('#valor_borda').text(borda);
	});
	
	
	$('body').on('click', '#escolher_borda', function(){
	var fatias      =     $('.areapizza').attr("data-fatias");
	
	if(fatias == '1'){
	     var ingredi1    = $('#boxingredientes-1 input:checkbox[name="ing-1[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     if(ingredi1 ==''){
		 $.alert({
			title: 'Sabores faltando',
			content: 'Escolha o sabore da pizza para liberar escolha da borda.',
			confirmButton: 'Ok',
			confirmButtonClass: 'btn-info',
			animation: 'bottom',
			icon: 'fa fa-check',
			backgroundDismiss: true
         });
		 }else{
	     $('.boxc').toggle();
         }
	}
	
	if(fatias == '2'){
	     var ingredi1    = $('#boxingredientes-1 input:checkbox[name="ing-2[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi2    = $('#boxingredientes-2 input:checkbox[name="ing-2[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     if(ingredi1 =='' || ingredi2 ==''){
		 $.alert({
			title: 'Sabores faltando',
			content: 'Escolha os sabores da pizza para liberar escolha da borda.',
			confirmButton: 'Ok',
			confirmButtonClass: 'btn-info',
			animation: 'bottom',
			icon: 'fa fa-check',
			backgroundDismiss: true
         });
		 }else{
	     $('.boxc').toggle();
         }
	}
	
	if(fatias == '3'){
	     var ingredi1    = $('#boxingredientes-1 input:checkbox[name="ing-3[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi2    = $('#boxingredientes-2 input:checkbox[name="ing-3[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi3    = $('#boxingredientes-3 input:checkbox[name="ing-3[]"]:checked').map(function() { return $(this).val() }).get().join(",");
		 if(ingredi1 =='' || ingredi2 =='' || ingredi3 ==''){
		 $.alert({
			title: 'Sabores faltando',
			content: 'Escolha os sabores da pizza para liberar escolha da borda.',
			confirmButton: 'Ok',
			confirmButtonClass: 'btn-info',
			animation: 'bottom',
			icon: 'fa fa-check',
			backgroundDismiss: true
         });
		 }else{
	     $('.boxc').toggle();
         }
	}
	
	 if(fatias == '4'){
	     var ingredi1    = $('#boxingredientes-1 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi2    = $('#boxingredientes-2 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi3    = $('#boxingredientes-3 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi4    = $('#boxingredientes-4 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");				   
         if(ingredi1 =='' || ingredi2 =='' || ingredi3 =='' || ingredi4 ==''){
		 $.alert({
			title: 'Sabores faltando',
			content: 'Escolha os sabores da pizza para liberar escolha da borda.',
			confirmButton: 'Ok',
			confirmButtonClass: 'btn-info',
			animation: 'bottom',
			icon: 'fa fa-check',
			backgroundDismiss: true
         });
		 }else{
	     $('.boxc').toggle();
         }
	}
	
});
				

	$('body').on('click', '.maispizza', function(){

	var fatias      =     $('.areapizza').attr("data-fatias");
	var bordas      =     $('#valor_borda').text();
	if(bordas=='Sem Borda'){
	var aborda      =     '';	
	}else{
	var aborda      =     '+ Borda '+bordas;		
	}
	var tamanho     =     $('#escolher_tamanho #escolher label').text();  
	var valor       =     $('#valor_pizza').text();	
	var valor2      =     $('#valor').text();	
	var xvalor      =     (parseFloat(valor) + parseFloat(valor2)).toFixed(2);
	var xvalor2      =    $('#valor_pizza').text();	
	var idpizza     =     'P-'+Math.floor(Math.random() * 100);
	var ids         =     $('#ids_produto').text();
	
	
	 if(fatias == '1'){
	  var fatia1      =     $('#boxTsabor-1').text();
	  var ingredi1    = $('#boxingredientes-1 input:checkbox[name="ing-1[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
	  var ingtodos1    = $('#boxingredientes-1 input:checkbox[name="ing-1[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");			   
					   
		var extra1      = $('select[name=boxextra-1-1]').val();
	  
	  
	    var opcionais1    = $('#boxingredientes-1 input:checkbox[name="opcionais-1[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
					   
	     if(ingredi1 ==''){
	     $.alert({
			title: 'Sabores faltando',
			content: 'Por favor escolha um sabor da pizza.',
			confirmButton: 'Ok',
			confirmButtonClass: 'btn-info',
			animation: 'bottom',
			icon: 'fa fa-check',
			backgroundDismiss: true
         });
	     }else{

$('.box13').html('<span>1-Ingredientes</span>');
$('.sabores').css({"background-image":""});
$('.box43 ul').empty();	
$('.box2020').hide();

$('.box20').hide();
$('.box61').show();	

if(extra1!=='' && extra1!== null && extra1!== undefined){ 
var fatias1 = fatia1+' com '+extra1;
}else{
var fatias1 = fatia1;	
}


$('.box42').hide();
$('.box14').show();
$('#boxBsabor-1').css({"background-image":"url(arquivos/pizza_add_1_1.png)"});
$('#boxBsabor-2').css({"background-image":"url(arquivos/pizza_add_2_2.png)"}); 
$('#boxBsabor-3').css({"background-image":"url(arquivos/pizza_add_3_4.png)"}); 
$('#boxBsabor-4').css({"background-image":"url(arquivos/pizza_add_4_4.png)"}); 
$('.box2025').hide();

$('.box61').scrollTop($('.box61')[0].scrollHeight);
var numero_sabores = '1';
$.post('/envia_pizza.php', {opcionais1: opcionais1, ingtodos1: ingtodos1, ids: ids, idpizza: idpizza, xvalor: xvalor2, tamanho: tamanho, fatia1: fatia1, ingredi1: ingredi1, numero_sabores: numero_sabores, aborda: aborda}, function(resposta) {
$('#carrinho_p').append(resposta);
});
setTimeout(function () {
                $.post('/retornar_valor.php', function(resposta) {
				$('#valor').text(resposta);
				});
                }, 1000);


$('#valor_pizza').text("0.00");

		 }
	  }
	  
	  
	  if(fatias == '2'){
	  var fatia1      =     $('#boxTsabor-1').text();
	  var fatia2      =     $('#boxTsabor-2').text();
	  var ingredi1    = $('#boxingredientes-1 input:checkbox[name="ing-2[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
	  var ingredi2    = $('#boxingredientes-2 input:checkbox[name="ing-2[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
	  var ingtodos1    = $('#boxingredientes-1 input:checkbox[name="ing-2[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");		
					   
	  var ingtodos2    = $('#boxingredientes-2 input:checkbox[name="ing-2[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");		
	
	 var opcionais1    = $('#boxingredientes-1 input:checkbox[name="opcionais-1[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
					   
	 var opcionais2    = $('#boxingredientes-2 input:checkbox[name="opcionais-2[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
	  var extra1      = $('select[name=boxextra-1-2]').val();
	  var extra2      = $('select[name=boxextra-2-2]').val();
	  
	  
	      if(ingredi1 =='' || ingredi2 ==''){
	     $.alert({
			title: 'Sabores faltando',
			content: 'Por favor escolha os 2 sabores da pizza.',
			confirmButton: 'Ok',
			confirmButtonClass: 'btn-info',
			animation: 'bottom',
			icon: 'fa fa-check',
			backgroundDismiss: true
         });
	     }else{

$('.box13').html('<span>1-Ingredientes</span>');
$('.sabores').css({"background-image":""});
$('.box43 ul').empty();	
$('.box2020').hide();

$('.box42').hide();
$('.box14').show();
$('#boxBsabor-1').css({"background-image":"url(arquivos/pizza_add_1_2.png)"});
$('#boxBsabor-2').css({"background-image":"url(arquivos/pizza_add_2_2.png)"}); 
$('#boxBsabor-3').css({"background-image":"url(arquivos/pizza_add_3_4.png)"}); 
$('#boxBsabor-4').css({"background-image":"url(arquivos/pizza_add_4_4.png)"}); 
$('.box2025').hide();

$('.box20').hide();
$('.box61').show();	

if(extra1!=='' && extra1!== null && extra1!== undefined){ 
var fatias1 = fatia1+' com '+extra1;
}else{
var fatias1 = fatia1;	
}

$('.box42').hide();
$('.box14').show();
$('#boxBsabor-1').css({"background-image":"url(arquivos/pizza_add_1_1.png)"});
$('#boxBsabor-2').css({"background-image":"url(arquivos/pizza_add_2_2.png)"}); 
$('#boxBsabor-3').css({"background-image":"url(arquivos/pizza_add_3_4.png)"}); 
$('#boxBsabor-4').css({"background-image":"url(arquivos/pizza_add_4_4.png)"}); 

$('.box61').scrollTop($('.box61')[0].scrollHeight);
$('#valor').text(xvalor);
var numero_sabores = '2';
$.post('/envia_pizza.php', {opcionais1: opcionais1, opcionais2: opcionais2, ingtodos2: ingtodos2, ingtodos1: ingtodos1, ids: ids, idpizza: idpizza, xvalor: xvalor2, tamanho: tamanho, fatia1: fatia1, fatia2: fatia2, ingredi1: ingredi1, ingredi2: ingredi2, numero_sabores: numero_sabores, aborda: aborda}, function(resposta) {
$('#carrinho_p').append(resposta);
});
setTimeout(function () {
                $.post('/retornar_valor.php', function(resposta) {
				$('#valor').text(resposta);
				});
                }, 1000);
$('#valor_pizza').text("0.00");
		 }
	  }
	  
	  if(fatias == '3'){
	  var fatia1      =     $('#boxTsabor-1').text();
	  var fatia2      =     $('#boxTsabor-2').text();
	  var fatia3      =     $('#boxTsabor-3').text();
	  var ingredi1    = $('#boxingredientes-1 input:checkbox[name="ing-3[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
	  var ingredi2    = $('#boxingredientes-2 input:checkbox[name="ing-3[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
	  var ingredi3    = $('#boxingredientes-3 input:checkbox[name="ing-3[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
	  var ingtodos1    = $('#boxingredientes-1 input:checkbox[name="ing-3[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");		
					   
	  var ingtodos2    = $('#boxingredientes-2 input:checkbox[name="ing-3[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");	
					   
	  var ingtodos3    = $('#boxingredientes-3 input:checkbox[name="ing-3[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");	
					   
					   
	  var extra1      = $('select[name=boxextra-1-3]').val();
	  var extra2      = $('select[name=boxextra-2-3]').val();
	  var extra3      = $('select[name=boxextra-3-3]').val();
	  
	  
	   var opcionais1    = $('#boxingredientes-1 input:checkbox[name="opcionais-1[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
					   
	  var opcionais2    = $('#boxingredientes-2 input:checkbox[name="opcionais-2[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
	  var opcionais3    = $('#boxingredientes-3 input:checkbox[name="opcionais-3[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
	  
		  if(ingredi1 =='' || ingredi2 =='' || ingredi3 ==''){
	     $.alert({
			title: 'Sabores faltando',valortotal,
			content: 'Por favor escolha os 3 sabores da pizza.',
			confirmButton: 'Ok',
			confirmButtonClass: 'btn-info',
			animation: 'bottom',
			icon: 'fa fa-check',
			backgroundDismiss: true
         });
	     }else{
			 
$('.box13').html('<span>1-Ingredientes</span>');
$('.sabores').css({"background-image":""});
$('.box43 ul').empty();	
$('.box2020').hide();


$('.box20').hide();
$('.box61').show();

$('.box42').hide();
$('.box14').show();
$('#boxBsabor-1').css({"background-image":"url(arquivos/pizza_add_1_1.png)"});
$('#boxBsabor-2').css({"background-image":"url(arquivos/pizza_add_2_2.png)"}); 
$('#boxBsabor-3').css({"background-image":"url(arquivos/pizza_add_3_4.png)"}); 
$('#boxBsabor-4').css({"background-image":"url(arquivos/pizza_add_4_4.png)"}); 
$('.box2025').hide();

$('.box61').scrollTop($('.box61')[0].scrollHeight);
$('#valor').text(xvalor);
var numero_sabores = '3';
$.post('/envia_pizza.php', {opcionais1: opcionais1, opcionais2: opcionais2, opcionais3: opcionais3, ingtodos1: ingtodos1, ingtodos2: ingtodos2, ingtodos3: ingtodos3, idpizza: idpizza, xvalor: xvalor2, tamanho: tamanho, fatia1: fatia1, fatia2: fatia2, fatia3: fatia3, ingredi1: ingredi1, ingredi2: ingredi2, ingredi3: ingredi3, numero_sabores: numero_sabores, ids: ids, aborda: aborda}, function(resposta) {
$('#carrinho_p').append(resposta);
});
setTimeout(function () {
                $.post('/retornar_valor.php', function(resposta) {
				$('#valor').text(resposta);
				});
                }, 1000);
$('#valor_pizza').text("0.00");
		 }
	  }
	  
	  if(fatias == '4'){
	  var fatia1      =     $('#boxTsabor-1').text();
	  var fatia2      =     $('#boxTsabor-2').text();
	  var fatia3      =     $('#boxTsabor-3').text();
	  var fatia4      =     $('#boxTsabor-4').text();
	  
	  var ingredi1    = $('#boxingredientes-1 input:checkbox[name="ing-4[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
	  var ingredi2    = $('#boxingredientes-2 input:checkbox[name="ing-4[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
	  var ingredi3    = $('#boxingredientes-3 input:checkbox[name="ing-4[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
	  var ingredi4    = $('#boxingredientes-4 input:checkbox[name="ing-4[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");	
					   
	 var ingtodos1    = $('#boxingredientes-1 input:checkbox[name="ing-4[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
	 var ingtodos2    = $('#boxingredientes-2 input:checkbox[name="ing-4[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");	
					   
	 var ingtodos3    = $('#boxingredientes-3 input:checkbox[name="ing-4[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");	
					   
	 var ingtodos4    = $('#boxingredientes-4 input:checkbox[name="ing-4[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");	
					   
					   
	  var extra1      = $('select[name=boxextra-1-4]').val();
	  var extra2      = $('select[name=boxextra-2-4]').val();
	  var extra3      = $('select[name=boxextra-3-4]').val();
	  var extra4      = $('select[name=boxextra-4-4]').val();

		
		 var opcionais1    = $('#boxingredientes-1 input:checkbox[name="opcionais-1[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
		 var opcionais2    = $('#boxingredientes-2 input:checkbox[name="opcionais-2[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
		 var opcionais3    = $('#boxingredientes-3 input:checkbox[name="opcionais-3[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
		var opcionais4    = $('#boxingredientes-4 input:checkbox[name="opcionais-4[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
		 if(ingredi1 =='' || ingredi2 =='' || ingredi3 =='' || ingredi4 ==''){
	     $.alert({
			title: 'Sabores faltando',
			content: 'Por favor escolha os 4 sabores da pizza.',
			confirmButton: 'Ok',
			confirmButtonClass: 'btn-info',
			animation: 'bottom',
			icon: 'fa fa-check',
			backgroundDismiss: true
         });
	     }else{
			 
$('.box13').html('<span>1-Ingredientes</span>');
$('.sabores').css({"background-image":""});
$('.box43 ul').empty();	
$('.box2020').hide();


$('.box20').hide();
$('.box61').show();

$('.box42').hide();
$('.box14').show();
$('#boxBsabor-1').css({"background-image":"url(arquivos/pizza_add_1_1.png)"});
$('#boxBsabor-2').css({"background-image":"url(arquivos/pizza_add_2_2.png)"}); 
$('#boxBsabor-3').css({"background-image":"url(arquivos/pizza_add_3_4.png)"}); 
$('#boxBsabor-4').css({"background-image":"url(arquivos/pizza_add_4_4.png)"}); 
$('.box2025').hide();

$('.box61').scrollTop($('.box61')[0].scrollHeight);
$('#valor').text(xvalor);
var numero_sabores = '4';
$.post('/envia_pizza.php', {opcionais1: opcionais1, opcionais2: opcionais2, opcionais3: opcionais3, opcionais4: opcionais4, ingtodos1: ingtodos1, ingtodos2: ingtodos2, ingtodos3: ingtodos3, ingtodos4: ingtodos4, idpizza: idpizza, xvalor: xvalor2, tamanho: tamanho, fatia1: fatia1, fatia2: fatia2, fatia3: fatia3, fatia4: fatia4, ingredi1: ingredi1, ingredi2: ingredi2, ingredi3: ingredi3, ingredi4: ingredi4, numero_sabores: numero_sabores, ids: ids, aborda: aborda}, function(resposta) {
$('#carrinho_p').append(resposta);
});

setTimeout(function () {
                $.post('/retornar_valor.php', function(resposta) {
				$('#valor').text(resposta);
				});
                }, 1000);

$('#valor_pizza').text("0.00");
		 }
	  }
	  
	
			
	});
	
	

            $('body').on('click', '.remove', function(){
            var ID       = $(this).attr('id');
			$.post('/delete_bebidas.php', {id: ID});
			$('#addcarrinho-'+ID).attr("class","addcarrinho");
			$(".li-"+ID).slideUp('slow');
			
			setTimeout(function() {
		        $.post('/retornar_valor.php', function(resposta) {
				$('#valor').text(resposta);
				});
			}, 1000);
			});	
			
			$('body').on('click', '.remove_finalizar', function(){
            var ID       = $(this).attr('id');
			$.post('/delete_bebidas.php', {id: ID});
			$('#addcarrinho-'+ID).attr("class","addcarrinho");
			$(".li-"+ID).slideUp('slow');
			
			setTimeout(function() {
		        $.post('/retornar_valor_entrega2.php', function(resposta) {
				$('#valor').text(resposta);
				});
			}, 1000);
			});	
			
			
			
			
			$(document).on("click",".addcarrinho",function(e){
				
				var nome       = $(this).data("nome");
				var id         = $(this).data("id");
				var foto       = $(this).data("foto");
				var valor      = $(this).data("valor");
				var valor2     = $('#valor').text();	
				var valortotal = (parseFloat(valor) + parseFloat(valor2)).toFixed(2);
				
				setTimeout(function () {
                $('.box20').hide();
				$('.box128').hide();
				$('.box61').show();
				$.post('/envia_bebidas.php', {id: id}, function(resposta) {
				
				var result = resposta.split('|');
				
				if(result[1]=='existe'){
				  var quantidade   = $('#inpu-'+result[2]).val();
			      var quantidade2  = parseFloat(quantidade) + 1;
			      $('#inpu-'+result[2]).val(quantidade2);
			      $('#inpuc-'+result[2]).val(quantidade2);	
				}else{
				   $('#carrinho_p').append(resposta);
				}
				});
                }, 1600);
				
				setTimeout(function () {
                $.post('/retornar_valor.php', function(resposta) {
				$('#valor').text(resposta);
				});
                }, 1800);

				$('.box61').scrollTop($('.box61')[0].scrollHeight);
			});	
			
			
			$(document).on("click",".maisum",function(e){
			var ID           = $(this).attr('id');
			var quantidade   = $('#inpu-'+ID).val();
			$.post('/soma_bebidas.php', {id: ID});
			var quantidade2  = parseFloat(quantidade) + 1;
			$('#inpu-'+ID).val(quantidade2);
			$('#inpuc-'+ID).val(quantidade2);
			
			setTimeout(function () {
            $.post('/retornar_valor.php', function(resposta) {
				$('#valor').text(resposta);
				});
            }, 500);
			});
			
			$(document).on("click",".maisum_finalizar",function(e){
			var ID           = $(this).attr('id');
			var quantidade   = $('#inpu-'+ID).val();
			$.post('/soma_bebidas.php', {id: ID});
			var quantidade2  = parseFloat(quantidade) + 1;
			$('#inpu-'+ID).val(quantidade2);
			$('#inpuc-'+ID).val(quantidade2);
			
			setTimeout(function () {
            $.post('/retornar_valor_entrega2.php', function(resposta) {
				$('#valor').text(resposta);
				});
            }, 500);
			});	
			
			$(document).on("click",".menosum",function(e){
			var ID = $(this).attr('id');
			$.post('/diminui_bebidas.php', {id: ID});
			var quantidade  = $('#inpu-'+ID).val();
			var quantidade2 = parseFloat(quantidade) - 1;
			if(quantidade2>0){
			$('#inpu-'+ID).val(quantidade2);
			$('#inpuc-'+ID).val(quantidade2);
			}
			setTimeout(function () {
			$.post('/retornar_valor.php', function(resposta) {
				$('#valor').text(resposta);
				});
            }, 500);
			});	
			
			$(document).on("click",".menosum_finalizar",function(e){
			var ID = $(this).attr('id');
			$.post('/diminui_bebidas.php', {id: ID});
			var quantidade  = $('#inpu-'+ID).val();
			var quantidade2 = parseFloat(quantidade) - 1;
			if(quantidade2>0){
			$('#inpu-'+ID).val(quantidade2);
			$('#inpuc-'+ID).val(quantidade2);
			}
			setTimeout(function () {
			$.post('/retornar_valor_entrega2.php', function(resposta) {
				$('#valor').text(resposta);
				});
            }, 500);
			
			});	
			
			
			
	$('#entrega_domicilio').click(function(event) {
	$('#finalizar_retirar').hide();
	$('#finalizar_domicilio').show();
	$('#entrega_domicilio').removeClass("inativo").addClass("ativo");
	$('#entrega_pizzaria').removeClass("ativo").addClass("inativo");
	$('#mostrar_domicilio').slideDown("slow");
	
	setTimeout(function () {
			$.post('/retornar_valor_entrega.php', function(resposta) {
				$('#valor').text(resposta);
				});
     }, 500);
	
	});
	
	$('#entrega_pizzaria').click(function(event) {
	$('#finalizar_retirar').show();
	$('#finalizar_domicilio').hide();
	$('#entrega_domicilio').removeClass("ativo").addClass("inativo");
	$('#entrega_pizzaria').removeClass("inativo").addClass("ativo");
	$('#mostrar_domicilio').slideUp("slow");
	
	setTimeout(function () {
			$.post('/retornar_valor_entrega3.php', function(resposta) {
				$('#valor').text(resposta);
				});
            }, 500);
	
	});

	
	$('#pagamento_dinheiro').click(function(event) {
											$('.box126g').attr("id", "finalizar_domicilio");
	$('#pagamento_dinheiro').removeClass("inativo").addClass("ativo");
	$('#pagamento_cartao').removeClass("ativo").addClass("inativo");
	$('#pagamento_online').removeClass("ativo").addClass("inativo");
	});
	
	$('#pagamento_cartao').click(function(event) {
	$('.box126g').attr("id", "finalizar_domicilio");
	$('#pagamento_cartao').removeClass("inativo").addClass("ativo");
	$('#pagamento_dinheiro').removeClass("ativo").addClass("inativo");
	$('#pagamento_online').removeClass("ativo").addClass("inativo");
	});
	
	$('#pagamento_online').click(function(event) {
	$('.box126g').attr("id", "pagar");
	$('#pagamento_online').removeClass("inativo").addClass("ativo");
	$('#pagamento_cartao').removeClass("ativo").addClass("inativo");
	$('#pagamento_dinheiro').removeClass("ativo").addClass("inativo");
	});
	
	
	$('body').on('click', '#finalizar_retirar', function(){
	var obs       = $("#obs_pedido").val();
	$.post('/envia_finalizar.php', {obs: obs}, function(resposta) {
	if (resposta != false) {
	window.location='/acompanhar.php?id='+resposta;
	}else{
	window.location='/erro';
	}
	});
	});
	
	
	$('body').on('click', '#finalizar_domicilio', function(){
	var pagamento   = $("#bloco_pagamento .ativo").attr("data-pagamento");
	var troco       = $("#troco").val();
	var obs       = $("#obs_pedido").val();
	if(pagamento == 'Online'){
	alert('pagamento online');	
	}else{
	$.post('/envia_finalizar_domicilio.php', {obs: obs, pagamento: pagamento, troco: troco}, function(resposta) {
	if (resposta != false) {
	window.location='/acompanhar.php?id='+resposta;
	}else{
	window.location='/erro';
	}
	});
	}
	});

	
});