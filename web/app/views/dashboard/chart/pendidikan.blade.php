<div class="col-md-6">
    <div class="box box-primary">
        <div  class="box-body">
          <div class="pull-left">
            <h4>Pendidikan</h4>
          </div>
          <div class="pull-right">
            <?php
            $pendidikan_url = "dash/print/pendidikan";
            if ($location=="filter"){
              $sy = $var_get['start_year'];
              $sm = $var_get['start_month'];
              $ey = $var_get['end_year'];
              $em = $var_get['end_month'];
              $filter_opt = "?start_month=$sm&start_year=$sy&end_month=$em&end_year=$ey";
              $pendidikan_url = $pendidikan_url.$filter_opt;
            }
            ?>
              <a class="btn btn-warning" href="<?php echo URL::to($pendidikan_url); ?>">
              <span class="fa fa-print"></span>
              Preview
            </a>
          </div>
          <div class="clearfix"></div>
            <div id="pendidikan"></div>
            <br/>
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

</div>

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
        labels: ['Pendidikan']
    });

</script>
