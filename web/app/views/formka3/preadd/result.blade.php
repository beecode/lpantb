

<?php if ($result_status == "multiple") { ?>

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
      <?php foreach($result_data as $res){ ?>
        <?php if ($based == "anak") {?>
          @include('formka3.preadd.rowanak')
        <?php } else {?>
          @include('formka3.preadd.rowlka')
        <?php } ?>
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
<?php } else if ($result_status == "single"){ ?>


<?php } else if ($result_status == null){ ?>

<?php } ?>
