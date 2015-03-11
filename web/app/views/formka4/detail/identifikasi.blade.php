<?php
$anak = $data->anak->first();
$msl = $anak->identifikasi_masalah;
?>
<div class="col-xs-12">
    <p class="lead" style="margin: 0px;">Identifikasi Masalah</p>
    <div class="table-responsive">
        <table class="table small">
            <tbody>
                <tr>
                    <th style="width:23.6%">Gambaran Kasus Menurut Anak</th>
                    <td><p>{{$msl->gka}}</p></td>
                </tr>
                <tr>
                    <th>Harapan Anak</th>
                    <td><p>{{$msl->ha}}</p></td>
                </tr>
                <tr>
                    <th>Gambaran Kasus Menurut Keluarga, Teman dan/atau Masyarakat</th>
                    <td><p>{{$msl->gkk}}</p></td>
                </tr>
                <tr>
                    <th>Kesimpulan Kasus Yang Terjadi</th>
                    <td><p>{{$msl->kesimpulan}}</p></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
