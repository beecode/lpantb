<?php
$anak = $data->anak->first();
$jenis = $anak->jenis_kasus;
?>

<div class="col-xs-12">
  <h5>
    <strong>Identitas Anak</strong>
  </h5>
  <div class="table-responsive">
    <table class="table small">
      <tbody>
        <tr>
          <th style="width:21%">Nama  </th>
          <td>{{$anak->nama}}</td>
        </tr>
        <tr>
          <th>Jenis Kelamin</th>
          <td>{{$anak->gender}}</td>
        </tr>
        <tr>
          <th>Jenis Kasus</th>
          <td>
            <?php foreach ($jenis as $vj) { ?>
              {{$vj->jenis}}<br/>
              <?php } ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
