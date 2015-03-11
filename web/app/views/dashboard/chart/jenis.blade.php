<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Jenis Kasus</h3>
        </div>
        <div  class="box-body">
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


