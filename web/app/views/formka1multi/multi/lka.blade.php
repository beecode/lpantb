<div class="" ng-controller="LKACtrl as vm">

  <?php if ($form_status == "edit") { ?>
    {{Form::input('hidden','form[id]',$record->id)}}
    <?php } else {

      if (!isset($record)) {
        // $record = $form;
      }
    } ?>

    {{Form::input('hidden','form[nama]','ka1')}}
    {{Form::input('hidden','form[mode]','multiple')}}

    <div class="form-group">
      {{ Form::label('lka', 'No LKA',['class'=>'col-sm-3 control-label']) }}
      <div class="col-sm-3">
        <?php $lka = (isset($record->no_lka)) ? $record->no_lka : LKAHelper::getLKA(); ?>
        <input  type="text" class="form-control" ng-model="vm.no_lka"
                name="form[no_lka]" value="{{$lka}}"
                ng-disabled="vm.isLKA" ng-change="vm.LKAOnChange()">
      </div>
      <span class="btn btn-default"
            ng-click="vm.LKAToggle()"
            style="margin:0px;">
      <i class="glyphicon <% vm.LKAIcon %>"></i>
    </span>
    </div>

    <div class="form-group">
      {{ Form::label('tgl', 'Tanggal',['class'=>'col-sm-3 control-label']) }}
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

  <div class="form-group">
    <label class="control-label col-sm-3"></label>
    <div class="col-sm-1">
      <button class="btn btn-primary">
        Next
      </button>
    </div>
  </div>


</div>

<script type="text/javascript">
  app.controller('LKACtrl',LKACtrl);
  LKACtrl.$inject = ['$http'];

  function LKACtrl($http){
    var vm = this;
    vm.tanggalToggle = tanggalToggle;
    vm.tanggalIcon = "glyphicon-ok";
    vm.isTanggal = true;

    vm.LKAToggle = LKAToggle;
    vm.LKAIcon = "glyphicon-ok"
    vm.isLKA = true;

    vm.LKAOnChange = LKAOnChange;
    vm.no_lka = '<?php echo $lka; ?>';

    function LKAOnChange(){
      // console.log('test');
      var postdata = {lka: vm.no_lka};
      $http.post("lka",postdata).success(function(data, status, header){
        console.log('data '+data.result);

      });
    }

    function tanggalToggle(){
      vm.isTanggal = !vm.isTanggal;
      if (vm.isTanggal==true){
        vm.tanggalIcon = "glyphicon-ok";
      } else {
        vm.tanggalIcon = "glyphicon-remove";
      }
    }

    function LKAToggle(){
      vm.isLKA = !vm.isLKA;
      if (vm.isLKA==true){
        vm.LKAIcon = "glyphicon-ok"
      } else {
        vm.LKAIcon = "glyphicon-remove"
      }
    }
  }
</script>
