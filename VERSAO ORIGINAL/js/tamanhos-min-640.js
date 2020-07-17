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
	
	$('body').on('click', '#2sabor', function(){
	  $('.box12').css({"width":"50%"});
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
	  $('.box12').css({"width":"33.33333333333333%"});
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
	  $('.box12').css({"width":"25%"});
      $('#box-2').show();
	  $('#box-3').show();
	  $('#box-4').show();
	  
	  $('.box8a').removeClass("box8a").addClass("box8");
	  $('.box8').removeClass("box8").addClass("box8");
	  $('.box8b').removeClass("box8b").addClass("box8");
	  $('.box8c').removeClass("box8c").addClass("box8");
	
	  $('.areapizza').attr("data-fatias","4");
	});