(function($) {
    "use strict";
    $.App = {
        init: function () {
            $.App.setActions();
        },
        setActions: function(){

			$('body').on('click', '#pagar', function(){
																						  
				$.modal.close();
				
				$.post("pagseguro_valores.php", function(data) {
				var json          =  JSON.parse(data);
				var email         =  json.email;
				var tokem         =  json.tokem;
				var valor         =  json.valor;
					
				
				$.post('/pagseguro.php', {tokem: tokem, email: email, valor: valor}, function(data) {
                    $('#code').val(data);
                    $('#buy').submit();
					$.modal.close();
                });
				
				
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
		              var obs       = $("#obs_pedido").val();
						$.post('/envia_finalizar_online.php', {obs: obs, transactionCode: transactionCode}, function(resposta) {
						window.location='/acompanhar.php?id='+resposta;
						});
                },
                    abort : function() {
						
                }
            });
        }
    };
    $(document).ready(function() {
        $.App.init();
    });
})(jQuery);
