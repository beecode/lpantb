
<table class="table small" style="border-top:none !important; margin-bottom: 0px; margin-top:0px !important;">
  <tr style="border:none !important;">
    <th style="width:30%; border-top: none !important;">
      <div class="input-group input-group-sm">
        <span class="input-group-addon" style="border: 1px solid rgba(0,0,0,0.2);">
          <strong>Nomer LKA&nbsp;</strong>
        </span>
        <span class="form-control" style="border: 1px solid rgba(0,0,0,0.2);">{{$anak->form->first()->no_lka}}</span>
      </div>
    </th>
    <!-- <th style="width:5%;  border-top: none !important;"></th> -->
    <th style="width:30%;  border-top: none !important;">
      <div class="input-group input-group-sm" >
        <span class="input-group-addon" style="border: 1px solid rgba(0,0,0,0.2);"><strong>Nama Anak</strong></span>
        <span class="form-control" style="border: 1px solid rgba(0,0,0,0.2);">{{$anak->nama}}</span>
      </div>
    </th>
    <!-- <th style="width:5%;  border-top: none !important;"></th> -->
  </tr>
</table>

<table class="table small" style="margin-top:0px; padding-top:0px; margin-bottom:3px;">
  <tr>
    <th style="width:100%;  border-top: none !important;">
      <div class="input-group input-group-sm">
        <span class="input-group-addon" style="border: 1px solid rgba(0,0,0,0.2);">
          <strong>Jenis Kasus</strong>
        </span>
        <span class="form-control" style="border: 1px solid rgba(0,0,0,0.2);">
          <?php
          $jenis = $anak->jenis_kasus;
          $c = count($jenis);
          $i = 1;
          foreach ($jenis as $vk) {
            if ($i <= $c-1) {
              echo $vk->jenis.", ";
            } else {
              echo $vk->jenis;
            }
            $i++;
          }
          ?>
        </span>
      </div>
    </th>
  </tr>
</table>
