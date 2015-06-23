<div class="" ng-controller="LKACtrl as vm">

  <?php if ($form_status == "edit") { ?>
    {{Form::input('hidden','form[id]',$record->id)}}
    <?php } else {

      if (!isset($record)) {
        // $record = $form;
      }
    } ?>

    {{Form::input('hidden','form[no_lka]',$lka)}}
    {{Form::input('hidden','form[nama]','ka1')}}
    {{Form::input('hidden','form[mode]','multiple')}}
    <div class="form-group has-primary">
      {{ Form::label('tgl', 'Tanggal',['class'=>'col-sm-2 control-label']) }}
      <div class="col-sm-3">
        <?php $tanggal = (isset($record->tanggal)) ? $record->tanggal : date('Y-m-d'); ?>
        {{Form::input('hidden','form[tanggal_old]', $tanggal)}}
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
