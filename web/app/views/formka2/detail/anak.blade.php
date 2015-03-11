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
                    <th>Tanggal Lahir</th>
                    <td>{{$anak->tanggal_lahir}}</td>
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
                    <th>Contact Person</th>
                    <td>
                        <?php
                        if (!empty($anak->contact_person->nama)) {
                            echo $anak->contact_person->nama;
                        } else {
                            echo "---";
                        }
                        ?>
                        <?php
                        if (!empty($anak->contact_person->telp)) {
                            echo "(".$anak->contact_person->telp . ")";
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>