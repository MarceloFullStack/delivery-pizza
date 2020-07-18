<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

logs("Acessou aos relatórios de pedidos.");
?>

<div id="imprimir">
       <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h3>Relatórios > Pedidos <button class="btn btn-primary" onclick="window.print();" title="Imprimir"><span class="glyphicon glyphicon-print"></span></button></h3><hr>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Pedidos de hoje (<?=date('d/m');?>)</th>
                                        <th>Pedidos de ontem (<?=date('d/m', strtotime("-1 day"));?>)</th>
                                        <th>Este mês (<?=date('m', strtotime("+0 months"));?>)</th>
                                        <th>Mês passado (<?=date('m', strtotime("-1 months"));?>)</th>
                                        <th>Este ano (<?=date('Y', strtotime("+0 years"));?>)</th>
                                        <th>Ano passado (<?=date('Y', strtotime("-1 years"));?>)</th>
                                        <th>Total</th>
                                    </thead>

                                    <tbody>
       <tr><td>
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d')."' and status='Processando'");
$exibir = $sql->num_rows;
echo '<span class="label label-info" title="Total">'.$exibir.'</span>';
?> 
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d')."' and status='Entregue'");
$exibir = $sql->num_rows;
echo '<span class="label label-success" title="Entregue">'.$exibir.'</span>';
?> 
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d')."' and status='Cancelado'");
$exibir = $sql->num_rows;
echo '<span class="label label-danger" title="Cancelado">'.$exibir.'</span>';
?>
</td>
<td>
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("-1 days"))."' and status='Processando'");
$exibir = $sql->num_rows;
echo '<span class="label label-info" title="Total">'.$exibir.'</span>';
?> 
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("-1 days"))."' and status='Entregue'");
$exibir = $sql->num_rows;
echo '<span class="label label-success" title="Entregue">'.$exibir.'</span>';
?> 
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("-1 days"))."' and status='Cancelado'");
$exibir = $sql->num_rows;
echo '<span class="label label-danger" title="Cancelado">'.$exibir.'</span>';
?>
</td>
<td>
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("+0 months"))."' and status='Processando'");
$exibir = $sql->num_rows;
echo '<span class="label label-info" title="Total">'.$exibir.'</span>';
?> 
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("+0 months"))."' and status='Entregue'");
$exibir = $sql->num_rows;
echo '<span class="label label-success" title="Entregue">'.$exibir.'</span>';
?> 
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("+0 months"))."' and status='Cancelado'");
$exibir = $sql->num_rows;
echo '<span class="label label-danger" title="Cancelado">'.$exibir.'</span>';
?>
</td>
<td>
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("-1 months"))."' and status='Processando'");
$exibir = $sql->num_rows;
echo '<span class="label label-info" title="Total">'.$exibir.'</span>';
?> 
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("-1 months"))."' and status='Entregue'");
$exibir = $sql->num_rows;
echo '<span class="label label-success" title="Entregue">'.$exibir.'</span>';
?> 
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("-1 months"))."' and status='Cancelado'");
$exibir = $sql->num_rows;
echo '<span class="label label-danger" title="Cancelado">'.$exibir.'</span>';
?>
</td>
<td>
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("+0 years"))."' and status='Processando'");
$exibir = $sql->num_rows;
echo '<span class="label label-info" title="Total">'.$exibir.'</span>';
?> 
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("+0 years"))."' and status='Entregue'");
$exibir = $sql->num_rows;
echo '<span class="label label-success" title="Entregue">'.$exibir.'</span>';
?> 
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("+0 years"))."' and status='Cancelado'");
$exibir = $sql->num_rows;
echo '<span class="label label-danger" title="Cancelado">'.$exibir.'</span>';
?>
</td>
<td>
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("-1 years"))."' and status='Processando'");
$exibir = $sql->num_rows;
echo '<span class="label label-info" title="Total">'.$exibir.'</span>';
?> 
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("-1 years"))."' and status='Entregue'");
$exibir = $sql->num_rows;
echo '<span class="label label-success" title="Entregue">'.$exibir.'</span>';
?> 
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("-1 years"))."' and status='Cancelado'");
$exibir = $sql->num_rows;
echo '<span class="label label-danger" title="Cancelado">'.$exibir.'</span>';
?>
</td>
<td>
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos");
$exibir = $sql->num_rows;
echo '<span class="label label-default" title="Total">'.$exibir.' pedidos</span>';
?> 
</td>
       </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

<span class="label label-info" title="Faturamento">.</span> pedidos pendentes<br>
<span class="label label-success" title="Faturamento">.</span> pedidos entregues<br>
<span class="label label-danger" title="Faturamento">.</span> pedidos cancelados<br>


    </div>