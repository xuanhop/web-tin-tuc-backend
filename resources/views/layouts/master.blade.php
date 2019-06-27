<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @include('layouts.begin_site')
</head>
<body class="fixed-left">
<div class="wrapper">
    {{--    Site-bar--}}
    <div class="topbar">
        @include('layouts.top_bar')
    </div>
    @include('layouts.left_side_bar')
    <div class="content-page">
        <div class="content">
            @yield('content')
        </div>
    </div>
    @include('layouts.right_side_bar')
</div>

@include('layouts.end_site')
@stack('scripts')
</body>
</html>