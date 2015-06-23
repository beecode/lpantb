<div class="" ng-controller="LKACtrl as vm">

  <?php if ($form_status == "edit") { ?>
    {{Form::input('hidden','form[id]',$record->id)}}
    <?php } else {

      if (!isset($record)) {
        $record = $form;
      }
    } ?>

    {{Form::input('hidden','form[nama]','ka7')}}
    <?php $lka = (isset($record->no_lka)) ? $record->no_lka : null; ?>
    {{Form::input('hidden','form[no_lka]',$lka)}}

    <div class="form-group has-primary">
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
