<?php
$anak  = $data->anak->first();
$pelapor = $anak->pelapor->first();
?>

<div class="col-xs-12">
  <h5>
    <strong>Identitas Pelapor/Pengadu</strong>
  </h5>
  <div class="table-responsive">
    <table class="table small">
      <tbody>
        <tr>
          <th style="width:23.6%">Nama  </th>
          <td>{{$pelapor->nama}}</td>
        </tr>
        <tr>
          <th>Jenis Kelamin  </th>
          <td>{{$pelapor->gender}}</td>
        </tr>
        <tr>
          <th>Tempat, Tanggal Lahir</th>
          <td>{{$pelapor->tempat_lahir}}, {{date('d-m-Y',strtotime($pelapor->tanggal_lahir))}}</td>
        </tr>
        <tr>
          <th>Agama</th>
          <td>{{$pelapor->agama}}</td>
        </tr>
        <tr>
          <th>Pekerjaan</th>
          <td>{{$pelapor->pekerjaan}}</td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td>
            {{$pelapor->alamat}}<br/>
            Desa {{$pelapor->desa->nama}} -
            Kecamatan {{$pelapor->desa->kecamatan->nama}}<br/>
            {{$pelapor->desa->kecamatan->kabkota->nama}} -
            Provinsi {{$pelapor->desa->kecamatan->kabkota->provinsi->nama}}
          </td>
        </tr>
        <tr>
          <th>No. Telp</th>
          <td>{{$pelapor->telp}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
