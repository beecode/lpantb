<div id="modal-add" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Pilih Data Anak</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="col-sm-7">
                        {{ Form::text('anak[nama]', '', ['class' => 'form-control typeahead','required'])  }}
                    </div>
                    <span class="">
                        <button class="btn btn-primary" type="button">Check</button>
                    </span>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
