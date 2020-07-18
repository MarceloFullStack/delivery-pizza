<?php
if($_SESSION[l0g1n]) {
if($_GET[id] == fechar or $_GET[id2] === fechar or $_GET[page] === "fechar" or $_GET[page] === "carrinho") {
$logado = 1;
include("pages/carrinho.php");
} else {
$logado = 1;
$_GET[id] = 1;
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'meus-pedidos/">';
}
} else {

if($_POST[entrar] || is_numeric(get(id))) {

if(is_numeric($_GET[id]) or is_numeric($_GET[id2])) {
$v2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where uid='".get(id)."'");
} else {
$v2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".post(email)."' and senha='".md5(post(senha))."' or tel='".post(email)."' and senha='".md5(post(senha))."' or cpf='".post(email)."' and senha='".md5(post(senha))."'");  
}
$v = $v2->fetch_assoc();

if($v2->num_rows > 0) {
    session_start();
    $_SESSION[l0g1n] = $v[email];
    $_SESSION[n0m3] = $v[nome];
    $mysqli->query("update ".$cfg_sv[prefixo]."usuarios set ultimo_login='".date('Y-m-d')."' where email='".$v[email]."'");
    echo "<body onload=\"notify('Entrando...','Pronto, você está logado.')\"></body>";

if($_GET[id] == fechar or $_GET[id2] === fechar or $_GET[page] === "fechar" or $_GET[page] === "carrinho") {
$logado = 1;
include("pages/carrinho.php");
} else {
$_GET[id] = 1;
$logado = 1;
include("pages/meus-pedidos.php");
}

}   
else {
    echo "<body onload=abrir('login_erro')></body>";
    logs("Errou a senha de ".post(email)."");
}
}
?>

<?php
$v2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."'");
$v = $v2->fetch_assoc();

if($_POST[criar]) {
    $_SESSION[nome] = post(nome);
    $_SESSION[tel] = post(tel);
    $_SESSION[email] = post(email);
    $_SESSION[bairro] = post(bairro);
    $_SESSION[cpf] = post(cpf);
    $_SESSION[cep] = post(cep);
    $_SESSION[nm] = post(nm);
    $_SESSION[numero] = post(numero);
    $_SESSION[end] = post(end);

$afez2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".post(email)."' or cpf='".post(cpf)."' or tel='".post(tel)."'");
$afez = $afez2->num_rows;

if($afez >= 1) {
echo "<body onload=abrir('cadastro_erro')></body>";

} elseif(post(senha) != post(csenha)) {
echo "<body onload=abrir('cadastro_erro2')></body>";

} else {

if(!$v[adm] == 1) {
session_start();
$_SESSION[l0g1n] = post(email);
$_SESSION[n0m3] = post(nome);
logs("Criou sua nova conta.");

echo "<body onload=\"notify('Criando...','Pronto, sua conta foi criada com sucesso.')\"></body>";

if($c4_cadastro == 1) {
if($c4_cadastro2 == 1) { $axdm = 1; } else { $axdm = 0; }
email($_POST[email],"Conta criada com sucesso!",'Olá '.post(nome).',<br>seja bem-vindo ao nosso site, obrigado por criar sua conta e não esqueça de fazer o seu pedido.',$cfg[empresa],$cfg[email],$axdm);
}
}
   
$mysqli->query("insert into ".$cfg_sv[prefixo]."usuarios (email,nome,cpf,senha,tel,cep,nm,ultimo_login,end,bairro,adm) values 
    ('".post(email)."','".post(nome)."','".post(cpf)."','".md5(post(senha))."','".post(tel)."','".post(cep)."','".post(nm)."','".date('Y-m-d')."','".post(end)."' '".post(numero)."', '".post(bairro)."', '".post(adm)."')");

if($_GET[id] == fechar or $_GET[id2] === fechar or $_GET[page] === "fechar" or $_GET[page] === "carrinho") {
$logado = 1;
include("pages/carrinho.php");
} else {
$_GET[id] = 1;
include("pages/meus-pedidos.php");
}

}
}
?>

<?php if(empty($logado)) {?>
<div id="conteudo">

<center>
<h3>Entre através do facebook <a href="<?=$fblink;?>"><img src="<?=raiz;?>css/fblogin-btn.png" style="margin:1%;" alt="Entre com sua conta do facebook" title="Entre com sua conta do facebook"></a></h1>
Entre com sua rede social em apenas um clique e economize seu tempo! =)<hr>
</center>

<form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-6" style="padding-right:5%;">

                                            <h3 class="title">Entre em sua conta</h3>
                                            Você já tem sua conta? então entre agora mesmo.<br><br>

                                            <div class="form-group">
                                                <label>Email, telefone ou CPF</label>
                                                <input type="text" class="form-control" placeholder="Informe algum de seus dados" name="email" required><br>

                                                <label>Senha</label>
                                                <input type="password" class="form-control" placeholder="Sua senha" name="senha" required><br>
                                                
                                                <input type="checkbox"> Lembrar-me
                                                <a href="<?=raiz;?>recuperar-senha/" class="pull-right">Recuperar senha</a><br><br>

                                          <input type="submit" name="entrar" value="Entrar" class="btn btn-info btn-fill pull-right">
</form>

                                <div style="clear:both;"></div>

                                            </div>
                                        </div>

<div class="col-md-6" style="border-left:thin solid #EEE;padding-left:5%;">
<h3 class="title">Crie uma conta!</h3>
                                            Cadastre-se e começe a realizar seus pedidos.<br><br>                                     


<form action="" method="post">

                            <label>Nome Completo</label>
                            <input type="text" placeholder="Seu nome completo" class="form-control" name="nome" value="<?=$_SESSION[nome];?>" required><br>

                            <label>Telefone <span id="telq" style="color:red;"></span></label>
                            <input type="tel" maxlength="14" OnKeyPress="formatar('## # ####-####', this)" id="telx" onBlur="return vf('telx','telq','14')" placeholder="Seu telefone de contato" class="form-control" name="tel" value="<?=$_SESSION[tel];?>" required><br>

                            <label>Email</label>
                            <input type="email" placeholder="Seu email" class="form-control" name="email" value="<?=$_SESSION[email];?>" required><br>

                            <label>CPF <span id="cpfq" style="color:red;"></span></label>
                            <input type="text" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" id="cpfx" onBlur="return vf('cpfx','cpfq','14')" placeholder="Número do seu documento" class="form-control" name="cpf" value="<?=$_SESSION[cpf];?>" required><br>

                            <label>CEP <span id="cepw" style="color:red;"></span></label> 
                            <?php if($cfg[vcep] == 1) { ?>
                            <input type="text" name="cep" id="cepq" onblur="xdec('#cepq','#endx','#bairrox'); return vf('cepq','cepw','9');" OnKeyPress="formatar('#####-###', this)" maxlength="9" placeholder="Seu cep" class="form-control" value="<?=$_SESSION[cep];?>" required><br>
                            <?php } else { ?>
                            <input type="text" name="cep" id="cepq" OnKeyPress="formatar('#####-###', this)" maxlength="9" placeholder="Seu cep" onBlur="return vf('cepq','cepw','9')" class="form-control" value="<?=$_SESSION[cep];?>" required><br>
                            <?php } ?>

                            <label>Bairro</label> <a href="javascript: abrir('entregas');"><span class="glyphicon glyphicon-map-marker"></span> consultar regiões de entrega</a>
                            <select name="bairro" id="bairrox" class="form-control" required>
                            <option value="" disabled selected>Selecione o seu bairro</option>
<?php
$limite = $mysqli->query("select * from ".$cfg_sv[prefixo]."bairros order by bairro asc");
if(!empty($_SESSION[bairro])) {
    echo '<option value="'.$_SESSION[bairro].'" selected>'.$_SESSION[bairro].'</option>';
}
while ($e = $limite->fetch_assoc()) {
echo "<option value='$e[bairro]''>$e[bairro]</option>";
}
?>
                            </select><br>

                            <label>Endereço</label>
                            <input type="text" placeholder="Seu endereço com número" class="form-control" id="endx" name="end" value="<?=$_SESSION[end];?>" required><br>

                            <label>Número</label>
                            <input type="text" placeholder="Número da residência..." class="form-control" name="numero" value="<?=$_SESSION[numero];?>" required><br>

                            <label>Complemento (Opcional)</label>
                            <input type="text" placeholder="lote 25, bloco b, ap 40..." class="form-control" name="nm" value="<?=$_SESSION[nm];?>"><br>

                            <label>Senha</label>
                            <input type="password" class="form-control" name="senha" required><br>

                            <label>Confirmação de Senha</label>
                            <input type="password" class="form-control" name="csenha" required><br>

                            <div <?php if(!$v[adm] == 1) { echo 'style="display:none;"'; } ?>>     
                            <label>Tipo de conta</label>                          
                            <select name="adm" class="form-control">
                            <option value="" disabled selected>Selecione o tipo de conta</option>
                            <option value="0">Cliente</option>
                            <option value="-1">Funcionário</option>
                            <option value="1">Administrador</option>
                            </select><br>
                            </div>
                            
                            <input type="checkbox" checked> Li e concordo com os termos.
                            <input type="submit" name="criar" value="Cadastrar" class="btn btn-info btn-fill pull-right"><br>
</form>




                            
</div>


</div>
<?php } } ?>