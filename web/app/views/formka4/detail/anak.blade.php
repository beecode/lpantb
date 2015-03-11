<?php
$anak = $data->anak->first();
?>

<div class="col-xs-12">
    <p class="lead" style="margin: 0px;">Identitas Anak</p>
    <div class="table-responsive">
        <table class="table small">
            <tbody>
                <tr>
                    <th style="width:23.6%">Nama  </th>
                    <td>{{$anak->nama}}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{$anak->gender}}</td>
                </tr>
                <tr>
                    <th>Umur</th>
                    <td>{{$anak->umur}} {{$anak->umur_satuan}}</td>
                </tr>
                <tr>
                    <th>Tempat/Tanggal Lahir</th>
                    <td>{{$anak->tempat_lahir.", "}}{{date('d-m-Y',strtotime($anak->tanggal_lahir))}}</td>
                </tr>
                <tr>
                    <th>Pendidikan</th>
                    <td>{{$anak->pendidikan}}</td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td>{{$anak->agama}}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>
                        {{$anak->alamat}}<br/>
                        Desa {{$anak->desa->nama}} -
                        Kecamatan {{$anak->desa->kecamatan->nama}}<br/>
                        {{$anak->desa->kecamatan->kabkota->nama}} -
                        Provinsi {{$anak->desa->kecamatan->kabkota->provinsi->nama}}
                    </td>
                </tr>
                <tr>
                    <th>Anak Ke</th>
                    <td>{{$anak->anak_ke}}</td>
                </tr>
                <tr>
                    <th>Jumlah Suadara</th>
                    <td>{{$anak->anak_ke}}</td>
                </tr>
                <tr>
                    <th>Akta Kelahiran</th>
                    <td><?php echo ($anak->akta_kelahiran=="T") ? "Punya" : "Tidak Punya"; ?></td>
                </tr>
                <tr>
                    <th>Disabilitas</th>
                    <td>
                        <?php echo ($anak->disabilitas=="T") ? "Ya, " : "Tidak Ada"; ?>
                        <?php echo $anak->disabilitas_keterangan; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>