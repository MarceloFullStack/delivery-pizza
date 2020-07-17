<?php
include('bd.php');
header("access-control-allow-origin: https://pagseguro.uol.com.br");
?>


<?php
if($_POST['notificationCode']){

if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){
    //Todo resto do código iremos inserir aqui.

    $email = 'eduardolalmeida70@hotmail.com';
    $token = '30FD2694E93C4BFE8B0EC39A10B0C829';

    $url = 'https://ws.pagseguro.uol.com.br/v2/transactions/notifications/' . $_POST['notificationCode'] . '?email=' . $email . '&token=' . $token;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $transaction= curl_exec($curl);
    curl_close($curl);

    if($transaction == 'Unauthorized'){
        //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção

        exit;//Mantenha essa linha
    }
    $transaction = simplexml_load_string($transaction);
	
	$transactionStatus  = $transaction->status;
	$transactionCode    = $transaction->code;
	$transactionValor   = $transaction->grossAmount;
	$transactionTitulo  = $transaction -> items -> item -> description;
	$transactionEmail   = $transaction -> sender -> email;
	
    if($transactionStatus == 1){
        $transactionStatus = 'Aguardando pagamento';
    } elseif($transactionStatus == 2){
        $transactionStatus = 'Em análise';
    } elseif($transactionStatus == 3){ // :)
        $transactionStatus = 'Paga';
    } elseif($transactionStatus == 4){ // :D
        $transactionStatus = 'Disponível';
    } elseif($transactionStatus == 5){
        $transactionStatus = 'Em disputa';
    } elseif($transactionStatus == 6){
        $transactionStatus = 'Devolvida';
    } elseif($transactionStatus == 7){
        $transactionStatus = 'Cancelada';
    }
}
if($transactionStatus=='Paga'){

$cota = explode('|', $transactionTitulo);

$update=mysql_query("UPDATE subcotas SET data='".date('d/m/Y')."', status_subcota='0', email_pag='".$transactionEmail."', token='".$transactionCode."' WHERE id_subcota='".$cota[1]."'");

}

}
?>    

