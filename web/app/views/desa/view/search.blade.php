<div class="pull-right col-sm-4">  
    <form method="GET" action="{{ URL::to('/dash/setting/desa/search') }}" >

        <div class="input-group">
            <input class="form-control" type="search" name="keyword"
                   placeholder="Masukan Kata Kunci Pencarian">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="submit">
                    <i class="fa fa-search"></i>&nbsp;
                </button>
            </span>
        </div>

    </form>
</div>
