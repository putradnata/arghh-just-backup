@extends('layouts.base')

@section('contentHere')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-info">
                        <div class="custom-title">Statistik Penduduk Desa Sumerta Kaja</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3">
                            <span class="text-muted mb-5 d-inline-block"><i class="fa fa-male"></i> Penduduk Laki-laki :</span>
                            <strong> {{ $maleTotal }} </strong> Orang
                            <span class="text-muted mb-5 d-inline-block"><i class="fa fa-female"></i> Penduduk Perempuan :</span>
                            <strong> {{ $femaleTotal }} </strong> Orang
                            <h4 class="mb-0">Total Penduduk :</h4>
                            <h2 class="text-muted">{{ $maleTotal+$femaleTotal }} Orang</h2>
                            <ul class="list-unstyled mt-5">
                                <li class="text-muted">
                                    <?php
                                        $bulan = \Carbon\Carbon::parse($sumAll->created_at)->locale('id');
                                    ?>
                                    <i class="fa fa-clock-o pr-2"></i> Data per Bulan {{ $bulan->isoFormat('MMMM') }}
                                </li>
                                <li class="text-muted">
                                    <i class="fa fa-clock-o pr-2"></i> Terakhir diperbaharui pada : {{ $bulan->isoFormat('dddd, Do MMMM YYYY') }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-9">
                            <canvas id="dash3_sales_chart" height="250"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptPlace')
    <!-- Chart JS Init Statistik Penduduk Perempuan dan Laki laki -->
    <script type="text/javascript">
        $(document).ready(function(){
            "use strict";

            var ctx = document.getElementById('dash3_sales_chart').getContext('2d');

            var myBarChart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',

                // The data for our dataset
                data: {
                    labels: {!! $labelMale !!},
                    datasets: [{
                        label: "Penduduk Laki-Laki",
                        data: {!! $valueMale !!},
                        backgroundColor: '#18b9d4',
                        borderColor: '#18b9d4',
                        pointBorderColor: '#ffffff',
                        pointBackgroundColor: '#18b9d4',
                        pointBorderWidth: 2,
                        pointRadius: 4

                    }, {
                        label: "Penduduk Perempuan",
                        data: {!! $valueFemale !!},
                        backgroundColor: '#3d74f1',
                        borderColor: '#3d74f1',
                        pointBorderColor: '#ffffff',
                        pointBackgroundColor: '#3d74f1',
                        pointBorderWidth: 2,
                        pointRadius: 4
                    }]
                },

                // Configuration options go here
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },

                    scales: {
                        xAxes: [{
                            display: true,
                            gridLines: {
                                zeroLineColor: '#e7ecf0',
                                color: '#e7ecf0',
                                borderDash: [5,5,5],
                                zeroLineBorderDash: [5,5,5],
                                drawBorder: false
                            }
                        }],
                        yAxes: [{
                            display: true,
                            gridLines: {
                                zeroLineColor: '#e7ecf0',
                                color: '#e7ecf0',
                                borderDash: [5,5,5],
                                zeroLineBorderDash: [5,5,5],
                                drawBorder: false
                            }
                        }]

                    },
                    elements: {
                        line: {
                            tension: 0.00001,
        //              tension: 0.4,
                            borderWidth: 1
                        },
                        point: {
                            radius: 2,
                            hitRadius: 10,
                            hoverRadius: 6,
                            borderWidth: 4
                        }
                    }
                }
            });
        });
    </script>

@endsection
