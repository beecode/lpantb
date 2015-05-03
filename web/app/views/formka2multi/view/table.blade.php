<?php if (!is_null($table->first())) { ?>
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-responsive" >
      <thead>
        <tr class="small">
          <th>Tanggal</th>
          <th>Pelapor</th>
          <th>Anak</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="small">
        <?php foreach ($table as $val) { ?>
          <?php
          $anak = $val->anak->first();
          $sumber = $anak->sumberinformasi->first();
          $lka = base64_encode($val->no_lka);
          ?>
          <tr>
            <td>{{strftime( "%d-%B-%Y", strtotime($val->tanggal))}}</td>
            <td>
              {{$sumber->sumber}}
            </td>
            <td>
              {{$anak->nama}}
              <a href="{{URL::to('lpantb/anak/detailview/'.$anak->id)}}"
                class="btn btn-sm btn-info pull-right" title="Detail Anak">
                <span class=" glyphicon glyphicon-th-list"></span>
              </a>
            </td>
            <td class="text-center">
              <?php if (UserHelper::isLoggedUserIncluded($val->user)){ ?>
                <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                  <a class="btn btn-small btn-info" title="Detail Form"
                  href="{{ URL::to('/lpantb/formka2multi/detailview/'.$val->id) }}">
                  <span class=" glyphicon glyphicon-th-list"></span>
                </a>
                <a class="btn btn-small btn-warning" title="Update"
                href="{{ URL::to('/lpantb/formka2multi/updateview/'.$val->id) }}">
                <span class=" glyphicon glyphicon-edit"></span>
              </a>
              <a class="btn btn-small btn-danger" title="Delete"
              href="{{ URL::to('/lpantb/formka2multi/delete/'.$val->id.'/'.$lka) }}">
              <span class="glyphicon glyphicon-trash"></span>
            </a>
          </div>
          <?php } else { ?>
            <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
              <a class="btn btn-small btn-info" title="Detail Form"
              href="{{ URL::to('/lpantb/formka2multi/detailview/'.$val->id) }}">
              <span class=" glyphicon glyphicon-th-list"></span>
            </a>
          </div>
          <?php } ?>

        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php } else { ?>
    <br/>
    <div class="alert alert-info">
      Data tidak tersedia atau tidak ditemukan...
    </div>
    <?php } ?>
  </div>

  <script type="text/javascript">
  $(".table").dataTable({
    "bPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bInfo": true,
    // "bSort": true,
    "bAutoWidth": false,
    "order":[[2,'desc']],
    "aaSorting":[[2,'desc']],
    "ordering": true,
  });
  </script>
