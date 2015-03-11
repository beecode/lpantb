@extends('layout.bootstrap.index')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            @if (Session::has('message'))
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('message') }}
            </div>
            @endif
            <h1 class="page-header">Chart Example</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">JUMLAH KASUS BERDASARKAN USIA</div>
                <div class="panel-body">
                    <div id="donut"></div>
                    <script>
                        Morris.Donut({
                            element: 'donut',
                            data: [
                                {value: 1, label: '0-5 Tahun', formatted: 'Jumlah : 1'},
                                {value: 1, label: '6-10 Tahun', formatted: 'Jumlah : 1'},
                                {value: 4, label: '11-18 Tahun', formatted: 'Jumlah : 4'}
                            ],
                            formatter: function(x, data) {
                                return data.formatted;
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">JUMLAH KAKSUS BERDASARKAN PENDIDIKAN </div>
                <div class="panel-body">
                    <div id="graph"></div>
                    <script>
                        Morris.Bar({
                            element: 'graph',
                            data: [
                                {mapname: 'Belum Sekolah', value: 1},
                                {mapname: 'Tidak Sekolah', value: 1},
                                {mapname: 'TK', value: 0},
                                {mapname: 'SD/MI', value: 1},
                                {mapname: 'SMP/MTS', value: 1},
                                {mapname: 'SMP/SMK/MA', value: 4}
                            ],
                            xkey: ['mapname'],
                            ykeys: ['value', 'elapsed'],
                            labels: ['jumlah', 'ket'],
                            barRatio: 0.4,
                            xLabelAngle: 35,
                            barColors: function(row, series, type) {
                                console.log("--> " + row.label, series, type);
                                if (row.label == "Belum Sekolah")
                                    return "#AD1D28";
                                else if (row.label == "Tidak Sekolah")
                                    return "#DEBB27";
                                else if (row.label == "TK")
                                    return "#fec04c";
                                else if (row.label == "SD/MI")
                                    return "#fe904c";
                                else if (row.label == "SMP/MTS")
                                    return "#90c04c";
                                else if (row.label == "SMP/SMK/MA")
                                    return "#32c04c";
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!-- copyan -->

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">JUMLAH KAKSUS BERDASARKAN PENDIDIKAN</div>
                <div class="panel-body">
                    <div id="diagonal"></div>
                    <script>
                        Morris.Bar({
                            element: 'diagonal',
                            data: [
                                {x: 'Belum Sekolah', y: 0, ket: null},
                                {x: 'Tidak Sekolah', y: 2, ket: null},
                                {x: 'TK', y: 0, ket: null},
                                {x: 'SD/MI', y: 1, ket: null},
                                {x: 'SMP/MTS', y: 1, ket: null},
                                {x: 'SMA/SMK/MA', y: 1, ket: null}
                            ],
                            xkey: 'x',
                            ykeys: ['y', 'ket'],
                            labels: ['Y', 'Keterangan'],
                            stacked: true
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">JUMLAH KASUS BERDASARKAN USIA</div>
                <div class="panel-body">
                    <div id="arbitrary"></div>
                    <script>
                        var day_data = [
                            {"elapsed": "0 - 5 Tahun ", "value": 0},
                            {"elapsed": "6 - 10 Tahun", "value": 1},
                            {"elapsed": "11 - 18 Tahun", "value": 4}
                        ];
                        Morris.Line({
                            element: 'arbitrary',
                            data: day_data,
                            xkey: 'elapsed',
                            ykeys: ['value'],
                            labels: ['jumlah'],
                            parseTime: false
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
