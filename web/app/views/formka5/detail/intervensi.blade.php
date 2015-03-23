<?php
$anak = $data->anak->first();
$intervensi = $anak->intervensi; ?>
<div class="col-xs-12">
  <h5>
    <strong>Intervensi Yang Dilakukan</strong>
  </h5>
    <div class="table-responsive">
        <table class="table small">
            <tbody>
                <tr>
                    <th style="width:21%">Intervensi</th>
                    <td>
                        <?php foreach ($intervensi as $int) { ?>
                            {{$int->jenis}}<br/>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th>Dasar Intervensi</th>
                    <td>{{$data->dasar_intervensi}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php if (!empty($data->catatan_intervensi)) { ?>

<div class="col-xs-12">
    <div class="catatan">
      <h5>
        <strong>Catatan Untuk Intervensi</strong>
      </h5>
      <p>{{$data->catatan_intervensi}}</p>
      <br>
    </div>

</div>
<?php } ?>
