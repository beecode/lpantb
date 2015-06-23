

<?php if ($form_status == "edit") { ?>
  {{Form::input('hidden','pendamping[id]', $data->id)}}
  <?php } ?>

  {{Form::input('hidden','anak[id]', $anak->id)}}

  <div class="form-group has-primary">
    {{ Form::label('tgl', 'Tanggal',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-3">
      <?php $pen['tanggal'] = (isset($data->tanggal)) ? $data->tanggal : null; ?>
      <input type="date" class="form-control" value="{{$pen['tanggal']}}" name="pendamping[tanggal]">
    </div>
  </div>

  <div class="form-group has-primary">
    {{ Form::label('lka', 'Bentuk Pendampingan',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-5">
      <?php $pen['bentuk'] = (isset($data->bentuk)) ? $data->bentuk : null; ?>
      {{ Form::text('pendamping[bentuk]', $pen['bentuk'], ['class' => 'form-control'])  }}
    </div>
  </div>

  <div class="form-group has-primary">
    {{ Form::label('lka', 'Tempat',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-5">
      <?php $pen['tempat'] = (isset($data->tempat)) ? $data->tempat : null; ?>
      {{ Form::text('pendamping[tempat]', $pen['tempat'], ['class' => 'form-control'])  }}
    </div>
  </div>

  <div class="form-group has-primary" ng-repeat="pelaksana in vm.list track by $index">
    <label class="col-sm-3 control-label">Pelaksana</label>
    <div class="col-sm-4" >
      <!-- <?php $pen['pelaksana'] = (isset($data->pelaksana)) ? $data->pelaksana : null; ?>
      {{ Form::text('pendamping[pelaksana]', $pen['pelaksana'], ['class' => 'form-control'])  }} -->
      <input type="text" name="pelaksana" class="form-control" ng-model="pelaksana.text">
    </div>
    <span class="btn btn-default" ng-click="vm.add()" style="margin:0px;" ng-show="$index==0">
      <i class="fa fa-plus"></i>
    </span>
    <span class="btn btn-default" ng-click="vm.remove(pelaksana)" style="margin:0px;" ng-show="$index!=0">
      <i class="fa fa-minus"></i>
    </span>
  </div>

  <div style="display: none;">
    <input type="text" name="pendamping[pelaksana]" value="<% vm.list %>">
  </div>

  <div class="form-group has-primary">
    {{ Form::label('lka', 'Hasil Yang Dicapai',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-5">
      <?php $pen['hasil'] = (isset($data->hasil)) ? $data->hasil : null; ?>
      {{ Form::text('pendamping[hasil]', $pen['hasil'], ['class' => 'form-control'])  }}
    </div>
  </div>

  <div class="form-group has-primary">
    {{ Form::label('lka', 'Rencana Tindak Lanjut',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-5">
      <?php $pen['rencana'] = (isset($data->rencana)) ? $data->rencana : null; ?>
      {{ Form::text('pendamping[rencana]', $pen['rencana'], ['class' => 'form-control'])  }}
    </div>
  </div>

  <div class="form-group has-primary">
    {{ Form::label('lka', 'Keterangan',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-5">
      <?php $pen['ket'] = (isset($data->keterangan)) ? $data->keterangan : null; ?>
      {{ Form::text('pendamping[keterangan]', $pen['ket'], ['class' => 'form-control'])  }}
    </div>
  </div>
