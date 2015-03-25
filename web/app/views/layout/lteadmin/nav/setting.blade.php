<a href="#">
    <i class="fa fa-cog"></i> <span>Setting</span> <i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
    <li class="treeview" style="margin-left: 10px;">
        <a href="#">
            <i class="fa fa-location-arrow"></i> <span>Lokasi</span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="{{URL::to('lpantb/provinsi')}}" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Provinsi </a>
            </li>
            <li>
                <a href="{{URL::to('lpantb/kabkota')}}" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Kabupaten / Kota </a>
            </li>
            <li>
                <a href="{{URL::to('lpantb/kecamatan')}}" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Kecamatan </a>
            </li>
            <li>
                <a href="{{URL::to('lpantb/desa')}}" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Desa </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="{{URL::to('lpantb/agama')}}" style="margin-left: 10px;"><i class="fa fa-pagelines"></i> Agama</a>
    </li>
</ul>
