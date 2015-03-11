<?php
$anak = $data;
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
                    <th>Tempat Lahir</th>
                    <td>{{$anak->tempat_lahir}}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{date('d-m-Y',strtotime($anak->tanggal_lahir))}}</td>
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
                    <th>Pendidikan</th>
                    <td>{{$anak->pendidikan}}</td>
                </tr>
                <tr>
                    <th>Suku</th>
                    <td>{{$anak->suku}}</td>
                </tr>
                <tr>
                    <th>Anak-Ke</th>
                    <td>{{$anak->anak_ke}}</td>
                </tr>
                <tr>
                    <th>Jumlah Saudara</th>
                    <td>{{$anak->jumlah_saudara}}</td>
                </tr>
                <tr>
                    <th>Akta Kelahiran</th>
                    <td>
                        <?php if ($anak->akta_kelahiran == "T") { ?>
                            Ada
                        <?php } else { ?>
                            Tidak Ada
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th>Disabilitas</th>
                    <td>
                        <?php if ($anak->disabilitas == "T") { ?>
                            {{$anak->disabilitas_keterangan}}
                        <?php } else { ?>
                            Tidak Ada
                        <?php } ?>

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
                            echo "(" . $anak->contact_person->telp . ")";
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>