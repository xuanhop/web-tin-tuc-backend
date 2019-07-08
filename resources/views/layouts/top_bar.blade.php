<div class="topbar-left">
    <a href="{{asset('/')}}"
       class="logo">{{--<img src="{{asset('images/logo.png')}}" style="width: 100%; height: auto;">--}} </a>

</div>

<!-- Button mobile view to collapse sidebar menu -->
<div class="navbar navbar-default" role="navigation">
    <div class="container">

        <!-- Navbar-left -->
        <ul class="nav navbar-nav navbar-left">
            <li>
                <button class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <li class="hidden-xs">
                <form class="app-search" action="{{asset('posts/search')}}" method="post" id="myForm">
                    @csrf
                    <input type="text" placeholder="Search..."
                           class="form-control" name="search">

                    {{--                    <a href="{{asset('posts/search')}}" onclick="return document.getElementById('myForm').submit()"><i class="fa fa-search"></i></a>--}}
                </form>
            </li>
            <li class="dropdown hidden-xs">
                <a data-toggle="dropdown" class="dropdown-toggle menu-item" href="#" aria-expanded="false">English
                    <span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="#">German</a></li>
                    <li><a href="#">French</a></li>
                    <li><a href="#">Italian</a></li>
                    <li><a href="#">Spanish</a></li>
                </ul>
            </li>
        </ul>

        <!-- Right(Notification) -->
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                    <i class="mdi mdi-bell"></i>
                    <span class="badge up bg-success">4</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                    <li>
                        <h5>Notifications</h5>
                    </li>
                    <li>
                        <a href="#" class="user-list-item">
                            <div class="icon bg-info">
                                <i class="mdi mdi-account"></i>
                            </div>
                            <div class="user-desc">
                                <span class="name">New Signup</span>
                                <span class="time">5 hours ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="user-list-item">
                            <div class="icon bg-danger">
                                <i class="mdi mdi-comment"></i>
                            </div>
                            <div class="user-desc">
                                <span class="name">New Message received</span>
                                <span class="time">1 day ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="user-list-item">
                            <div class="icon bg-warning">
                                <i class="mdi mdi-settings"></i>
                            </div>
                            <div class="user-desc">
                                <span class="name">Settings</span>
                                <span class="time">1 day ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="all-msgs text-center">
                        <p class="m-0"><a href="#">See all Notification</a></p>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                    <i class="mdi mdi-email"></i>
                    <span class="badge up bg-danger">8</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                    <li>
                        <h5>Messages</h5>
                    </li>
                    <li>
                        <a href="#" class="user-list-item">
                            <div class="avatar">
                                <img src="{{asset('images/users/avatar-2.jpg')}}" alt="">
                            </div>
                            <div class="user-desc">
                                <span class="name">Patricia Beach</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">2 hours ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="user-list-item">
                            <div class="avatar">
                                <img src="{{asset('images/users/avatar-3.jpg')}}" alt="">
                            </div>
                            <div class="user-desc">
                                <span class="name">Connie Lucas</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">2 hours ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="user-list-item">
                            <div class="avatar">
                                <img src="{{asset('images/users/avatar-4.jpg')}}" alt="">
                            </div>
                            <div class="user-desc">
                                <span class="name">Margaret Becker</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">2 hours ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="all-msgs text-center">
                        <p class="m-0"><a href="#">See all Messages</a></p>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="right-bar-toggle right-menu-item">
                    <i class="mdi mdi-settings"></i>
                </a>
            </li>

            <li class="dropdown user-box">
                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                    <img src="{{asset('images/users/avatar-1.jpg')}}" alt="user-img" class="img-circle user-img">
                </a>

                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                    <li>
                        <h5>Hi, {{session()->get('user')->name}}</h5>
                    </li>
                    <li><a href="{{asset('/logout')}}"><i class="ti-close m-r-5"></i>Logout</a> </button>
                    </li>
                </ul>
            </li>

        </ul> <!-- end navbar-right -->

    </div><!-- end container -->
</div><!-- end navbar -->
<script>
    document.onkeypress(function (e) {
        if (e.keyCode === 13){
            document.getElementById("myForm").submit();
        }
    })
</script>