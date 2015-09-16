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
