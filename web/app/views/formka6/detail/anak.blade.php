<?php
$anak = $data->anak->first();
$jenis = $data->jenis_kasus;
?>

<div class="col-xs-12">
    <p class="lead" style="margin: 0px;">Identitas Anak</p>
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