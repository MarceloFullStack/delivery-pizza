<?php
include('bd.php');
$ta=mysql_query("SELECT * FROM tamanho WHERE tamanho='".$_POST['tamanho']."'");
$tamanho=mysql_fetch_assoc($ta);
?>

<?php if($tamanho['quant_sabores'] =='1'){ ?>
<div class="box16" id="escolher_sabores">
    <div id="escolher"><span></span>
    <label>1 Sabor</label><small>Pizza com 1 sabor</small></div>
    <div class="box">
    <ul>
        <li data-tamanho="1 Sabor" data-fatias="Pizza com 1 sabor" id="1sabor">
        <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>1 Sabor</label><small>Pizza com 1 sabor</small>
        </li>
    </ul>
    </div>
</div>
<?php } ?>

<?php if($tamanho['quant_sabores'] =='2'){ ?>
<div class="box16" id="escolher_sabores">
    <div id="escolher"><span></span>
    <label>2 Sabores</label><small>Pizza com 2 sabores</small></div>
    <div class="box">
    <ul>
        <li data-tamanho="1 Sabor" data-fatias="Pizza com 1 sabor" id="1sabor">
        <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>1 Sabor</label><small>Pizza com 1 sabor</small>
        </li>
        <li data-tamanho="2 Sabores" data-fatias="Pizza com 2 sabores" id="2sabor">
        <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>2 Sabores</label><small>Pizza com 2 sabores</small>
        </li>
    </ul>
    </div>
</div>
<?php } ?>


<?php if($tamanho['quant_sabores'] =='3'){ ?>
<div class="box16" id="escolher_sabores">
    <div id="escolher"><span></span>
    <label>3 Sabores</label><small>Pizza com 3 sabores</small></div>
    <div class="box">
    <ul>
        <li data-tamanho="1 Sabor" data-fatias="Pizza com 1 sabor" id="1sabor">
        <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>1 Sabor</label><small>Pizza com 1 sabor</small>
        </li>
        <li data-tamanho="2 Sabores" data-fatias="Pizza com 2 sabores" id="2sabor">
        <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>2 Sabores</label><small>Pizza com 2 sabores</small>
        </li>
        <li data-tamanho="3 Sabores" data-fatias="Pizza com 3 sabores" id="3sabor">
        <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>3 Sabores</label><small>Pizza com 3 sabores</small>
        </li>
    </ul>
    </div>
</div>
<?php } ?>


<?php if($tamanho['quant_sabores'] =='4'){ ?>
<div class="box16" id="escolher_sabores">
    <div id="escolher"><span></span>
    <label>4 Sabores</label><small>Pizza com 4 sabores</small></div>
    <div class="box">
    <ul>
        <li data-tamanho="1 Sabor" data-fatias="Pizza com 1 sabor" id="1sabor">
        <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>1 Sabor</label><small>Pizza com 1 sabor</small>
        </li>
        <li data-tamanho="2 Sabores" data-fatias="Pizza com 2 sabores" id="2sabor">
        <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>2 Sabores</label><small>Pizza com 2 sabores</small>
        </li>
        <li data-tamanho="3 Sabores" data-fatias="Pizza com 3 sabores" id="3sabor">
        <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>3 Sabores</label><small>Pizza com 3 sabores</small>
        </li>
        <li data-tamanho="4 Sabores" data-fatias="Pizza com 4 sabores" id="4sabor">
        <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>4 Sabores</label><small>Pizza com 4 sabores</small>
        </li>
    </ul>
    </div>
</div>
<?php } ?>