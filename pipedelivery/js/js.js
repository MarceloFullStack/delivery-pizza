function fechar(x){
     $('#'+x).fadeOut('');
     $("body").css("overflow", "auto");
   }

function abrir(x){
     $('#'+x).fadeIn('');
     $("body").css("overflow", "hidden");
}

function abrir2(x){
     $('#'+x).fadeIn('');
}

function menu(x) {
	if(document.getElementById(x).style.display === 'none') 
		 		$('#'+x).fadeIn('');
		else 
			$('#'+x).fadeOut('');
		
}

function formatar(mascara, documento){
  var i = documento.value.length;
  var n = documento.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)

  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
}

function vf(qs,qs2,qs3) {
 var campo = document.getElementById(qs);
 var txt   = document.getElementById(qs).value;
 var n  = txt.length;

  if(n < qs3){
    document.getElementById(qs).value = '';
    document.getElementById(qs2).textContent = 'Inválido'; 
    return false;
  } else {
    document.getElementById(qs2).textContent = ''; 
    return true;
  }
}

function mais(xd) {
  var x = document.getElementById(xd).value;
  document.getElementById(xd).value = parseInt(x)+1;
} 

function menos(xd) {
  var x = document.getElementById(xd).value;
  if(x >= 2) {
  document.getElementById(xd).value = parseInt(x)-1;
}
} 

function mudar(t) {
    var $custo2 = document.getElementById('price');
      $custo2.value = t;

}

function mudarv(t,t2) {
    var $custo2 = document.getElementById(t2);
      $custo2.value = t;

}

function selecionar(x1,x2) {

  $(document).ready(function() {
  var value = x1;

  $(x2).find('[value="' + value + '"]').attr('selected', true)
});

}

function xdec(x0,x1,x2) {
                        $(x1).val("...")
                $(x2).val("...")
        
        consulta = $(x0).val()
                
                $.getScript("http://republicavirtual.com.br/web_cep.php?cep="+consulta+"&formato=javascript", function(){

                        rua=unescape(resultadoCEP.logradouro)
                        bairro=unescape(resultadoCEP.bairro)
                         
                        $(x1).val('Rua '+rua)
                        $(x2).val(bairro)
                        $(x2).val(bairro).change()

        
                        });


    }

function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode == 13) return true;
    key = String.fromCharCode(whichCode); // Valor para o código da Chave
    if (strCheck.indexOf(key) == -1) return false; // Chave inválida
    len = objTextBox.value.length;
    for(i = 0; i < len; i++)
        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
    aux = '';
    for(; i < len; i++)
        if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) objTextBox.value = '';
    if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
    if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += SeparadorMilesimo;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
        }
        objTextBox.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
        objTextBox.value += aux2.charAt(i);
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
    }
    return false;
}