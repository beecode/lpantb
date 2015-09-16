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
                      <strong>Grafik Kasus Anak Berdasarkan Usia</strong>
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
              <div id="holder"></div>
              <script type="text/javascript">
                  window.onload = function () {
                      var r = Raphael("holder");
                      var pie = r.piechart(320, 120, 100,
                              [<?php echo $usia['0-5']; ?>,<?php echo $usia['6-10']; ?>,<?php echo $usia['11-18']; ?>],
                              {legend: ["%%.%% - Usia 0-5", "%%.%% - Usia 6-10", "%%.%% - Usia 11-18"],
                                  legendpos: "west", href: ["http://raphaeljs.com", "http://g.raphaeljs.com"]});

                      r.text(320, 100, "").attr({font: "20px sans-serif"});
                      pie.hover(function () {
                          this.sector.stop();
                          this.sector.scale(1.1, 1.1, this.cx, this.cy);

                          if (this.label) {
                              this.label[0].stop();
                              this.label[0].attr({r: 7.5});
                              this.label[1].attr({"font-weight": 800});
                          }
                      }, function () {
                          this.sector.animate({transform: 's1 1 ' + this.cx + ' ' + this.cy}, 500, "bounce");

                          if (this.label) {
                              this.label[0].animate({r: 5}, 500, "bounce");
                              this.label[1].attr({"font-weight": 400});
                          }
                      });
                      pie.attr({"font-size": 11, "font-family": "Verdana", "cx":"380", "x":"395"});
                  };
              </script>

              <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                      <input type="text" class="knob" data-width="90" data-height="90"
                             value="{{$usia['0-5']}}" data-max="{{$usia['total']}}"
                             data-fgcolor="#00c0ef" data-readonly="true">
                      <div class="knob-label">Usia 0 - 5 Tahun</div>
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                      <input type="text" class="knob" data-width="90" data-height="90"
                             value="{{$usia['6-10']}}" data-max="{{$usia['total']}}"
                             data-fgcolor="#932ab6" data-readonly="true">
                      <div class="knob-label">Usia 6 - 10 Tahun</div>
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                      <input type="text" class="knob" data-width="90" data-height="90"
                             value="{{$usia['11-18']}}" data-max="{{$usia['total']}}"
                             data-fgcolor="#f56954" data-readonly="true">
                      <div class="knob-label">Usia 11 - 18 Tahun</div>
                  </div>
                  <script type="text/javascript">$(".knob").knob({});</script>
              </div>
            </div>

            <div class="col-xs-12">
              <br/><br/>
              <table class="table">
                  <tr>
                      <th class="text-center">No</th>
                      <th>Usia</th>
                      <th class="text-center">Jumlah Kasus</th>
                  </tr>
                  <tr>
                      <td class="text-center">1</td>
                      <td>0 - 5 Tahun</td>
                      <td class="text-center">{{$usia['0-5']}}</td>
                  </tr>
                  <tr>
                      <td class="text-center">2</td>
                      <td>6 - 10 Tahun</td>
                      <td class="text-center">{{$usia['6-10']}}</td>
                  </tr>
                  <tr>
                      <td class="text-center">3</td>
                      <td>11 - 18 Tahun</td>
                      <td class="text-center">{{$usia['11-18']}}</td>
                  </tr>
                  <tr>
                      <th colspan="2" class="text-right">Total</th>
                      <th class="text-center">{{$usia['total']}}</th>
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
