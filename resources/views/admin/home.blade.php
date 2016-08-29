@extends('layouts.admin.admin')
@section('title')
    后台首页@parent
@endsection
@section('ex_css')
    <link href="{{ asset('backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph">

                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3> 各月用户访问量 <small>network activities</small></h3>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>July 30, 2016 - September 28, 2016</span> <b class="caret"></b>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                        <div style="width: 100%;">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                        <div class="x_title">
                            <h2>访问最多文章统计</h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-6">
                            @foreach($hot_articles as $article)
                            <div>
                                <p>{{ $article->title }}</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 100%;">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{ $article->read_count / $article_visits * 100 }}"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                        <h2> 文章分类统计 <small> categories </small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="" style="width:100%">
                            <tr>
                                <th style="width:37%;">
                                    <p>Top 5</p>
                                </th>
                                <th>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                        <p class="">Categories</p>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <p class="">Percents</p>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                                </td>
                                <td>
                                    <table class="tile_info">
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>
                                                <p><i class="fa fa-square green"></i>{{ $category->name }} </p>
                                            </td>
                                            <td>{{ (integer)($category->articles->count() / $articles->count() * 100) }}%</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <p>Users of world</p>
                <div id="world-map-gdp" style="height:400px;"></div>
            </div>
        </div>
    </div>
        @section('script')
            <script src="{{ asset('backend/vendors/Chart.js/dist/Chart.min.js') }}"></script>
            <script src="{{ asset('backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
            <script src="{{ asset('backend/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
            <script src="{{ asset('backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
            <script src="{{ asset('backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
            <script>
                Chart.defaults.global.legend = {
                    enabled: false
                };

                // Line chart
                var ctx = document.getElementById("lineChart");
                var lineChart = new Chart(ctx, {
                    @inject('carbon','App\Vital\Presenters\HomePresenter')

                    type: 'line',
                    data: {
                        labels: [{{ $carbon->getPastMonths() }}],
                        datasets: [{
                            label: "用户访问量",
                            backgroundColor: "rgba(38, 185, 154, 0.31)",
                            borderColor: "rgba(38, 185, 154, 0.7)",
                            pointBorderColor: "rgba(38, 185, 154, 0.7)",
                            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                            pointHoverBackgroundColor: "#fff",
                            pointHoverBorderColor: "rgba(220,220,220,1)",
                            pointBorderWidth: 1,
                            data: [{{ $visits }}]
                        }]
                    },
                });
                var options = {
                    legend: false,
                    responsive: false
                };
                new Chart(document.getElementById("canvas1"), {
                    type: 'doughnut',
                    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                    data: {
                        labels: [
                            @foreach($categories as $category)
                            '{{ $category['name'] }}',
                            @endforeach
                        ],
                        datasets: [{
                            data: [
                            @foreach($categories as $category)
                                    '{{ $category->articles->count() }}',
                            @endforeach
                            ],
                            backgroundColor: [
                                "#9B59B6",
                                "#E74C3C",
                                "#26B99A",
                                "#3498DB"
                            ],
                            hoverBackgroundColor: [
                                "#B370CF",
                                "#E95E4F",
                                "#36CAAB",
                                "#49A9EA"
                            ]
                        }]
                    },
                    options: options
                });
                console.log(sample_data);
                $('#world-map-gdp').vectorMap({
                    map: 'world_en',
                    backgroundColor: null,
                    color: '#ffffff',
                    hoverOpacity: 0.7,
                    selectedColor: '#666666',
                    enableZoom: true,
                    showTooltip: true,
                    values: sample_data,
                    scaleColors: ['#E6F2F0', '#149B7E'],
                    normalizeFunction: 'polynomial'
                });
            </script>
        @endsection
    @endsection