<?php if (!is_null($table->first())) { ?>
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-responsive" >
      <thead>
        <tr class="small">
          <th>No LKA</th>
          <th>Tanggal</th>
          <th>Sumber Informasi</th>
          <th>Anak</th>
          <th>User Pembuat</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="small">
        @include('formka2.view.normal')
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
  var config = {
    "bPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bInfo": true,
    "bSort": true,
    "bAutoWidth": false,
    "order":[[1,'desc']],
    // "aaSorting":[[2, 'desc']],
    // "ordering": false,
  };
  $(".table").dataTable(config).fnFakeRowspan(0);
  </script>
