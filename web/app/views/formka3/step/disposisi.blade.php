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


    <div class="form-group" ng-repeat="num in vm.list track by $index">
      <label class="col-sm-2 control-label">Kepada (<% $index+1 %>)</label>
      <div class="col-sm-4">
        <select class="form-control"
                ng-model="vm.kepada[$index]"
                ng-options="user.id as user.name for user in vm.user track by user.id "
                ng-change="vm.change($index)">

              <!-- <option ng-repeat="user in vm.user track by $index"
                      ng-selected=""
                      value="<% user.id %>">
                      <% user.name %>
              </option> -->

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

    <div class="form-group">
      <label class="col-sm-2 control-label">Kepada</label>
      <div class="col-sm-10">
      <pre><% vm.kepada %></pre>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">List</label>
      <div class="col-sm-10">
      <pre><% vm.list %></pre>
      </div>
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


  <?php if (isset($dis->kepada)){?>
    vm.kepada = <?php echo $dis->kepada ?>;
    vm.list = <?php echo $dis->kepada ?>;
  <?php } else { ?>
    vm.kepada = [];
    vm.list = [0];
  <?php } ?>

  vm.user = <?php echo $user; ?>


  function change(index){
    // vm.kepada[array_index] = vm.user[user_index];
    var selected = vm.kepada[index]-1;
    var user = vm.user[selected];
    var select = {id:user.id, name:user.name};
    vm.kepada[index] = select;
    console.log(select);
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
    }
  }
}
</script>
