<div class="" ng-controller="DisposisiCtrl as vm">
  <?php
    $dis = null;
    if (isset($record)) {
      $dis = $record->disposisi->first();
    }
  ?>


  <?php if ($form_status == "edit") { ?>
    {{Form::input('hidden','disposisi[id]',$dis->id)}}
  <?php } ?>


    <div class="form-group" ng-repeat="num in vm.list" ng-init="parentIndex = $index">
      <label class="col-sm-2 control-label">Kepada (<% parentIndex+1 %>)</label>
      <div class="col-sm-4">
        <select class="form-control"
                ng-model="vm.kepada[parentIndex]"
                ng-options="user.id as user.name for user in vm.user track by user.id"
                ng-change="vm.change(parentIndex)" required="required">
        </select>
      </div>

      <span class="btn btn-default"
            ng-show="$index>0"
            ng-click="vm.remove(num)"
            style="margin:0px;">
        <i class="fa fa-minus"></i>
      </span>
      <span class="btn btn-default"
            ng-show="$index==0"
            ng-click="vm.add($index)"
            style="margin:0px;">
        <i class="fa fa-plus"></i>
      </span>
    </div>

    <div style="display: none;">
      <input type="text" name="disposisi[kepada]" value="<% vm.kepada %>">
    </div>

    <div class="form-group">
      {{ Form::label('disposisi[isi]', 'Isi Disposisi',['class'=>'control-label col-sm-2']) }}
      <div class="col-sm-9">
        <?php $isi = (isset($dis->isi)) ? $dis->isi : null; ?>
        {{ Form::textarea('disposisi[isi]', $isi, ['class' => 'form-control ckeditor','required','rows'=>'8','cols'=>'20'])  }}
      </div>
    </div>
</div>

<script type="text/javascript">
app.controller('DisposisiCtrl',DisposisiCtrl);
DisposisiCtrl.$inject = [];

function DisposisiCtrl(){
  var vm = this;
  vm.add = add;
  vm.remove = remove;
  vm.change = change;
  // vm.activate  = activate;

  vm.user = <?php echo $user; ?>

  <?php if (isset($dis->kepada)){?>
    <?php if ($dis->kepada == "[]") { ?>
      vm.kepadaSelected = vm.user[0];
      vm.kepada =  [];
      vm.list = [0];
    <?php } else { ?>
      vm.kepadaSelected = <?php echo $dis->kepada ?>;
      vm.kepada = <?php echo $dis->kepada ?>;
      vm.list = <?php echo $dis->kepada ?>;
      <?php } ?>
  <?php } else { ?>
    vm.kepadaSelected = vm.user[0];
    vm.kepada =  [];
    vm.list = [0];
  <?php } ?>

  run();
  function run(){
    console.log(vm.user[0]);
  }




  //Pencarian untuk user index array berdasarkan id object yang dipilih
  //START
  function findIndexOfUser(user_id){
    var indexOut = null;
    for (var index = 0; index < vm.user.length; index++){
      var user = vm.user[index];
      if (user.id == user_id){
        indexOut = index;
      }
    }
    return indexOut;
  }
  //END

  function change(parentIndex){
    var user_id = vm.kepada[parentIndex];
    var user_index = findIndexOfUser(user_id);
    var user = vm.user[user_index];
    var select = {id:user.id, name:user.name};
    // vm.kepadaSelected[parentIndex] = select;
    vm.kepada[parentIndex] = select;
  }

  function add(){
    vm.list.push((vm.list.length));
  }

  function remove(num){
    //remove from table in view
    var index = vm.list.indexOf(num);
    if (index > -1) {
      vm.list.splice(index, 1);
      vm.kepada.splice(index, 1);
      vm.kepadaSelected.splice(index,1);
    }
  }
}
</script>
