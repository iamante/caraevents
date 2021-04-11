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
                                <h5>New Users Added</h5>
                                @if ($userAdded == 0)
                                    <h1 style="float: right; margin-right: 20px">{{ $userAdded }}</h1>
                                @else
                                    <h1 style="float: right; margin-right: 20px"><small style="padding-right: 10px;">+</small>{{ $userAdded }}</h1>
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
                                <h1 style="float: right; margin-right: 20px">{{ $date }}</h1>
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
                                <h1 style="float: right; margin-right: 20px">{{ $weekUser }}</h1>
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
                                <h1 style="float: right; margin-right: 20px">{{ $monthUser }}</h1>
                            </div>
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