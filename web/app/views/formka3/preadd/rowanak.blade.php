<tr>
  <td>{{$res->form->first()->no_lka}}</td>
  <td>{{strtoupper($res->form->first()->nama)}}</td>
  <td>{{$res->nama}}</td>
  <?php if ($res->form->first()->nama=="ka1"){ ?>
    <td>{{$res->pelapor->first()->nama}}</td>
  <?php } else {?>
    <td>{{$res->sumberinformasi->first()->sumber}}</td>
  <?php } ?>
  <td>
    <?php $formka3=false; ?>
    <?php foreach($res->form as $form) { ?>
      <span class="btn btn-info btn-xs btn-flat">
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
      <a href="{{URL::to('dash/formka3/addview/'.$res->id)}}" class="btn btn-default">
        <span class="glyphicon glyphicon-plus"></span>
      </a>
    <?php } ?>
  </td>
</tr>
