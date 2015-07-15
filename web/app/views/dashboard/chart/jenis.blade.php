<div class="col-md-6">
    <div class="box box-primary">
        <div  class="box-body">
          <div class="pull-left">
            <h4>Jenis Kasus</h4>
          </div>
          <div class="pull-right">
            <?php
            $jenis_url = "dash/print/jenis";
            if ($location=="filter"){
              $sy = $var_get['start_year'];
              $sm = $var_get['start_month'];
              $ey = $var_get['end_year'];
              $em = $var_get['end_month'];
              $filter_opt = "?start_month=$sm&start_year=$sy&end_month=$em&end_year=$ey";
              $jenis_url = $jenis_url.$filter_opt;
            }
            ?>
            <a class="btn btn-warning" href="<?php echo URL::to($jenis_url); ?>">
              <span class="fa fa-print"></span>
              Preview
            </a>
          </div>
          <div class="clearfix"></div>

            <div id="jenis"></div>
            <br/>
            <table class="table">
                <tr>
                    <th class="text-center" rowspan="2" >No</th>
                    <th rowspan="2"">Jenis Kasus</th>
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


<!--    <pre>
    <?php // print_r($lokasi)   ?>
    </pre>-->
</div>

<script type="text/javascript">
    /*
     * Play with this code and it'll update in the panel opposite.
     *
     * Why not try some of the options above?
     */
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
            labels: ['Laki-Laki','Perempuan']
    });

</script>
