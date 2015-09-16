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
                      <strong>Grafik Kasus Anak Berdasarkan Lokasi</strong>
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
              <div id="lokasi" style="width:62%; padding-left:50px;"></div>
              <script type="text/javascript">
                  /*
                   * Play with this code and it'll update in the panel opposite.
                   *
                   * Why not try some of the options above?
                   */
                  Morris.Bar({
                  element: 'lokasi',
                          data: [
                          <?php $t = count($lokasi); ?>
                          <?php $c = 0; ?>
                          <?php $letter = range("A", "Z"); ?>
                          <?php foreach ($lokasi as $key => $val) { ?>
                              <?php if ($key != "Total") { ?>
                                  <?php if ($c <= ($t - 1)) { ?>
                                                  {x: '<?php echo $letter[$c] ?>', y:<?php echo $val ?>},
                                  <?php } else { ?>
                                                  {x: '<?php echo $letter[$c] ?>', y:<?php echo $val ?>}
                                  <?php } ?>
                              <?php } ?>
                              <?php $c++; ?>
                          <?php } ?>
                          ],
                          xkey: 'x',
                          ykeys: ['y'],
                          labels: ['Lokasi'],
                          hideHover: 'always'
                  });

              </script>
            </div>

            <div class="col-xs-12">
              <br>
              <table class="table">
                <thead>
                  <tr>
                      <th class="text-center">No</th>
                      <th>Kabupaten</th>
                      <th class="text-center">Jumlah Kasus</th>
                  </tr>
                </thead>

                  <?php $c = 0; ?>
                  <?php $letter = range("A", "Z"); ?>
                  <?php foreach ($lokasi as $key => $val) { ?>

                      <?php if ($key != "Total") { ?>
                          <tr>
                              <td class="text-center">{{$letter[$c]}}</td>
                              <td>{{$key}}</td>
                              <td class="text-center">{{$val}}</td>
                          </tr>
                      <?php } ?>
                      <?php $c++; ?>
                  <?php } ?>
                  <tfoot>
                    <tr>
                        <th colspan="2" class="text-right">Total</th>
                        <th class="text-center">{{$lokasi['Total']}}</th>
                    </tr>
                  </tfoot>

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
