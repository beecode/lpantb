<?php $dis = $data->disposisi->first(); ?>
<div class="col-xs-12">
  <h5>
    <strong>Disposisi</strong>
  </h5>
    <div class="table-responsive">
        <table class="table small">
            <tbody>
                <tr>
                    <th style="width:21%">Kepada</th>
                    <td>{{$dis->kepada}}</td>
                </tr>
                <tr>
                    <th>Isi</th>
                    <td>{{$dis->isi}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
