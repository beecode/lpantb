<tr>
  <td>{{$res->no_lka}}</td>
  <td>{{strtoupper($res->nama)}}</td>
  <td>{{$res->anak->first()->nama}}</td>
  <?php if ($res->nama=="ka1"){ ?>
    <td>{{$res->anak->first()->pelapor->first()->nama}}</td>
  <?php } else if ($res->nama=="ka2") {?>
    <td>{{$res->anak->first()->sumberinformasi->first()->sumber}}</td>
  <?php } ?>

  <td>
    <?php $formka3=false; ?>
    <?php
      $anak = App\Models\Anak::where('nama','=',$res->anak->first()->nama)->first();

    ?>

    <?php foreach($anak->form as $form) { ?>
      <span class="btn btn-warning btn-xs btn-flat">
        {{strtoupper($form->nama)}}
      </span>
      <?php
        if ($form->nama == "ka3"){
          $formka3 = true;
          $formka3_id = $form->id;
        }
      ?>
    <?php } ?>
  </td>

  <td>
    <?php if ($formka3==true){ ?>
      <a href="{{URL::to('dash/formka3/updateview/'.$formka3_id)}}" class="btn btn-warning">
        <span class="glyphicon glyphicon-edit"></span>
      </a>
    <?php } else { ?>
      <a href="{{URL::to('dash/formka3/addview/'.$res->anak->first()->id)}}" class="btn btn-default">
        <span class="glyphicon glyphicon-plus"></span>
      </a>
    <?php } ?>
  </td>

</tr>
