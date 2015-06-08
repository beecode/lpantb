<?php if (count($table)!=0) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-responsive" >
            <thead>
                <tr class="small">
                  <th>No LKA</th>
                  <th>Tanggal</th>
                  <th>Sumber</th>
                  <th>Nama Anak</th>
                  <th>Pelapor/Sumber</th>
                  <th>Progress Kasus</th>
                  <th>Aksi</th>
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
                        <td>Form {{strtoupper($val->nama)}}</td>
                        <td>
                            {{$anak->nama}}
                            <a href="{{URL::to('dash/anak/detailview/'.$anak->id)}}"
                               class="btn btn-sm btn-info pull-right" title="Detail Anak">
                                <span class=" glyphicon glyphicon-th-list"></span>
                            </a>
                        </td>

                        <td>
                          <?php
                            $pelsum = "";
                            if ($val->nama == "ka1"){
                              $pelsum = $anak->pelapor->first()->nama;
                            } else if ($val->nama == "ka2"){
                              $pelsum = $anak->sumberinformasi->first()->sumber;
                            }
                           ?>
                            {{$pelsum}}
                        </td>

                        <td>
                          <?php $isFormKA3Exist=false; ?>
                          <?php foreach($anak->form as $fm) { ?>
                            <?php
                              if ($fm->nama =="ka3"){
                                $isFormKA3Exist = true;
                              }
                             ?>
                            <span class="btn btn-info btn-xs btn-flat">
                              {{strtoupper($fm->nama)}}
                            </span>
                          <?php } ?>
                        </td>

                        <td class="text-center">
                          <?php if (UserHelper::amIAdmin()){ ?>
                            <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                                <?php $url_detail = "/dash/form".$val->nama."/detailview/".$val->id; ?>
                                <a class="btn btn-small btn-info" title="Detail"
                                   href="{{ URL::to($url_detail) }}">
                                    <span class=" glyphicon glyphicon-th-list"></span>
                                </a>
                                <a href="{{URL::to('dash/formka3/addview/'.$anak->id)}}" class="btn btn-warning">
                                  <span class="glyphicon glyphicon-plus"></span>
                                </a>
                            </div>
                            <?php } else { ?>
                              <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                                  <a class="btn btn-small btn-info" title="Detail"
                                     href="{{ URL::to('/dash/formka3/detailview/'.$val->id) }}">
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
