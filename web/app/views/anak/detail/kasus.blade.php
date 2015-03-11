<?php
$kasus = $data->jenis_kasus;
$form = $data->form;

$fma = null;
foreach ($form as $fm) {
    if ($fm->nama === "ka1") {
        $fma = $fm;
    } else if ($fm->nama === "ka2") {
        $fma = $fm;
    }
}
?>
<div class="col-xs-12">
    <p class="lead" style="margin: 0px;">Kasus Anak</p>
    <div class="table-responsive">
        <table class="table small">
            <tbody>
                <tr>
                    <th style="width:23.6%">Ringkasan Kasus</th>
                    <td>{{$fma->ringkasan_kasus}}</td>
                </tr>
                <tr>
                    <th style="width:23.6%">Jenis Kasus</th>
                    <td>
                        <?php $c = count($kasus); ?>
                        <?php $i = 1; ?>
                        <?php foreach ($kasus as $ka) { ?>
                            {{$ka->jenis}}
                            <?php if ($i % 2 == 0) { ?>
                                <br/> &nbsp;
                            <?php } ?>
                            <?php $i++; ?>
                        <?php } ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>