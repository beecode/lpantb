@extends('layout.lteadmin.index')
@section('content')
<aside class="right-side">
    <section class="content-header">
        <h1>
            {{$page_title}}
            <small>{{$panel_title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i>{{$page_title}}</a></li>
            <li><a href="#"><i class="fa fa-table"></i> {{$panel_title}}</a></li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12" style="margin-bottom:3px;">
            <img src="{{ asset('images/kop.png');}}" alt="" width="100%"/>
          </div>
        </div>

        <div class="row">
            <div class="col-xs-11 col-offset-1" style="text-align:center; padding-left:50px;">
                <span class="" style="margin-bottom:10px;">
                    <h4 style="margin:0px;">
                      <strong>Grafik Kasus Anak Berdasarkan Pendidikan</strong>
                    </h4>
                </span>
            </div>
        </div><!-- /.col -->

        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-xs-12" style="text-align:center;">
              <hr/>
              Grafik ini di filter dari {{date('l, d F Y',strtotime($start))}} sampai dengan {{date('l, d F Y',strtotime($end))}}
            </div>
            <div class="col-xs-12">
              <div id="pendidikan" style="width:62%; padding-left:50px;"></div>
              <script type="text/javascript">
                  /*
                   * Play with this code and it'll update in the panel opposite.
                   *
                   * Why not try some of the options above?
                   */
                  Morris.Bar({
                      element: 'pendidikan',
                      data: [
                          {x: 'A', y:<?php echo $pendidikan['BelumSekolah']; ?>},
                          {x: 'B', y:<?php echo $pendidikan['TidakSekolah']; ?>},
                          {x: 'C', y:<?php echo $pendidikan['TK']; ?>},
                          {x: 'E', y:<?php echo $pendidikan['SD/MI']; ?>},
                          {x: 'F', y:<?php echo $pendidikan['SMP/MTS']; ?>},
                          {x: 'G', y:<?php echo $pendidikan['SMA/SMK/MA']; ?>}
                      ],
                      xkey: 'x',
                      ykeys: ['y'],
                      labels: ['Pendidikan'],
                      hideHover: 'always'
                  });

              </script>
            </div>

            <div class="col-xs-12">
              <br>
              <table class="table">
                  <tr>
                      <th class="text-center">No</th>
                      <th>Pendidikan</th>
                      <th class="text-center">Jumlah Kasus</th>
                  </tr>
                  <tr>
                      <td class="text-center">A</td>
                      <td>Belum Sekolah</td>
                      <td class="text-center">{{$pendidikan['BelumSekolah']}}</td>
                  </tr>
                  <tr>
                      <td class="text-center">B</td>
                      <td>Tidak Sekolah</td>
                      <td class="text-center">{{$pendidikan['TidakSekolah']}}</td>
                  </tr>
                  <tr>
                      <td class="text-center">C</td>
                      <td>TK</td>
                      <td class="text-center">{{$pendidikan['TK']}}</td>
                  </tr>
                  <tr>
                      <td class="text-center">D</td>
                      <td>SD/MI</td>
                      <td class="text-center">{{$pendidikan['SD/MI']}}</td>
                  </tr>
                  <tr>
                      <td class="text-center">E</td>
                      <td>SMP/MTS</td>
                      <td class="text-center">{{$pendidikan['SMP/MTS']}}</td>
                  </tr>
                  <tr>
                      <td class="text-center">F</td>
                      <td>SMA/SMK/MA</td>
                      <td class="text-center">{{$pendidikan['SMA/SMK/MA']}}</td>
                  </tr>
                  <tr>
                      <th colspan="2" class="text-right">Total</th>
                      <th class="text-center">{{$pendidikan['Total']}}</th>
                  </tr>
              </table>
            </div>
        </div>
        <div class="row no-print">
            <div class="col-xs-12" style="margin-top:61px;">
                <a href="{{URL::to('dash')}}" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</a>
                <button class="btn btn-default pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </section>

</aside>

@stop
