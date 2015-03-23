<?php
$anak = $data->anak->first();
$psi = $anak->kondisi_psikososial;
?>
<div class="col-xs-12">
  <h5>
    <strong>Kondisi Psikososial</strong>
  </h5>
    <div class="table-responsive">
        <table class="table small">
            <tbody>
                <tr>
                    <th style="width:23.6%">Riwayat Keluarga dan Pengasuhan Anak</th>
                    <td><p>{{$psi->rk}}</p></td>
                </tr>
                <tr>
                    <th>Riwayat Pendidikan Anak</th>
                    <td><p>{{$psi->rp}}</p></td>
                </tr>
                <tr>
                    <th>Kondisi Mental Psikologis<br/>
                        <small>
                            (keadaan emosi, perasaan-perasaan yang dominan, gejala-gejala kenakalan)
                        </small>
                    </th>
                    <td><p>{{$psi->km}}</p></td>
                </tr>
                <tr>
                    <th>Kondisi Sosial<br/>
                        <small>
                            (interaksi dengan orang lain, penyesuaian diri, perhatian dari keluarga,
                            nilai-nilai sosial yang dimiliki)
                        </small>
                    </th>
                    <td><p>{{$psi->ks}}</p></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
