<div class="" ng-controller="LKACtrl as vm">

  <?php if ($form_status == "edit") { ?>
    {{Form::input('hidden','form[id]',$record->id)}}
    <?php } else {

      if (!isset($record)) {
        $record = $form;
      }
    } ?>

    {{Form::input('hidden','form[nama]','ka3')}}
    <div class="form-group">
      {{ Form::label('lka', 'No LKA',['class'=>'col-sm-2 control-label']) }}
      <div class="col-sm-3">
        <?php $lka = (isset($record->no_lka)) ? $record->no_lka : null; ?>
        <input  type="text" class="form-control"
                name="form[no_lka]" value="{{$lka}}"
                ng-disabled="vm.isLKA">
      </div>
      <span class="btn btn-default"
            ng-click="vm.LKAToggle()"
            style="margin:0px;">
      <i class="glyphicon <% vm.LKAIcon %>"></i>
    </span>
    </div>

    <div class="form-group">
      {{ Form::label('tgl', 'Tanggal',['class'=>'col-sm-2 control-label']) }}
      <div class="col-sm-3">
        <?php $tanggal = (isset($record->tanggal)) ? $record->tanggal : date('Y-m-d'); ?>
        <input  class="form-control" type="date"
                name="form[tanggal]" value="{{$tanggal}}"
                ng-disabled="vm.isTanggal">
      </div>
      <span class="btn btn-default"
            ng-click="vm.tanggalToggle()"
            style="margin:0px;">
      <i class="glyphicon <% vm.tanggalIcon %>"></i>
    </span>
  </div>
</div>
