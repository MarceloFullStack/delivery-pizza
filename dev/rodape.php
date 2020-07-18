<?php

$conf=mysqli_query($db,"SELECT * FROM config");

$config=mysqli_fetch_assoc($conf);

?>

<div class="box82">

    <div class="box83">

      <div class="box91">

         <a href="/onde.php" id="manual-onde"><div class="box212">Clique aqui para saber onde fazemos entregas</div></a>

      </div>

    </div>

    <div class="box84">

      <div class="box85">

        <div class="box86"><strong>IMPORTANTE:</strong> Entregamos lanches apenas para <a href="/onde.php" id="manual-onde3"><strong>clique aqui</strong></a>, nos horários de <strong><?php echo $config['hora_de'] ?> às <?php echo $config['hora_ate'] ?></strong>. Para mais informações entrar em contato pelo telefone <strong><?php echo $config['telefone'] ?></strong>.</div>

        <div class="box87"></div>

        <div class="box88">

          <div class="box93">

            <div class="box89">Televendas</div>

            <div class="box90"><?php echo $config['telefone'] ?></div>

          </div>

          </div>

        <div class="box87a"></div>

        <div class="box88">

          <div class="box93">

            <div class="box89">Redes Sociais</div>

            <div class="box90">

            

            <?php if($config['facebook']<>''){ ?>

              <div class="box211">

                <a href="<?php echo $config['facebook'] ?>" target="_blank"><img src="/arquivos/facebook.png" width="37" height="35" border="0" /></a>

              </div>

            <?php } ?>

            

            <?php if($config['twitter']<>''){ ?>  

              <div class="box211">

                <a href="<?php echo $config['twitter'] ?>" target="_blank"><img src="/arquivos/twitter.png" width="38" height="35" border="0" /></a>

              </div>

            <?php } ?>  

              

            <?php if($config['instagran']<>''){ ?>  

              <div class="box211">

                <a href="<?php echo $config['instagran'] ?>" target="_blank"><img src="/arquivos/instagran.png" width="37" height="35" border="0" /></a>

              </div>

             <?php } ?> 

              

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="box92"><?php echo $config['nome'] ?> - Todos os direitos reservados - <?php echo date('Y'); ?> - Desenvolvido por <a href="https://api.whatsapp.com/send?phone=5511982889012&text=Estou%20interessado%20no%20sistema%20delivery!" target="_blank">Felipe Dutra</a></div>

</div>