<?php
  $pel = json_decode($data->pelaksana);
  $c = count($pel);
  $i=0;
?>

<?php foreach($pel as $p){ ?>
<?php if ($i % ($c)==0){ ?>
  <div class="col-xs-6">
    <div class="sign">
      <div class="sign-left">
        <span class="sign-title">Pelaksana</span>
        <div class="spacer"></div>
        <span class="sign-name">({{$p->text}})</span>
      </div>
    </div>
  </div>
<?php } else { ?>
  <div class="col-xs-6">
    <div class="sign">
      <div class="sign-right">
        <span class="sign-title">Pelaksana</span>
        <div class="spacer"></div>
        <span class="sign-name">({{$p->text}})</span>
      </div>
    </div>
  </div>
<?php
      }
    $i++;
  }
?>
