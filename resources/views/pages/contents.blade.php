@extends('layouts.mainHome')

@section('content')

            <!-- Start content -->
        <div class="content">
            <div class="container">
               <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Dashboard</h4>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-box-three" style="box-shadow:0 0 7px 1px lightgrey;">
                            <div class="bg-icon pull-left">
                                <i class="ti-shopping-cart"></i>
                            </div>
                            <div class="text-right">
                                <p class="text-success m-t-5 text-uppercase font-600 font-secondary">Product Sold</p>
                                <h2 class="m-b-10"><span data-plugin="counterup">2,562</span></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-box-three" style="box-shadow:0 0 7px 1px lightgrey;">
                            <div class="bg-icon pull-left">
                                <i class="ti-bookmark-alt"></i>
                            </div>
                            <div class="text-right">
                                <p class="text-pink m-t-5 text-uppercase font-600 font-secondary">Product Sold</p>
                                <h2 class="m-b-10"><span data-plugin="counterup">8,542</span></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-box-three" style="box-shadow:0 0 7px 1px lightgrey;">
                            <div class="bg-icon pull-left">
                                <i class="ti-crown"></i>
                            </div>
                            <div class="text-right">
                                <p class="text-purple m-t-5 text-uppercase font-600 font-secondary">Product Sold</p>
                                <h2 class="m-b-10"><span data-plugin="counterup">6,254</span></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-box-three" style="box-shadow:0 0 7px 1px lightgrey;">
                            <div class="bg-icon pull-left">
                                <i class="ti-agenda"></i>
                            </div>
                            <div class="text-right">
                                <p class="text-warning m-t-5 text-uppercase font-600 font-secondary">Product Sold</p>
                                <h2 class="m-b-10"><span data-plugin="counterup">7,524</span></h2>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->

                <div class="row">

                    <div class="col-xs-6">
                        <div class="card-box" style="box-shadow:0 0 7px 1px lightgrey;">

                            <div class="demo-box">

                                <canvas id="lineChart" height="420"></canvas>
                                <!-- ( Jquery.Chartjs.init.js ) For Setting -->
                            </div>

                        </div> <!-- card-box -->
                    </div><!-- end col-->


                    <div class="col-md-6">
                        <div class="card-box" style="box-shadow:0 0 7px 1px lightgrey;">
                            <div class="demo-box">
                                <div class="chart" id="line-chart"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->



            </div> <!-- container -->

        </div> <!-- content -->


@endsection    

@section('scripts')

    
    <!-- Counter js  -->
    <script src="{{ asset('assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>

    <!-- chatjs  -->
    <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/pages/jquery.chartjs.init.js') }}"></script>

    <!-- Google Charts js -->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <!-- Init -->
    <script type="text/javascript" src="{{ asset('assets/pages/jquery.google-charts.init.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('assets/pages/jquery.dashboard.js') }}"></script>


@endsection