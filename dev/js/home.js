$(document).ready(function() {

    var efeitomaozinha = true;
	function subir(par){
		$('#maozinha').animate({bottom: '-=10'}, 400, function() {
			if(efeitomaozinha===true){
				par(subir);
			}
		});
	}
	function descer(parx){
		$('#maozinha').animate({bottom: '+=10'}, 400, function() {
			if(efeitomaozinha===true){
				parx(descer);
			}
		});
	}
	descer(subir);
	

$('body').on('click', '.sabores', function(){
	var ativo = $(".areapizza").attr("data-montar");
	if(ativo == 'desligado'){
	$.alert({
			title: 'Tamanho Faltando',
			content: 'Por favor escolha o tamanho da pizza.',
			confirmButton: 'Ok',
			confirmButtonClass: 'btn-info',
			animation: 'bottom',
			icon: 'fa fa-check',
			backgroundDismiss: true
         });	
	}else{
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
	}
	
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
	$.post('/envia_finalizar_domicilio.php', {obs: obs, pagamento: pagamento, troco: troco}, function(resposta) {
	if (resposta != false) {
	window.location='/acompanhar.php?id='+resposta;
	}else{
	window.location='/erro';
	}
	});
	});
	
	
	
	$('body').on('click', '#1sabor', function(){
	$('.box44').hide();
	$('.box44b').hide();
	$('.box44a').hide();
	$('.box44c').show();
	$('#boxBsabor-1').css({"background-image":"url(arquivos/pizza_add_1_1.png)"}); 
	$('#boxingredientes-1').empty();
	$('#boxingredientes-2').empty();
	$('#boxingredientes-3').empty();
	$('#boxingredientes-4').empty();
	
	$('.box8a').removeClass("box8a").addClass("box8b");
	$('.box8').removeClass("box8").addClass("box8b");
	$('.box8b').removeClass("box8b").addClass("box8b");
	$('.box8c').removeClass("box8c").addClass("box8b");
	
	$('#boxTsabor-1').html('<span>1-Ingredientes</span>');
	$('#boxTsabor-2').html('<span>1-Ingredientes</span>');
	$('#boxTsabor-3').html('<span>1-Ingredientes</span>');
	$('#boxTsabor-4').html('<span>1-Ingredientes</span>');
	$('.pztop-abs').css({"background-image":""});
	$('.areapizza').attr("data-fatias","1");
	});
	
	
	$('body').on('click', '#2sabor', function(){
	$('.box44').hide();
	$('.box44b').hide();
	$('.box44a').show();
	$('.box44c').hide();
	$('#boxBsabor-1').css({"background-image":"url(arquivos/pizza_add_1_2.png)"}); 
	$('#boxBsabor-2').css({"background-image":"url(arquivos/pizza_add_2_2.png)"}); 
	$('#boxingredientes-1').empty();
	$('#boxingredientes-2').empty();
	$('#boxingredientes-3').empty();
	$('#boxingredientes-4').empty();
	
	$('.box8a').removeClass("box8a").addClass("box8a");
	$('.box8').removeClass("box8").addClass("box8a");
	$('.box8b').removeClass("box8b").addClass("box8a");
	$('.box8c').removeClass("box8c").addClass("box8a");
	
	$('#boxTsabor-1').html('<span>1-Ingredientes</span>');
	$('#boxTsabor-2').html('<span>1-Ingredientes</span>');
	$('#boxTsabor-3').html('<span>1-Ingredientes</span>');
	$('#boxTsabor-4').html('<span>1-Ingredientes</span>');
	$('.pztop-abs').css({"background-image":""});
	$('.areapizza').attr("data-fatias","2");
	});
	
	$('body').on('click', '#3sabor', function(){
	$('.box44').hide();
	$('.box44b').show();
	$('.box44a').hide();
	$('.box44c').hide();
	$('#boxBsabor-1').css({"background-image":"url(arquivos/pizza_add_1_3.png)"}); 
	$('#boxBsabor-2').css({"background-image":"url(arquivos/pizza_add_2_3.png)"}); 
	$('#boxBsabor-3').css({"background-image":"url(arquivos/pizza_add_3_3.png)"}); 
	$('#boxingredientes-1').empty();
	$('#boxingredientes-2').empty();
	$('#boxingredientes-3').empty();
	$('#boxingredientes-4').empty();
	
	$('.box8a').removeClass("box8a").addClass("box8c");
	$('.box8').removeClass("box8").addClass("box8c");
	$('.box8b').removeClass("box8b").addClass("box8c");
	$('.box8c').removeClass("box8c").addClass("box8c");
	
	$('#boxTsabor-1').html('<span>1-Ingredientes</span>');
	$('#boxTsabor-2').html('<span>1-Ingredientes</span>');
	$('#boxTsabor-3').html('<span>1-Ingredientes</span>');
	$('#boxTsabor-4').html('<span>1-Ingredientes</span>');
	$('.pztop-abs').css({"background-image":""});
	$('.areapizza').attr("data-fatias","3");
	});
	
	$('body').on('click', '#4sabor', function(){
    $('.box44').show();
	$('.box44b').hide();
	$('.box44a').hide();
	$('.box44c').hide();
	$('#boxBsabor-1').css({"background-image":"url(arquivos/pizza_add_1_4.png)"}); 
	$('#boxBsabor-2').css({"background-image":"url(arquivos/pizza_add_2_4.png)"}); 
	$('#boxBsabor-3').css({"background-image":"url(arquivos/pizza_add_3_4.png)"}); 
	$('#boxBsabor-4').css({"background-image":"url(arquivos/pizza_add_4_4.png)"}); 
	$('#boxingredientes-1').empty();
	$('#boxingredientes-2').empty();
	$('#boxingredientes-3').empty();
	$('#boxingredientes-4').empty();
	
	$('.box8a').removeClass("box8a").addClass("box8");
	$('.box8').removeClass("box8").addClass("box8");
	$('.box8b').removeClass("box8b").addClass("box8");
	$('.box8c').removeClass("box8c").addClass("box8");
	
	$('#boxTsabor-1').html('<span>1-Ingredientes</span>');
	$('#boxTsabor-2').html('<span>1-Ingredientes</span>');
	$('#boxTsabor-3').html('<span>1-Ingredientes</span>');
	$('#boxTsabor-4').html('<span>1-Ingredientes</span>');
	$('.pztop-abs').css({"background-image":""});
	$('.areapizza').attr("data-fatias","4");
	});
	
	
	
	$('#entrega_domicilio').click(function(event) {
	$('#finalizar_retirar').hide();
	$('#finalizar_domicilio').show();
	$('#entrega_domicilio').removeClass("inativo").addClass("ativo");
	$('#entrega_pizzaria').removeClass("ativo").addClass("inativo");
	$('#mostrar_domicilio').slideDown("slow");
	});
	
	$('#entrega_pizzaria').click(function(event) {
	$('#finalizar_retirar').show();
	$('#finalizar_domicilio').hide();
	$('#entrega_domicilio').removeClass("ativo").addClass("inativo");
	$('#entrega_pizzaria').removeClass("inativo").addClass("ativo");
	$('#mostrar_domicilio').slideUp("slow");
	});

	
	$('#pagamento_dinheiro').click(function(event) {
	$('#pagamento_dinheiro').removeClass("inativo").addClass("ativo");
	$('#pagamento_cartao').removeClass("ativo").addClass("inativo");
	});
	
	$('#pagamento_cartao').click(function(event) {
	$('#pagamento_cartao').removeClass("inativo").addClass("ativo");
	$('#pagamento_dinheiro').removeClass("ativo").addClass("inativo");
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
	
	$('#escolher_tamanho').click(function(event) {
	$('.boxb').toggle();
	});
	
	
	$('#manual-ajax').click(function(event) {
      event.preventDefault();
      $.get(this.href, function(html) {
        $(html).appendTo('#destino').modal();
      });
    });
	
	$('#manual-ajax2').click(function(event) {
      event.preventDefault();
	  
	  $(".box174").removeClass("menu-fechar");
	  $(".box174").addClass('menu-anchor');
	  $('.box177').css({"background-color":"#990000"});
	  $('.box178').css({"background-color":"#990000"});
	  $(".responsivo").removeClass('oppenned');
			
			
      $.get(this.href, function(html) {
        $(html).appendTo('#destino').modal();
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
	  $.post('quantidade_sabores.php', {tamanho: tamanho}, function(resposta) {
	  $('#box201').html(resposta);
	  });
	  
	  $.post('/quantidade_sabores_mostrar.php', {tamanho: tamanho}, function(resposta) {
	    if(resposta == 1){
	      $('.box44').hide();
		  $('.box44b').hide();
		  $('.box44a').hide();
		  $('.box44c').show();
		  $('#boxBsabor-1').css({"background-image":"url(arquivos/pizza_add_1_1.png)"}); 
		  $('#boxingredientes-1').empty();
		  $('#boxingredientes-2').empty();
		  $('#boxingredientes-3').empty();
		  $('#boxingredientes-4').empty();
		  $('.box8').removeClass("box8").addClass("box8b");
		  $('.box8c').removeClass("box8c").addClass("box8b");
		  $('#boxTsabor-1').html('<span>1-Ingredientes</span>');
		  $('#boxTsabor-2').html('<span>1-Ingredientes</span>');
		  $('#boxTsabor-3').html('<span>1-Ingredientes</span>');
		  $('#boxTsabor-4').html('<span>1-Ingredientes</span>');
		  $('.pztop-abs').css({"background-image":""});
		  $('.areapizza').attr("data-fatias","1");
	    }
		if(resposta == 2){
	      $('.box44').hide();
		  $('.box44b').hide();
		  $('.box44a').show();
		  $('.box44c').hide();
		  $('#boxBsabor-1').css({"background-image":"url(arquivos/pizza_add_1_2.png)"}); 
		  $('#boxBsabor-2').css({"background-image":"url(arquivos/pizza_add_2_2.png)"}); 
		  $('#boxingredientes-1').empty();
		  $('#boxingredientes-2').empty();
		  $('#boxingredientes-3').empty();
		  $('#boxingredientes-4').empty();
		  $('#boxTsabor-1').html('<span>1-Ingredientes</span>');
		  $('#boxTsabor-2').html('<span>1-Ingredientes</span>');
		  $('#boxTsabor-3').html('<span>1-Ingredientes</span>');
		  $('#boxTsabor-4').html('<span>1-Ingredientes</span>');
		  $('.box8').removeClass("box8").addClass("box8a");
		  $('.box8a').removeClass("box8a").addClass("box8a");
		  $('.box8b').removeClass("box8b").addClass("box8a");
		  $('.box8c').removeClass("box8c").addClass("box8a");
		  $('.pztop-abs').css({"background-image":""});
		  $('.areapizza').attr("data-fatias","2");
	    }
		if(resposta == 3){
	      $('.box44').hide();
		  $('.box44b').show();
		  $('.box44a').hide();
		  $('.box44c').hide();
		  $('#boxBsabor-1').css({"background-image":"url(arquivos/pizza_add_1_3.png)"}); 
		  $('#boxBsabor-2').css({"background-image":"url(arquivos/pizza_add_2_3.png)"}); 
		  $('#boxBsabor-3').css({"background-image":"url(arquivos/pizza_add_3_3.png)"}); 
		  $('#boxingredientes-1').empty();
		  $('#boxingredientes-2').empty();
		  $('#boxingredientes-3').empty();
		  $('#boxingredientes-4').empty();
		  $('#boxTsabor-1').html('<span>1-Ingredientes</span>');
		  $('#boxTsabor-2').html('<span>1-Ingredientes</span>');
		  $('#boxTsabor-3').html('<span>1-Ingredientes</span>');
		  $('#boxTsabor-4').html('<span>1-Ingredientes</span>');
		  $('.box8').removeClass("box8").addClass("box8c");
		  $('.box8a').removeClass("box8a").addClass("box8c");
		  $('.box8b').removeClass("box8b").addClass("box8c");
		  $('.box8c').removeClass("box8c").addClass("box8c");
		  $('.pztop-abs').css({"background-image":""});
		  $('.areapizza').attr("data-fatias","3");
	    }
		if(resposta == 4){
	     $('.box44').show();
		 $('.box44b').hide();
		 $('.box44a').hide();
		 $('.box44c').hide();
		 $('#boxBsabor-1').css({"background-image":"url(arquivos/pizza_add_1_4.png)"}); 
		 $('#boxBsabor-2').css({"background-image":"url(arquivos/pizza_add_2_4.png)"}); 
		 $('#boxBsabor-3').css({"background-image":"url(arquivos/pizza_add_3_4.png)"}); 
		 $('#boxBsabor-4').css({"background-image":"url(arquivos/pizza_add_4_4.png)"}); 
		 $('#boxingredientes-1').empty();
		 $('#boxingredientes-2').empty();
		 $('#boxingredientes-3').empty();
		 $('#boxingredientes-4').empty();
		 $('.box8a').removeClass("box8a").addClass("box8");
		 $('.box8c').removeClass("box8c").addClass("box8");
		 $('.box8b').removeClass("box8b").addClass("box8");
		 $('#boxTsabor-1').html('<span>1-Ingredientes</span>');
		 $('#boxTsabor-2').html('<span>1-Ingredientes</span>');
		 $('#boxTsabor-3').html('<span>1-Ingredientes</span>');
		 $('#boxTsabor-4').html('<span>1-Ingredientes</span>');
		 $('.pztop-abs').css({"background-image":""});
		 $('.areapizza').attr("data-fatias","4");
	    }
	  });
	  
	});
	
	
	
	$('body').on('click', '.boxc ul li', function(){
	var borda    =  $(this).data("borda");
	var taxa     =  $(this).data("taxa");
	var valorr   =  $('#valor_parcial').text();
	var taxas    =  (parseFloat(valorr) + parseFloat(taxa)).toFixed(2);
	$('#escolher_borda #escolher label').html("Borda Recheada");
	$('#escolher_borda #escolher small').html(borda+" + R$ "+taxa);	
	$('#valor_pizza').text(taxas);	
	$('#valor_borda').text(borda);
	});
	
		   $('body').on('click', '.box37', function(){
				var fatiass        = $('.areapizza').attr("data-fatias");
                var pdcp           = $(this).attr("id");
				var sabor          = $(this).data("sabor");
				var idproduto      = $(this).data("idproduto");
				var ingredientes   = $(this).data("ingredientes");
				var valor          = $(this).data("valor");
				var valor2         = $('#valor_pizza').text();
				
				if(valor>valor2){
				var real           = parseFloat(valor).toFixed(2);	
				}else{
				var real           = parseFloat(valor2).toFixed(2);	
				}
				
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
				$('#boxBsabor-'+pdcp+'-'+fatiass).hide();
				$('#boxTsabor-'+pdcp+'-'+fatiass).html('<span>'+sabor+'</span><i data-fechar="'+pdcp+'-'+fatiass+'" data-fecharp="'+pdcp+'"></i>');
				$('#boxsabor-'+pdcp+'-'+fatiass).show();
                var valortotal = parseFloat(real).toFixed(2);	
				$('#valor_pizza').text(valortotal);
				
				$('#valor_parcial').text(valortotal);
				
                $('#boxingredientes-'+pdcp+'-'+fatiass).empty();
				var TableOfContentsSplit = ingredientes.split(',');
				$.each(TableOfContentsSplit,function(number){
				$('#boxingredientes-'+pdcp+'-'+fatiass).append('<li>'+TableOfContentsSplit[number]+'<label class="switch"><input type="checkbox" id="permitir_comentarios" checked="checked" name="ing-'+fatiass+'[]" value="'+TableOfContentsSplit[number]+'" class="switch-input" /><span class="switch-label" data-on="Sim" data-off="N&atilde;o"></span> <span class="switch-handle"></span></label></li>');
				});	
				


      $.post('/sabores_extras.php', {sabor: sabor, pdcp: pdcp, fatiass: fatiass}, function(resposta) {
	      if(resposta!=''){
	      $('#boxextra-'+pdcp+'-'+fatiass).show();
	      $('#boxextra-'+pdcp+'-'+fatiass).html(resposta);
		  }
	  });
				$.modal.close();
            });
			
			 
		$(document).on("click",".habilitar_extra",function(e){
		  var id = $(this).attr("id");
          if ($(this).prop('checked')) {
            $("#permitir_extra-"+id).removeAttr("disabled");
          }
          else {
            $("#permitir_extra-"+id).attr("disabled", "disabled");
			$('#permitir_extra-'+id+' option[value="Ingrediente grátis?"]').prop('selected', 'selected');
          }
        });
			 
			 

			$(document).on("click",".addcarrinho",function(e){
				
				$('.box20').hide();
				$('.box61').show();
				var nome       = $(this).data("nome");
				var id         = $(this).data("id");
				$('#addcarrinho-'+id).removeClass("addcarrinho");
				var foto       = $(this).data("foto");
				var valor      = $(this).data("valor");
				var valor2     = $('#valor').text();	
				var valortotal = (parseFloat(valor) + parseFloat(valor2)).toFixed(2);
				$('#carrinho_p').append('<li class="li-'+id+'"><div class="carrinho0"><img src="/fotos_produtos/'+foto+'" width="25" height="25"/></div><div class="carrinho1"><span>'+nome+'</span></div><div class="carrinho2"><span class="remove" id="'+id+'" data-xvalor="'+valor+'"></span><a id="'+id+'" class="maisum" data-mvalor="'+valor+'"></a><input id="inpu-'+id+'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'+id+'" data-nvalor="'+valor+'" class="menosum"></a></div></li>');
				$.post('/envia_bebidas.php', {id: id})
				$('#valor').text(valortotal);
				$('.box61').scrollTop($('.box61')[0].scrollHeight);
				return false;
				
			  
			});	
			
			
			
			
			
			$('body').on('click', '.remove', function(){
		
            var ID       = $(this).attr('id');
			$('#addcarrinho-'+ID).attr("class","addcarrinho");
			var xvalor1  = $(this).data("xvalor");
			var xvalor2  = $('#valor').text();
			var xvalor   = (parseFloat(xvalor2) - parseFloat(xvalor1)).toFixed(2);
			$(".li-"+ID).slideUp('slow');
			$('#valor').text(xvalor);
			$.post('/delete_bebidas.php', {id: ID});
			
			});	
			
			$(document).on("click",".box13 i",function(e){
			var fechar   = $(this).data("fechar");
			var fecharp  = $(this).data("fecharp");
			$('#boxsabor-'+fechar).hide();
			$('#boxBsabor-'+fechar).show();
			$('#boxTsabor-'+fechar).html('<span>1-Ingredientes</span>');
			$('.areapizza'+fecharp).css({"background-image":""});
			});	

			
			$(document).on("click",".maisum",function(e){
			
			var ID           = $(this).attr('id');
			var quantidade   = $('#inpu-'+ID).val();
			var quantidade2  = parseFloat(quantidade) + 1;
			var valor        = $(this).data("mvalor");
			var valor2       = $('#valor').text();
			var valormaisum = (parseFloat(valor) + parseFloat(valor2)).toFixed(2);
			$('#inpu-'+ID).val(quantidade2);
			$('#inpuc-'+ID).val(quantidade2);
			$('#valor').text(valormaisum);
			$.post('/soma_bebidas.php', {id: ID});
			
			});	
			
			$(document).on("click",".menosum",function(e){
			var ID = $(this).attr('id');
			var quantidade  = $('#inpu-'+ID).val();
			var quantidade2 = parseFloat(quantidade) - 1;
			$.post('/diminui_bebidas.php', {id: ID})
			var valor      = $(this).data("nvalor");
			var valor2     = $('#valor').text();
			var valormenosum = (parseFloat(valor2) - parseFloat(valor)).toFixed(2);
			
			
			if(quantidade2>0){
			$('#inpu-'+ID).val(quantidade2);
			$('#valor').text(valormenosum);
			}
			});	



$('body').on('click', '.naoaddcarrinho', function(){
$.alert({
			title: 'Estamos Fechados',
			content: 'Ops! Nao estamos atendendo no momento.',
			confirmButton: 'Ok',
			confirmButtonClass: 'btn-info',
			animation: 'bottom',
			icon: 'fa fa-check',
			backgroundDismiss: true
         });											  
});	


$('body').on('click', '.naomaispizza', function(){
$.alert({
			title: 'Estamos Fechados',
			content: 'Ops! Nao estamos atendendo no momento.',
			confirmButton: 'Ok',
			confirmButtonClass: 'btn-info',
			animation: 'bottom',
			icon: 'fa fa-check',
			backgroundDismiss: true
         });											  
});	




$('body').on('click', '#escolher_borda', function(){
	var fatias      =     $('.areapizza').attr("data-fatias");
	
	if(fatias == '1'){
	     var ingredi1    = $('#boxingredientes-1-1 input:checkbox[name="ing-1[]"]:checked').map(function() { return $(this).val() }).get().join(",");
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
	     var ingredi1    = $('#boxingredientes-1-2 input:checkbox[name="ing-2[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi2    = $('#boxingredientes-2-2 input:checkbox[name="ing-2[]"]:checked').map(function() { return $(this).val() }).get().join(",");
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
	     var ingredi1    = $('#boxingredientes-1-3 input:checkbox[name="ing-3[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi2    = $('#boxingredientes-2-3 input:checkbox[name="ing-3[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi3    = $('#boxingredientes-3-3 input:checkbox[name="ing-3[]"]:checked').map(function() { return $(this).val() }).get().join(",");
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
	     var ingredi1    = $('#boxingredientes-1-4 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi2    = $('#boxingredientes-2-4 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi3    = $('#boxingredientes-3-4 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi4    = $('#boxingredientes-4-4 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");				   
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





});
		


$(function() {
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
	  var fatia1      =     $('#boxTsabor-1-1').text();
	  var ingredi1    = $('#boxingredientes-1-1 input:checkbox[name="ing-1[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");
					   
	  var ingtodos1    = $('#boxingredientes-1-1 input:checkbox[name="ing-1[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");			   
					   
		var extra1      = $('select[name=boxextra-1-1]').val();
	  
	  
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

$('#carrinho_p').append('<li class="li-'+idpizza+'"><div class="carrinho0"><img src="arquivos/pizza-ilustrativa2.jpg" width="25" height="25"></div><div class="carrinho1"><span><p>'+tamanho+'</p><i>'+fatias1+' '+aborda+'</i></span></div><div class="carrinho2"><span class="remove" id="'+idpizza+'" data-xvalor="'+valor+'"></span><a id="'+idpizza+'" class="maisum" data-mvalor="'+valor+'"></a><input id="inpu-'+idpizza+'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'+idpizza+'" data-nvalor="'+valor+'" class="menosum"></a></div></li>');
$('.box61').scrollTop($('.box61')[0].scrollHeight);
$('#valor').text(xvalor);
var numero_sabores = '1';
$.post('/envia_pizza.php', {ingtodos1: ingtodos1, ids: ids, idpizza: idpizza, xvalor: xvalor2, tamanho: tamanho, fatia1: fatia1, fatia2: fatia2, ingredi1: ingredi1, ingredi2: ingredi2, numero_sabores: numero_sabores, aborda: aborda});
$('#valor_pizza').text("0.00");
		 }
	  }
	  
	  
	  if(fatias == '2'){
	  var fatia1      =     $('#boxTsabor-1-2').text();
	  var fatia2      =     $('#boxTsabor-2-2').text();
	  var ingredi1    = $('#boxingredientes-1-2 input:checkbox[name="ing-2[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");
	  var ingredi2    = $('#boxingredientes-2-2 input:checkbox[name="ing-2[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");
					   
	  var ingtodos1    = $('#boxingredientes-1-2 input:checkbox[name="ing-2[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");		
					   
	  var ingtodos2    = $('#boxingredientes-2-2 input:checkbox[name="ing-2[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");		
					   
					   
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

$('.box20').hide();
$('.box61').show();	

if(extra1!=='' && extra1!== null && extra1!== undefined){ 
var fatias1 = fatia1+' com '+extra1;
}else{
var fatias1 = fatia1;	
}

if(extra2!=='' && extra2!== null && extra2!== undefined){  
var fatias2 = fatia1+' com '+extra2;
}else{
var fatias2 = fatia2;	
}

$('#carrinho_p').append('<li class="li-'+idpizza+'"><div class="carrinho0"><img src="arquivos/pizza-ilustrativa2.jpg" width="25" height="25"></div><div class="carrinho1"><span><p>'+tamanho+'</p><i>'+fatias1+'+'+fatias2+' '+aborda+'</i></span></div><div class="carrinho2"><span class="remove" id="'+idpizza+'" data-xvalor="'+valor+'"></span><a id="'+idpizza+'" class="maisum" data-mvalor="'+valor+'"></a><input id="inpu-'+idpizza+'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'+idpizza+'" data-nvalor="'+valor+'" class="menosum"></a></div></li>');
$('.box61').scrollTop($('.box61')[0].scrollHeight);
$('#valor').text(xvalor);
var numero_sabores = '2';
$.post('/envia_pizza.php', {ingtodos2: ingtodos2, ingtodos1: ingtodos1, ids: ids, idpizza: idpizza, xvalor: xvalor2, tamanho: tamanho, fatia1: fatia1, fatia2: fatia2, ingredi1: ingredi1, ingredi2: ingredi2, numero_sabores: numero_sabores, aborda: aborda});
$('#valor_pizza').text("0.00");
		 }
	  }
	  
	  if(fatias == '3'){
	  var fatia1      =     $('#boxTsabor-1-3').text();
	  var fatia2      =     $('#boxTsabor-2-3').text();
	  var fatia3      =     $('#boxTsabor-3-3').text();
	  var ingredi1    = $('#boxingredientes-1-3 input:checkbox[name="ing-3[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");
	  var ingredi2    = $('#boxingredientes-2-3 input:checkbox[name="ing-3[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");
	  var ingredi3    = $('#boxingredientes-3-3 input:checkbox[name="ing-3[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");
					   
	  var ingtodos1    = $('#boxingredientes-1-3 input:checkbox[name="ing-3[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");		
					   
	  var ingtodos2    = $('#boxingredientes-2-3 input:checkbox[name="ing-3[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");	
					   
	  var ingtodos3    = $('#boxingredientes-3-3 input:checkbox[name="ing-3[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");	
					   
					   
	  var extra1      = $('select[name=boxextra-1-3]').val();
	  var extra2      = $('select[name=boxextra-2-3]').val();
	  var extra3      = $('select[name=boxextra-3-3]').val();
	  
	  
		  if(ingredi1 =='' || ingredi2 =='' || ingredi3 ==''){
	     $.alert({
			title: 'Sabores faltando',
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

if(extra1!=='' && extra1!== null && extra1!== undefined){ 
var fatias1 = fatia1+' com '+extra1;
}else{
var fatias1 = fatia1;	
}

if(extra2!=='' && extra2!== null && extra2!== undefined){  
var fatias2 = fatia1+' com '+extra2;
}else{
var fatias2 = fatia2;	
}

if(extra3!=='' && extra3!== null && extra3!== undefined){  
var fatias3 = fatia3+' com '+extra3;
}else{
var fatias3 = fatia3;	
}


$('#carrinho_p').append('<li class="li-'+idpizza+'"><div class="carrinho0"><img src="arquivos/pizza-ilustrativa2.jpg" width="25" height="25"></div><div class="carrinho1"><span><p>'+tamanho+'</p><i>'+fatias1+'+'+fatias2+'+'+fatias3+' '+aborda+'</i></span></div><div class="carrinho2"><span class="remove" id="'+idpizza+'" data-xvalor="'+valor+'"></span><a id="'+idpizza+'" class="maisum" data-mvalor="'+valor+'"></a><input id="inpu-'+idpizza+'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'+idpizza+'" data-nvalor="'+valor+'" class="menosum"></a></div></li>');
$('.box61').scrollTop($('.box61')[0].scrollHeight);
$('#valor').text(xvalor);
var numero_sabores = '3';
$.post('/envia_pizza.php', {ingtodos1: ingtodos1, ingtodos2: ingtodos2, ingtodos3: ingtodos3, idpizza: idpizza, xvalor: xvalor2, tamanho: tamanho, fatia1: fatia1, fatia2: fatia2, fatia3: fatia3, ingredi1: ingredi1, ingredi2: ingredi2, ingredi3: ingredi3, numero_sabores: numero_sabores, ids: ids, aborda: aborda});
$('#valor_pizza').text("0.00");
		 }
	  }
	  
	  if(fatias == '4'){
	  var fatia1      =     $('#boxTsabor-1-4').text();
	  var fatia2      =     $('#boxTsabor-2-4').text();
	  var fatia3      =     $('#boxTsabor-3-4').text();
	  var fatia4      =     $('#boxTsabor-4-4').text();
	  
	  var ingredi1    = $('#boxingredientes-1-4 input:checkbox[name="ing-4[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");
	  var ingredi2    = $('#boxingredientes-2-4 input:checkbox[name="ing-4[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");
	  var ingredi3    = $('#boxingredientes-3-4 input:checkbox[name="ing-4[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");
	  var ingredi4    = $('#boxingredientes-4-4 input:checkbox[name="ing-4[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");	
					   
	 var ingtodos1    = $('#boxingredientes-1-4 input:checkbox[name="ing-4[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");
					   
	 var ingtodos2    = $('#boxingredientes-2-4 input:checkbox[name="ing-4[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");	
					   
	 var ingtodos3    = $('#boxingredientes-3-4 input:checkbox[name="ing-4[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");	
					   
	 var ingtodos4    = $('#boxingredientes-4-4 input:checkbox[name="ing-4[]"]:not(:checked)')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");	
					   
					   
	  var extra1      = $('select[name=boxextra-1-4]').val();
	  var extra2      = $('select[name=boxextra-2-4]').val();
	  var extra3      = $('select[name=boxextra-3-4]').val();
	  var extra4      = $('select[name=boxextra-4-4]').val();

					   
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

if(extra1!=='' && extra1!== null && extra1!== undefined){ 
var fatias1 = fatia1+' com '+extra1;
}else{
var fatias1 = fatia1;	
}

if(extra2!=='' && extra2!== null && extra2!== undefined){  
var fatias2 = fatia1+' com '+extra2;
}else{
var fatias2 = fatia2;	
}

if(extra3!=='' && extra3!== null && extra3!== undefined){  
var fatias3 = fatia3+' com '+extra3;
}else{
var fatias3 = fatia3;	
}

if(extra4!=='' && extra4!== null && extra4!== undefined){ 
var fatias4 = fatia4+' com '+extra4;
}else{
var fatias4 = fatia4;	
}

$('#carrinho_p').append('<li class="li-'+idpizza+'"><div class="carrinho0"><img src="arquivos/pizza-ilustrativa2.jpg" width="25" height="25"></div><div class="carrinho1"><span><p>'+tamanho+'</p><i>'+fatias1+' + '+fatias2+' + '+fatias3+' + '+fatias4+' '+aborda+'</i></span></div><div class="carrinho2"><span class="remove" id="'+idpizza+'" data-xvalor="'+valor+'"></span><a id="'+idpizza+'" class="maisum" data-mvalor="'+valor+'"></a><input id="inpu-'+idpizza+'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'+idpizza+'" data-nvalor="'+valor+'" class="menosum"></a></div></li>');
$('.box61').scrollTop($('.box61')[0].scrollHeight);
$('#valor').text(xvalor);
var numero_sabores = '4';
$.post('/envia_pizza.php', {ingtodos1: ingtodos1, ingtodos2: ingtodos2, ingtodos3: ingtodos3, ingtodos4: ingtodos4, idpizza: idpizza, xvalor: xvalor2, tamanho: tamanho, fatia1: fatias1, fatia2: fatias2, fatia3: fatias3, fatia4: fatias4, ingredi1: ingredi1, ingredi2: ingredi2, ingredi3: ingredi3, ingredi4: ingredi4, numero_sabores: numero_sabores, ids: ids, aborda: aborda});
$('#valor_pizza').text("0.00");

		 }
	  }
	  
	setTimeout(function() { window.location='/montar'; }, 1000);
			
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





});