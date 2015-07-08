<style>
.cell-right{
text-align: right;
}

.cell-left{
text-align: left;
}

.cell-center{
text-align: center;
}
</style>

<?php if (!is_null($table->first())) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-responsive" >
            <thead>
                <tr class="small">
                    <th class="text-center">Kode</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten/Kota</th>
                    <th>Provinsi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
        </table>
    <?php } else { ?>
        <div class="alert alert-info">
            Data tidak tersedia atau tidak ditemukan...
        </div>
    <?php } ?>
</div>

<script type="text/javascript">
    $(".table").dataTable({
        "processing": true,
        // "serverSide": true,
        "deferRender": true,
        "ajax": '<?php echo URL::to('dash/setting/kecamatan/ajax'); ?>',

        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
        // "bSort": true,
        "bAutoWidth": false,
        "order":[[0,'asc']],
        "aaSorting":[[0,'asc']],
        "ordering": true,
        "aoColumns": [
                        {"sClass": "cell-center"},
                        {"sClass": "cell-left"},
                        {"sClass": "cell-left"},
                        {"sClass": "cell-left"},
                        {"sClass": "cell-center"},
                      ]

    });
</script>
