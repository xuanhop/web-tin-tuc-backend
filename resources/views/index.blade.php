@extends('layouts.master')

@section('title', 'Management')

@section('content')
    <!-- Start right Content here -->
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row" >
                <div class="col-xs-12" >
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


            <div class="row">
                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Recent Users</h4>

                        <div class="table-responsive">
                            <table class="table table table-hover m-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>User Name</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>
                                        <img src="{{asset('images/users/avatar-1.jpg')}}" alt="user"
                                             class="thumb-sm img-circle"/>
                                    </th>
                                    <td>
                                        <h5 class="m-0">Louis Hansen</h5>
                                        <p class="m-0 text-muted font-13">
                                            <small>Web designer</small>
                                        </p>
                                    </td>
                                    <td>+12 3456 789</td>
                                    <td>USA</td>
                                    <td>07/08/2016</td>
                                </tr>

                                <tr>
                                    <th>
                                        <img src="{{asset('images/users/avatar-2.jpg')}}" alt="user"
                                             class="thumb-sm img-circle"/>
                                    </th>
                                    <td>
                                        <h5 class="m-0">Craig Hause</h5>
                                        <p class="m-0 text-muted font-13">
                                            <small>Programmer</small>
                                        </p>
                                    </td>
                                    <td>+89 345 6789</td>
                                    <td>Canada</td>
                                    <td>29/07/2016</td>
                                </tr>

                                <tr>
                                    <th>
                                        <img src="{{asset('images/users/avatar-3.jpg')}}" alt="user"
                                             class="thumb-sm img-circle"/>
                                    </th>
                                    <td>
                                        <h5 class="m-0">Edward Grimes</h5>
                                        <p class="m-0 text-muted font-13">
                                            <small>Founder</small>
                                        </p>
                                    </td>
                                    <td>+12 29856 256</td>
                                    <td>Brazil</td>
                                    <td>22/07/2016</td>
                                </tr>

                                <tr>
                                    <th>
                                        <img src="{{asset('images/users/avatar-4.jpg')}}" alt="user"
                                             class="thumb-sm img-circle"/>
                                    </th>
                                    <td>
                                        <h5 class="m-0">Bret Weaver</h5>
                                        <p class="m-0 text-muted font-13">
                                            <small>Web designer</small>
                                        </p>
                                    </td>
                                    <td>+00 567 890</td>
                                    <td>USA</td>
                                    <td>20/07/2016</td>
                                </tr>

                                <tr>
                                    <th>
                                        <img src="{{asset('images/users/avatar-5.jpg')}}" alt="user"
                                             class="thumb-sm img-circle"/>
                                    </th>
                                    <td>
                                        <h5 class="m-0">Mark</h5>
                                        <p class="m-0 text-muted font-13">
                                            <small>Web design</small>
                                        </p>
                                    </td>
                                    <td>+91 123 456</td>
                                    <td>India</td>
                                    <td>07/07/2016</td>
                                </tr>

                                </tbody>
                            </table>

                        </div> <!-- table-responsive -->
                    </div> <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Recent Users</h4>

                        <div class="table-responsive">
                            <table class="table table table-hover m-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>User Name</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>
                                        <span class="avatar-sm-box bg-success">L</span>
                                    </th>
                                    <td>
                                        <h5 class="m-0">Louis Hansen</h5>
                                        <p class="m-0 text-muted font-13">
                                            <small>Web designer</small>
                                        </p>
                                    </td>
                                    <td>+12 3456 789</td>
                                    <td>USA</td>
                                    <td>07/08/2016</td>
                                </tr>

                                <tr>
                                    <th>
                                        <span class="avatar-sm-box bg-primary">C</span>
                                    </th>
                                    <td>
                                        <h5 class="m-0">Craig Hause</h5>
                                        <p class="m-0 text-muted font-13">
                                            <small>Programmer</small>
                                        </p>
                                    </td>
                                    <td>+89 345 6789</td>
                                    <td>Canada</td>
                                    <td>29/07/2016</td>
                                </tr>

                                <tr>
                                    <th>
                                        <span class="avatar-sm-box bg-brown">E</span>
                                    </th>
                                    <td>
                                        <h5 class="m-0">Edward Grimes</h5>
                                        <p class="m-0 text-muted font-13">
                                            <small>Founder</small>
                                        </p>
                                    </td>
                                    <td>+12 29856 256</td>
                                    <td>Brazil</td>
                                    <td>22/07/2016</td>
                                </tr>

                                <tr>
                                    <th>
                                        <span class="avatar-sm-box bg-pink">B</span>
                                    </th>
                                    <td>
                                        <h5 class="m-0">Bret Weaver</h5>
                                        <p class="m-0 text-muted font-13">
                                            <small>Web designer</small>
                                        </p>
                                    </td>
                                    <td>+00 567 890</td>
                                    <td>USA</td>
                                    <td>20/07/2016</td>
                                </tr>

                                <tr>
                                    <th>
                                        <span class="avatar-sm-box bg-orange">M</span>
                                    </th>
                                    <td>
                                        <h5 class="m-0">Mark</h5>
                                        <p class="m-0 text-muted font-13">
                                            <small>Web design</small>
                                        </p>
                                    </td>
                                    <td>+91 123 456</td>
                                    <td>India</td>
                                    <td>07/07/2016</td>
                                </tr>

                                </tbody>
                            </table>

                        </div> <!-- table-responsive -->
                    </div> <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->

    <footer class="footer text-right">
        2016 - 2018 © Zircos theme by Coderthemes.
    </footer>
    <!-- ============================================================== -->
    <!-- End Right content here -->
@endsection