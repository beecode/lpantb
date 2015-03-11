<div class="pull-right col-sm-4">  
    <form  method="GET" style="margin-right: 0px; padding-left: 0px;"
           action="{{ URL::to('/lpantb/formka1/search') }}" >

        <div class="form-group">
            <div class="input-group">
                <input class="form-control" type="search" name="keyword" 
                       placeholder="Kode|Anak|Pelapor|No LKA">
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
                <label>
                    <input type="radio" name="filter" value="lka"/> LKA
                </label>
                <label>
                    <input type="radio" name="filter" value="anak" > Anak
                </label>
                <label>
                    <input type="radio" name="filter" value="pelapor"> Pelapor
                </label>

            </div>
        </div>
    </form>
</div>