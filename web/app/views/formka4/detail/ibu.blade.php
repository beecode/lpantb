<?php
$keluarga = $data->anak->first()->keluarga;
$ayah = $keluarga->ayah;
$ibu = $keluarga->ibu;
?>

<div class="table-responsive">
    <table class="table small">
        <tbody>
            <tr>
                <th style="width:23.6%">Nama Ibu</th>
                <td>{{$ibu->nama}}</td>
            </tr>
            <tr>
                <th>Tempat/Tanggal Lahir</th>
                <td>{{$ibu->tempat_lahir.", "}}{{date('d-m-Y',strtotime($ibu->tanggal_lahir))}}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>
                    {{$ibu->alamat}}<br/>
                    Desa {{$ibu->desa->nama}} -
                    Kecamatan {{$ibu->desa->kecamatan->nama}}<br/>
                    {{$ibu->desa->kecamatan->kabkota->nama}} -
                    Provinsi {{$ibu->desa->kecamatan->kabkota->provinsi->nama}}
                </td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <td><?php echo (!empty($ibu->pekerjaan)) ? $ibu->pekerjaan : "-"; ?></td>
            </tr>
            <tr>
                <th>Pendidikan Terakhir</th>
                <td><?php echo (!empty($ibu->pendidikan_terakhir)) ? $ibu->pendidikan_terakhir : "-"; ?></td>
            </tr>
            <tr>
                <th>Telpon</th>
                <td><?php echo (!empty($ibu->telp)) ? $ibu->telp : "-"; ?></td>
            </tr>
        </tbody>
    </table>
</div>
