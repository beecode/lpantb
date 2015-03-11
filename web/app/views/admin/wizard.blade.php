@extends('layout.lteadmin.index')

@section('content')
@if (Session::has('message'))
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('message') }}
</div>
@endif
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Wizard
            <small>Form ka-1</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Wizard</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form id="myWizard" type="post" action="" class="form-horizontal">
            <section class="step" data-step-title="No LKA">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">No. LKA</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" 
                                       name="nolka" placeholder="No LKA" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-10 col-md-offset-5">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal</label>
                                <div class="col-sm-6">
                                    <input type="date" required="" name="tgl" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="step" data-step-title="Identitas Pelapor">
                <div class="form-group">    
                    <label class="col-sm-2 control-label">Nama </label>
                    <div class="col-sm-5">
                        <input type="text" required="" class="form-control" 
                               name="namepelapor" placeholder="Nama">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Kelamin </label>
                    <div class="col-sm-3">
                        <select class="form-control" name="jkpelapor">
                            <option value="" disabled="" 
                                    selected="">Pilih Jenis kelamin...!</option>
                            <option value="Laki-Laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tempat/Tgl Lahir</label>
                    <div class="col-sm-4">
                        <input type="text" required="" class="form-control" 
                               name="tmppelapor" placeholder="Tempat">
                    </div>
                    <div class="col-md-5">
                        <label class="col-sm-2 control-label">Tanggal </label>
                        <div class="col-sm-7">
                            <input type="date" required="" class="form-control" name="tgllahirpelapor">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Pekerjaan </label>
                    <div class="col-sm-5">
                        <input type="text" required="" class="form-control" 
                               name="kerjapelapor" placeholder="Pekerjaan">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat </label>
                    <div class="col-sm-5">
                        <input type="text" required="" class="form-control" 
                               name="alamatpelapor" placeholder="Alamat">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Desa/Kelurahan</label>
                    <div class="col-sm-4">
                        <input type="text" required="" class="form-control" 
                               name="desapelapor" placeholder="Desa">
                    </div>
                    <div class="col-md-5">
                        <label class="col-sm-2 control-label">Kec. </label>
                        <div class="col-sm-7">
                            <input type="text" required="" class="form-control" 
                                   name="kecpelapor" placeholder="Kecamatan">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Kab./Kota</label>
                    <div class="col-sm-4">
                        <input type="text" required="" class="form-control" 
                               name="kotapelapor" placeholder="Kota">
                    </div>
                    <div class="col-md-5">
                        <label class="col-sm-2 control-label">Prop. </label>
                        <div class="col-sm-7">
                            <input type="text" required="" class="form-control" 
                                   name="Proppelapor" placeholder="Provinsi">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Agama </label>
                    <div class="col-sm-3">
                        <select class="form-control" name="agamapelapor">
                            <option value="" disabled="" selected="">Pilih Agama...!</option>
                            <option value="Islam">Islama</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">No. Telepon </label>
                    <div class="col-sm-4">
                        <input type="text" required="" maxlength="12" class="form-control" 
                               name="tlppelapor" placeholder="No. Telepon">
                    </div>
                </div>
            </section>
            <section class="step" data-step-title="Identitas Anak">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama </label>
                    <div class="col-sm-5">
                        <input type="text" required="" class="form-control" 
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
                    <label class="col-sm-2 control-label">Tempat/Tgl Lahir</label>
                    <div class="col-md-3">
                        <label class="col-sm-3 control-label">Tempat </label>
                        <div class="col-sm-9">
                            <input type="text" required="" class="form-control" 
                                   name="tmpanak" placeholder="Tempat">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label class="col-sm-5 control-label">Tanggal </label>
                        <div class="col-sm-7">
                            <input type="date" required="" class="form-control" name="tgllahiranak">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Pekerjaan </label>
                    <div class="col-sm-5">
                        <input type="text" required="" class="form-control" 
                               name="kerjaanak" placeholder="Pekerjaan">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat </label>
                    <div class="col-sm-5">
                        <input type="text" required="" class="form-control" 
                               name="alamatanak" placeholder="Alamat">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Desa/Kelurahan</label>
                    <div class="col-sm-4">
                        <input type="text" required="" class="form-control" 
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
                        <input type="text" required="" class="form-control" 
                               name="kotaanak" placeholder="Kota">
                    </div>
                    <div class="col-md-5">
                        <label class="col-sm-2 control-label">Prop. </label>
                        <div class="col-sm-7">
                            <input type="text" required="" class="form-control" 
                                   name="Propanak" placeholder="Provinsi">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Agama </label>
                    <div class="col-sm-3">
                        <select class="form-control" name="agamaanak">
                            <option value="" disabled="" selected="">Pilih Agama...!</option>
                            <option value="Islam">Islama</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">No. Telepon </label>
                    <div class="col-sm-4">
                        <input type="text" required="" maxlength="12" class="form-control" 
                               name="tlpanak" placeholder="No. Telepon">
                    </div>
                </div>
            </section>
            <section class="step" data-step-title="Ringkasan Kasus">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ringkasan kasus </label>
                    <div class="col-sm-8">
                        <textarea type="text" required="" class="form-control" 
                                  name="ringkasankasus" rows="4"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Penerima Lapiran </label>
                    <div class="col-sm-5">
                        <input type="text" required="" class="form-control" 
                               name="penerima" placeholder="Penerima laporan">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Pelapor / Pengadu </label>
                    <div class="col-sm-5">
                        <input type="text" required="" class="form-control" 
                               name="pelapor" placeholder="Pelapor / Pengadu">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Catatan </label>
                    <div class="col-sm-5">
                        <textarea type="text" required="" class="form-control" 
                                  name="catatan" rows="3"></textarea>
                    </div>
                </div>
            </section>
            <section class="step" data-step-title="Finish">

            </section>
        </form>
    </section>
</aside>
</div>
@stop
