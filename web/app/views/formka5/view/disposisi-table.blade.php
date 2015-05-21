<?php if (!is_null($table)) { ?>
  <table class="table table-bordered" id="multi">
    <thead>
      <tr>
        <th>No LKA</th>
        <th>Tanggal</th>
        <th>Nama Anak</th>
        <th>Pelapor/Sumber</th>
        <th>Jenis Kasus</th>
        <th>Progress Kasus</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($table as $res){ ?>

        <tr>
          <td>{{$res->no_lka}}</td>
          <td>{{strftime( "%d-%B-%Y", strtotime($res->tanggal))}}</td>
          <td>{{$res->anak->first()->nama}}</td>
          <?php
            $anak = $res->anak->first();
            $form = $anak->form->first();
           ?>
          <?php if ($form->nama=="ka1"){ ?>
            <td>{{$anak->pelapor->first()->nama}}</td>
          <?php } else {?>
            <td>{{$anak->sumberinformasi->first()->sumber}}</td>
          <?php } ?>
          <td>
              <?php if ($anak->jenis_kasus->first()) { ?>
                  <?php foreach ($anak->jenis_kasus as $vjk) { ?>
                      {{$vjk->jenis}}<br/>
                  <?php } ?>
              <?php } ?>
          </td>
          <td>
            <?php $formka5=false; ?>
            <?php foreach($anak->form as $fm) { ?>
              <span class="btn btn-info btn-xs btn-flat">
                {{strtoupper($fm->nama)}}
              </span>
              <?php
                if ($fm->nama == "ka5"){
                  $formka5 = true;
                  $formka5_id = $fm->id;
                  $formka5_obj = $fm;
                }
              ?>
            <?php } ?>
          </td>
          <td>
            <?php if ($formka5==true){ ?>
              <?php
                $me = Auth::user();
                $amICreateThis = false;
                foreach($formka5_obj->user as $fmUser){
                  if ($fmUser->id == $me->id){
                    $amICreateThis = true;
                  }
                }
              ?>
              <?php if ($amICreateThis==true) { ?>
                <a href="{{URL::to('dash/formka5/updateview/'.$formka5_id)}}" class="btn btn-warning">
                  <span class="glyphicon glyphicon-edit"></span>
                </a>
              <?php } else { ?>
                <a href="{{URL::to('dash/formka5/detailview/'.$formka5_id)}}" class="btn btn-info">
                  <span class="glyphicon glyphicon-th-list"></span>
                </a>
              <?php } ?>
            <?php } else { ?>
              <a href="{{URL::to('dash/formka5/addview/'.$anak->id)}}" class="btn btn-default">
                <span class="glyphicon glyphicon-plus"></span>
              </a>
            <?php } ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <script type="text/javascript">
      $("#multi").dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bInfo": true,
          // "bSort": true,
          "bAutoWidth": false,
          // "order":[[0,'desc']],
          // "aaSorting":[[0,'desc']],
          // "ordering": true,
      });
  </script>
  <?php } else { ?>
      <br/>
      <div class="alert alert-info">
          Data tidak tersedia atau tidak ditemukan...
      </div>
  <?php } ?>
