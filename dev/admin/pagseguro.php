<?php

class LightBoxPagSeguro {
	private $token    = 'A639D9BC406844F8AEF105D2BA6730D7';
	private $email    = 'messiasjgmm@hotmail.com';
	private $currency = "BRL";
	private $url      = "https://ws.pagseguro.uol.com.br/v2/checkout";
    public function __construct() {}
    public function go(){
		$data['token']            = $this->token;
		$data['email']            = $this->email;
		$data['currency']         = $this->currency;
		$data['itemId1']          = '1';
		$data['itemQuantity1']    = '1';
		$data['itemDescription1'] = ''.$_POST['plano'].'';
		$data['itemAmount1']      = ''.$_POST['valor'].'';
		$data['notificationURL'] = 'http://www.laforneriadelivery.com.br/paga_cota.php';

		$data = http_build_query($data);
		$curl = curl_init($this->url);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		$xml = curl_exec($curl);
		curl_close($curl);
		$xml= simplexml_load_string($xml);
		echo $xml->code;
    }
}
$obj = new LightBoxPagSeguro();
$obj->go();
?>