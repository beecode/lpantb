<?php if (!is_null($table->first())) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-responsive" >
            <thead>
                <tr class="small">
                    <th class="text-center">Kode</th>
                    <th>No LKA</th>
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
                    $pelapor = $anak->pelapor->first();
                    ?>
                    <tr>
                        <td class="text-center">{{$val->id}}</td>
                        <td>{{$val->no_lka}}</td>
                        <td>{{strftime( "%A, %d-%B-%Y", strtotime($val->tanggal))}}</td>
                        <td>
                            {{$pelapor->nama}}
                        </td>
                        <td>
                            {{$anak->nama}}
                            <a href="{{URL::to('lpantb/anak/detailview/'.$anak->id)}}" 
                               class="btn btn-sm btn-info pull-right" title="Detail Anak">
                               <span class=" glyphicon glyphicon-th-list"></span> 
                            </a>
                        </td>
                        <td class="text-center">
                            <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                                <a class="btn btn-small btn-info" title="Detail Form" 
                                   href="{{ URL::to('/lpantb/formka1/detailview/'.$val->id) }}">
                                    <span class=" glyphicon glyphicon-th-list"></span> 
                                </a>
                                <a class="btn btn-small btn-warning" title="Update" 
                                   href="{{ URL::to('/lpantb/formka1/updateview/'.$val->id) }}">
                                    <span class=" glyphicon glyphicon-edit"></span> 
                                </a>
                                <a class="btn btn-small btn-danger" title="Delete" 
                                   href="{{ URL::to('/lpantb/formka1/delete/'.$val->id) }}">
                                    <span class="glyphicon glyphicon-trash"></span> 
                                </a>
                            </div>
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
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
    });
</script>