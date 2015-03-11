<?php $gmb = $data->anak->first()->gambaran_fisik; ?>
<div class="col-xs-12">
    <p class="lead" style="margin: 0px;">Gambaran Fisik Anak</p>
    <div class="table-responsive">
        <table class="table small">
            <tbody>
                <tr>
                    <th style="width:23.6%">Tinggi Badan</th>
                    <td>{{$gmb->tinggi}} cm</td>
                </tr>
                <tr>
                    <th>Berat Badan</th>
                    <td>{{$gmb->berat}} kg</td>
                </tr>
                <tr>
                    <th>Warna Kulit</th>
                    <td>{{$gmb->warna_kulit}}</td>
                </tr>
                <tr>
                    <th>Rambut</th>
                    <td>{{$gmb->rambut}}</td>
                </tr>
                <tr>
                    <th>Tanda Lain</th>
                    <td><?php echo (!empty($gmb->tanda_lain)) ? $gmb->tanda_lain : "-"; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
