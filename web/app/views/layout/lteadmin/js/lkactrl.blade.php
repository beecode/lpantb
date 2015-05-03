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

    function LKAOnChange(){
      // console.log('test');
      var postdata = {lka: vm.no_lka};
      $http.post("formka1/lka",postdata).success(function(data, status, header){
        console.log('data '+data);
        console.log('status '+status);
        console.log('header '+header);
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
