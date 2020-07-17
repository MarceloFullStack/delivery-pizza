$(document).ready(function() {

 
 
			
			
			
			$('body').on('click', '.add-lanche', function(){
                $('.box_252uu').animate({scrollTop:0}, 'slow');
				var id             = $(this).data("id");
				var foto           = $(this).data("foto");
                var nome           = $(this).data("nome");
                var ingredientes   = $(this).data("ingredientes");
				var valor          = $(this).data("valor");
				var valor2         = $('#valor').text();	
				var valortotal     = (parseFloat(valor) + parseFloat(valor2)).toFixed(2);
				$('#prato').css({"background-image":"url(/fotos_produtos/"+foto+")"});
				$('#prato').attr("data-ident", id);
				$('#prato').attr("data-foto", foto);
				$('#prato').attr("data-valor", valor);
				$('#prato').attr("data-nome", nome);
				$('#prato').css({"background-size":"240px"}); 
				$('#boxTsabor').html('<span>'+nome+'</span><div id="ta"></div>');
				$('#boxsabor').show();
				$('#boxBsabor').hide();
                $('#boxingredientes').empty();
				var TableOfContentsSplit = ingredientes.split(',');
				$('#valor_pizza').text(valor);
				$.each(TableOfContentsSplit,function(number){
				$('#boxingredientes').append('<li>'+TableOfContentsSplit[number]+'<label class="switch"><input type="checkbox" id="permitir_comentarios" name="ing[]" value="'+TableOfContentsSplit[number]+'" checked="checked" class="switch-input" /><span class="switch-label" data-on="Sim" data-off="N&atilde;o"></span> <span class="switch-handle"></span></label></li>');
                 });
				
				$.post('mais_tamanhos.php', {id: id}, function(resposta) {
				$('#tamanhos').html("");
				$('#tamanhos').html(resposta);
				});
				
				$.getJSON('mais_tamanhos_ver.php', {id: id}, function(data) {
				if(data.age == '1'){
				$('#tamanhos').attr("data-setamanhos", "sim");
				}
				});	
				
            });
			
			
			$('body').on('click', '.remove', function(){
													  var tipo       =  $('input[name=radio-1-set]:checked').val();
		        if(tipo == 'entrega'){
				var taxa      = 'sim';	
				}else{
				var taxa      = 'nao';		
				}
			var id_usuario = $("#id_usuario").val();
			var ID       = $(this).attr('id');
			$('#addcarrinho-'+ID).attr("class","addcarrinho");
			var xvalor1  = $(this).data("xvalor");
			var xvalor2  = $('#valor').text();
			var xvalor   = (parseFloat(xvalor2) - parseFloat(xvalor1)).toFixed(2);
			$(".li-"+ID).slideUp('slow');
			$('#valor').text(xvalor);
			$.post('delete_bebidas.php', {id: ID});
			setTimeout(function () {
                $.post('retornar_valor_entrega.php', {taxa: taxa, id_usuario: id_usuario}, function(resposta) {
				$('#valor').text(resposta);
				});
                }, 500);
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
			$('#valor_unit-'+ID).val(quantidade2);
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
			

	
/*
	$('body').on('click', '#escolher_tamanho', function(){
	$('.box').toggle();
	});
*/
	

	$('body').on('click', '#escolher_tamanho', function(e){
        $(this).closest('#escolher_tamanho').toggleClass("abrir");
        e.stopPropagation();
    });
    $(document).on('click', function (e) {    
        if (!$(e.target).closest('.abrir').length) $('#escolher_tamanho').removeClass("abrir");
    });

	
	
	
	$('body').on('click', '.box ul li', function(){
	var tamanho    =  $(this).data("tamanho");
	var fatias     =  $(this).data("fatias");
	var tamanhoID  =  $(this).data("tamanhoid");
	$('#escolher_tamanho #escolher label').html(tamanho);
	$('#escolher_tamanho #escolher small').html(fatias);
	$('#escolher_tamanho #escolher span').html(tamanhoID);
	$('.box_281').hide();
	  $.post('quantidade_sabores.php', {tamanho: tamanho}, function(resposta) {
	  $('#recebe_sabores').html(resposta);
	  });
	  
	  $.post('quantidade_sabores_mostrar.php', {tamanho: tamanhoID}, function(resposta) {
	    if(resposta == 1){
	      $('.box_256').show().css({"height":"100%"}).css({"width":"100%"});
		  $('.box_257').hide();
	      $('.box_258').hide();
		  $('.box_259').hide();
		  
		  $('.box_268').show().css({"height":"100%"}).css({"width":"100%"}).css({"line-height":"140px"});
		  $('.box_269').hide();
	      $('.box_270').hide();
		  $('.box_271').hide();
		  
		  $('.ingred-1').show().css({"width":"100%"});
		  $('.ingred-2').hide();
		  $('.ingred-3').hide();
		  $('.ingred-4').hide();
		  
		  $('.box_255').css({"background-image":"url(/arquivos/bg_pizza_1.png)"});
	    }
		if(resposta == 2){
		  $('.box_256').show().css({"height":"100%"}).css({"width":"50%"});
		  $('.box_257').show().css({"height":"100%"}).css({"width":"50%"});
	      $('.box_258').hide();
		  $('.box_259').hide();
		  
		  $('.box_268').show().css({"height":"100%"}).css({"width":"50%"}).css({"line-height":"140px"});
		  $('.box_269').show().css({"height":"100%"}).css({"width":"50%"}).css({"line-height":"140px"}).css({"left":"66px"});
	      $('.box_270').hide();
		  $('.box_271').hide();
		  
		  $('.ingred-1').show().css({"width":"100%"});
		  $('.ingred-2').show().css({"width":"100%"});
		  $('.ingred-3').hide();
		  $('.ingred-4').hide();
		  
		  $('.box_255').css({"background-image":"url(/arquivos/bg_pizza_2.png)"});
	    }
		if(resposta == 3){
	      $('.box_256').show().css({"width":"33.33333333333333%"}).css({"height":"100%"});
		  $('.box_257').show().css({"width":"33.33333333333333%"}).css({"height":"100%"});
	      $('.box_258').show().css({"width":"33.33333333333333%"}).css({"height":"100%"}).css({"left":"80px"});
		  $('.box_259').hide();
		  
		  $('.box_268').show().css({"width":"33.33333333333333%"}).css({"height":"100%"}).css({"line-height":"140px"});;;
		  $('.box_269').show().css({"width":"33.33333333333333%"}).css({"height":"100%"}).css({"left":"46px"}).css({"line-height":"140px"});
	      $('.box_270').show().css({"width":"33.33333333333333%"}).css({"height":"100%"}).css({"left":"93px"}).css({"line-height":"140px"});
		  $('.box_271').hide();
		  
		  $('.ingred-1').show().css({"width":"50%"});
		  $('.ingred-2').show().css({"width":"50%"});
		  $('.ingred-3').show().css({"width":"100%"});
		  $('.ingred-4').hide();
		  
		  $('.box_255').css({"background-image":"url(/arquivos/bg_pizza_3.png)"});
	    }
		if(resposta == 4){
	      $('.box_256').show().css({"width":"50%"}).css({"height":"50%"});
		  $('.box_257').show().css({"width":"50%"}).css({"height":"50%"});
	      $('.box_258').show().css({"width":"50%"}).css({"height":"50%"}).css({"left":"0px"});
		  $('.box_255').show().css({"background-image":"url(/arquivos/bg_pizza_4.png)"});
		  
		  $('.ingred-1').show().css({"width":"50%"});
		  $('.ingred-2').show().css({"width":"50%"});
		  $('.ingred-3').show().css({"width":"50%"});
		  $('.ingred-4').show().css({"width":"50%"});
	    }
	  });
	  
	});
	

	$('body').on('click', '#escolher_sabores', function(e){
       $('#escolher_sabores .box').toggle();
    });
	
	$('body').on('click', '#escolher_sabores', function(e){
       $('#escolher_sabores .boxb').toggle();
    });
	
	
	
	$('body').on('click', '#escolher_sabores .box ul li', function(){
	var tamanho      =  $(this).data("tamanho");
	var novovalor    =  $(this).data("novovalor");
	var idtamanho    =  $(this).data("iddotamanho");
	$('#escolher label').html(tamanho);
	$('#escolher small').html(novovalor);
	$('#valor_pizza').text(novovalor);
	$('#escolher_sabores #escolher').attr("data-novotamanho", tamanho);
	$('#escolher_sabores #escolher').attr("data-idtamanho", idtamanho);
	});
	
	
	$('body').on('click', '.boxb ul li', function(){
	var tamanho      =  $(this).data("tamanho");
	var fatias       =  $(this).data("fatias");
	$('#escolher_sabores #escolher label').html(tamanho);
	$('#escolher_sabores #escolher small').html(fatias);
	$('.box_281').hide();
		if(tamanho == '1 Sabor'){
	      $('.box_256').show().css({"height":"100%"}).css({"width":"100%"});
		  $('.box_257').hide();
	      $('.box_258').hide();
		  $('.box_259').hide();
		  
		  $('.box_268').show().css({"height":"100%"}).css({"width":"100%"}).css({"line-height":"140px"});
		  $('.box_269').hide();
	      $('.box_270').hide();
		  $('.box_271').hide();
		  
		  $('.ingred-1').show().css({"width":"100%"});
		  $('.ingred-2').hide();
		  $('.ingred-3').hide();
		  $('.ingred-4').hide();
		  
		  $('.box_255').css({"background-image":"url(/arquivos/bg_pizza_1.png)"});
	    }
		if(tamanho == '2 Sabores'){
		  $('.box_256').show().css({"height":"100%"}).css({"width":"50%"});
		  $('.box_257').show().css({"height":"100%"}).css({"width":"50%"});
	      $('.box_258').hide();
		  $('.box_259').hide();
		  
		  $('.box_268').show().css({"height":"100%"}).css({"width":"50%"}).css({"line-height":"140px"});
		  $('.box_269').show().css({"height":"100%"}).css({"width":"50%"}).css({"line-height":"140px"}).css({"left":"66px"});
	      $('.box_270').hide();
		  $('.box_271').hide();
		  
		  $('.ingred-1').show().css({"width":"100%"});
		  $('.ingred-2').show().css({"width":"100%"});
		  $('.ingred-3').hide();
		  $('.ingred-4').hide();
		  
		  $('.box_255').css({"background-image":"url(/arquivos/bg_pizza_2.png)"});
	    }
		if(tamanho == '3 Sabores'){
	      $('.box_256').show().css({"width":"33.33333333333333%"}).css({"height":"100%"});
		  $('.box_257').show().css({"width":"33.33333333333333%"}).css({"height":"100%"});
	      $('.box_258').show().css({"width":"33.33333333333333%"}).css({"height":"100%"}).css({"left":"80px"});
		  $('.box_259').hide();
		  
		  $('.box_268').show().css({"width":"33.33333333333333%"}).css({"height":"100%"}).css({"line-height":"140px"});;;
		  $('.box_269').show().css({"width":"33.33333333333333%"}).css({"height":"100%"}).css({"left":"46px"}).css({"line-height":"140px"});
	      $('.box_270').show().css({"width":"33.33333333333333%"}).css({"height":"100%"}).css({"left":"93px"}).css({"line-height":"140px"});
		  $('.box_271').hide();
		  
		  $('.ingred-1').show().css({"width":"50%"});
		  $('.ingred-2').show().css({"width":"50%"});
		  $('.ingred-3').show().css({"width":"100%"});
		  $('.ingred-4').hide();
		  
		  $('.box_255').css({"background-image":"url(/arquivos/bg_pizza_3.png)"});
	    }
		if(tamanho == '4 Sabores'){
	      $('.box_256').show().css({"width":"50%"}).css({"height":"50%"});
		  $('.box_257').show().css({"width":"50%"}).css({"height":"50%"});
	      $('.box_258').show().css({"width":"50%"}).css({"height":"50%"}).css({"left":"0px"});
		  $('.box_259').show().css({"width":"50%"}).css({"height":"50%"});
		  
		  $('.box_268').show().css({"width":"50%"}).css({"height":"50%"}).css({"line-height":"80px"});
		  $('.box_269').show().css({"width":"50%"}).css({"height":"50%"}).css({"line-height":"80px"}).css({"left":"70px"});
	      $('.box_270').show().css({"width":"50%"}).css({"height":"50%"}).css({"line-height":"50px"}).css({"left":"0px"});
		  $('.box_271').show().css({"width":"50%"}).css({"height":"50%"});
		  
		  
		  $('.ingred-1').show().css({"width":"50%"});
		  $('.ingred-2').show().css({"width":"50%"});
		  $('.ingred-3').show().css({"width":"50%"});
		  $('.ingred-4').show().css({"width":"50%"});
		  
		  $('.box_255').css({"background-image":"url(/arquivos/bg_pizza_4.png)"});
	    }
		
		
	});
	
	
	$('body').on('click', '#sabor_pizza', function(){
				var fatiasss       = $('#escolher_sabores #escolher label').text();
				
				if(fatiasss == '1 Sabor'){
				var fatiass = '1';	
				}
				if(fatiasss == '2 Sabores'){
				var fatiass = '2';	
				}
				if(fatiasss == '3 Sabores'){
				var fatiass = '3';	
				}
				if(fatiasss == '4 Sabores'){
				var fatiass = '4';	
				}
				var sabor          = $(this).data("sabor");
				var idproduto      = $(this).data("idproduto");
				var ingredientes   = $(this).data("ingredientes");
				var lado           = $(this).data("lado");
				var imagem         = $(this).data("imagem");
				
				var valor          = $(this).data("valor");
				var valor2         = $('#valor_pizza').text();
				
				if(valor>valor2){
				var real           = parseFloat(valor).toFixed(2);	
				}else{
				var real           = parseFloat(valor2).toFixed(2);	
				}
				
				if(lado  == 1){
				var classe = 'box_256';	
				}
				if(lado  == 2){
				var classe = 'box_257';	
				$('.'+classe).css({"border-left":"#FFFFFF dashed 1px"});
				}
				if(lado  == 3){
				var classe = 'box_258';
				$('.'+classe).css({"border-right":"#FFFFFF dashed 1px"}).css({"border-left":"#FFFFFF dashed 1px"});
				}
				if(lado  == 4){
				var classe = 'box_259';	
				}
				$('.'+classe).css({"background-image":"url("+imagem+")"}).css({"background-position":"center center"});
				$('.ingredientes-'+lado).css({"background-color":"#FFFFFF"});
				$('#boxTsabor-'+lado).html('<span>'+sabor+'</span> - R$ <b class="valor">'+valor+'</b><i data-fechar="'+lado+'"></i>');
				
				$('#boxTsabor-'+lado).attr('data-idproduto', idproduto);
				$('#boxTsabor-'+lado).attr('data-valor', valor);
				
				$('.ingredientes-'+lado).empty();
				var TableOfContentsSplit = ingredientes.split(',');
				$.each(TableOfContentsSplit,function(number){
				$('.ingredientes-'+lado).append('<li>'+TableOfContentsSplit[number]+'<label class="switch"><input type="checkbox" id="permitir_comentarios" checked="checked" name="ing-'+fatiass+'[]" value="'+TableOfContentsSplit[number]+'" class="switch-input" /><span class="switch-label" data-on="Sim" data-off="N&atilde;o"></span><span class="switch-handle"></span></label></li>');
				});
				
				
				var valor01 = $('#boxTsabor-1').attr('data-valor');
				var valor02 = $('#boxTsabor-2').attr('data-valor');
				var valor03 = $('#boxTsabor-3').attr('data-valor');
				var valor04 = $('#boxTsabor-4').attr('data-valor');
				var valorbo = $('#escolher_borda').attr('data-borda');
				
				$.post('sessao_valor_total.php', {valor1: valor01, valor2: valor02, valor3: valor03, valor4: valor04, valorborda: valorbo}, function(resposta) {
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
		
		$.post('sessao_valor_total.php', {valor1: valor01, valor2: valor02, valor3: valor03, valor4: valor04, valorborda: valorbo}, function(resposta) {
		$('#valor_pizza').html(resposta);
		});
	
	    $('#valor_borda').text(borda);
	});
	
	
	
	$(document).on("click",".box_282 i",function(e){
			var fechar   = $(this).data("fechar");
			
			$('#boxTsabor-'+fechar).html('<span>'+fechar+'-Ingredientes</span>');
			
			
			var valor = $('.valor').map(function () {
            return $(this).text();
            }).get();
			
            var maxi = Math.max.apply(null, valor);
	
	
			var valorparcial = parseFloat(maxi).toFixed(2);
			
			if(valorparcial>0){
			var valortotal  =  valorparcial;
			}else{
			var valortotal  =  '0.00';	
			}
			
			$('#valor_pizza').text(valortotal);
			
			$('.ingredientes-'+fechar).empty();
			 var valor01 = $('#boxTsabor-'+fechar).attr('data-valor', '');
			$('.ingredientes-'+fechar).css({"background-color":"transparent"});
			if(fechar  == 1){
				var classe = 'box_256';	
				}
				if(fechar  == 2){
				var classe = 'box_257';	
				}
				if(fechar  == 3){
				var classe = 'box_258';	
				}
				if(fechar  == 4){
				var classe = 'box_259';	
				}
			$('.'+classe).css({"background-image":""});
			$('.'+classe).css({"border":"none"});
			});	
	

			$('body').on('click', '.add_pizza', function(){
														 var tipo       =  $('input[name=radio-1-set]:checked').val();
		        if(tipo == 'entrega'){
				var taxa      = 'sim';	
				}else{
				var taxa      = 'nao';		
				}
			var id_usuario  = $("#id_usuario").val();
			var fatias      =     $('#escolher_sabores #escolher label').text();
			var ids         =     $('#ids_produto').text();
			var bordas      =     $('#escolher_borda #escolher label').text();
			var bordas2     =     $('#escolher_borda #escolher small').text();
			var tamanho     =     $('#escolher_tamanho #escolher label').text();  
	var valor       =     $('#valor_pizza').text();	
	var valor2      =     $('#valor').text();	
	var xvalor      =     (parseFloat(valor) + parseFloat(valor2)).toFixed(2);
	var xvalor2      =    $('#valor_pizza').text();	
	var idpizza     =     'P-'+Math.floor(Math.random() * 100);
	var ids         =     $('#ids_produto').text();
	
	if(bordas=='Sem Borda'){
	var aborda      =     '';	
	}else{
	var aborda      =     bordas+' '+bordas2;		
	}
			if(fatias == '1 Sabor'){
				var fatia1      = $('#boxTsabor-1').text();
				var ingredi1    = $('.ingredientes-1 input:checkbox[name="ing-1[]"]:checked').map(function() { return $(this).val() }).get().join(",");
				var ingtodos1   = $('.ingredientes-1 input:checkbox[name="ing-1[]"]:not(:checked)').map(function() { return $(this).val() }).get().join(", ");
				
				var opcionais1    = $('.ingredientes-1 input:checkbox[name="opcionais-1[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
				var numero_sabores = '1';
				if(ingredi1 =='' || ingredi2 ==''){
				alert('Sabores faltando');
				}else{
				
					$.post('envia_pizza_store.php', {opcionais1: opcionais1, ingredi1: ingredi1, tamanho: tamanho, xvalor: xvalor2, ingtodos1: ingtodos1, id_usuario: id_usuario, fatia1: fatia1, numero_sabores: numero_sabores, aborda: aborda, }, function(resposta) {
					$('#carrinho').append(resposta);																															  
					});
					
					setTimeout(function () {
					$.post('retornar_valor_entrega.php', {taxa: taxa, id_usuario: id_usuario}, function(resposta) {
					$('#valor').text(resposta);
					});
					}, 500);
				$.modal.close();	
				}
				
			}
			if(fatias == '2 Sabores'){
				var fatia1      = $('#boxTsabor-1').text();
				var fatia2      = $('#boxTsabor-2').text();
				var ingredi1    = $('.ingredientes-1 input:checkbox[name="ing-2[]"]:checked').map(function() { return $(this).val() }).get().join(",");
				var ingredi2    = $('.ingredientes-2 input:checkbox[name="ing-2[]"]:checked').map(function() { return $(this).val() }).get().join(",");
				var ingtodos1   = $('.ingredientes-1 input:checkbox[name="ing-2[]"]:not(:checked)').map(function() { return $(this).val() }).get().join(", ");				   
	            var ingtodos2   = $('.ingredientes-2 input:checkbox[name="ing-2[]"]:not(:checked)').map(function() { return $(this).val() }).get().join(", ");		
				
				var opcionais1    = $('.ingredientes-1 input:checkbox[name="opcionais-1[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
					   
	            var opcionais2    = $('.ingredientes-2 input:checkbox[name="opcionais-2[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
				var numero_sabores = '2';
				if(ingredi1 =='' || ingredi2 ==''){
				alert('Sabores faltando');
				}else{
				
					$.post('envia_pizza_store.php', {opcionais1: opcionais1, opcionais2: opcionais2, ingredi1: ingredi1, ingredi2: ingredi2, tamanho: tamanho, xvalor: xvalor2, ingtodos1: ingtodos1, ingtodos2: ingtodos2, id_usuario: id_usuario, fatia1: fatia1, fatia2: fatia2, numero_sabores: numero_sabores, aborda: aborda, }, function(resposta) {
					$('#carrinho').append(resposta);																															  
					});
					
					setTimeout(function () {
					$.post('retornar_valor_entrega.php', {taxa: taxa, id_usuario: id_usuario}, function(resposta) {
					$('#valor').text(resposta);
					});
					}, 500);
				$.modal.close();	
				}
				
			}
			
			if(fatias == '3 Sabores'){
				var fatia1      = $('#boxTsabor-1').text();
				var fatia2      = $('#boxTsabor-2').text();
				var fatia3      = $('#boxTsabor-3').text();
				var ingredi1    = $('.ingredientes-1 input:checkbox[name="ing-3[]"]:checked').map(function() { return $(this).val() }).get().join(",");
				var ingredi2    = $('.ingredientes-2 input:checkbox[name="ing-3[]"]:checked').map(function() { return $(this).val() }).get().join(",");
				var ingredi3    = $('.ingredientes-3 input:checkbox[name="ing-3[]"]:checked').map(function() { return $(this).val() }).get().join(",");
				var ingtodos1   = $('.ingredientes-1 input:checkbox[name="ing-3[]"]:not(:checked)').map(function() { return $(this).val() }).get().join(", ");				   
	            var ingtodos2   = $('.ingredientes-2 input:checkbox[name="ing-3[]"]:not(:checked)').map(function() { return $(this).val() }).get().join(", ");		
				var ingtodos3   = $('.ingredientes-3 input:checkbox[name="ing-3[]"]:not(:checked)').map(function() { return $(this).val() }).get().join(", ");		   
				var numero_sabores = '3';
				
				var opcionais1    = $('.ingredientes-1 input:checkbox[name="opcionais-1[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
					   
	            var opcionais2    = $('.ingredientes-2 input:checkbox[name="opcionais-2[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
				var opcionais3    = $('.ingredientes-3 input:checkbox[name="opcionais-3[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
				
				if(ingredi1 =='' || ingredi2 =='' || ingredi3 ==''){
				alert('Sabores faltando');
				}else{
					
				$.post('envia_pizza_store.php', {opcionais1: opcionais1, opcionais2: opcionais2, opcionais3: opcionais3, ingredi1: ingredi1, ingredi2: ingredi2, ingredi3: ingredi3, tamanho: tamanho, xvalor: xvalor2, ingtodos1: ingtodos1, ingtodos2: ingtodos2, ingtodos3: ingtodos3, id_usuario: id_usuario, fatia1: fatia1, fatia2: fatia2, fatia3: fatia3, numero_sabores: numero_sabores, aborda: aborda, }, function(resposta) {
					$('#carrinho').append(resposta);																															  
					});
					
					setTimeout(function () {
					$.post('retornar_valor_entrega.php', {taxa: taxa, id_usuario: id_usuario}, function(resposta) {
					$('#valor').text(resposta);
					});
					}, 500);
					$.modal.close();
				}
				
			}
			
			
			if(fatias == '4 Sabores'){
				var fatia1      = $('#boxTsabor-1').text();
				var fatia2      = $('#boxTsabor-2').text();
				var fatia3      = $('#boxTsabor-3').text();
				var fatia4      = $('#boxTsabor-4').text();
				var ingredi1    = $('.ingredientes-1 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");
				var ingredi2    = $('.ingredientes-2 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");
				var ingredi3    = $('.ingredientes-3 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");
				var ingredi4    = $('.ingredientes-4 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");
				var ingtodos1   = $('.ingredientes-1 input:checkbox[name="ing-4[]"]:not(:checked)').map(function() { return $(this).val() }).get().join(", ");				   
	            var ingtodos2   = $('.ingredientes-2 input:checkbox[name="ing-4[]"]:not(:checked)').map(function() { return $(this).val() }).get().join(", ");		
				var ingtodos3   = $('.ingredientes-3 input:checkbox[name="ing-4[]"]:not(:checked)').map(function() { return $(this).val() }).get().join(", ");
				var ingtodos4   = $('.ingredientes-4 input:checkbox[name="ing-4[]"]:not(:checked)').map(function() { return $(this).val() }).get().join(", ");	
				var numero_sabores = '4';
				
				var opcionais1    = $('.ingredientes-1 input:checkbox[name="opcionais-1[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
					   
	            var opcionais2    = $('.ingredientes-2 input:checkbox[name="opcionais-2[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
				var opcionais3    = $('.ingredientes-3 input:checkbox[name="opcionais-3[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
				var opcionais4    = $('.ingredientes-4 input:checkbox[name="opcionais-4[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(", ");
					   
				if(ingredi1 =='' || ingredi2 =='' || ingredi3 =='' || ingredi4 ==''){
				alert('Sabores faltando');
				}else{
					
				$.post('envia_pizza_store.php', {opcionais1: opcionais1, opcionais2: opcionais2, opcionais3: opcionais3, opcionais4: opcionais4, ingredi1: ingredi1, ingredi2: ingredi2, ingredi3: ingredi3, ingredi4: ingredi4, tamanho: tamanho, xvalor: xvalor2, ingtodos1: ingtodos1, ingtodos2: ingtodos2, ingtodos3: ingtodos3, ingtodos4: ingtodos4, id_usuario: id_usuario, fatia1: fatia1, fatia2: fatia2, fatia3: fatia3, fatia4: fatia4, numero_sabores: numero_sabores, aborda: aborda, }, function(resposta) {
					$('#carrinho').append(resposta);																															  
					});
					
					setTimeout(function () {
					$.post('retornar_valor_entrega.php', {taxa: taxa, id_usuario: id_usuario}, function(resposta) {
					$('#valor').text(resposta);
					});
					}, 500);
					$.modal.close();
				}
				
			}
			
			

			});	
	
			
			$('#manual-pizza').click(function() {
				$('#destino').html("");
				var id_usuario = $("#id_usuario").val();
				if(id_usuario == ''){
				alert('Escolha um cliente');
				}else{
				$.get('modal_pizza.php', function(html) {
				$(html).appendTo('#destino').modal();
				});
				}
			});
			
			$('#manual-pizza2').click(function(event) {
             event.preventDefault();
				$('#destino').html("");
				var id_usuario = $("#id_usuario").val();
				if(id_usuario == ''){
				alert('Escolha um cliente');
				}else{
				$.get('modal_outros.php', function(html) {
				$(html).appendTo('#destino').modal();
				});
				}
			});
			
			
			
			
			$('#manual-bebidas').click(function() {
				var id_usuario = $("#id_usuario").val();
				if(id_usuario == ''){
				alert('Escolha um cliente');
				}else{
				$.get('modal_bebida.php', function(html) {
				$(html).appendTo('#destino').modal();
				});
				}
			});
			
			$('#manual-usuario').click(function(event) {
				event.preventDefault();
				$.get(this.href, function(html) {
				$(html).appendTo('#destino').modal();
				});
			});
		
		
		$('body').on('change', '#cidades', function(){
		var valor = $(this).val();
		setTimeout(function(){
				$("#bairros").load("/ajaxBairro.php",{id:valor});
			}, 1000);
													 
		});
				
		$('body').on('click', '#cadastrar', function(){
        var nome         = $("#nomes").val();
		var email        = $("#emails").val();
        var senha        = $("#senha").val();
		var csenha       = $("#csenha").val();
		var telefone     = $("#telefones").val();
		var celular      = $("#celulars").val();
		var cpf          = $("#cpf").val();
		var cidade       = $("#cidades").val();
		var endereco     = $("#enderecos").val();
		var numero       = $("#numeros").val();
        var bairro       = $("#bairros").val();
        var complemento  = $("#complementos").val();	
		
	$.post('envia_cadastro.php', {nome: nome, email: email, senha: senha, csenha: csenha, telefone: telefone, celular: celular, cpf: cpf, cidade: cidade, endereco: endereco, numero: numero, bairro: bairro, complemento: complemento}, function(resposta) {
		
	$("#erro_cadastro").slideDown();
			if (resposta != false) {
				$("#erro_cadastro").html(resposta);
			}
			
		setTimeout(function() {
		$('#erro_cadastro').slideUp();}, 5000);
		
		});
		});	
				
		
		 $('body').on('click', '.jumper', function(){
					 $(".box_252uu").animate({ 
            scrollTop: $( $(this).attr('data-id') ).offset().top}, 1000);
           
             });
		 
		 
		 
		 
		 
		 $('body').on('click', '#maislanche', function(){
													   var tipo       =  $('input[name=radio-1-set]:checked').val();
		        if(tipo == 'entrega'){
				var taxa      = 'sim';	
				}else{
				var taxa      = 'nao';		
				}
		var id_usuario      = $("#id_usuario").val();
		var id              = $('#prato').attr("data-ident");
		var foto            = $('#prato').attr("data-foto");
		var valor           = $('#prato').attr("data-valor");
		var nome            = $('#prato').attr("data-nome");
		var setamanhos      = $('#tamanhos').attr("data-setamanhos");
		var idtamanho       = $('#escolher_sabores #escolher').attr("data-idtamanho");
		var tamanho         = $('#escolher_sabores #escolher').attr("data-novotamanho");
        var ingredientes    = $('#boxingredientes input:checkbox[name="ing[]"]:checked').map(function() { return $(this).val() }).get().join(",");
		var valor           = $('#valor_pizza').text();

		if(setamanhos == 'sim' && tamanho == ''){
		alert('Escolha um tamanho');	
		}else{
			
		if(ingredientes ==''){
		alert('Por favor escolha um produto');		
		}else{
		
		var valor2      =     $('#valor').text();	
	    var xvalor      =     (parseFloat(valor) + parseFloat(valor2)).toFixed(2);
        $('#valor').text(xvalor);
		$('#boxingredientes').empty();
		$('#prato').css({"background-image":""});
		
		$.post('envia_lanche_store.php', {id: id, ingredientes: ingredientes, idtamanho: idtamanho, id_usuario: id_usuario}, function(resposta) {
		$('#carrinho').append(resposta);																															  
		});
		
		
		setTimeout(function () {
                $.post('retornar_valor_entrega.php', {taxa: taxa, id_usuario: id_usuario}, function(resposta) {
				$('#valor').text(resposta);
				});
                }, 500);
		$.modal.close();
		}
		}
});
		 
		 
	
	$(document).on("click",".addcarrinho",function(e){
                var tipo       =  $('input[name=radio-1-set]:checked').val();
		        if(tipo == 'entrega'){
				var taxa      = 'sim';	
				}else{
				var taxa      = 'nao';		
				}
				var id_usuario = $("#id_usuario").val();
				var nome       = $(this).data("nome");
				var id         = $(this).data("id");
				$('#addcarrinho-'+id).removeClass("addcarrinho");
				var foto       = $(this).data("foto");
				var valor      = $(this).data("valor");
				
                $.post('envia_bebidas.php', {id: id, id_usuario: id_usuario}, function(resposta) {
		        $('#carrinho').append(resposta);																															  
		        });
				
				setTimeout(function () {
                $.post('retornar_valor_entrega.php', {id_usuario: id_usuario, taxa: taxa}, function(resposta) {
				$('#valor').text(resposta);
				});
                }, 500);
				
				
				$.modal.close();
				
			});	
	
		
		$('body').on('keyup', '#pizza_nomeeeee', function(){
			var valor 		= $('#pizza_nome').val(); 
			 $.post('filtra_pizzas.php', {valor: valor}, function(resposta) {
		        $('.box_263 ul').html(resposta);																															  
		      });
		});
		
		
		
		$('body').on('keyup', '#pizza_nome', function(){
		var texto = $(this).val();
		
		$(".box_263 li").css("display", "block");
		$(".box_263 li").each(function(){
			/*
			if($(this).text().indexOf(texto) < 0)
			*/
			if($(this).text().toUpperCase().indexOf(texto.toUpperCase()) < 0)
			   $(this).css("display", "none");
		});
	    });
	
	
	$('body').unbind('change').on('click', '.opcionais', function(e){
	  e.preventDefault();
	  
	  var sabor = $(this).attr("id");
	  
	  var opcionais    = $('.ingredientes-'+sabor+' input:checkbox[name="opcionais-'+sabor+'[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");
					   
					   
	  var id    = $('#boxTsabor-'+sabor).attr('data-idproduto');
      $.post('opcionais.php', {id: id, sabor: sabor, opcionais: opcionais}, function(retorno) {
		$('.box505').html(retorno);
      });
	  
	  $('.box505').css({"top":"-300px"});	
	  setTimeout(function () { $('.box505').css({"top":"0px"});}, 500);

	  $('.boxextra-1').removeClass('esconder').addClass('opcionais').text('Adicionar Opcionais');
	  $('.boxextra-2').removeClass('esconder').addClass('opcionais').text('Adicionar Opcionais');
	  $('.boxextra-3').removeClass('esconder').addClass('opcionais').text('Adicionar Opcionais');
	  $('.boxextra-4').removeClass('esconder').addClass('opcionais').text('Adicionar Opcionais');
	  
	  $(this).removeClass('opcionais').addClass('esconder').text('Fechar Ingredientes Opcionais');
    });
	
	$('body').on('click', '.esconder', function(){
	$('.box505').css({"top":"-300px"});	
	$(this).removeClass('esconder').addClass('opcionais').text('Adicionar Opcionais');
	});	
	
	
	
	
		$('body').on('click', '#escolher_borda', function(){
	var fatias      =     $('#escolher_sabores #escolher label').text();
	if(fatias == '1 Sabor'){
	     var ingredi1    = $('.ingredientes-1 input:checkbox[name="ing-1[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     if(ingredi1 ==''){
		alert('Escolha os sabores da pizza para liberar escolha da borda');
		 }else{
	     $('.boxc').toggle();
         }
	}
	
	if(fatias == '2 Sabores'){
	     var ingredi1    = $('.ingredientes-1 input:checkbox[name="ing-2[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi2    = $('.ingredientes-2 input:checkbox[name="ing-2[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     if(ingredi1 =='' || ingredi2 ==''){
		 alert('Escolha os sabores da pizza para liberar escolha da borda');
		 }else{
	     $('.boxc').toggle();
         }
	}
	
	if(fatias == '3 Sabores'){
	     var ingredi1    = $('.ingredientes-1 input:checkbox[name="ing-3[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi2    = $('.ingredientes-2 input:checkbox[name="ing-3[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi3    = $('.ingredientes-3 input:checkbox[name="ing-3[]"]:checked').map(function() { return $(this).val() }).get().join(",");
		 if(ingredi1 =='' || ingredi2 =='' || ingredi3 ==''){
		 alert('Escolha os sabores da pizza para liberar escolha da borda');
		 }else{
	     $('.boxc').toggle();
         }
	}
	
	 if(fatias == '4 Sabores'){
	     var ingredi1    = $('.ingredientes-1 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi2    = $('.ingredientes-2 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi3    = $('.ingredientes-3 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");
	     var ingredi4    = $('.ingredientes-4 input:checkbox[name="ing-4[]"]:checked').map(function() { return $(this).val() }).get().join(",");				   
         if(ingredi1 =='' || ingredi2 =='' || ingredi3 =='' || ingredi4 ==''){
		 alert('Escolha os sabores da pizza para liberar escolha da borda');
		 }else{
	     $('.boxc').toggle();
         }
	}
	
});
		
		
		
		$('body').on('click', '#finalizar_pedido', function(){
	    var tipo        =  $('input[name=radio-1-set]:checked').val();
		var id_usuario  =  $("#id_usuario").val();
		var obs         =  $("#obs_pedido").val();
		if(tipo == 'entrega'){
		  $.post('envia_finalizar_domicilio.php', {obs: obs, id_usuario: id_usuario}, function(resposta) {
	      window.location='/admin';
	      });	
		}else{
	      $.post('envia_finalizar.php', {obs: obs, id_usuario: id_usuario}, function(resposta) {
	      window.location='/admin';
	      });
		}
	    });
		
		
		
		$('body').on('change', 'input[name=radio-1-set]', function(){
		var id_usuario = $("#id_usuario").val();
		var valor = $(this).val();
		var taxa  = $("#taxa_usuario").val();
		if(valor == 'entrega' && taxa!=''){
		var taxa      = 'sim';	
		$("#taxa").text('+ R$ '+taxa+' de taxa de entrega');
		}else{
		$("#taxa").text('');
		var taxa      = 'nao';
		}
		
		setTimeout(function () {
                $.post('retornar_valor_entrega.php', {taxa: taxa, id_usuario: id_usuario}, function(resposta) {
				$('#valor').text(resposta);
				});
                }, 500);
		
		});
		
	
	

});