<?php foreach ($table as $val) { ?>
  <?php
    $anak = isset($val->anak->first()->nama) ? $val->anak->first() : null;
    $sumber = isset($anak->sumberinformasi->first()->sumber) ? $anak->sumberinformasi->first() : null;
  ?>
  <tr>

          <td>
            {{$val->no_lka}}
            <?php $lka = base64_encode($val->no_lka); ?>
            <a class="btn btn-small btn-info pull-right" title="Multi Kasus"
               href="{{ URL::to('/dash/formka2multi/view/'.$lka)}}">
                 <span class=" glyphicon glyphicon-th-large"></span>
            </a>
          </td>
          <td>{{strftime( "%d-%B-%Y", strtotime($val->tanggal))}}</td>
          <td><?php echo !is_null($sumber) ? $sumber->sumber : ""; ?></td>
          <td><?php echo !is_null($anak) ? $anak->nama : ""; ?></td>
          <td><?php echo $val->user->first()->name; ?></td>
          <td class="text-center">
            <?php if (UserHelper::isLoggedUserIncluded($val->user)){ ?>
              <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                <a class="btn btn-small btn-info" title="Detail Form"
                   href="{{ URL::to('/dash/formka2/detailview/'.$val->id) }}">
                    <span class=" glyphicon glyphicon-th-list"></span>
                </a>
                <a class="btn btn-small btn-warning" title="Update"
                   href="{{ URL::to('/dash/formka2/updateview/'.$val->id) }}">
                    <span class=" glyphicon glyphicon-edit"></span>
                </a>
                <?php  if (Auth::user()->level == "admin" || Auth::user()->level == "developer") {?>
                <a class="btn btn-small btn-danger" title="Delete"
                    data-toggle="modal" data-target="#delmodal-{{$val->id}}">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
                <?php } ?>
              </div>
              @include('formka2.view.delwarning')
        <?php } else { ?>
            <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
              <a class="btn btn-small btn-info" title="Detail Form"
                 href="{{ URL::to('/dash/formka2/detailview/'.$val->id) }}">
                   <span class=" glyphicon glyphicon-th-list"></span>
              </a>
            </div>
        <?php } ?>
      </td>
    </tr>
<?php } ?>
