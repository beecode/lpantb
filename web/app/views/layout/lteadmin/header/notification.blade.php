<style>
  .notif-new {
    background: rgba(60,141,188,0.2);
  }
  .notif-read{
    background: rgba(0,0,0,0.05);;
  }

  .left-notif{
    width:55px;
    /*height:89px;*/
    font-size:21px;
    text-align:center;
    padding:19px 0px;
    background:#00c0ef;
    color:rgba(255, 255, 255, 0.7);
    margin-right:5px;
  }
</style>

<!-- Messages: style can be found in dropdown.less-->
<li class="dropdown messages-menu" ng-controller="NotifCtrl as vm">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <strong>Notifikasi</strong>
    <i class="fa fa-globe"></i>
    <span class="label label-danger" ng-show="vm.notifNew != 0"><% vm.notifNew %></span>
  </a>
  <ul class="dropdown-menu" style="width:610px;">
    <li class="header">
      You have <% vm.notifNew %> new messages
      <div class="pull-right">
        <a href="#" style="color: rgba(60,141,188,1);" ng-click="vm.markAllRead()">
          Mark All As Read
        </a>
        |
        <a href="{{URL::to('dash/setting/notification')}}" style="color: rgba(60,141,188,1);">
          Setting Notification
        </a>
      </div>
    </li>
    <li>
      <!-- inner menu: contains the actual data -->
      <ul class="menu" style="height:377px;">
        <!-- start message -->
        <li ng-repeat="notif in vm.notif track by $index"
            ng-class="{'notif-new': notif.status=='new', 'notif-read': notif.status=='read'}">

          <a href="{{URL::to('dash/notifikasi/read/<% notif.id %>')}}">
            <!-- <div class="pull-left" style="color:black;"> -->
              <!-- <i class="fa fa-warning danger" style=""></i> -->
            <!-- </div> -->
            <div class="pull-left left-notif">
              <% (vm.notif.length - $index) %>
            </div>
            <h4>
              <% notif.title %>
              <!-- <small><i class="fa fa-clock-o"></i> <% notif.created_at | amCalendar %> </small> -->
              <small style="font-size:11px;">
                <i class="fa fa-clock-o"></i> <span am-time-ago="notif.created_at">
              </span></small>
            </h4>
            <p ng-bind-html="vm.showHTML(notif.desc)"></p>
          </a>
        </li><!-- end message -->
      </ul>
    </li>
    <li class="footer">
      <a href="{{URL::to('dash/notifikasi/view')}}">See All Messages</a>
      </li>
  </ul>
</li>
<!-- Notifications: style can be found in dropdown.less -->


<script type="text/javascript">
app.controller('NotifCtrl',NotifCtrl);
NotifCtrl.$inject = ['$http','$interval','$sce'];

function NotifCtrl($http, $interval,$sce){
  var vm = this;
  vm.getNotif = getNotif;
  vm.getNewNotifCount = getNewNotifCount;
  vm.showHTML = showHTML;
  vm.markAllRead = markAllRead;

  vm.my_user_id = <?php echo Auth::user()->id; ?>;
  vm.countDown = 1;
  vm.notif=null;
  vm.intervalTime = 5000;
  vm.notifNum = 0;
  vm.notifNew = 0;

  activate();

  function getNotif(){
    var url = 'http://lpantb.dev/dash/notifserv/mynotif/'+vm.my_user_id;
    $http.get(url)
    .success(function(data, status, header, config){
      vm.notif = data;

    })
    .error(function(data, status, header, config){
      console.log('data '+data);
      console.log('status '+status);
      console.log('header '+header);
    });
  }

  function getNewNotifCount(){
    var url = 'http://lpantb.dev/dash/notifserv/mynotif/new/count/'+vm.my_user_id;
    $http.get(url)
    .success(function(data, status, header, config){
      vm.notifNew = data;
    })
    .error(function(data, status, header, config){
      console.log('data '+data);
      console.log('status '+status);
      console.log('header '+header);
    });
  }

  function markAllRead() {
    var url = 'http://lpantb.dev/dash/notifserv/markread';
    $http.get(url)
    .success(function(data, status, header, config){
      console.log(data);
      activate();
    })
    .error(function(data, status, header, config){
      console.log('data '+data);
      console.log('status '+status);
      console.log('header '+header);
    });
  }

  function showHTML($data){
    return $sce.trustAsHtml($data);
  }

  function activate(){
    $interval(
      function(){
        getNotif();
        getNewNotifCount();
      },
      vm.intervalTime
    );
    getNotif();
    getNewNotifCount();
  }




}
</script>
