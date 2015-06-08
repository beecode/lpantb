<?php if (!is_null($table)) { ?>
  <table class="table table-bordered" id="multi">
    <thead>
      <tr>
        <th>No LKA</th>
        <th>Form</th>
        <th>Nama Anak</th>
        <th>Pelapor/Sumber</th>
        <th>Progress Kasus</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($table as $res){ ?>

        <tr>
          <td>{{$res->no_lka}}</td>
          <td>{{strtoupper($res->nama)}}</td>
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
            <?php $formka4=false; ?>
            <?php foreach($anak->form as $fm) { ?>
              <span class="btn btn-info btn-xs btn-flat">
                {{strtoupper($fm->nama)}}
              </span>
              <?php
                if ($fm->nama == "ka4"){
                  $formka4 = true;
                  $formka4_id = $fm->id;
                  $formka4_obj = $fm;
                }
              ?>
            <?php } ?>
          </td>
          <td>
            <?php if ($formka4==true){ ?>
              <?php
                $me = Auth::user();
                $amICreateThis = false;
                foreach($formka4_obj->user as $fmUser){
                  if ($fmUser->id == $me->id){
                    $amICreateThis = true;
                  }
                }
              ?>
              <?php if ($amICreateThis==true) { ?>
                <a href="{{URL::to('dash/formka4/updateview/'.$formka4_id)}}" class="btn btn-warning">
                  <span class="glyphicon glyphicon-edit"></span>
                </a>
              <?php } else { ?>
                <a href="{{URL::to('dash/formka4/detailview/'.$formka4_id)}}" class="btn btn-info">
                  <span class="glyphicon glyphicon-th-list"></span>
                </a>
              <?php } ?>
            <?php } else { ?>
              <a href="{{URL::to('dash/formka4/addview/'.$anak->id)}}" class="btn btn-default">
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
