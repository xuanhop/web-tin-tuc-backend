@extends('layouts.master')

@section('title', 'Management')

@section('content')
    <!-- Start right Content here -->
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
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card-box widget-box-one">
                        <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                        <div class="wigdet-one-content">
                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">
                                Posts Number</p>
                            <h2>{{$postNumber}}
                                <small><i class="mdi mdi-arrow-down text-danger"></i></small>
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card-box widget-box-one">
                        <i class="mdi mdi-tag widget-one-icon"></i>
                        <div class="wigdet-one-content">
                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">
                                Categories Number</p>
                            <h2>{{$categoriesNumber}}
                                <small><i class="mdi mdi-arrow-down text-danger"></i></small>
                            </h2>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card-box widget-box-one">
                        <i class="mdi mdi-layers widget-one-icon"></i>
                        <div class="wigdet-one-content">
                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow"
                               title="User This Month">Number of user</p>
                            <h2>{{$userNumber}}
                                <small><i class="mdi mdi-arrow-up text-success"></i></small>
                            </h2>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- end row -->

    </div> <!-- container -->

    <footer class="footer text-right">
        2019 © gemmob.
    </footer>
    <!-- ============================================================== -->
    <!-- End Right content here -->
@endsection