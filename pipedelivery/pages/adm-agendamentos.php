<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

@include("pages/agendamentos.php");
?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header">
                                <h3>Agendamentos</h3><hr>
                                <p class="category">Você pode configurar as datas e horários para realizar as entregas.</p>
                            </div>
                            <div class="content">
                                <form method="post" action="">
                                    <div class="row">

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <form action="" method="post">
<label>Data 1</label>
<input type="text" class="form-control" placeholder="Exemplo: Segunda-Feira" name="data1" value="<?=$agdata1;?>">
                                      </div>
                                </div>

                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Horários</label>
                                                <select multiple name="data1_opcoes[]" class="form-control">
<option value="01:00" <? if(strpos($agdata1_horarios,'01:00') !== false) { echo 'selected'; } ?>>01:00</option>
<option value="02:00" <? if(strpos($agdata1_horarios,'02:00') !== false) { echo 'selected'; } ?>>02:00</option>
<option value="03:00" <? if(strpos($agdata1_horarios,'03:00') !== false) { echo 'selected'; } ?>>03:00</option>
<option value="04:00" <? if(strpos($agdata1_horarios,'04:00') !== false) { echo 'selected'; } ?>>04:00</option>
<option value="05:00" <? if(strpos($agdata1_horarios,'05:00') !== false) { echo 'selected'; } ?>>05:00</option>
<option value="06:00" <? if(strpos($agdata1_horarios,'06:00') !== false) { echo 'selected'; } ?>>06:00</option>
<option value="07:00" <? if(strpos($agdata1_horarios,'07:00') !== false) { echo 'selected'; } ?>>07:00</option>
<option value="08:00" <? if(strpos($agdata1_horarios,'08:00') !== false) { echo 'selected'; } ?>>08:00</option>
<option value="09:00" <? if(strpos($agdata1_horarios,'09:00') !== false) { echo 'selected'; } ?>>09:00</option>
<option value="10:00" <? if(strpos($agdata1_horarios,'10:00') !== false) { echo 'selected'; } ?>>10:00</option>
<option value="11:00" <? if(strpos($agdata1_horarios,'11:00') !== false) { echo 'selected'; } ?>>11:00</option>
<option value="12:00" <? if(strpos($agdata1_horarios,'12:00') !== false) { echo 'selected'; } ?>>12:00</option>
<option value="13:00" <? if(strpos($agdata1_horarios,'13:00') !== false) { echo 'selected'; } ?>>13:00</option>
<option value="14:00" <? if(strpos($agdata1_horarios,'14:00') !== false) { echo 'selected'; } ?>>14:00</option>
<option value="15:00" <? if(strpos($agdata1_horarios,'15:00') !== false) { echo 'selected'; } ?>>15:00</option>
<option value="16:00" <? if(strpos($agdata1_horarios,'16:00') !== false) { echo 'selected'; } ?>>16:00</option>
<option value="17:00" <? if(strpos($agdata1_horarios,'17:00') !== false) { echo 'selected'; } ?>>17:00</option>
<option value="18:00" <? if(strpos($agdata1_horarios,'18:00') !== false) { echo 'selected'; } ?>>18:00</option>
<option value="19:00" <? if(strpos($agdata1_horarios,'19:00') !== false) { echo 'selected'; } ?>>19:00</option>
<option value="20:00" <? if(strpos($agdata1_horarios,'20:00') !== false) { echo 'selected'; } ?>>20:00</option>
<option value="21:00" <? if(strpos($agdata1_horarios,'21:00') !== false) { echo 'selected'; } ?>>21:00</option>
<option value="22:00" <? if(strpos($agdata1_horarios,'22:00') !== false) { echo 'selected'; } ?>>22:00</option>
<option value="23:00" <? if(strpos($agdata1_horarios,'23:00') !== false) { echo 'selected'; } ?>>23:00</option>
<option value="00:00" <? if(strpos($agdata1_horarios,'00:00') !== false) { echo 'selected'; } ?>>00:00</option>
<option value="">Nenhum horário</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <form action="" method="post">
<label>Data 2</label>
<input type="text" class="form-control" placeholder="Exemplo: Terça-Feira" name="data2" value="<?=$agdata2;?>">
                                      </div>
                                </div>

                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Horários</label>
                                                <select multiple name="data2_opcoes[]" class="form-control">
<option value="01:00" <? if(strpos($agdata2_horarios,'01:00') !== false) { echo 'selected'; } ?>>01:00</option>
<option value="02:00" <? if(strpos($agdata2_horarios,'02:00') !== false) { echo 'selected'; } ?>>02:00</option>
<option value="03:00" <? if(strpos($agdata2_horarios,'03:00') !== false) { echo 'selected'; } ?>>03:00</option>
<option value="04:00" <? if(strpos($agdata2_horarios,'04:00') !== false) { echo 'selected'; } ?>>04:00</option>
<option value="05:00" <? if(strpos($agdata2_horarios,'05:00') !== false) { echo 'selected'; } ?>>05:00</option>
<option value="06:00" <? if(strpos($agdata2_horarios,'06:00') !== false) { echo 'selected'; } ?>>06:00</option>
<option value="07:00" <? if(strpos($agdata2_horarios,'07:00') !== false) { echo 'selected'; } ?>>07:00</option>
<option value="08:00" <? if(strpos($agdata2_horarios,'08:00') !== false) { echo 'selected'; } ?>>08:00</option>
<option value="09:00" <? if(strpos($agdata2_horarios,'09:00') !== false) { echo 'selected'; } ?>>09:00</option>
<option value="10:00" <? if(strpos($agdata2_horarios,'10:00') !== false) { echo 'selected'; } ?>>10:00</option>
<option value="11:00" <? if(strpos($agdata2_horarios,'11:00') !== false) { echo 'selected'; } ?>>11:00</option>
<option value="12:00" <? if(strpos($agdata2_horarios,'12:00') !== false) { echo 'selected'; } ?>>12:00</option>
<option value="13:00" <? if(strpos($agdata2_horarios,'13:00') !== false) { echo 'selected'; } ?>>13:00</option>
<option value="14:00" <? if(strpos($agdata2_horarios,'14:00') !== false) { echo 'selected'; } ?>>14:00</option>
<option value="15:00" <? if(strpos($agdata2_horarios,'15:00') !== false) { echo 'selected'; } ?>>15:00</option>
<option value="16:00" <? if(strpos($agdata2_horarios,'16:00') !== false) { echo 'selected'; } ?>>16:00</option>
<option value="17:00" <? if(strpos($agdata2_horarios,'17:00') !== false) { echo 'selected'; } ?>>17:00</option>
<option value="18:00" <? if(strpos($agdata2_horarios,'18:00') !== false) { echo 'selected'; } ?>>18:00</option>
<option value="19:00" <? if(strpos($agdata2_horarios,'19:00') !== false) { echo 'selected'; } ?>>19:00</option>
<option value="20:00" <? if(strpos($agdata2_horarios,'20:00') !== false) { echo 'selected'; } ?>>20:00</option>
<option value="21:00" <? if(strpos($agdata2_horarios,'21:00') !== false) { echo 'selected'; } ?>>21:00</option>
<option value="22:00" <? if(strpos($agdata2_horarios,'22:00') !== false) { echo 'selected'; } ?>>22:00</option>
<option value="23:00" <? if(strpos($agdata2_horarios,'23:00') !== false) { echo 'selected'; } ?>>23:00</option>
<option value="00:00" <? if(strpos($agdata2_horarios,'00:00') !== false) { echo 'selected'; } ?>>00:00</option>
<option value="">Nenhum horário</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <form action="" method="post">
<label>Data 3</label>
<input type="text" class="form-control" placeholder="Exemplo: Quarta-Feira" name="data3" value="<?=$agdata3;?>">
                                      </div>
                                </div>

                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Horários</label>
                                                <select multiple name="data3_opcoes[]" class="form-control">
<option value="01:00" <? if(strpos($agdata3_horarios,'01:00') !== false) { echo 'selected'; } ?>>01:00</option>
<option value="02:00" <? if(strpos($agdata3_horarios,'02:00') !== false) { echo 'selected'; } ?>>02:00</option>
<option value="03:00" <? if(strpos($agdata3_horarios,'03:00') !== false) { echo 'selected'; } ?>>03:00</option>
<option value="04:00" <? if(strpos($agdata3_horarios,'04:00') !== false) { echo 'selected'; } ?>>04:00</option>
<option value="05:00" <? if(strpos($agdata3_horarios,'05:00') !== false) { echo 'selected'; } ?>>05:00</option>
<option value="06:00" <? if(strpos($agdata3_horarios,'06:00') !== false) { echo 'selected'; } ?>>06:00</option>
<option value="07:00" <? if(strpos($agdata3_horarios,'07:00') !== false) { echo 'selected'; } ?>>07:00</option>
<option value="08:00" <? if(strpos($agdata3_horarios,'08:00') !== false) { echo 'selected'; } ?>>08:00</option>
<option value="09:00" <? if(strpos($agdata3_horarios,'09:00') !== false) { echo 'selected'; } ?>>09:00</option>
<option value="10:00" <? if(strpos($agdata3_horarios,'10:00') !== false) { echo 'selected'; } ?>>10:00</option>
<option value="11:00" <? if(strpos($agdata3_horarios,'11:00') !== false) { echo 'selected'; } ?>>11:00</option>
<option value="12:00" <? if(strpos($agdata3_horarios,'12:00') !== false) { echo 'selected'; } ?>>12:00</option>
<option value="13:00" <? if(strpos($agdata3_horarios,'13:00') !== false) { echo 'selected'; } ?>>13:00</option>
<option value="14:00" <? if(strpos($agdata3_horarios,'14:00') !== false) { echo 'selected'; } ?>>14:00</option>
<option value="15:00" <? if(strpos($agdata3_horarios,'15:00') !== false) { echo 'selected'; } ?>>15:00</option>
<option value="16:00" <? if(strpos($agdata3_horarios,'16:00') !== false) { echo 'selected'; } ?>>16:00</option>
<option value="17:00" <? if(strpos($agdata3_horarios,'17:00') !== false) { echo 'selected'; } ?>>17:00</option>
<option value="18:00" <? if(strpos($agdata3_horarios,'18:00') !== false) { echo 'selected'; } ?>>18:00</option>
<option value="19:00" <? if(strpos($agdata3_horarios,'19:00') !== false) { echo 'selected'; } ?>>19:00</option>
<option value="20:00" <? if(strpos($agdata3_horarios,'20:00') !== false) { echo 'selected'; } ?>>20:00</option>
<option value="21:00" <? if(strpos($agdata3_horarios,'21:00') !== false) { echo 'selected'; } ?>>21:00</option>
<option value="22:00" <? if(strpos($agdata3_horarios,'22:00') !== false) { echo 'selected'; } ?>>22:00</option>
<option value="23:00" <? if(strpos($agdata3_horarios,'23:00') !== false) { echo 'selected'; } ?>>23:00</option>
<option value="00:00" <? if(strpos($agdata3_horarios,'00:00') !== false) { echo 'selected'; } ?>>00:00</option>
<option value="">Nenhum horário</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <form action="" method="post">
<label>Data 4</label>
<input type="text" class="form-control" placeholder="Exemplo: Quinta-Feira" name="data4" value="<?=$agdata4;?>">
                                      </div>
                                </div>

                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Horários</label>
                                                <select multiple name="data4_opcoes[]" class="form-control">
<option value="01:00" <? if(strpos($agdata4_horarios,'01:00') !== false) { echo 'selected'; } ?>>01:00</option>
<option value="02:00" <? if(strpos($agdata4_horarios,'02:00') !== false) { echo 'selected'; } ?>>02:00</option>
<option value="03:00" <? if(strpos($agdata4_horarios,'03:00') !== false) { echo 'selected'; } ?>>03:00</option>
<option value="04:00" <? if(strpos($agdata4_horarios,'04:00') !== false) { echo 'selected'; } ?>>04:00</option>
<option value="05:00" <? if(strpos($agdata4_horarios,'05:00') !== false) { echo 'selected'; } ?>>05:00</option>
<option value="06:00" <? if(strpos($agdata4_horarios,'06:00') !== false) { echo 'selected'; } ?>>06:00</option>
<option value="07:00" <? if(strpos($agdata4_horarios,'07:00') !== false) { echo 'selected'; } ?>>07:00</option>
<option value="08:00" <? if(strpos($agdata4_horarios,'08:00') !== false) { echo 'selected'; } ?>>08:00</option>
<option value="09:00" <? if(strpos($agdata4_horarios,'09:00') !== false) { echo 'selected'; } ?>>09:00</option>
<option value="10:00" <? if(strpos($agdata4_horarios,'10:00') !== false) { echo 'selected'; } ?>>10:00</option>
<option value="11:00" <? if(strpos($agdata4_horarios,'11:00') !== false) { echo 'selected'; } ?>>11:00</option>
<option value="12:00" <? if(strpos($agdata4_horarios,'12:00') !== false) { echo 'selected'; } ?>>12:00</option>
<option value="13:00" <? if(strpos($agdata4_horarios,'13:00') !== false) { echo 'selected'; } ?>>13:00</option>
<option value="14:00" <? if(strpos($agdata4_horarios,'14:00') !== false) { echo 'selected'; } ?>>14:00</option>
<option value="15:00" <? if(strpos($agdata4_horarios,'15:00') !== false) { echo 'selected'; } ?>>15:00</option>
<option value="16:00" <? if(strpos($agdata4_horarios,'16:00') !== false) { echo 'selected'; } ?>>16:00</option>
<option value="17:00" <? if(strpos($agdata4_horarios,'17:00') !== false) { echo 'selected'; } ?>>17:00</option>
<option value="18:00" <? if(strpos($agdata4_horarios,'18:00') !== false) { echo 'selected'; } ?>>18:00</option>
<option value="19:00" <? if(strpos($agdata4_horarios,'19:00') !== false) { echo 'selected'; } ?>>19:00</option>
<option value="20:00" <? if(strpos($agdata4_horarios,'20:00') !== false) { echo 'selected'; } ?>>20:00</option>
<option value="21:00" <? if(strpos($agdata4_horarios,'21:00') !== false) { echo 'selected'; } ?>>21:00</option>
<option value="22:00" <? if(strpos($agdata4_horarios,'22:00') !== false) { echo 'selected'; } ?>>22:00</option>
<option value="23:00" <? if(strpos($agdata4_horarios,'23:00') !== false) { echo 'selected'; } ?>>23:00</option>
<option value="00:00" <? if(strpos($agdata4_horarios,'00:00') !== false) { echo 'selected'; } ?>>00:00</option>
<option value="">Nenhum horário</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <form action="" method="post">
<label>Data 5</label>
<input type="text" class="form-control" placeholder="Exemplo: Sexta-Feira" name="data5" value="<?=$agdata5;?>">
                                      </div>
                                </div>

                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Horários</label>
                                                <select multiple name="data5_opcoes[]" class="form-control">
<option value="01:00" <? if(strpos($agdata5_horarios,'01:00') !== false) { echo 'selected'; } ?>>01:00</option>
<option value="02:00" <? if(strpos($agdata5_horarios,'02:00') !== false) { echo 'selected'; } ?>>02:00</option>
<option value="03:00" <? if(strpos($agdata5_horarios,'03:00') !== false) { echo 'selected'; } ?>>03:00</option>
<option value="04:00" <? if(strpos($agdata5_horarios,'04:00') !== false) { echo 'selected'; } ?>>04:00</option>
<option value="05:00" <? if(strpos($agdata5_horarios,'05:00') !== false) { echo 'selected'; } ?>>05:00</option>
<option value="06:00" <? if(strpos($agdata5_horarios,'06:00') !== false) { echo 'selected'; } ?>>06:00</option>
<option value="07:00" <? if(strpos($agdata5_horarios,'07:00') !== false) { echo 'selected'; } ?>>07:00</option>
<option value="08:00" <? if(strpos($agdata5_horarios,'08:00') !== false) { echo 'selected'; } ?>>08:00</option>
<option value="09:00" <? if(strpos($agdata5_horarios,'09:00') !== false) { echo 'selected'; } ?>>09:00</option>
<option value="10:00" <? if(strpos($agdata5_horarios,'10:00') !== false) { echo 'selected'; } ?>>10:00</option>
<option value="11:00" <? if(strpos($agdata5_horarios,'11:00') !== false) { echo 'selected'; } ?>>11:00</option>
<option value="12:00" <? if(strpos($agdata5_horarios,'12:00') !== false) { echo 'selected'; } ?>>12:00</option>
<option value="13:00" <? if(strpos($agdata5_horarios,'13:00') !== false) { echo 'selected'; } ?>>13:00</option>
<option value="14:00" <? if(strpos($agdata5_horarios,'14:00') !== false) { echo 'selected'; } ?>>14:00</option>
<option value="15:00" <? if(strpos($agdata5_horarios,'15:00') !== false) { echo 'selected'; } ?>>15:00</option>
<option value="16:00" <? if(strpos($agdata5_horarios,'16:00') !== false) { echo 'selected'; } ?>>16:00</option>
<option value="17:00" <? if(strpos($agdata5_horarios,'17:00') !== false) { echo 'selected'; } ?>>17:00</option>
<option value="18:00" <? if(strpos($agdata5_horarios,'18:00') !== false) { echo 'selected'; } ?>>18:00</option>
<option value="19:00" <? if(strpos($agdata5_horarios,'19:00') !== false) { echo 'selected'; } ?>>19:00</option>
<option value="20:00" <? if(strpos($agdata5_horarios,'20:00') !== false) { echo 'selected'; } ?>>20:00</option>
<option value="21:00" <? if(strpos($agdata5_horarios,'21:00') !== false) { echo 'selected'; } ?>>21:00</option>
<option value="22:00" <? if(strpos($agdata5_horarios,'22:00') !== false) { echo 'selected'; } ?>>22:00</option>
<option value="23:00" <? if(strpos($agdata5_horarios,'23:00') !== false) { echo 'selected'; } ?>>23:00</option>
<option value="00:00" <? if(strpos($agdata5_horarios,'00:00') !== false) { echo 'selected'; } ?>>00:00</option>
<option value="">Nenhum horário</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <form action="" method="post">
<label>Data 6</label>
<input type="text" class="form-control" placeholder="Exemplo: Sábado" name="data6" value="<?=$agdata6;?>">
                                      </div>
                                </div>

                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Horários</label>
                                                <select multiple name="data6_opcoes[]" class="form-control">
<option value="01:00" <? if(strpos($agdata6_horarios,'01:00') !== false) { echo 'selected'; } ?>>01:00</option>
<option value="02:00" <? if(strpos($agdata6_horarios,'02:00') !== false) { echo 'selected'; } ?>>02:00</option>
<option value="03:00" <? if(strpos($agdata6_horarios,'03:00') !== false) { echo 'selected'; } ?>>03:00</option>
<option value="04:00" <? if(strpos($agdata6_horarios,'04:00') !== false) { echo 'selected'; } ?>>04:00</option>
<option value="05:00" <? if(strpos($agdata6_horarios,'05:00') !== false) { echo 'selected'; } ?>>05:00</option>
<option value="06:00" <? if(strpos($agdata6_horarios,'06:00') !== false) { echo 'selected'; } ?>>06:00</option>
<option value="07:00" <? if(strpos($agdata6_horarios,'07:00') !== false) { echo 'selected'; } ?>>07:00</option>
<option value="08:00" <? if(strpos($agdata6_horarios,'08:00') !== false) { echo 'selected'; } ?>>08:00</option>
<option value="09:00" <? if(strpos($agdata6_horarios,'09:00') !== false) { echo 'selected'; } ?>>09:00</option>
<option value="10:00" <? if(strpos($agdata6_horarios,'10:00') !== false) { echo 'selected'; } ?>>10:00</option>
<option value="11:00" <? if(strpos($agdata6_horarios,'11:00') !== false) { echo 'selected'; } ?>>11:00</option>
<option value="12:00" <? if(strpos($agdata6_horarios,'12:00') !== false) { echo 'selected'; } ?>>12:00</option>
<option value="13:00" <? if(strpos($agdata6_horarios,'13:00') !== false) { echo 'selected'; } ?>>13:00</option>
<option value="14:00" <? if(strpos($agdata6_horarios,'14:00') !== false) { echo 'selected'; } ?>>14:00</option>
<option value="15:00" <? if(strpos($agdata6_horarios,'15:00') !== false) { echo 'selected'; } ?>>15:00</option>
<option value="16:00" <? if(strpos($agdata6_horarios,'16:00') !== false) { echo 'selected'; } ?>>16:00</option>
<option value="17:00" <? if(strpos($agdata6_horarios,'17:00') !== false) { echo 'selected'; } ?>>17:00</option>
<option value="18:00" <? if(strpos($agdata6_horarios,'18:00') !== false) { echo 'selected'; } ?>>18:00</option>
<option value="19:00" <? if(strpos($agdata6_horarios,'19:00') !== false) { echo 'selected'; } ?>>19:00</option>
<option value="20:00" <? if(strpos($agdata6_horarios,'20:00') !== false) { echo 'selected'; } ?>>20:00</option>
<option value="21:00" <? if(strpos($agdata6_horarios,'21:00') !== false) { echo 'selected'; } ?>>21:00</option>
<option value="22:00" <? if(strpos($agdata6_horarios,'22:00') !== false) { echo 'selected'; } ?>>22:00</option>
<option value="23:00" <? if(strpos($agdata6_horarios,'23:00') !== false) { echo 'selected'; } ?>>23:00</option>
<option value="00:00" <? if(strpos($agdata6_horarios,'00:00') !== false) { echo 'selected'; } ?>>00:00</option>
<option value="">Nenhum horário</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <form action="" method="post">
<label>Data 7</label>
<input type="text" class="form-control" placeholder="Exemplo: Domingo" name="data7" value="<?=$agdata7;?>">
                                      </div>
                                </div>

                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Horários</label>
                                                <select multiple name="data7_opcoes[]" class="form-control">
<option value="01:00" <? if(strpos($agdata7_horarios,'01:00') !== false) { echo 'selected'; } ?>>01:00</option>
<option value="02:00" <? if(strpos($agdata7_horarios,'02:00') !== false) { echo 'selected'; } ?>>02:00</option>
<option value="03:00" <? if(strpos($agdata7_horarios,'03:00') !== false) { echo 'selected'; } ?>>03:00</option>
<option value="04:00" <? if(strpos($agdata7_horarios,'04:00') !== false) { echo 'selected'; } ?>>04:00</option>
<option value="05:00" <? if(strpos($agdata7_horarios,'05:00') !== false) { echo 'selected'; } ?>>05:00</option>
<option value="06:00" <? if(strpos($agdata7_horarios,'06:00') !== false) { echo 'selected'; } ?>>06:00</option>
<option value="07:00" <? if(strpos($agdata7_horarios,'07:00') !== false) { echo 'selected'; } ?>>07:00</option>
<option value="08:00" <? if(strpos($agdata7_horarios,'08:00') !== false) { echo 'selected'; } ?>>08:00</option>
<option value="09:00" <? if(strpos($agdata7_horarios,'09:00') !== false) { echo 'selected'; } ?>>09:00</option>
<option value="10:00" <? if(strpos($agdata7_horarios,'10:00') !== false) { echo 'selected'; } ?>>10:00</option>
<option value="11:00" <? if(strpos($agdata7_horarios,'11:00') !== false) { echo 'selected'; } ?>>11:00</option>
<option value="12:00" <? if(strpos($agdata7_horarios,'12:00') !== false) { echo 'selected'; } ?>>12:00</option>
<option value="13:00" <? if(strpos($agdata7_horarios,'13:00') !== false) { echo 'selected'; } ?>>13:00</option>
<option value="14:00" <? if(strpos($agdata7_horarios,'14:00') !== false) { echo 'selected'; } ?>>14:00</option>
<option value="15:00" <? if(strpos($agdata7_horarios,'15:00') !== false) { echo 'selected'; } ?>>15:00</option>
<option value="16:00" <? if(strpos($agdata7_horarios,'16:00') !== false) { echo 'selected'; } ?>>16:00</option>
<option value="17:00" <? if(strpos($agdata7_horarios,'17:00') !== false) { echo 'selected'; } ?>>17:00</option>
<option value="18:00" <? if(strpos($agdata7_horarios,'18:00') !== false) { echo 'selected'; } ?>>18:00</option>
<option value="19:00" <? if(strpos($agdata7_horarios,'19:00') !== false) { echo 'selected'; } ?>>19:00</option>
<option value="20:00" <? if(strpos($agdata7_horarios,'20:00') !== false) { echo 'selected'; } ?>>20:00</option>
<option value="21:00" <? if(strpos($agdata7_horarios,'21:00') !== false) { echo 'selected'; } ?>>21:00</option>
<option value="22:00" <? if(strpos($agdata7_horarios,'22:00') !== false) { echo 'selected'; } ?>>22:00</option>
<option value="23:00" <? if(strpos($agdata7_horarios,'23:00') !== false) { echo 'selected'; } ?>>23:00</option>
<option value="00:00" <? if(strpos($agdata7_horarios,'00:00') !== false) { echo 'selected'; } ?>>00:00</option>
<option value="">Nenhum horário</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <form action="" method="post">
<label>Outros</label>
<input type="text" class="form-control" placeholder="Exemplo: Entrega Imediata, Retirada no balcão..." name="outros" value="<?=$agdata_outros;?>">
                                      </div>
                                </div>

                                    <div style="clear:both;"></div>
                                    <input type="submit" name="salvar" value="Salvar" class="btn btn-info btn-fill pull-right">
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



<?php
if($_POST[salvar]) {
logs("Alterou os dados de agendamentos.");

 $xopcoes = $_POST[data1_opcoes];
    for ($i=0;$i<count($xopcoes);$i++) 
   { 
   $opcoes1 .= $xopcoes[$i].","; 
   }
   $opq1 = substr(str_replace('Array','',$opcoes1), 0,-1);

 $xopcoes = $_POST[data2_opcoes];
    for ($i=0;$i<count($xopcoes);$i++) 
   { 
   $opcoes2 .= $xopcoes[$i].","; 
   }
   $opq2 = substr(str_replace('Array','',$opcoes2), 0,-1);

 $xopcoes = $_POST[data3_opcoes];
    for ($i=0;$i<count($xopcoes);$i++) 
   { 
   $opcoes3 .= $xopcoes[$i].","; 
   }
   $opq3 = substr(str_replace('Array','',$opcoes3), 0,-1);

 $xopcoes = $_POST[data4_opcoes];
    for ($i=0;$i<count($xopcoes);$i++) 
   { 
   $opcoes4 .= $xopcoes[$i].","; 
   }
   $opq4 = substr(str_replace('Array','',$opcoes4), 0,-1);

 $xopcoes = $_POST[data5_opcoes];
    for ($i=0;$i<count($xopcoes);$i++) 
   { 
   $opcoes5 .= $xopcoes[$i].","; 
   }
   $opq5 = substr(str_replace('Array','',$opcoes5), 0,-1);

 $xopcoes = $_POST[data6_opcoes];
    for ($i=0;$i<count($xopcoes);$i++) 
   { 
   $opcoes6 .= $xopcoes[$i].","; 
   }
   $opq6 = substr(str_replace('Array','',$opcoes6), 0,-1);

 $xopcoes = $_POST[data7_opcoes];
    for ($i=0;$i<count($xopcoes);$i++) 
   { 
   $opcoes7 .= $xopcoes[$i].","; 
   }
   $opq7 = substr(str_replace('Array','',$opcoes7), 0,-1);


$abrir = fopen("pages/agendamentos.php","w+");
fwrite($abrir, '<?php
$agdata1 = "'.$_POST[data1].'";
$agdata1_horarios = "'.$opq1.'";

$agdata2 = "'.$_POST[data2].'";
$agdata2_horarios = "'.$opq2.'";

$agdata3 = "'.$_POST[data3].'";
$agdata3_horarios = "'.$opq3.'";

$agdata4 = "'.$_POST[data4].'";
$agdata4_horarios = "'.$opq4.'";

$agdata5 = "'.$_POST[data5].'";
$agdata5_horarios = "'.$opq5.'";

$agdata6 = "'.$_POST[data6].'";
$agdata6_horarios = "'.$opq6.'";

$agdata7 = "'.$_POST[data7].'";
$agdata7_horarios = "'.$opq7.'";

$agdata_outros = "'.$_POST[outros].'";
?>
');
fclose($abrir);

echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-agendamentos/">';
}
?>