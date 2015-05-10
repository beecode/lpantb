<?php if (!empty($data->ringkasan_kasus)) { ?>
    <div class="col-xs-12">
      <div class="ringkasan">
        <h5>
          <strong>Ringkasan Kasus</strong>
        </h5>
        <hr style="margin-top:0px;margin-bottom:6px;">
        <p>{{$data->ringkasan_kasus}}</p>
      </div>
    </div>
<?php } ?>

<style>
.ringkasan{
  height: 34%px;
}
.ringkasan p {
  font-size: 11px;
  text-align: justify;

}
</style>


<!-- <br/> -->
