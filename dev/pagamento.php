<?php
include('bd.php');
header("access-control-allow-origin: https://pagseguro.uol.com.br");
?>


<?php

$query = mysql_query("SELECT * FROM config");
$cresult=mysql_fetch_assoc($query);
	 
if($_POST['notificationCode']){

if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){
    //Todo resto do código iremos inserir aqui.

    $email = $cresult['pagseguro'];
    $token = $cresult['tokem'];

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
        $transactionStatus = 'Pago';
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

$update=mysql_query("UPDATE store_finalizado SET status_pagamento='".$transactionStatus."' WHERE pagseguro_code='".$transactionCode."'");



}
?>    

