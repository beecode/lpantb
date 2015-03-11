<?php $tindak = $data->tindak_lanjut; ?>
<div class="col-xs-12">
    <p class="lead" style="margin: 0px;">Tindak Lanjut</p>
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
