<div class="pull-right col-sm-4">  
    <form method="GET" 
          action="{{ URL::to('/lpantb/staff/search') }}" >
        <div class="input-group custom-search-form">
            <div class="col-xs-12 col-xs-offset-1">
                <input type="search" name="keyword" class="form-control typeahead" 
                       autocomplete="off" data-provide="typeahead" 
                       placeholder="Berdasarkan Kode & Nama">

            </div>
            <!--include js-->
            <span class="input-group-btn">
                <button class="btn btn-info" type="submit">
                    <i class="fa fa-search"></i>&nbsp;
                </button>
            </span>
        </div>
    </form>
</div>