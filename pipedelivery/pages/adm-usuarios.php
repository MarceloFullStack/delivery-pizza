<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm!='0'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }
?>

<h3>Usuários <?php if(get(id3) != deletar) { echo get(id3); } ?> <a href="<?=raiz;?>adm/adm-usuarios/#cadastro"><input type="submit" name="criar" value="Cadastrar usuários" class="btn btn-default btn-fill pull-right"></a></h3>
<hr>
<form action="" method="post" class="form-inline">
    <label>Buscar usuário: </label>
    <input type="text" class="form-control" class="form-inline" name="buscarid" placeholder="Nome, telefone ou cpf">
    <input type="submit" value="Buscar" name="buscar" class="btn btn-default">
</form>
<hr>

<?php
if($_POST[buscar]) {
logs("Pesquisou pelo usuário ".get(buscarid).".");
echo '<script>location.href="'.raiz.'adm/adm-usuarios/1/'.$_POST[buscarid].'";</script>';    
}

if(get(id3) == deletar) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    if($lqs[foto] != "sem-foto.jpg") {
    @unlink('css/fotos/'.$lqs[foto].'');
    }
    logs("Deletou o usuário ".$lqs[nome].".");
    $mysqli->query("delete from ".$cfg_sv[prefixo]."usuarios where id='".get(id4)."'");
    $mysqli->query("delete from ".$cfg_sv[prefixo]."pedidos where email='".$lqs[email]."'");
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-usuarios/'.get(id2).'/">';
} else {
if($_GET[id3]) {
$busca = "select * from ".$cfg_sv[prefixo]."usuarios where nome like '%".get(id3)."%' or tel like '%".get(id3)."%' or cpf like '%".get(id3)."%' order by id desc";   
$busca2 = $mysqli -> query ("select * from ".$cfg_sv[prefixo]."usuarios where nome like '%".get(id3)."%' or tel like '%".get(id3)."%' order by id desc");   
} else {
$busca = "select * from ".$cfg_sv[prefixo]."usuarios order by id desc";
$busca2 = $mysqli -> query ("select * from ".$cfg_sv[prefixo]."usuarios order by id desc");
}}

$row_tickets = $busca2->num_rows;
if($row_tickets == 0) {
echo '<div class="alert alert-danger" role="alert"><b>Erro!</b> nenhum usuário encontrado, tente novamente mais tarde.</div>';
} else {
    echo '                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Foto</th>
                                        <th>Nome</th>
                                        <th>Tipo</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>#</th>
                                    </thead>

                                    <tbody>';
}

$total_reg = 10; 

$pagina=get('id2'); if (!$pagina) { $pc = "1"; } else { $pc = $pagina; } 
$inicio = $pc - 1;
$inicio = $inicio * $total_reg;

$limite = $mysqli->query("$busca LIMIT $inicio,$total_reg");
$todos = $mysqli->query("$busca");
$tr = $todos->num_rows; 
$tp = $tr / $total_reg;
if($_GET[id2] == "") { $_GET[id2] = 1; }


while ($e = $limite->fetch_assoc()) {
if( strstr($e[foto],"http")){ $nft = $e[foto]; } else { $nft = raiz.'css/fotos/'.$e[foto]; }
switch($e[adm]) {
    case 0: $usr = 'Cliente';
    break;
    case -1: $usr = 'Funcionário';
    break;
    case 1: $usr = 'Administrador';
    break;
}
echo "<tr><form action='' method='post'><input type='hidden' name='id' value='$e[id]'>
                                            <td>$e[id]</td>
                                            <td><a href='".raiz."adm/adm-perfil/".$e[id]."/'><img src='$nft' class='img-circle' width='60px' height='60px'></a></td>
                                            <td><a href='".raiz."adm/adm-perfil/".$e[id]."/'>$e[nome]</a> <br><font style='font-size:10;color:#999;'>último acesso: $e[ultimo_login]</font></td>
                                            <td>$usr</td>
                                            <td>$e[email]</td>
                                            <td>$e[tel]</td>
                                            <td><a href='".raiz."adm/adm-usuarios-editar/$e[id]'><button type='button' rel='tooltip' title='Editar' class='btn btn-info btn-simple btn-xs'>
                                                        <i class='fa fa-edit'></i>
                                                    </button></a>

                                            <a href='".raiz."adm/adm-usuarios/".get(id2)."/deletar/$e[id]'><button type='button' rel='tooltip' title='Deletar' class='btn btn-danger btn-simple btn-xs'>
                                                        <i class='fa fa-times'></i>
                                                    </button></td></a></td>
</form></tr>";
}
echo '</table>';

if($_POST[goadm]) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where id='".post(id)."'");
    $lqs = $lq->fetch_assoc();
    logs("Tornou o ".$lqs[nome]." um administrador.");
    $qlk = $mysqli->query("update ".$cfg_sv[prefixo]."usuarios set adm='1' where id='".$_POST[id]."'");
    echo '<script>location.href="'.raiz.'adm/adm-usuarios/'.$_GET[id2].'";</script>';
}

if($_POST[gousu]) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where id='".post(id)."'");
    $lqs = $lq->fetch_assoc();
    logs("Tornou o ".$lqs[nome]." um usuário.");
    $qlk = $mysqli->query("update ".$cfg_sv[prefixo]."usuarios set adm='0' where id='".$_POST[id]."'");
    echo '<script>location.href="'.raiz.'adm/adm-usuarios/'.$_GET[id2].'";</script>';
}

$anterior = $pc -1;
$proximo = $pc +1;

echo '<hr>';

if ($pc<$tp) {
echo "<a href='".raiz."adm/adm-usuarios/$proximo/'> <input type='submit' value='Próxima ($proximo)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}

echo "Página ".get(id2)."";

if ($pc>1) {
echo " <a href='".raiz."adm/adm-usuarios/$anterior/'> <input type='submit' value='Anterior ($anterior)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}
?>

<?php
if($_POST[add]) {
    
if($c4_cadastro == 1) {
if($c4_cadastro2 == 1) { $axdm = 1; } else { $axdm = 0; }
email($_POST[email],"Conta criada com sucesso!",'Olá '.post(nome).',<br>seja bem-vindo ao nosso site, obrigado por criar sua conta e não esqueça de fazer o seu pedido, você precisa também adicionar o seu telefone e CPF a sua conta. <br><br><b>Lembrete de senha:</b> '.post(senha).' ',$cfg[empresa],$cfg[email],$axdm);
}

    
    logs("Adicionou o usuário ".$_POST[nome].".");
$mysqli->query("insert into ".$cfg_sv[prefixo]."usuarios (nome,email,senha) values ('".post(nome)."','".post(email)."','".md5(post(senha))."')");
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-usuarios/">';
}
?>
                           <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header" id="cadastro">
                                <h3>Adicionar usuário</h3><hr>
                                <p class="category">A senha será enviada também por email.</p>
                            </div>
                            <div class="content">
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" name="nome" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" required>
                                     </div> 
                                            </div>
                            
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Senha</label>
                                                <input type="password" class="form-control" name="senha" required>
                                     </div> 
                                            </div>
                                            </div>
                                        </div>

                                    <input type="submit" name="add" value="Adicionar" class="btn btn-info btn-fill pull-right">
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>