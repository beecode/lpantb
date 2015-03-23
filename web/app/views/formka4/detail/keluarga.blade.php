<?php
$keluarga = $data->anak->first()->keluarga;
$ayah = $keluarga->ayah;
$ibu = $keluarga->ibu;
?>
<div class="col-xs-12">
  <h5>
    <strong>Identitas Keluarga</strong>
  </h5>
  @include('formka4.detail.bapak')
  @include('formka4.detail.ibu')
  <div class="table-responsive">
    <table class="table small">
      <tbody>
        <tr>
          <th style="width:23.6%">Status Perkawinan Orang Tua</th>
          <td>{{$keluarga->status}}</td>
        </tr>
      </tbody>
    </table>
  </div>

</div>
