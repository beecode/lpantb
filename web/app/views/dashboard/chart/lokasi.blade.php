<div class="col-md-6">
    <div class="box box-primary">
        <div  class="box-body">
          <div class="pull-left">
            <h4>Lokasi</h4>
          </div>
          <div class="pull-right">
            <?php
            $lokasi_url = "dash/print/lokasi";
            if ($location=="filter"){
              $sy = $var_get['start_year'];
              $sm = $var_get['start_month'];
              $ey = $var_get['end_year'];
              $em = $var_get['end_month'];
              $filter_opt = "?start_month=$sm&start_year=$sy&end_month=$em&end_year=$ey";
              $lokasi_url = $lokasi_url.$filter_opt;
            }
            ?>
              <a class="btn btn-warning" href="<?php echo URL::to($lokasi_url); ?>">
              <span class="fa fa-print"></span>
              Preview
            </a>
          </div>
          <div class="clearfix"></div>

            <div id="lokasi"></div>
            <br/>
            <table class="table">
              <tr>
                  <th class="text-center" rowspan="2" >No</th>
                  <th rowspan="2"">Kabupaten</th>
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
                <?php foreach ($lokasi as $key => $val) { ?>

                    <?php if ($key != "Total") { ?>
                        <tr>
                            <td class="text-center">{{$letter[$c]}}</td>
                            <td >{{$key}}</td>
                            <td class="text-center">{{$val['w']}}</td>
                            <td class="text-center">{{$val['p']}}</td>
                            <td class="text-center">{{$val['p']+$val['w']}}</td>
                        </tr>
                    <?php } ?>
                    <?php $TP = $TP + $val["p"] ?>
                    <?php $TW = $TW + $val["w"] ?>
                    <?php $c++; ?>
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
</div>

<script type="text/javascript">
    /*
     * Play with this code and it'll update in the panel opposite.
     *
     * Why not try some of the options above?
     */
    Morris.Bar({
    element: 'lokasi',
            data: [
<?php $c = 0; ?>
<?php $letter = range("A", "Z"); ?>
<?php $TP = 0; ?>
<?php $TW = 0; ?>
<?php $t = count($lokasi); ?>

<?php foreach ($lokasi as $key => $val) { ?>
    <?php if ($key != "Total") { ?>
        <?php if ($c <= ($t - 1)) { ?>
                        {x: '<?php echo $letter[$c] ?>', p:<?php echo $val['p']?>, w:<?php echo $val["w"] ?>},
        <?php } else { ?>
                          {x: '<?php echo $letter[$c] ?>', p:<?php echo $val['p']?>, w:<?php echo $val["w"] ?>}
        <?php } ?>
    <?php } ?>
    <?php $c++; ?>
<?php } ?>
            ],
            xkey: 'x',
            ykeys: ['p', 'w'],
            labels: ['Laki-Laki','Perempuan']
    });

</script>
