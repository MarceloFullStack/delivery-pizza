$(document).ready(function() {


$('#manual-ajax').click(function(event) {
      event.preventDefault();
      $.get(this.href, function(html) {
        $(html).appendTo('#destino').modal();
      });
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

$('body').on('click', '#escolher_sabores', function(){
	$('#escolher_sabores .box').toggle();
	});
	
	$('body').on('click', '#escolher_sabores .box ul li', function(){
	var tamanho      =  $(this).data("tamanho");
	var novovalor    =  $(this).data("novovalor");
	var idtamanho    =  $(this).data("iddotamanho");
	$('#escolher label').html(tamanho);
	$('#escolher small').html(novovalor);
	$('.pztop-abs').addClass("sabores");
	$('.box63').addClass("maispizza");
	$('#valor_pizza').text(novovalor);
	$('#escolher_sabores #escolher').attr("data-novotamanho", tamanho);
	$('#escolher_sabores #escolher').attr("data-idtamanho", idtamanho);
	
	$('#boxTsabor #ta').text(" - "+tamanho);
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


	$('body').on('click', '.box170', function(){
	var id           = $(this).data("id");
	var ingredientes = $(this).data("ingredientes");
	$.post('/envia_sessao.php', {id: id, ingredientes: ingredientes});													 
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


			$('body').on('click', '.add-lanche', function(){
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
				
				$.post('/mais_tamanhos.php', {id: id}, function(resposta) {
				$('#tamanhos').html("");
				$('#tamanhos').html(resposta);
				});
				
				$.getJSON('/mais_tamanhos_ver.php', {id: id}, function(data) {
				if(data.age == '1'){
				$('#tamanhos').attr("data-setamanhos", "sim");
				}
				});	
				
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
			
			$(document).on("click",".remove",function(e){
			e.preventDefault();
            var ID       = $(this).attr('id');
			$('#addcarrinho-'+ID).attr("class","addcarrinho");
			var xvalor1  = $(this).data("xvalor");
			var xvalor2  = $('#valor').text();
			var xvalor   = (parseFloat(xvalor2) - parseFloat(xvalor1)).toFixed(2);
			$(".li-"+ID).slideUp('slow');
			$.post('/delete_bebidas.php', {id: ID});
			$('#valor').text(xvalor);
			
			
			
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
			

			
			$(document).on("click",".box13 i",function(e){
			$('#boxsabor').empty();
			$('#boxsabor').hide();
			$('#boxBsabor').show();
			$('#boxTsabor').html('<span>Sanduiche</span>');
			$('#prato').css({"background-image":""});
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


$('body').on('click', '.naoadd-lanche', function(){
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

$('body').on('click', '#maislanche', function(){
		var id              = $('#prato').attr("data-ident");
		var foto            = $('#prato').attr("data-foto");
		var valor           = $('#prato').attr("data-valor");
		var nome            = $('#prato').attr("data-nome");
		var setamanhos      = $('#tamanhos').attr("data-setamanhos");
		var idtamanho       = $('#escolher_sabores #escolher').attr("data-idtamanho");
		var tamanho         = $('#escolher_sabores #escolher').attr("data-novotamanho");
        var ingredientes    = $('#boxingredientes input:checkbox[name="ing[]"]:checked').map(function() { return $(this).val() }).get().join(",");
		var valor           = $('#valor_pizza').text();
		
		if(setamanhos == 'sim'){
		var nomer           = $('#prato').attr("data-nome");
		var nome            = nomer+' - '+tamanho;
		}else{
		var nome            = $('#prato').attr("data-nome");	
		}
		if(setamanhos == 'sim' && tamanho == ''){
		$.alert({
			title: 'Escolha um Tamanho',
			content: 'Por favor escolha um tamanho.',
			confirmButton: 'Ok',
			confirmButtonClass: 'btn-info',
			animation: 'bottom',
			icon: 'fa fa-check',
			backgroundDismiss: true
         });		
		}else{
		
		if(ingredientes ==''){
	     $.alert({
			title: 'Sem sanduiche',
			content: 'Por favor escolha um sanduiche.',
			confirmButton: 'Ok',
			confirmButtonClass: 'btn-info',
			animation: 'bottom',
			icon: 'fa fa-check',
			backgroundDismiss: true
         });
	     }else{
		  $('.box20').hide();
          $('.box61').show(); 
		$('#carrinho_p').append('<li class="li-'+id+'"><div class="carrinho0"><img src="/fotos_produtos/'+foto+'" width="25" height="25"/></div><div class="carrinho1"><span>'+nome+'</span></div><div class="carrinho2"><span class="remove" id="'+id+'" data-xvalor="'+valor+'"></span><a id="'+id+'" class="maisum" data-mvalor="'+valor+'"></a><input id="inpu-'+id+'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'+id+'" data-nvalor="'+valor+'" class="menosum"></a></div></li>');
		var valor2      =     $('#valor').text();	
	    var xvalor      =     (parseFloat(valor) + parseFloat(valor2)).toFixed(2);
		$('.box61').scrollTop($('.box61')[0].scrollHeight);
       
		$('#boxingredientes').empty();
		$('#boxsabor').hide();
		$('#boxBsabor').show();
		$('#boxTsabor').html('<span>1-Ingredientes</span>');
		$('#prato').css({"background-image":""});
		$.post('/envia_lanche.php', {id: id, ingredientes: ingredientes, idtamanho: idtamanho});
		setTimeout(function () {
            $.post('/retornar_valor.php', function(resposta) {
				$('#valor').text(resposta);
				});
            }, 500);
		$('#valor_pizza').text("0.00");
		 }
		 
		}
		
		
});








});