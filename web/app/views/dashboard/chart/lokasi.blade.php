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
                    <th class="text-center">No</th>
                    <th>Kabupaten</th>
                    <th class="text-center">Jumlah Kasus</th>
                </tr>
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
                <tr>
                    <th colspan="2" class="text-right">Total</th>
                    <th class="text-center">{{$lokasi['Total']}}</th>
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
            labels: ['Lokasi']
    });

</script>
