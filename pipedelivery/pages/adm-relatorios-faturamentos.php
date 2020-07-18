<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

logs("Acessou aos relatórios de faturamentos.");
?>

<div id="imprimir">
       <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h3>Relatórios > Faturamento <button class="btn btn-primary" onclick="window.print();" title="Imprimir"><span class="glyphicon glyphicon-print"></span></button></h3><hr>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                 <thead>
                                        <th>Faturamento de hoje (<?=date('d/m');?>)</th>
                                        <th>Faturamento de ontem (<?=date('d/m', strtotime("-1 day"));?>)</th>
                                        <th>Faturamento do mês (<?=date('m', strtotime("+0 months"));?>)</th>
                                        <th>Faturamento do mês passado (<?=date('m', strtotime("-1 months"));?>)</th>
                                        <th>Faturamento do ano (<?=date('Y', strtotime("+0 years"));?>)</th>
                                        <th>Faturamento do ano passado (<?=date('Y', strtotime("-1 years"));?>)</th>
                                        <th>Total</th>
                                    </thead>

                                    <tbody>
       <tr>
<td>
<?php
$sql = $mysqli->query("SELECT SUM(valor) from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d')."' and status='Entregue'");
$exibir = $sql->fetch_array();
echo '<span class="label label-success" title="Faturamento"> R$ '.number_format($exibir['SUM(valor)'],2,",",".").'</span>';
?> 
</td>
<td>
<?php
$sql = $mysqli->query("SELECT SUM(valor) from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("-1 days"))."' and status='Entregue'");
$exibir = $sql->fetch_array();
echo '<span class="label label-success" title="Faturamento"> R$ '.number_format($exibir['SUM(valor)'],2,",",".").'</span>';
?> 
</td>
<td>
<?php
$sql = $mysqli->query("SELECT SUM(valor) from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("+0 months"))."' and status='Entregue'");
$exibir = $sql->fetch_array();
echo '<span class="label label-success" title="Faturamento"> R$ '.number_format($exibir['SUM(valor)'],2,",",".").'</span>';
?> 
</td>
<td>
<?php
$sql = $mysqli->query("SELECT SUM(valor) from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("-1 months"))."' and status='Entregue'");
$exibir = $sql->fetch_array();
echo '<span class="label label-success" title="Faturamento"> R$ '.number_format($exibir['SUM(valor)'],2,",",".").'</span>';
?> 
</td>
<td>
<?php
$sql = $mysqli->query("SELECT SUM(valor) from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("+0 years"))."' and status='Entregue'");
$exibir = $sql->fetch_array();
echo '<span class="label label-success" title="Faturamento"> R$ '.number_format($exibir['SUM(valor)'],2,",",".").'</span>';
?> 
</td>
<td>
<?php
$sql = $mysqli->query("SELECT SUM(valor) from ".$cfg_sv[prefixo]."pedidos where data='".date('Y/m/d', strtotime("-1 years"))."' and status='Entregue'");
$exibir = $sql->fetch_array();
echo '<span class="label label-success" title="Faturamento"> R$ '.number_format($exibir['SUM(valor)'],2,",",".").'</span>';
?> 
</td>
<td>
<?php
$sql = $mysqli->query("SELECT SUM(valor) from ".$cfg_sv[prefixo]."pedidos where status='Entregue'");
$exibir = $sql->fetch_array();
echo '<span class="label label-default" title="Faturamento"> R$ '.number_format($exibir['SUM(valor)'],2,",",".").'</span>';
?> 
</td>
       </tr>
                                    </tbody>
                                </table>
* são considerados apenas os pedidos com o status de entregue.

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>