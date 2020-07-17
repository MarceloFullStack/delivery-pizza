<?php
$conf=mysqli_query($db, "SELECT * FROM config");
$config=mysqli_fetch_assoc($conf);
?>
<div class="box_4"><div class="box_5">
    <div class="box_41"><div class="box_41a"><img src="/admin/logo/<?php echo $config['logomarca']; ?>" /></div></div>
  </div>
      <div class="box_6">
        <div class="box_42">
          <div class="box_43">Sistema Delivery Pizzarias</div>
          <div class="box_44"><?php echo $config['nome'] ?></div>
        </div>
      </div>
  </div>