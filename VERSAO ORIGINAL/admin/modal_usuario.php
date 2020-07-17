<?php
session_start();
include('bd.php');
?>

<div class="box_285">
  <div class="box_286">Cadastro de usu&aacute;rios</div>
  
  
  <div class="box_287">
    <div class="box_289">Nome<input type="text" placeholder="Digite seu nome" name="textfield3" id="nomes" /></div>
    <div class="box_289">E-mail<input type="text" placeholder="Digite seu e-mail" name="textfield3" id="emails" /></div>
    <div class="box_289">Senha<input type="password" placeholder="******" name="textfield4" id="senha" /></div>
    <div class="box_289">Repita Senha<input type="password" placeholder="******" name="textfield5" id="csenha" /></div>
    <div class="box_288">Telefone<input type="text" placeholder="Digite seu telefone" name="textfield6" id="telefones" /></div>
    <div class="box_288">Celular<input type="text" placeholder="Digite seu celular" name="textfield7" id="celulars" /></div>
    <div class="box_288">CPF<input type="text" placeholder="Digite seu cpf" name="textfield8" id="cpf" /></div>
    <div class="box_289">Cidade<select name="cidade" id="cidades">
  <option value="">Escolha uma Cidade</option>
  <?php $cid=mysql_query("SELECT * FROM cidades"); while($cidade=mysql_fetch_assoc($cid)){ ?>
  <option value="<?php echo $cidade['cidade'] ?>"><?php echo $cidade['cidade'] ?></option>
  <?php } ?>
</select></div>

<div class="box_289">Bairro<select name="bairro" id="bairros">
  <option value="">Escolha seu Bairro</option>
</select></div>
    <div class="box_290">Endere&ccedil;o<input type="text" placeholder="Digite seu endere&ccedil;o" name="textfield10" id="enderecos" /></div>
    <div class="box_291">N&uacute;mero<input type="text" placeholder="Numero" name="textfield12" id="numeros" /></div>
    
<div class="box_292">Complemento<input type="text" placeholder="Complemento aqui" name="complemento" id="complementos" /></div>
  <div class="box_290">
    <div class="box_293" id="cadastrar">Enviar</div>
    <div class="box_294" id="erro_cadastro"></div>
  </div>
  </div>
</div>
