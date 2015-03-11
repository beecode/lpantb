<!-- Modal -->
<div class="modal fade" id="anakpop{{$val->id}}"  
     tabindex="-99" role="dialog" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Konfirmasi Delete</h4>
            </div>
            <div class="modal-body text-left" >
                Menghapus anak dengan nama {{$val->nama}} akan 
                mengakibatkan seluruh form yang berkaitan dengan anak tersebut
                ikut terhapus.
                <br/><br/>
                Anda Yakin untuk menghapus Anak dengan Nama {{$val->nama}}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">
                    <span class="glyphicon glyphicon-backward"></span> 
                    Batal
                </button>
                <a href="{{URL::to('lpantb/anak/delete/'.$val->id)}}" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span> 
                    Hapus
                </a>
            </div>
        </div>
    </div>
</div>