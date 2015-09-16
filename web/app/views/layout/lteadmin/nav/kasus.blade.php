<a href="#">
    <i class="fa fa-edit"></i>
    <span> Kasus Anak</span>
    <i class="fa pull-right fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
    <li>
        <a href="{{URL::to('dash/anak')}}">
          <i class="fa fa-user"></i>Data Anak
        </a>
    </li>
    <li>
        <a href="{{URL::to('dash/formka1')}}">
          <i class="fa fa-th-list"></i>Form KA1
        </a>
    </li>
    <li>
        <a href="{{URL::to('dash/formka2')}}">
          <i class="fa fa-th-list"></i>Form KA2
        </a>
    </li>
    <?php  if (Auth::user()->level == "admin" || Auth::user()->level == "developer") {?>
    <li>
        <a href="{{URL::to('dash/formka3/viewLKA')}}">
          <i class="fa fa-th-list"></i>Form KA3
        </a>
    </li>
    <?php } ?>
    <li>
        <a href="{{URL::to('dash/formka4')}}">
          <i class="fa fa-th-list"></i>Form KA4
        </a>
    </li>
    <?php  if (Auth::user()->level == "admin" || Auth::user()->level == "developer") {?>
    <li>
        <a href="{{URL::to('dash/formka5/assessment')}}">
          <i class="fa fa-th-list"></i>Form KA5
        </a>
    </li>
    <?php } ?>
    <li>
        <a href="{{URL::to('dash/formka6')}}">
          <i class="fa fa-th-list"></i>Form KA6
        </a>
    </li>
    <li>
        <a href="{{URL::to('dash/formka7')}}">
          <i class="fa fa-th-list"></i>Form KA7
        </a>
    </li>
</ul>
