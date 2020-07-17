<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
include('bd.php');
$email    = mysql_real_escape_string($_POST['email_l']);
$senha    = $_POST['senha_l'];

	  $logface  = mysql_query("SELECT * FROM admin where email='".$email."' and senha='".md5($senha)."'");
	  $logarface = mysql_fetch_assoc($logface);
	  
	  if (mysql_num_rows($logface) == 0) {
	  
	  echo "<script>alert('E-mail ou senha inválidos ou usuário não cadastrado');</script>";
	  
	  } else {
	  
	  
	    if($dias <=0){
		
		echo "<script>window.location='/admin/login.php?status=inativo'</script>";
		
		}else{
	  
	  
	  
	    $mem_nome 	  = $logarface["nome"];
		$id 	  	  = $logarface["id"];
		
		$_SESSION['bt_admin_id']          = $id;
		$_SESSION['bt_admin_nome']        = $mem_nome;
		$_SESSION['bt_admin_login']       = 256841;
		
	
		echo "<script>window.location='/admin/'</script>";
}
	  
	  }

?>
</body>
</html>