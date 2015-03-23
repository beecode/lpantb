<?php
$anak= $data->anak->first();
$tindak = $anak->tindak_lanjut;
?>
<div class="col-xs-12">
  <h5>
    <strong>Tidak Lanjut</strong>
  </h5>
    <div class="table-responsive">
        <table class="table small">
            <tbody>
                <tr>
                    <th style="width:21%">Tindak Lanjut</th>
                    <td>
                        <?php foreach ($tindak as $vt) { ?>
                            {{$vt->aksi}}<br/>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th>Catatan Tindak Lanjut</th>
                    <td><p>{{$data->catatan_tindak_lanjut}}</p></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
