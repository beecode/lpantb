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
                <a href="#step-3" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Tindak Lanjut</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Lembar Assessmen</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Rencana Intervensi</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p>Laporan Perkembangan</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-7" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p>laporan Hasil</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-8" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
                <p>Finish</p>
            </div>
        </div>
    </div>
    <form role="form" class="form-horizontal" action="{{ URL::to('') }}">
        <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12"><br>
                    <h5>FORM TINDAKAN LANJUT LAPORAN KASUS ANAK</h5><hr>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">No. LKA</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="No LKA">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-10 col-md-offset-5">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">IDENTITAS ANAK</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Kelamin </label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="jk">
                                        <option value="" disabled=""
                                                selected="">Pilih Jenis kelamin...!</option>
                                        <option value="Laki-Laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Kasus</label>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> ABH ( pelaku )
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> ABH ( Korban/Saksi )
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Pernikahan Dini
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Penelantaran
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Hak Sipil
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Hak Pendidikan
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Hak Kesehatan
                                                </label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> Lain-lain :
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control input-sm"
                                                           name="lain-lain" placeholder="Lain-Lain">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">TINDAK LANJUT</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> ABH ( pelaku )
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> ABH ( Korban/Saksi )
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Pernikahan Dini
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Penelantaran
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Hak Sipil
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Hak Pendidikan
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Hak Kesehatan
                                                </label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> Lain-lain :
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text"
                                                           class="form-control input-sm"
                                                           name="lain-lain" placeholder="Lain-Lain">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">CATATAN TINDAK LANJUT</div>
                        <div class="panel-body">
                            <textarea class="form-control" name="catatanlanjut" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">DISPOSISI</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kepada</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control"
                                           name="kepada" placeholder="Kepada">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Isi Disposisi</label>
                                <div class="col-sm-7">
                                    <textarea type="text" class="form-control"
                                              name="isidispo" ></textarea>
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
                    <h5> FORM LEMBAR ASSESSMENT KASUS ANAK</h5><hr>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">No. LKA</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" placeholder="No LKA">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-10 col-md-offset-5">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">IDENTITAS ANAKA</div>
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
                                <label class="col-sm-2 control-label">Tempat/Tgl Lahir</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           name="tmpanak" placeholder="Tempat">
                                </div>
                                <div class="col-md-5">
                                    <label class="col-sm-2 control-label">Tanggal </label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="tgllahiranak">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pendidikan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           name="pendidikananak" placeholder="Pendidikan">
                                </div>
                                <div class="col-md-5">
                                    <label class="col-sm-2 control-label">Suku </label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control"
                                               name="sukuanak" placeholder="Suku">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pekerjaan </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control"
                                           name="kerjaanak" placeholder="Pekerjaan">
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
                                <label class="col-sm-2 control-label">Anak ke-</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control"
                                           name="anakke" placeholder="Anaka ke-">
                                </div>
                                <div class="col-md-5">
                                    <label class="col-sm-5 control-label">Jumlah Saudara </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control"
                                               name="jmlsaudara" placeholder="jumlah Saudara">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Akta Kelahiran </label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="aktaanak">
                                        <option value="" disabled=""
                                                selected="">Pilih Akta...!</option>
                                        <option value="punya">Punya</option>
                                        <option value="tidak punya">Tidak Punya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Disabilitas</label>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input name="disabilitas" type="radio"> Tidak
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="disabilitas" type="radio"> Ya :
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <label class="col-sm-4 control-label">Sebutkan </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                               name="sebutkan" placeholder="Sebutkan">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">GAMBARAN FISIK ANAK</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tinggi Badan</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control"
                                           name="tinggi" placeholder="Tinggi Badan">
                                </div>
                                <div class="col-md-5">
                                    <label class="col-sm-4 control-label">Berat Badan </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control"
                                               name="berat" placeholder="Berat Badan">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Warna Kulit</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control"
                                           name="warnakulit" placeholder="Warna Kulit">
                                </div>
                                <div class="col-md-5">
                                    <label class="col-sm-4 control-label">Ranbut </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control"
                                               name="rambut" placeholder="Rambut">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanda Fisik Lainnya </label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" name="fisik" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">IDENTITAS KELUARGA</div>
                        <div class="panel-body">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Bapak </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control"
                                               name="namabapak" placeholder="Nama Bapak">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tempat/Tgl Lahir</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                               name="tmpbapak" placeholder="Tempat">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="col-sm-2 control-label">Tanggal </label>
                                        <div class="col-sm-7">
                                            <input type="date" class="form-control" name="tgllahirbapak">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Alamat </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control"
                                               name="alamatbapak" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Desa/Kelurahan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                               name="desabapak" placeholder="Desa">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="col-sm-2 control-label">Kec. </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                                   name="kecbapak" placeholder="Kecamatan">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kab./Kota</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                               name="kotabapak" placeholder="Kota">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="col-sm-2 control-label">Prop. </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                                   name="propbapak" placeholder="Provinsi">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                               name="pekerjaanbapak" placeholder="Pekerjaan">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="col-sm-2 control-label">Telp. </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                                   name="telpbapak" placeholder="Telp">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pendidakan Terakhir </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control"
                                               name="pendidikanbapak" placeholder="Pendidakan Terakhir">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Ibu </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control"
                                               name="namaibu" placeholder="Nama Ibu">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tempat/Tgl Lahir</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                               name="tmpibu" placeholder="Tempat">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="col-sm-2 control-label">Tanggal </label>
                                        <div class="col-sm-7">
                                            <input type="date" class="form-control" name="tgllahiribu">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Alamat </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control"
                                               name="alamatibu" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Desa/Kelurahan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                               name="desaibu" placeholder="Desa">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="col-sm-2 control-label">Kec. </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                                   name="kecibu" placeholder="Kecamatan">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kab./Kota</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                               name="kotaibu" placeholder="Kota">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="col-sm-2 control-label">Prop. </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                                   name="propibu" placeholder="Provinsi">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                               name="pekerjaanibu" placeholder="Pekerjaan">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="col-sm-2 control-label">Telp. </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                                   name="telpibu" placeholder="Telp">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pendidakan Terakhir </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control"
                                               name="pendidikanibu" placeholder="Pendidakan Terakhir">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Setatus Perkawinan Ortu </label>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="jkanak">
                                            <option value="" disabled=""
                                                    selected="">Pilih Perkawinan Ortu...!</option>
                                            <option value="suami istri">Suami Istri</option>
                                            <option value="cerai hidup">Cerai Hidup</option>
                                            <option value="cerai mati">Cerai Mati</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center">IDENTITAS MASALAH</div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label class="control-label">a. Gambaran Khusus
                                            Menurut Anak </label>
                                        <textarea class="form-control"
                                                  name="gambaran" rows="2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">b. Harapan Anak </label>
                                        <textarea class="form-control"
                                                  name="harapann" rows="2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">c. Gambaran Kasus Menurut Keluarga,
                                            Teman dan/atau Masyarakat </label>
                                        <textarea class="form-control"
                                                  name="gambarankasus" rows="2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">d. Harapan Keluarga,
                                            Teman dan Masyarakat</label>
                                        <textarea class="form-control"
                                                  name="harapannkeluarga" rows="2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">e. Kesimpulan Kasus
                                            Yang Terjadi</label>
                                        <textarea class="form-control"
                                                  name="kesimpulan" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center">KONDISI PSIKOSOSIAL</div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label class="control-label">a. Riwayat Keluarga
                                            dan Pengasuhan Anak</label>
                                        <textarea class="form-control"
                                                  name="riwayatasuh" rows="2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">b. Riwayat Pendidikan
                                            Anak</label>
                                        <textarea class="form-control"
                                                  name="riwayatpendidikan" rows="2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">c. Kondisi Mental Psikologis
                                            (keadaan emisi, perasaan-perasaan yang dominan,
                                            gejala-gejala kenakalan)</label>
                                        <textarea class="form-control"
                                                  name="kodisimental" rows="2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">d. Kondisi Sosial (
                                            interaksi dengan orang lain, penyesuaian diri,
                                            perhatian dari keluarga, nilai-nilai sosial yang dimilike)</label>
                                        <textarea class="form-control"
                                                  name="kodisisosial" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center">REKOMENDASI</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control"
                                               name="tglasssor">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Assesor</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control"
                                               name="namaassesor">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control"
                                               name="tglasssor">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Pelayanan</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control"
                                               name="namapelayanan">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Catatan</label>
                                    <div class="col-sm-7">
                                        <textarea type="text" class="form-control"
                                                  name="catatan"></textarea>
                                    </div>
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
                <div class="col-md-12"><br>
                    <h5> FORM RENCANA INTERVENSI KASUS ANAK</h5><hr>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">No. LKA</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" placeholder="No LKA">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-10 col-md-offset-5">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">IDENTITAS ANAK</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Kelamin </label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="jk">
                                        <option value="" disabled=""
                                                selected="">Pilih Jenis kelamin...!</option>
                                        <option value="Laki-Laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Kasus</label>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> ABH ( pelaku )
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> ABH ( Korban/Saksi )
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Pernikahan Dini
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Penelantaran
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Hak Sipil
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Hak Pendidikan
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Hak Kesehatan
                                                </label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> Lain-lain :
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control input-sm"
                                                           name="lain-lain" placeholder="Lain-Lain">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">URAIAN SINGKAT KASUS</div>
                        <div class="panel-body">
                            <textarea class="form-control" name="catatanlanjut" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">INTERVENSI YANG DILAKUKAN</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Pendamping
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Bantuan Hukum
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Rujukan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Negosiasi/Mediasi
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Rekomendasi
                                                </label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> Lain-lain :
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text"
                                                           class="form-control input-sm"
                                                           name="lain-lain" placeholder="Lain-Lain">
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Pelapor / Pengadu </label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control"
                                                              name="pelapor" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">CATATAN UNTUK INTERVENSI</div>
                        <div class="panel-body">
                            <textarea class="form-control" name="catatanlanjut" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">DISPOSISI</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kepada</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control"
                                           name="kepadainter" placeholder="Kepada">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Isi Disposisi</label>
                                <div class="col-sm-7">
                                    <textarea type="text" class="form-control"
                                              name="isidispointer" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-6">
            <div class="col-xs-12">
                <div class="col-md-12"><br>
                    <h5> TABEL LAPORAN PERKEMBANGAN PENDAMPING ANAK</h5><hr>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">TABEL LAPORAN PERKEMBANGAN PENDAMPING ANAK</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">No. LKA</label>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control" placeholder="No LKA">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Nama Anak</label>
                                            <div class="col-sm-7">
                                                <input type="email" class="form-control" placeholder="Nama Anak">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Tanggal</label>
                                            <div class="col-sm-7">
                                                <input type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Hari/Tanggal</th>
                                            <th>Bentuk Pendampingan</th>
                                            <th>Tempat</th>
                                            <th>Pelaksana</th>
                                            <th>Hasil Yang Dicapai</th>
                                            <th>Rencana Tindak lanjut</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1">
                                        <div class="panel panel-primary">
                                            <div class="panel-body text-center">
                                                Pendamping Anak
                                                <input placeholder="Nama Pendamping" class="form-control" name="pendamping" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-offset-1">
                                        <div class="panel panel-default">
                                            <div class="panel-body text-center">
                                                Koordinator Pelayanan dan Penaganan Kasus LPA NTB
                                                <input class="form-control" placeholder="Nama Koordinator" name="koordinator">
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
        <div class="row setup-content" id="step-7">
            <div class="col-xs-12">
                <div class="col-md-12"><br>
                    <h5> FORM lAPORAN HASIL PENDAMPING ANAK</h5><hr>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">No. LKA</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" placeholder="No LKA">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">IDENTITAS ANAK</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Kelamin </label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="jk">
                                        <option value="" disabled=""
                                                selected="">Pilih Jenis kelamin...!</option>
                                        <option value="Laki-Laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Kasus</label>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> ABH ( pelaku )
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> ABH ( Korban/Saksi )
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Pernikahan Dini
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Penelantaran
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Hak Sipil
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Hak Pendidikan
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Hak Kesehatan
                                                </label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> Lain-lain :
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control input-sm"
                                                           name="lain-lain" placeholder="Lain-Lain">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">PROESES DAN HASIL PENDAMPING ANAK</div>
                        <div class="panel-body">
                            <textarea class="form-control" name="ringkasnkasus" rows="6"></textarea><br>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Penerima Lapiran </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control"
                                           name="penerima" placeholder="Penerima laporan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Koordinator </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control"
                                           name="koordinator" placeholder="Koordinator Pelayanan">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Catatan</label>
                                <div class="col-sm-5">
                                    <textarea type="text" class="form-control"
                                              name="catatan" rows="3" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-8">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h5> PENYIMPANAN DATA</h5>
                    <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
                </div>
            </div>
        </div>

    </form>

</div>
</div>
@stop
