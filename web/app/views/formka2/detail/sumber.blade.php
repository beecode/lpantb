<?php
$anak = $data->anak->first();
$sumber = $anak->sumber_informasi->first();
?>

<div class="col-xs-12">
    <p class="lead" style="margin: 0px;">Sumber Informasi</p>
    <div class="table-responsive">
        <table class="table small">
            <tbody>
                <tr>
                    <th style="width:23.6%">Nama  </th>
                    <td>{{$sumber->sumber}}</td>
                </tr>
                <tr>
                    <th>Tanggal Informasi  </th>
                    <td>{{date('d-m-Y',strtotime($sumber->tanggal))}}</td>
                </tr>
                <tr>
                    <th>Dasar Rujukan</th>
                    <td>{{$sumber->dasar_rujukan}}</td>
                </tr>
                <tr>
                    <th>Contact Person</th>
                    <td>{{$sumber->contact_person}}</td>
                </tr>
                <tr>
                    <th>Telp</th>
                    <td>{{$sumber->telp}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>