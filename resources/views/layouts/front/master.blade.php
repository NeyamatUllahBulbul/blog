<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    @include('layouts.front._head')
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <div class="header-top">
        <div class="container">
            @include('layouts.front._header')
        </div>
    </div>
    <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">
         <div class="container">
            @include('layouts.front._nav')
         </div>
    </div>
            @yield('content')
    <div class="site-section subscribe bg-light">
        <div class="container">
            <form action="#" class="row align-items-center">
                <div class="col-md-5 mr-auto">
                    <h2>Newsletter Subcribe</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis aspernatur ut at quae omnis pariatur obcaecati possimus nisi ea iste!</p>
                </div>
                <div class="col-md-6 ml-auto">
                    <div class="d-flex">
                        <input type="email" class="form-control" placeholder="Enter your email">
                        <button type="submit" class="btn btn-secondary"><span class="icon-paper-plane"></span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            @include('layouts.front._footer')
        </div>
    </div>
</div>


<!--<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" /><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15" /></svg></div>-->
        @include('layouts.front._js')
</body>
</html>