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
                      <strong>Grafik Kasus Anak Berdasarkan Jenis Kasus</strong>
                    </h4>
                </span>
            </div>
        </div><!-- /.col -->

        <!-- info row -->
        <div class="row invoice-info">
          <?php if ($mode=="filter"){  ?>
            <div class="col-xs-12" style="text-align:center">
              <hr/>
              Grafik ini di filter dari {{date('l, d F Y',strtotime($start))}}
              sampai dengan {{date('l, d F Y',strtotime($end))}}
            </div>
          <?php } else { ?>
            <div class="col-xs-12" style="text-align:center">
              <hr/>
              Grafik ini adalah akumulasi seluruh data kasus anak yang pernah di inputkan
              hingga tahun {{date('Y')}}
            </div>
          <?php } ?>
            <div class="col-xs-12">
                <div id="jenis" style="width:62%; padding-left:50px;"></div>
                <script type="text/javascript">
                    Morris.Bar({
                    element: 'jenis',
                            data: [
                            <?php $c = 1; ?>
                            <?php $letter = range("A", "Z"); ?>
                            <?php $TP = 0; ?>
                            <?php $TW = 0; ?>
                            <?php $t = count($jenis); ?>
                            <?php foreach ($jenis as $key => $val) { ?>
                                <?php if ($key != "Total") { ?>
                                    <?php if ($c <= ($t - 1)) { ?>
                                                    {x: '<?php echo $letter[$c-1] ?>', p:<?php echo $val["P"] ?>, w:<?php echo $val["W"] ?>},
                                    <?php } else { ?>
                                                    {x: '<?php echo $letter[$c-1] ?>', p:<?php echo $val["P"] ?>, w:<?php echo $val["W"] ?>}
                                    <?php } ?>
                                <?php } ?>
                                <?php $c++; ?>
                            <?php } ?>
                            ],
                            xkey: 'x',
                            ykeys: ['p', 'w'],
                            labels: ['Laki-Laki','Perempuan'],
                            hideHover: 'always'
                    });
                </script>
            </div>

            <div class="col-xs-12">
              <br/>
              <table class="table table-small">
                  <tr>
                      <th class="text-center" rowspan="2">No</th>
                      <th rowspan="2">Jenis Kasus</th>
                      <th colspan="2">Jenis Kelamin</th>
                      <th class="text-center" rowspan="2">Jumlah Kasus</th>
                  </tr>
                  <tr>
                      <th>Perempuan</th>
                      <th>Laki-Laki</th>
                  </tr>
                  <?php $c = 0; ?>
                  <?php $letter = range("A", "Z"); ?>
                  <?php $TP = 0; ?>
                  <?php $TW = 0; ?>
                  <?php foreach ($jenis as $key => $val) { ?>
                      <?php if ($key != "Total") { ?>
                          <tr>
                              <td class="text-center">{{$letter[$c]}}</td>
                              <td>
                                  <?php
                                  if ($key != "Other") {
                                      echo $key;
                                  } else {
                                      echo "Lain-Lain";
                                  }
                                  ?>
                              </td>
                              <td class="text-center">{{$val["W"]}}</td>
                              <td class="text-center">{{$val["P"]}}</td>
                              <td class="text-center">{{ ($val["P"]+$val["W"]) }}</td>
                          </tr>
                          <?php $TP = $TP + $val["P"] ?>
                          <?php $TW = $TW + $val["W"] ?>
                          <?php $c++; ?>
                          <?php ?>
                      <?php } ?>
                  <?php } ?>

                  <tr>
                      <th colspan="2" class="text-right">Total</th>
                      <th class="text-center">{{$TW}}</th>
                      <th class="text-center">{{$TP}}</th>
                      <th class="text-center">{{($TW + $TP)}}</th>
                  </tr>
              </table>
          </div>
        </div>
        <div class="row no-print">
          <?php
          if ($mode=="filter"){
            $url = "dash/filter";
            $sy = $var_get['start_year'];
            $sm = $var_get['start_month'];
            $ey = $var_get['end_year'];
            $em = $var_get['end_month'];
            $filter_opt = "?start_month=$sm&start_year=$sy&end_month=$em&end_year=$ey";
            $url = $url.$filter_opt;
          } else {
            $url = "dash";
          }
          ?>
            <div class="col-xs-12" style="margin-top:61px;">
                <a href="{{URL::to($url)}}" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</a>
                <button class="btn btn-default pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </section>

</aside>

@stop
