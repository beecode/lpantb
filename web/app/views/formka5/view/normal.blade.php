<?php if (!is_null($table->first())) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-responsive" >
            <thead>
                <tr class="small">
                    <th>No LKA</th>
                    <th>Tanggal</th>
                    <th>Anak</th>
                    <th>Jenis Kasus</th>
                    <th>Intervensi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="small">
                <?php foreach ($table as $val) { ?>
                    <?php
                    $anak = $val->anak->first();
                    ?>
                    <tr>
                        <td>{{$val->no_lka}}</td>
                        <td>{{strftime( "%A, %d-%B-%Y", strtotime($val->tanggal))}}</td>
                        <td>
                            {{$anak->nama}}
                            <a href="{{URL::to('dash/anak/detailview/'.$anak->id)}}"
                               class="btn btn-sm btn-info pull-right" title="Detail Anak">
                                <span class=" glyphicon glyphicon-th-list"></span>
                            </a>
                        </td>
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

                        <td class="text-center">
                          <?php if (UserHelper::isLoggedUserIncluded($val->user)){ ?>
                            <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                                <a class="btn btn-small btn-info" title="Detail"
                                   href="{{ URL::to('/dash/formka5/detailview/'.$val->id) }}">
                                    <span class=" glyphicon glyphicon-th-list"></span>
                                </a>
                                <a class="btn btn-small btn-warning" title="Update"
                                   href="{{ URL::to('/dash/formka5/updateview/'.$val->id) }}">
                                    <span class=" glyphicon glyphicon-edit"></span>
                                </a>
                            <a class="btn btn-small btn-danger" title="Delete"
                                data-toggle="modal" data-target="#delmodal-{{$val->id}}">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                          </div>
                          @include('formka5.view.delwarning')
                            <?php } else { ?>
                              <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                                  <a class="btn btn-small btn-info" title="Detail"
                                     href="{{ URL::to('/dash/formka5/detailview/'.$val->id) }}">
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
