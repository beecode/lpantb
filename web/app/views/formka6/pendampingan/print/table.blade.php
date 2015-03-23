

<?php if (!is_null($table->first())) { ?>
    <div class="table-responsive" style="width: 99%; padding-left:8px; ">
        <table class="table table-bordered" style="font-size: 13px; !important; ">
            <thead>
                <tr class="small">
                    <!-- <th class="text-center">No</th> -->
                    <th>Hari/Tanggal</th>
                    <th>Bentuk Pendampingan</th>
                    <th>Tempat</th>
                    <th>Pelaksana</th>
                    <th>Hasil Yang Dicapai</th>
                    <th>Rencana Tindak Lanjut</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody class="small">
                <?php $c = 1; ?>
                <?php foreach ($table as $val) { ?>
                    <tr>
                        <!-- <td class="text-center">{{$c++}}</td> -->
                        <td>{{strftime( "%A, %d %B %Y", strtotime($val->tanggal))}}</td>
                        <td>{{$val->bentuk}}</td>
                        <td>{{$val->tempat}}</td>
                        <td>{{$val->pelaksana}}</td>
                        <td>{{$val->hasil}}</td>
                        <td>{{$val->rencana}}</td>
                        <td>{{$val->keterangan}}</td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="alert alert-info">
            Data tidak tersedia atau tidak ditemukan...
        </div>
    <?php } ?>
</div>

<script type="text/javascript">
    // $(".table").dataTable({
    //     "bPaginate": false,
    //     "bLengthChange": false,
    //     "bFilter": false,
    //     "bInfo": false,
    //     // "bSort": true,
    //     "bAutoWidth": false,
    //     "order":[[2,'desc']],
    //     "aaSorting":[[2,'desc']],
    //     "ordering": true,
    // });
</script>
