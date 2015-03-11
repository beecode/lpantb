<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Lokasi</h3>
        </div>
        <div  class="box-body">
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


<!--    <pre>
    <?php // print_r($lokasi) ?>
    </pre>-->
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
            ymax: '<?php echo $t; ?>',
            labels: ['Lokasi']
    });

</script>


