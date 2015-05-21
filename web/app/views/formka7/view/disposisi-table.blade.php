<?php if (!is_null($table)) { ?>
  <div class="table-responsive">
  <table class="table table-bordered" id="multi">
    <thead>
      <tr>
        <th>No LKA</th>
        <th>Tanggal</th>
        <th>Nama Anak</th>
        <th>Jenis Kasus</th>
        <th>Intervensi</th>
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
          <td>
              <?php if ($anak->jenis_kasus->first()) { ?>
                  <?php foreach ($anak->jenis_kasus as $vjk) { ?>
                      {{$vjk->jenis}}<br/>
                  <?php } ?>
              <?php } ?>
          </td>
          <td>
              <?php if ($anak->intervensi->first()) { ?>
                  <?php foreach ($anak->intervensi as $vtl) { ?>
                      {{$vtl->jenis}}<br/>
                  <?php } ?>
              <?php } ?>
          </td>
          <td>
            <?php $formka6=false; ?>
            <?php foreach($anak->form as $fm) { ?>
              <span class="btn btn-info btn-xs btn-flat">
                {{strtoupper($fm->nama)}}
              </span>
              <?php
                if ($fm->nama == "ka6"){
                  $formka6 = true;
                  $formka6_id = $fm->id;
                  $formka6_obj = $fm;
                }
              ?>
            <?php } ?>
          </td>
          <td>
            <?php if ($formka6==true){ ?>
              <?php
                $me = Auth::user();
                $amICreateThis = false;
                foreach($formka6_obj->user as $fmUser){
                  if ($fmUser->id == $me->id){
                    $amICreateThis = true;
                  }
                }
              ?>
              <?php if ($amICreateThis==true) { ?>
                <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                    <a class="btn btn-small btn-info" title="Detail"
                       href="{{ URL::to('/dash/formka6/pendampingan/view/'.$anak->id) }}">
                        <span class=" glyphicon glyphicon-th-list"></span>
                    </a>
                    <a class="btn btn-small btn-warning" title="Update"
                       href="{{ URL::to('/dash/formka6/updateview/'.$val->id) }}">
                        <span class=" glyphicon glyphicon-edit"></span>
                    </a>
                    <a class="btn btn-small btn-danger" title="Delete"
                       href="{{ URL::to('/dash/formka6/delete/'.$val->id) }}">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </div>
              <?php } else { ?>
                <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                    <a class="btn btn-small btn-info" title="Detail"
                       href="{{ URL::to('/dash/formka6/pendampingan/view/'.$anak->id) }}">
                        <span class=" glyphicon glyphicon-th-list"></span>
                    </a>
                </div>
              <?php } ?>
            <?php } else { ?>
              <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                  <a class="btn btn-small btn-info" title="Detail"
                     href="{{ URL::to('/dash/formka6/pendampingan/view/'.$anak->id) }}">
                      <span class=" glyphicon glyphicon-th-list"></span>
                  </a>
              </div>
            <?php } ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
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
