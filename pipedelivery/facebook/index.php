<?php
ini_set('allow_url_fopen',1);
ini_set('allow_url_include',1);

require 'facebook.php';
require '../config.php';
require '../pages/configuracao.php';
require '../pages/integracoes.php';

$fb = new Facebook(array(

 'appId'  => $config[App_ID],

 'secret' => $config[App_Secret],

 ));



if($_GET['code']) {

    $token_url = "https://graph.facebook.com/oauth/access_token?"

       . "client_id=".$config['App_ID']."&redirect_uri=" . urlencode($config['callback_url'])

       . "&client_secret=".$config['App_Secret']."&code=" . $_GET['code']; 


if (!ini_get('allow_url_fopen') == 1) {
     echo 'Função "file_get_contents" desativada, ative o url_allow_fopen na hospedam.<br>';
     exit();
}

$checkLogin = file_get_contents(stripslashes($token_url));
for ($i = 0; $i <= 31; ++$i) { 
    $checkLogin = str_replace(chr($i), "", $checkLogin); 
}
$checkLogin = str_replace(chr(127), "", $checkLogin);
if (0 === strpos(bin2hex($checkLogin), 'efbbbf')) {
   $checkLogin = substr($checkLogin, 3);
}

if (!$response = json_decode($checkLogin,true)) {
switch(json_last_error()) {
    case JSON_ERROR_DEPTH:
        echo 'Profundidade máxima da pilha excedida.<br>';
    break;
    case JSON_ERROR_CTRL_CHAR:
        echo 'Caracteres de controle inesperados encontrados.<br>';
    break;
    case JSON_ERROR_SYNTAX:
        echo 'Erro de sintaxe, JSON malformado.<br>';
    break;
    case JSON_ERROR_NONE:
    break;
}
      echo "Erro ao conectar com API do Facebook, contate o administrador.<br>";
      exit();
} 



     $graph_url = "https://graph.facebook.com/me?fields=id,name,email,picture&access_token=" 

       . $response['access_token'];

 

if (!$user = json_decode(file_get_contents($graph_url), true)) {

      echo "Erro ao obter dados do Facebook, contate o administrador.<br>";

      exit();

} 

     $content = $user;

      $q1 = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios WHERE email = '".$user['email']."'");
      if($q1->num_rows > 0){
        $q2 = $mysqli->query("update ".$cfg_sv[prefixo]."usuarios SET uid = '".$user['id']."', nome = '".$user['name']."', email = '".$user['email']."',
          foto = '".$user['picture']['data']['url']."', ultimo_login = '".date("Y-m-d")."' WHERE email = '".$user['email']."'");
      }else{
        $q3 = $mysqli->query("insert into ".$cfg_sv[prefixo]."usuarios SET uid = '".$user['id']."', nome = '".$user['name']."', email = '".$user['email']."',
          foto = '".$user['picture']['data']['url']."', ultimo_login = '".date("Y-m-d")."', senha='".md5(rand(10000000,99999999))."'");
      }

      @require_once '../pages/integracoes.php';

      if(!empty($cfg_i[fbid])) {
$params = array(
  "access_token" => $response['access_token'], 
  "message" => "Recomendo!!!",
  #"link" => "http://www.phplivre.com",
  #"picture" => "#",
  #"name" => "AutoPost com PHP",
  #"caption" => "www.phplivre.com",
  "place" => $cfg_i[fbid],
  #"description" => "Post automatico via php."
);
 
try {
  $ret = $fb->api('/'.$user['id'].'/feed', 'POST', $params);
} catch(Exception $e) {
  echo "FB CHECK-IN ERROR: ". $e->getMessage();
}   
      }
      
      
if($_GET[fechar]) {
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'entrar/fechar/'.$user['id'].'/">';
} else {
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'entrar/'.$user['id'].'/">';
}


} else {

echo '<meta http-equiv="refresh" content=0;url="'.raiz.'entrar/">';

}

?>

<br><br>
<img src="../css/ajax-loader.gif">