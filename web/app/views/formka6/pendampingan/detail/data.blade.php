
<div class="table-responsive" style="padding-right: 10px; padding-left:10px;">
  <table class="table">
    <tr>
      <th style="width: 27%;">Tanggal</th>
      <td>{{date('l, d F Y',strtotime($data->tanggal))}}</td>
    </tr>
    <tr>
      <th>Jenis Kasus</th>
      <td>
        <?php
        $jenis = $anak->jenis_kasus;
        foreach ($jenis as $vk) {
          echo $vk->jenis."<br/>";
        }
        ?>
      </td>
    </tr>
    <tr>
      <th>Bentuk Pendampingan</th>
      <td>{{$data->bentuk}}</td>
    </tr>
    <tr>
      <th>Tempat</th>
      <td>{{$data->tempat}}</td>
    </tr>
    <tr>
      <th>Pelaksana</th>
      <td>
        <?php
          $pel = json_decode($data->pelaksana);
          $c = count($pel);
          $i=0;
         if ($c>0){
          foreach($pel as $p){
            if ($i==$c-1){
              echo $p->text;
            } else {
              echo $p->text."<br/> ";
            }
            $i++;
          }
        }
        ?>
      </td>
    </tr>
    <tr>
      <th>Hasil</th>
      <td>{{$data->hasil}}</td>
    </tr>
    <tr>
      <th>Rencana Tindak Lanjut</th>
      <td>{{$data->rencana}}</td>
    </tr>
    <tr>
      <th>Keterangan</th>
      <td>{{$data->keterangan}}</td>
    </tr>
  </table>
</div>
