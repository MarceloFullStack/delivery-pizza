// Um timer para receber o Timeout do efeito
var timer = 0;
 
// A função que vai detectar o viewport
function recheck() {
 // Distância do ponto de rolagem até o topo da página
 var window_top = $(this).scrollTop();
 
 // Altura do viewport
 var window_height = $(this).height();
 
 // Início do viewport
 var view_port_s = window_top;
 
 // Fim do viewport
 var view_port_e = window_top + window_height;
 
 // Se tiver um timer, anula o mesmo
 if ( timer ) {
 clearTimeout( timer );
 }
 
 // Detecta todos os elementos com a classe .fly
 $('.fly').each(function(){
 // O objeto
 var block = $(this);
 
 // A distância do objeto do topo da página
 var block_top = block.offset().top;
 
 // A altura do objeto
 var block_height = block.height();
 
 // Se estiver dentro do view port ou antes
 if ( block_top < view_port_e ) {
 timer = setTimeout(function(){
 block.addClass('show-block');
 },100);       
 } else {
 timer = setTimeout(function(){
 block.removeClass('show-block');
 },100);          
 }
 });
}
 
// Inicia o jQuery
$(function(){
 // Cria o efeito no scroll
 $(window).scroll(function(){
 recheck();
 });
 
 // Cria o efeito quando a janela é redimensionada
 $(window).resize(function(){
 recheck();   
 });
 
 Cria o efeito quando a página é carregada
 recheck();
});