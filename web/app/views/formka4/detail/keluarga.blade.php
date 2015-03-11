<?php
$keluarga = $data->anak->first()->keluarga;
$ayah = $keluarga->ayah;
$ibu = $keluarga->ibu;
?>
<div class="col-xs-12">
    <p class="lead" style="margin: 0px;">Identitas Keluarga</p>
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
