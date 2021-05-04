@extends('voyager::master')


@section('content')
    <div class="container-fluid">
        <div class="page-content">
            <div class="clearfix container-fluid row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="panel widget center bgimage">
                        <div class="dimmer"></div>
                        <div class="panel-content">
                            <div class="icon-voy">
                                <i class="voyager-dollar" style="border-radius: 0; background-color: rgb(43, 209, 131);"></i>
                            </div>
                            <div class="text-voy">
                                <h5>Total Revenue for today</h5>
                                <div style="display: flex; align-items:center; float: right">
                                    @if ($totalRevenueForToday == 0)
                                        <h1 class="count-user-widget">{{ $totalRevenueForToday }}</h1>
                                    @else
                                        <h1>₱</h1>
                                        <h1 class="count-user-widget">{{ $totalRevenueForToday }}</h1>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="panel widget center bgimage">
                        <div class="dimmer"></div>
                        <div class="panel-content">
                            <div class="icon-voy">
                                <i class="voyager-dollar" style="border-radius: 0; background-color: rgb(43, 209, 131);"></i>
                            </div>
                            <div class="text-voy">
                                <h5>Total Revenue for the week</h5>
                                <div style="display: flex; align-items:center; float: right">
                                    @if ($totalRevenueForWeek == 0)
                                        <h1 class="count-user-widget">{{ $totalRevenueForWeek }}</h1>
                                    @else
                                        <h1>₱</h1>
                                        <h1 class="count-user-widget">{{ $totalRevenueForWeek }}</h1>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="panel widget center bgimage">
                        <div class="dimmer"></div>
                        <div class="panel-content">
                            <div class="icon-voy">
                                <i class="voyager-dollar" style="border-radius: 0; background-color: rgb(43, 209, 131);"></i>
                            </div>
                            <div class="text-voy">
                                <h5>Over all Revenue</h5>
                                <div style="display: flex; align-items:center; float: right">
                                    <h1>₱</h1>
                                    <h1 class="count-user-widget">{{ $totalRevenue }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <canvas id="itemChart" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-7">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <canvas id="revenuesChart" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="panel widget center bgimage">
                        <div class="dimmer"></div>
                        <div class="panel-content">
                            <div class="icon-voy">
                                <i class="voyager-bar-chart" style="border-radius: 0; background-color: rgb(209, 62, 43);"></i>
                            </div>
                            <div class="text-voy">
                                <h5>Number of Decline Reservation</h5>
                                
                                    <h1 class="count-user-widget">{{ $totalDecline }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="panel widget center bgimage">
                        <div class="dimmer"></div>
                        <div class="panel-content">
                            <div class="icon-voy">
                                <i class="voyager-dollar" style="border-radius: 0; background-color: rgb(209, 62, 43);"></i>
                            </div>
                            <div class="text-voy">
                                <h5>Total Decline Reservation</h5>
                                <div style="display: flex; align-items:center; float: right">
                                    <h1>₱</h1>
                                    <h1 class="count-user-widget">{{ $totalDeclines }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
    <script>
        $('.count-user-widget').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(commaSeparateNumber(Math.ceil(now)));
                }
            });
        });

        function commaSeparateNumber(val) {
            while (/(\d+)(\d{3})/.test(val.toString())) {
                val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
            }

            return val;
        }

        let reservations = {!! collect($reservation) !!}
        let data = {!! collect($data)!!}
        let dataItem = {!! collect($dataItem)!!}

        let sData = [
            ['Jan ', moment().year()], 
            ['Feb ', moment().year()],
            ['Mar ', moment().year()],
            ['Apr ', moment().year()],
            ['May ', moment().year()],
            ['Jun ', moment().year()],
            ['Jul ', moment().year()],
            ['Aug ', moment().year()],
            ['Sep ', moment().year()],
            ['Oct ', moment().year()],
            ['Nov ', moment().year()],
            ['Dec ', moment().year()], 
        ]

        var ctx = document.getElementById('revenuesChart').getContext('2d');
        Chart.defaults.font.family = 'Quicksand';
                var revenueChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: sData,
                        datasets: [{
                            label: 'Total Revenue',
                            data: data,
                            fill: true,
                            backgroundColor: [
                                'rgba(46, 204, 113, 0.2)',
                            ],
                            borderColor: [
                                'rgba(46, 204, 113, 1)',
                            ],
                            borderWidth: 1,
                            tension: 0.3
                        }
                    ]
                    },
                    options: {

                        layout: {
                            padding: {
                                left: 15,
                                right: 25
                            }
                        },
                        plugins: {
                            title: {
                            display: true,
                            text: 'Caraevents Consultancy & Co.',
                            weight: 300
                        },
                        legend: {
                            display: true,
                            labels: {
                                font: {
                                    size: 20,
                                    weight: 700
                                },
                                color: 'black',
                                
                            },
                        }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });



            var ctx = document.getElementById('itemChart').getContext('2d');
            Chart.defaults.font.family = 'Quicksand';
                    var revenueChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Wedding','Catering','Debut', 'Birthday', 'Corporate'],
                            datasets: [{
                                label: 'Popular Services',
                                data: dataItem,
                                fill: true,
                                backgroundColor: [
                                    'rgba(46, 204, 113, 0.2)',
                                ],
                                borderColor: [
                                    'rgba(46, 204, 113, 1)',
                                ],
                                borderWidth: 1,
                                tension: 0.3
                            }
                        ]
                        },
                        options: {
                            indexAxis: 'y',
                            layout: {
                                padding: {
                                    left: 15,
                                    right: 25
                                }
                            },
                            plugins: {
                                title: {
                                display: true,
                                text: 'Caraevents Consultancy & Co.',
                                weight: 300
                            },
                            legend: {
                                display: true,
                                labels: {
                                    font: {
                                        size: 20,
                                        weight: 700
                                    },
                                    color: 'black',
                                    
                                },
                            }
                            },
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
    </script>

@endsection