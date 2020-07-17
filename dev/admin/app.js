(function($) {
    "use strict";
    $.App = {
        init: function () {
            $.App.setActions();
        },
        setActions: function(){
            $('#pagamento').on('click', function(){
				var valor = $(this).attr('data-valor');
				var plano = $(this).attr('data-plano');
				$.post('pagseguro.php', {valor: valor, plano: plano}, function(data) {
                    $('#code').val(data);
                    $('#buy').submit();
					$.modal.close();
                });
            });
        },
        MyPagSeguroLightBox: function(obj){
            PagSeguroLightbox(
                {
                    code: obj.code.value
                },
                {
                    success : function(transactionCode) {

                           $.post('renova_plano.php', function(resposta) {																																																																																	
		                   window.location='/admin';		
		                   });

                },
                    abort : function() {
                        
                          $('.box210').html('Voce nao concluiu a sua compra');
                          setTimeout(function(){ $('.box210').slideUp(); }, 5000);
                }
            });
        }
    };
    $(document).ready(function() {
        $.App.init();
    });
})(jQuery);