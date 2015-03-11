<?php 
$anak = $data->anak->first();
$intervensi = $anak->intervensi; ?>
<div class="col-xs-12">
    <p class="lead" style="margin: 0px;">Intervensi Yang Dilakukan</p>
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
                    <td><p>{{$data->dasar_intervensi}}</p></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php if (!empty($data->catatan_intervensi)) { ?>

<div class="col-xs-12">
    <p class="lead" style="margin: 0px;">Catatan Untuk Intervensi</p>
    <p style="margin-left: 7px;">{{$data->catatan_intervensi}}</p>
</div>
<?php } ?>