<div class="modal fade" id="delmodal-{{$val->id}}" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
          <strong>Peringatan Delete</strong>
          </h4>
      </div>
      <div class="modal-body text-justify" style="font-size:13px;">
        <p>
          Menghapus <b>Form{{strtoupper($val->nama)}}</b> dengan Nomer <b>LKA {{$val->no_lka}}</b>
          akan berakibat <b>TERHAPUSNYA SEMUA DATA</b> yang berkaitan dengan <b>Form{{strtoupper($val->nama)}}</b>,
          antara lain
          <b>Data Anak</b>, <b>FormKA3</b>, <b>FormKA4</b>, <b>FormKA5</b>, <b>FormKA6</b> dan <b>FormKA7</b>.
          Data yang telah terhapus tidak dapat dikembalikan ke kondisi semula.
        </p>
        <p>
          Apakah Anda masih ingin melanjutkan penghapusan data pada <b>Form{{strtoupper($val->nama)}}</b>?
        </p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" href="{{ URL::to('/dash/formka2multi/delete/'.$val->id.'/'.$lka) }}">
          <span class="glyphicon glyphicon-trash"></span> Delete
        </a>
        <button type="button" class="btn btn-primary" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove-sign"></span> Cancel
        </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
