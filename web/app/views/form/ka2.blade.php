@extends('layout.bootstrap.index')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            @if (Session::has('message'))
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('message') }}
            </div>
            @endif
            <h3 class="page-header">Pengisian Form Data</h3>
        </div>
    </div>
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>No LKA</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Sumber Informasi / Rujukan </p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Identitas Anak</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p>Ringkasan Kasus</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p>Finish</p>
            </div>
        </div>
    </div>
    <form role="form" action="{{ URL::to('') }}" class="form-horizontal">
        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12"><BR>
                    <h5>NO. LKA DAN TANGGAL</h5><hr>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">No LKA DAN TANGGAL</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">No. LKA</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="no" class="form-control" placeholder="No LKA">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-10 col-md-offset-5">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Tanggal</label>
                                            <div class="col-sm-6">
                                                <input type="date" name="tgl" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12"><BR>
                    <h5>SUMBER INFORMASI / RUJUKAN</h5><hr>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">SUMBER INFORMASI / RUJUKAN</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Sumber </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" 
                                           name="sumber" placeholder="Sumber">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Informasi </label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" name="tglinfo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Dasar Rujukan </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" 
                                           name="rujukan" placeholder="Dasar Rujukan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Contact Person </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" 
                                           name="contact" placeholder="Contact Person">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">No. Telepon </label>
                                <div class="col-sm-4">
                                    <input type="text" maxlength="12" 
                                           class="form-control" name="tlp" placeholder="No. Telepon">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12"><br>
                    <h5>IDENTITAS ANAK</h5><hr>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">IDENTITAS ANAK</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" 
                                           name="nameanak" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Kelamin </label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="jkanak">
                                        <option value="" disabled="" 
                                                selected="">Pilih Jenis kelamin...!</option>
                                        <option value="Laki-Laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Umur/Tgl Lahir</label>
                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Umur </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" 
                                               name="umur" placeholder="Umur">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label class="col-sm-2 control-label">Tanggal </label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="tgllahiranak">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Alamat </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" 
                                           name="alamatanak" placeholder="Alamat">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Desa/Kelurahan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" 
                                           name="desaanak" placeholder="Desa">
                                </div>
                                <div class="col-md-5">
                                    <label class="col-sm-2 control-label">Kec. </label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control"
                                               name="kecanak" placeholder="Kecamatan">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kab./Kota</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" 
                                           name="kotaanak" placeholder="Kota">
                                </div>
                                <div class="col-md-5">
                                    <label class="col-sm-2 control-label">Prop. </label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" 
                                               name="Propanak" placeholder="Provinsi">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">No. Telepon </label>
                                <div class="col-sm-4">
                                    <input type="text" maxlength="12" class="form-control" 
                                           name="tlpanak" placeholder="No. Telepon">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-4">
            <div class="col-xs-12">
                <div class="col-md-12"><br>
                    <h5>RINGKASAN KASUS</h5><hr>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">RINGKASAN KASUS</div>
                        <div class="panel-body">
                            <textarea class="form-control" name="ringkasankasus" rows="6"></textarea><br>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Penerima Laporan</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" 
                                           name="penerima" placeholder="Penerima Laporan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-5">
            <div class="col-xs-12">
                <div class="col-md-12"><BR>
                    <h5> PENYIMPANAN DATA</h5>
                    <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
@stop