
<div class="col-md-6">
    <div class="box box-primary">
        <div  class="box-body">
          <div class="pull-left">
            <h4>Usia</h4>
          </div>
          <div class="pull-right">
            <?php
            $usia_url = "dash/print/usia";
            if ($location=="filter"){
              $sy = $var_get['start_year'];
              $sm = $var_get['start_month'];
              $ey = $var_get['end_year'];
              $em = $var_get['end_month'];
              $filter_opt = "?start_month=$sm&start_year=$sy&end_month=$em&end_year=$ey";
              $usia_url = $usia_url.$filter_opt;
            }
            ?>
              <a class="btn btn-warning" href="<?php echo URL::to($usia_url); ?>">
              <span class="fa fa-print"></span>
              Preview
            </a>
          </div>
          <div class="clearfix"></div>
            <div id="holder"></div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6 text-center">
                    <input type="text" class="knob" data-width="90" data-height="90"
                           value="{{$usia['0-5']}}" data-max="{{$usia['total']}}"
                           data-fgcolor="#00c0ef" data-readonly="true">
                    <div class="knob-label">Usia 0 - 5 Tahun</div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-6 text-center">
                    <input type="text" class="knob" data-width="90" data-height="90"
                           value="{{$usia['6-10']}}" data-max="{{$usia['total']}}"
                           data-fgcolor="#932ab6" data-readonly="true">
                    <div class="knob-label">Usia 6 - 10 Tahun</div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-6 text-center">
                    <input type="text" class="knob" data-width="90" data-height="90"
                           value="{{$usia['11-18']}}" data-max="{{$usia['total']}}"
                           data-fgcolor="#f56954" data-readonly="true">
                    <div class="knob-label">Usia 11 - 18 Tahun</div>
                </div>
                <script type="text/javascript">$(".knob").knob({});</script>
            </div>
            <br/>
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

</div>

<script type="text/javascript">
    /*
     * Play with this code and it'll update in the panel opposite.
     *
     * Why not try some of the options above?
     */
    Morris.Bar({
        element: 'usia',
        data: [
            {x: 'Usia 0 - 5', y:<?php echo $usia['0-5']; ?>},
            {x: 'Usia 6 - 10', y:<?php echo $usia['6-10']; ?>},
            {x: 'Usia 11 - 18', y:<?php echo $usia['11-18']; ?>}
        ],
        xkey: 'x',
        ykeys: ['y'],
        labels: ['Usia']
    });

</script>


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

        pie.attr({"font-size": 12, "font-family": "Verdana", "cx":"380", "x":"395"});


    };
</script>
