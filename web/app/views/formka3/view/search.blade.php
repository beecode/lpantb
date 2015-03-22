<!-- <div class="pull-right col-sm-6">
    <form  method="GET" style="margin-right: 0px; padding-left: 0px;"
           action="{{ URL::to('/lpantb/formka3/search') }}" >

        <div class="form-group">
            <div class="input-group">
                <input class="form-control" type="search" name="keyword"
                       placeholder="Kode|No LKA|Anak|Jenis Kasus|Tindak Lanjut|Tanggal">
                <span class="input-group-btn">
                    <button class="btn btn-info btn-flat" type="submit">
                        <i class="fa fa-search"></i>&nbsp;
                    </button>
                </span>
                <span class="input-group-btn" style="padding-left: 5px;">
                    <a id="filter-btn" class="btn btn-warning btn-flat">
                        Filter
                    </a>
                </span>
                <script type="text/javascript">
                    $("#filter-btn").click(function () {
                        $("#filter-form").toggle("slide");
                    });
                </script>
            </div>
        </div>

        <div id="filter-form" class="form-group" style="display: none">
            <div class="radio">
                <label style="margin-left: 0px; padding-left: 0px;">
                    <input type="radio" name="filter" value="kode"/> Kode
                </label>
                <label style="margin-left: 5px; padding-left: 5px;">
                    <input type="radio" name="filter" value="lka"/> LKA
                </label>
                <label style="margin-left: 5px; padding-left: 5px;">
                    <input type="radio" name="filter" value="anak" checked/> Anak
                </label>
                <label style="margin-left: 5px; padding-left: 5px;">
                    <input type="radio" name="filter" value="jenis"/> Jenis Kasus
                </label>
                 <label style="margin-left: 5px; padding-left: 5px;">
                    <input type="radio" name="filter" value="tindak"/> Tindak Lanjut
                </label>
                <label style="margin-left: 5px; padding-left: 5px;">
                    <input type="radio" name="filter" value="tanggal"> Tanggal
                </label>
            </div>
        </div>
    </form>
</div> -->
