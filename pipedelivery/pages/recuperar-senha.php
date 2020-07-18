<div id="conteudo"><?php
if($_POST[enviar]) {
session_start();
$_SESSION[nova_senha] = rand(10000000,99999999);

    $afez2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".post(email)."' and cpf='".post(cpf)."'");
    $afez = $afez2->num_rows;
if($afez >= 1) {
logs("Recuperou a senha de ".$_POST[email]."");
$mysqli->query("update ".$cfg_sv[prefixo]."usuarios set senha='".md5($_SESSION[nova_senha])."' where email='".post(email)."' and and cpf='".post(cpf)."' or tel='".post(email)."' and and cpf='".post(cpf)."'");

$pllt = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".post(email)."'");
$pllt2 = $pllt->fetch_assoc();

if($c4_senha == 1) {
if($c4_senha2 == 1) { $axdm = 1; } else { $axdm = 0; }
email($_POST[email],"".$pllt2[nome].", sua senha foi recuperada",'Olá '.$pllt2[nome].',<br> você pediu para que sua senha fosse redefinida,<br><br>
Nova senha gerada: <b>'.$_SESSION[nova_senha].'</b><br><br>não passe a senha para outras pessoas, entre em nosso site e troque-a.',$cfg[empresa],$cfg[email],$axdm);
}

    echo "<body onload=abrir('recuperar_suc')></body>";
} else {
    echo "<body onload=abrir('recuperar_erro')></body>";
}
}

if($_SESSION[l0g1n]) {
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'meus-pedidos/">';
}
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header">
                                <h3 class="title">Recuperar Senha</h3><hr>
                                <p class="category">Caso tenha perdido ou esquecido sua senha, insira seu email.</p>
                            </div>
                            <div class="content">
                                <form method="post" action="">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>CPF <span id="cpf2" style="color:red;"></span></label>
                                                <input type="text" id="cpf" placeholder="CPF sem pontos" onblur="return verificarCPF(this.value,'cpf','cpf2')" maxlength="11" class="form-control" name="cpf" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email ou telefone</label>
                                                <input type="text" class="form-control" name="email" placeholder="Informe algum de seus dados" required>
                                            </div>
                                        </div>
                                        </div>

                                    <input type="submit" name="enviar" value="Enviar" class="btn btn-info btn-fill pull-right">
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
