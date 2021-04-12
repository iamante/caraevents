@extends('voyager::master')


@section('content')
    <div class="container-fluid">
        <div class="page-content">
            <div class="clearfix container-fluid row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="panel widget center bgimage">
                        <div class="dimmer"></div>
                        <div class="panel-content">
                            <div class="icon-voy">
                                <i class="voyager-bar-chart" style="border-radius: 0; background-color: rgb(18, 169, 98);"></i>
                            </div>
                            <div class="text-voy">
                                <h5>New Users Added Today</h5>
                                @if ($userAdded == 0)
                                    <h1 class="count-user-widget" style="float: right; margin-right: 20px">{{ $userAdded }}</h1>
                                @else
                                    <h1 class="count-user-widget" style="float: right; margin-right: 20px"><small style="padding-right: 10px;">+</small>{{ $userAdded }}</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="panel widget center bgimage">
                        <div class="dimmer"></div>
                        <div class="panel-content">
                            <div class="icon-voy">
                                <i class="voyager-bar-chart" style="border-radius: 0; background-color: rgb(18, 169, 98);"></i>
                            </div>
                            <div class="text-voy">
                                <h5>Users logged in today</h5>
                                <h1 class="count-user-widget" style="float: right; margin-right: 20px">
                                    {{ $todayDate }}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="panel widget center bgimage">
                        <div class="dimmer"></div>
                        <div class="panel-content">
                            <div class="icon-voy">
                                <i class="voyager-bar-chart" style="border-radius: 0; background-color: rgb(18, 169, 98);"></i>
                            </div>
                            <div class="text-voy">
                                <h5>Users login Last 7 Days</h5>
                                <h1 class="count-user-widget" style="float: right; margin-right: 20px">{{ $weekUser }}</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="panel widget center bgimage">
                        <div class="dimmer"></div>
                        <div class="panel-content">
                            <div class="icon-voy">
                                <i class="voyager-bar-chart" style="border-radius: 0; background-color: rgb(18, 169, 98);"></i>
                            </div>
                            <div class="text-voy">
                                <h5>Users Login Last 30 Days</h5>
                                <h1 class="count-user-widget" style="float: right; margin-right: 20px">{{ $monthUser }}</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <canvas id="userChart" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <h4 style="margin-bottom: 20px">Last logged in Users</h4>
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Last login</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: #202020">
                                        <tr>
                                            <td>james amante</td>
                                            <td>jamesamante@gmail.com</td>
                                            <td>2021-04-03 3:00 AM</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <h4 style="margin-bottom: 20px">Users not logged in for 30days</h4>
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Last login</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: #202020">
                                        <tr>
                                            <td>james amante</td>
                                            <td>jamesamante@gmail.com</td>
                                            <td>2021-04-03 3:00 AM</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
                    $(this).text(Math.ceil(now));
                }
            });
        });

        var totalUser = {!! collect($totalUser)!!}

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

        console.log(sData.label)

        var ctx = document.getElementById('userChart').getContext('2d');
        Chart.defaults.font.family = 'Quicksand';
                var revenueChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: sData,
                        datasets: [{
                            label: 'Total Users',
                            data: totalUser,
                            fill: true,
                            backgroundColor: [
                                'rgba(46, 204, 113, 0.2)',
                            ],
                            borderColor: [
                                'rgba(46, 204, 113, 1)',
                            ],
                            borderWidth: 1,
                            tension: 0.3,
                            order: 1,
                        },{
                            label: 'Total Users in a Week',
                            data: [10, 9, 8, 2],
                            type: 'bar',
                            // this dataset is drawn on top
                            order: 1
                        }
                    ]
                    },
                    options: {
                        tooltips: {
                            callbacks: {
                            label: function(tooltipItem, data){
                                return parseInt(tooltipItem.value)
                            }
                            }
                        },
                        scales: {
                            x: {
                                type: 'time',
                                time: {
                                    unit: 'month'
                                }
                            }
                        },
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