<?php
session_start();
if(!$_SESSION[l0g1n]) {
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'entrar/">';
exit();
}

$v2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."'");
$v = $v2->fetch_assoc();

    $_SESSION[id] = $v[id];
    $_SESSION[nome] = $v[nome];
    $_SESSION[tel] = $v[tel];
    $_SESSION[cpf] = $v[cpf];
    $_SESSION[bairro] = $v[bairro];
    $_SESSION[email] = $v[email];
    $_SESSION[cep] = $v[cep];
    $_SESSION[nm] = $v[nm];
    $_SESSION[end] = $v[end];
    $_SESSION[foto] = $v[foto];

if($_POST[editar]) {
if(post(senha) != post(csenha)) {
echo "<body onload=abrir('cadastro_erro2')></body>";

} else {
logs("Modificou sua senha.");

if($c4_dados == 1) {
if($c4_dados2 == 1) { $axdm = 1; } else { $axdm = 0; }
email($_SESSION[l0g1n],"".$_SESSION[nome].", sua senha foi modificada",'Olá '.$_SESSION[nome].',<br>sua senha foi modificada, caso não tenha sido modificada por você, entre em contato conosco ou modifique-a novamente.',$cfg[empresa],$cfg[email],$axdm);
}

if(empty($_POST[senha])) {
session_start();
$mysqli->query("update ".$cfg_sv[prefixo]."usuarios set tel='".post(tel)."',cpf='".post(cpf)."',nome='".post(nome)."' where email='".$_SESSION[l0g1n]."'");
} else {
$mysqli->query("update ".$cfg_sv[prefixo]."usuarios set senha='".md5(post(senha))."',tel='".post(tel)."',cpf='".post(cpf)."' where email='".$_SESSION[l0g1n]."'");
}
echo "<body onload=abrir('mod_senha')></body>";
}
}

if($_POST[editar3]) {
    $filename = $_FILES['fileUpload']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'css/fotos/'.$_SESSION[id].'.'.$ext);
$mysqli->query("update ".$cfg_sv[prefixo]."usuarios set foto='".$_SESSION[id].".".$ext."' where email='".$_SESSION[l0g1n]."'");

echo "<body onload=abrir('cadastro_foto')></body>";
}
?>

<div id="conteudo">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header">
                                <h3 class="title">Meus dados > Imagem</h3><hr>
                            </div>
                            <div class="content">
                                    <div class="row">
                                        <div class="col-md-100">
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                            <div class="image-upload">
    <label for="file-input">

        <?php if( strstr($_SESSION[foto],"http")){ $nft = $_SESSION[foto]; } else { $nft = raiz.'css/fotos/'.$_SESSION[foto]; } ?>

        <center><img src="<?=$nft;?>" width="420px" height="80px" class="img-circle" alt="Alterar imagem" title="Alterar imagem" /></center><br>
        * clique sobre a imagem para alterar
    </label>

    <input id="file-input" type="file" name="fileUpload" size="20" required>
</div>
</div>
</div><div class="clearfix"></div>
                                
                                    <input type="submit" name="editar3" value="Modificar" class="btn btn-info btn-fill pull-right">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
</div></div> </div></div>



<div id="conteudo">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header">
                                <h3 class="title">Meus dados > Informações pessoais</h3><hr>
                            </div>
                            <div class="content">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" name="nome" value="<?=$_SESSION[nome];?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Telefone <span id="telq" style="color:red;"></span></label>
                                                <input type="tel" maxlength="14" OnKeyPress="formatar('## # ####-####', this)" id="telx" onBlur="return vf('telx','telq','14')" placeholder="Seu telefone para contato" class="form-control" name="tel" value="<?=$_SESSION[tel];?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>CPF <span id="cpfq" style="color:red;"></span></label>
                                                <input type="text" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" id="cpfx" onBlur="return vf('cpfx','cpfq','14')" placeholder="Número do seu documento" class="form-control" name="cpf" value="<?=$_SESSION[cpf];?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="<?=$_SESSION[email];?>" required disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nova senha</label>
                                                <input type="password" class="form-control" name="senha">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Confirmação de nova senha</label>
                                                <input type="password" class="form-control" name="csenha">
                                            </div>
                                        </div>
                                    </div>
                                
                                     <div class="clearfix"></div>
                                    <input type="submit" name="editar" value="Modificar" class="btn btn-info btn-fill pull-right">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
</div></div> </div>




<?php

if($_POST[editar2]) {
session_start();
logs("Modificou seu endereço.");

if($c4_dados == 1) {
if($c4_dados2 == 1) { $axdm = 1; } else { $axdm = 0; }
email($_SESSION[l0g1n],"".$_SESSION[nome].", seu endereço foi modificado",'Olá '.$_SESSION[nome].',<br>seu endereço de entrega foi modificado, segue o novo endereço:<br><br>
<b>Endereço:</b> '.post(end).' '.post(nm).', '.post(cep).'<br>
<b>Bairro:</b> '.post(bairro).'<br>
<br> caso não tenha sido modificado por você, entre em contato conosco ou modifique-o novamente.',$cfg[empresa],$cfg[email],$axdm);
}

$mysqli->query("update ".$cfg_sv[prefixo]."usuarios set cep='".post(cep)."',nm='".post(nm)."',end='".post(end)."',bairro='".post(bairro)."' where email='".$_SESSION[l0g1n]."'");
if($_GET[id] === fechar) {
$_SESSION['gr_valor'] = "";
$_SESSION['gr_valor2'] = "";
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'carrinho/">';
} elseif($_GET[id] === carrinho) {
$_SESSION['gr_valor'] = "";
$_SESSION['gr_valor2'] = "";
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'carrinho/">';
} else {
echo "<body onload=abrir('mod_end')></body>";
$_SESSION['gr_valor'] = "";
$_SESSION['gr_valor2'] = "";
}
}
?>

<div id="conteudo">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header">
                                <h3 class="title" id="endereco">Meus dados > Endereço de entregas</h3><hr>
                            </div>
                            <div class="content">
                                <form action="" method="post">
                                    <div class="row">
                                        

                                        <div class="col-md-2">
                                            <div class="form-group">
                            <label>CEP <span id="cepw" style="color:red;"></span></label> 
                            <?php if($cfg[vcep] == 1) { ?>
                            <input type="text" name="cep" id="cepq" onblur="xdec('#cepq','#endx','#bairrox'); return vf('cepq','cepw','9');" OnKeyPress="formatar('#####-###', this)" maxlength="9" placeholder="Seu cep" class="form-control" value="<?=$_SESSION[cep];?>" required><br>
                            <?php } else { ?>
                            <input type="text" name="cep" id="cepq" OnKeyPress="formatar('#####-###', this)" maxlength="9" placeholder="Seu cep" onBlur="return vf('cepq','cepw','9')" class="form-control" value="<?=$_SESSION[cep];?>" required><br>
                            <?php } ?>
                                            </div>
                                        </div>

                                           <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Bairro</label> <a href="javascript: abrir('entregas');"><span class="glyphicon glyphicon-map-marker"></span> consultar regiões de entrega</a>
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
                                                 </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Endereço</label>
                                                <input type="text" id="endx" placeholder="Seu endereço com número" class="form-control" name="end" value="<?=$_SESSION[end];?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Complemento (Opcional)</label>
                                                <input type="text" placeholder="lote 25, bloco b, ap 40..." class="form-control" name="nm" value="<?=$_SESSION[nm];?>">
                                            </div>
                                        </div>
                                
                                     <div class="clearfix"></div>
                                    <input type="submit" name="editar2" value="Modificar" class="btn btn-info btn-fill pull-right">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>